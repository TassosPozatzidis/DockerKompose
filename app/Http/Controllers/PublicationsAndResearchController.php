<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Member;
use Illuminate\Support\Facades\DB;

class PublicationsAndResearchController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showCountOfPublicationsAndResearch()
    {
        $db_data = collect(DB::select('call SP_COUNT_REASEARCH_AND_PUBLICATION()'));
        return view('pages.publicationsandresearch.all', [
          'publicationsandresearches' => $db_data,
          'logged_in_mode' => true
        ]);
        //return $db_data;
    }
    public function exportCountOfPublicationsAndResearchCsv(Request $request)
    {
        $fileName = 'CountOfPublicationsAndResearch.csv';
        $CountOfPublicationsAndResearches = collect(DB::select('call SP_COUNT_REASEARCH_AND_PUBLICATION()'));

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('first_name', 'last_name','Publications','Researches');

        $callback = function() use($CountOfPublicationsAndResearches, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($CountOfPublicationsAndResearches as $CountOfPublicationsAndResearch) {
                $row['first_name']  = $CountOfPublicationsAndResearch->first_name;
                $row['last_name']    = $CountOfPublicationsAndResearch->last_name;
                $row['Publications']    = $CountOfPublicationsAndResearch->Publications;
                $row['Researches']    = $CountOfPublicationsAndResearch->Researches;


                fputcsv($file, array($row['first_name'], $row['last_name'], $row['Publications'], $row['Researches']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
