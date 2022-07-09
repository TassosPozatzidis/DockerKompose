<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Member;
use Illuminate\Support\Facades\DB;

class CommonPublicationsController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAllCommonPublications()
    {
        $db_data = collect(DB::select('call SP_COMMON_PUBLICATIONS()'));
        return view('pages.commonpublications.all', [
          'commonpublications' => $db_data,
          'logged_in_mode' => true
        ]);
        //return $db_data;
    }
    public function exportCommonPublicationsCsv(Request $request)
    {
        $fileName = 'CommonPublications.csv';
        $CommonPublications = collect(DB::select('call SP_COMMON_PUBLICATIONS()'));

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Researchers', 'NumberOfCommonPublications');

        $callback = function() use($CommonPublications, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($CommonPublications as $CommonPublication) {
                $row['Researchers']  = $CommonPublication->Researchers;
                $row['NumberOfCommonPublications']    = $CommonPublication->NumberOfPublications;


                fputcsv($file, array($row['Researchers'], $row['NumberOfCommonPublications']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
