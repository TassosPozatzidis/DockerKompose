<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAllPublications()
    {
        $db_data = DB::table('publications')
                              ->paginate(20);
        $start = $db_data->firstItem();

        return view('pages.publications.all', [
          'publications' => $db_data,
          'logged_in_mode' => true,
          'start' => $start
        ]);
    }

        public function showNewPublicationPage() {
          $publication = new publication();
          return view('pages.publications.create-edit', [
            'publication' => $publication
          ]);
        }

        public function createPublication(Request $request) {
          $request->validate([
            'publication_id' => 'required',
              'publication_name' => 'required',
              'publication_date' => 'required|date'
          ]);

          $form_data = $request->all();
          $publication_subject = isset($form_data['publication_subject']) ? $form_data['publication_subject'] : null;
          DB::select('CALL SP_INSERT_PUBLICATIONS(?, ?, ?, ?, ?)', [
            2,
            $form_data['publication_name'],
            $form_data['publication_media'],
            $publication_subject,
            $form_data['publication_date'],
          ]);
          return redirect()->route('publications.all');
        }

        public function showEditPublicationPage(int $id) {
          $publication = Publication::find($id);
          return view('pages.publications.create-edit', [
            'publication' => $publication
          ]);
        }

        public function showPublicationPage(int $id) {
          $publication = Publication::find($id);
          return view('pages.publications.showpublication', [
            'publication' => $publication
          ]);
        }

        public function updatePublication(int $id, Request $request) {
          $request->validate([
              'publication_date' => 'date'
          ]);
          $form_data = $request->all();
          $publication = Publication::find($id);
          $publication->PUBLICATION_NAME = $form_data['publication_name'];
          $publication->PUBLICATION_MEDIA = $form_data['publication_media'];
          if(isset($form_data['publication_subject']))
            $publication->PUBLICATION_SUBJECT = $form_data['publication_subject'];
          $publication->PUBLICATION_DATE = $form_data['publication_date'];

          $publication->save();
          return redirect()->route('publications.all');
        }
        public function deletePublication(int $id, Request $request) {
          $publication = Publication::find($id);
          $db_data = collect(DB::table('publications')->where('PUBLICATION_ID',$id)
          ->delete());
          return redirect()->route('publications.all');
        }
        public function exportPublicationCsv(Request $request)
        {
            $fileName = 'Publications.csv';
            $Publications = Publication::all();

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('Publication Name', 'Publication Media', 'Publication Subject', 'Publication Date');

            $callback = function() use($Publications, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($Publications as $Publication) {
                    $row['Publication Name']  = $Publication->PUBLICATION_NAME;
                    $row['Publication Media']    = $Publication->PUBLICATION_MEDIA;
                    $row['Publication Subject']    = $Publication->RESEARCH_PROJECT_END_DATE;
                    $row['Publication Date']  = $Publication->RESEARCH_PROJECT_BACKER;

                    fputcsv($file, array($row['Publication Name'], $row['Publication Media'], $row['Publication Subject'], $row['Publication Date']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }
    }
