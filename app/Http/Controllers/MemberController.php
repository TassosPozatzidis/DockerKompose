<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\MemberTypeLookup;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MemberController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAllMembers()
    {

        $db_data = DB::table('members')
                ->join('member_type_lkp', 'member_type_lkp.MEMBER_TYPE_ID', '=', 'members.MEMBER_TYPE_ID')
                ->paginate(20);
        $start = $db_data->firstItem();

        return view('pages.members.all', [
          'members' => $db_data,
          'logged_in_mode' => true,
          'start' => $start
        ]);
    }

    public function showNewMemberPage() {
      $member = new Member();
      $memberTypeLookupCollection = MemberTypeLookup::all();
      return view('pages.members.create-edit', [
        'member' => $member,
        'memberTypeLookupCollection' => $memberTypeLookupCollection
      ]);
    }

    public function showMemberPublications(int $id, Request $request) {
      $db_data = collect(DB::select('call SP_PUBLICATION_CATALOG_OF_MEMBER(?)',[
        $id
      ]));
      return view('pages.members.show-member-publications', [
        'memberpublications' => $db_data,
        'logged_in_mode' => true
      ]);
    }

    public function showMemberActivity(int $id, Request $request) {
      $form_data = $request->all();
      $db_data = collect(DB::select('call MemberActivity(?,?)',[
        $id,
        $form_data['year']
      ]));
      return view('pages.members.show-member-activity', [
        'memberactivities' => $db_data,
        'logged_in_mode' => true
      ]);
    }

    public function createMember(Request $request) {
      $request->validate([
          'first_name' => 'required',
          'email' => 'required|email|unique:members,EMAIL',
          'date_of_birth' => 'required|date',
      ]);

      $form_data = $request->all();
      $short_cv = isset($form_data['member_short_cv']) ? $form_data['member_short_cv'] : null;
      DB::select('call sp_Insert_Member(?, ?, ?, ?, ?, ?, ?, ?)', [
        $form_data['member_type_lkp_id'],
        $form_data['first_name'],
        $form_data['fath_name'],
        $form_data['last_name'],
        $form_data['email'],
        Carbon::parse($form_data['date_of_birth']),
        $form_data['web_page'],
        $short_cv
      ]);
      return redirect()->route('members.all');
    }

    public function showEditMemberPage(int $id) {
      $member = Member::find($id);
      $memberTypeLookupCollection = MemberTypeLookup::all();
      return view('pages.members.create-edit', [
        'member' => $member,
        'memberTypeLookupCollection' => $memberTypeLookupCollection
      ]);
    }

    public function showMemberPage(int $id) {
      $member = DB::select('select * from members
        inner join member_type_lkp mtl on members.MEMBER_TYPE_ID = mtl.MEMBER_TYPE_ID
        where MEMBER_ID = ? limit 1', [$id])[0];
      return view('pages.members.showmember', [
        'member' => $member
      ]);
    }

    public function updateMember(int $id, Request $request) {
      $form_data = $request->all();
      $member = Member::find($id);
      $member->FIRST_NAME = $form_data['first_name'];
      $member->FATH_NAME = $form_data['fath_name'];
      $member->LAST_NAME = $form_data['last_name'];
      $member->EMAIL = $form_data['email'];
      $member->DATE_OF_BIRTH = Carbon::parse($form_data['date_of_birth']);
      $member->WEB_PAGE = $form_data['web_page'];
      $member->MEMBER_TYPE_ID = $form_data['member_type_lkp_id'];
      if(isset($form_data['member_short_cv']))
        $member->MEMBER_SHORT_CV = $form_data['member_short_cv'];
      $member->save();
      return redirect()->route('members.all');
    }
    public function deleteMember(int $id, Request $request) {
      $member = Member::find($id);
      $db_data = collect(DB::table('members')->where('MEMBER_ID',$id)
      ->delete());
      return redirect()->route('members.all');
    }
    public function exportMembersCsv(Request $request)
    {
        $fileName = 'Members.csv';
        $Members = Member::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('First Name', 'Father Name', 'Last Name', 'E-mail','Date of Birth','Web Page','Member Short CV');

        $callback = function() use($Members, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($Members as $Member) {
                $row['First Name']  = $Member->FIRST_NAME;
                $row['Father Name']    = $Member->FATH_NAME;
                $row['Last Name']    = $Member->LAST_NAME;
                $row['E-mail']  = $Member->EMAIL;
                $row['Date of Birth']  = $Member->DATE_OF_BIRTH;
                $row['Web Page']  = $Member->WEB_PAGE;
                $row['Member Short CV']  = $Member->MEMBER_SHORT_CV;

                fputcsv($file, array($row['First Name'], $row['Father Name'], $row['Last Name'], $row['E-mail'], $row['Date of Birth'], $row['Web Page'], $row['Member Short CV']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
