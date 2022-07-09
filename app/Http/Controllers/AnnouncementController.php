<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnnouncementController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAllAnnouncements()
    {
        $db_data = DB::table('announcements')->paginate(20);
        $start = $db_data->firstItem();

        return view('pages.announcements.all', [
          'announcements' => $db_data,
          'logged_in_mode' => true,
          'start' => $start
        ]);
    }
    public function showNewAnnouncementPage() {
      $announcement = new Announcement();
      return view('pages.announcements.create-edit', [
        'announcement' => $announcement
      ]);
    }

    public function createAnnouncement(Request $request) {
      $request->validate([
          'announcement_description' => 'required',

      ]);

      $form_data = $request->all();
      DB::select('call INSERT_ANNOUNCEMENT(?)', [
        $form_data['announcement_description']
      ]);
      return redirect()->route('announcements.all');
    }

    public function showEditAnnouncementPage(int $id) {
      $announcement = Announcement::find($id);
      return view('pages.announcements.create-edit', [
        'announcement' => $announcement
      ]);
    }
    public function updateAnnouncement(int $id, Request $request) {
      $form_data = $request->all();
      $announcement = Announcement::find($id);
      $announcement->ANNOUNCEMENT_DESCRIPTION = $form_data['announcement_description'];
      $announcement->save();
      return redirect()->route('announcements.all');
    }

    public function deleteAnnouncement(int $id, Request $request) {
      $announcement = Announcement::find($id);
      $db_data = collect(DB::table('announcements')->where('ANNOUNCEMENT_ID',$id)
      ->delete());
      return redirect()->route('announcements.all');
    }


    public function exportAnnouncementsCsv(Request $request)
    {
        $fileName = 'Announcements.csv';
        $Announcements = Announcement::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Description');

        $callback = function() use($Announcements, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($Announcements as $Announcement) {
                $row['Description']  = $Announcement->ANNOUNCEMENT_DESCRIPTION;


                fputcsv($file, array($row['Description']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
