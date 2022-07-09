<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberTypeLookup;
use Illuminate\Support\Facades\DB;

class MemberTypeLookupController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAllMemberTypeLookups()
    {
        $db_data = collect(DB::select('select * from member_type_LKP'));
        return view('pages.membertypes.all', [
          'membertypelookups' => $db_data,
          'logged_in_mode' => true
        ]);
    }
}
