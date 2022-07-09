<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchProject;
use Illuminate\Support\Facades\DB;

class ResearchProjectController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAllResearchProject()
    {
        $db_data = DB::table('research_project')
                                  ->paginate(20);
        $start = $db_data->firstItem();

        return view('pages.researchprojects.all', [
          'researchprojects' => $db_data,
          'logged_in_mode' => true,
          'start' => $start
        ]);
    }

        public function showNewResearchProjectPage() {
          $researchproject = new ResearchProject();
          return view('pages.researchprojects.create-edit', [
            'researchproject' => $researchproject
          ]);
        }

        public function createResearchProject(Request $request) {
          $request->validate([
              'research_project_name' => 'required',
              'research_project_start_date' => 'required|date',
              'research_project_end_date' => 'required|date',
          ]);

          $form_data = $request->all();
          $research_project_backer = isset($form_data['research_project_backer']) ? $form_data['research_project_backer'] : null;
          DB::select('call SP_INSERT_RESEARCH_PROJECT(?, ?, ?, ?)', [
            $form_data['research_project_name'],
            $form_data['research_project_start_date'],
            $form_data['research_project_end_date'],
            $research_project_backer
          ]);
          return redirect()->route('researchprojects.all');
        }

        public function showEditResearchProjectPage(int $id) {
          $researchproject = ResearchProject::find($id);
          return view('pages.researchprojects.create-edit', [
            'researchproject' => $researchproject
          ]);
        }

        public function showResearchProjectPage(int $id) {
          $researchproject = ResearchProject::find($id);
          return view('pages.researchprojects.showresearchproject', [
            'researchproject' => $researchproject
          ]);
        }

        public function updateResearchProject(int $id, Request $request) {
          $request->validate([
              'research_project_start_date' => 'date',
              'research_project_end_date' => 'date'
          ]);
          $form_data = $request->all();
          $researchproject = ResearchProject::find($id);
          $researchproject->RESEARCH_PROJECT_NAME = $form_data['research_project_name'];
          $researchproject->RESEARCH_PROJECT_START_DATE = $form_data['research_project_start_date'];
          $researchproject->RESEARCH_PROJECT_END_DATE = $form_data['research_project_end_date'];
          if(isset($form_data['research_project_backer']))
            $researchproject->RESEARCH_PROJECT_BACKER = $form_data['research_project_backer'];
          $researchproject->save();
          return redirect()->route('researchprojects.all');
        }

        public function deleteResearchProject(int $id, Request $request) {
          $researchproject = ResearchProject::find($id);
          $db_data = collect(DB::table('research_project')->where('RESEARCH_PROJECT_ID',$id)
          ->delete());
          return redirect()->route('researchprojects.all');
        }

        public function exportResearchProjectCsv(Request $request)
        {
            $fileName = 'ResearchProjects.csv';
            $researchProjects = ResearchProject::all();

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('Research Project Name', 'Research Start Date', 'Research End Date', 'Research Backer');

            $callback = function() use($researchProjects, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($researchProjects as $researchProject) {
                    $row['Research Project Name']  = $researchProject->RESEARCH_PROJECT_NAME;
                    $row['Research Start Date']    = $researchProject->RESEARCH_PROJECT_START_DATE;
                    $row['Research End Date']    = $researchProject->RESEARCH_PROJECT_END_DATE;
                    $row['Research Backer']  = $researchProject->RESEARCH_PROJECT_BACKER;

                    fputcsv($file, array($row['Research Project Name'], $row['Research Start Date'], $row['Research End Date'], $row['Research Backer']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }
    }
