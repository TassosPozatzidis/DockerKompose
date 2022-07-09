<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClassController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAllClasses()
    {
        $db_data = DB::table('classes')->paginate(20);
        $start = $db_data->firstItem();

        return view('pages.classes.all', [
          'classes' => $db_data,
          'logged_in_mode' => true,
          'start' => $start
        ]);
    }

    public function showClassMembers(int $id, Request $request) {
      $db_data = collect(DB::select('call SP_CLASS_MEMBERS(?)',[
        $id
      ]));
      return view('pages.classes.show-class-members', [
        'classmembers' => $db_data,
        'logged_in_mode' => true
      ]);
    }

    public function showNewClassPage() {
      $class = new Classes();
      return view('pages.classes.create-edit', [
        'class' => $class
      ]);
    }

    public function createClass(Request $request) {
      $request->validate([
          'class_name' => 'required',
          'class_department' => 'required',
          'class_training_cycle' => 'required',
          'class_semester' => 'required'
      ]);

      $form_data = $request->all();
      DB::select('call SP_INSERT_CLASSES(?, ?, ?, ?)', [
        $form_data['class_name'],
        $form_data['class_department'],
        $form_data['class_training_cycle'],
        $form_data['class_semester']
      ]);
      return redirect()->route('classes.all');
    }

    public function showEditClassPage(int $id) {
      $class = Classes::find($id);
      return view('pages.classes.create-edit', [
        'class' => $class
      ]);
    }

    public function showClassPage(int $id) {
      $class = Classes::find($id);
      return view('pages.classes.showclass', [
        'class' => $class
      ]);
    }

    public function updateClass(int $id, Request $request) {
      $form_data = $request->all();
      $class = Classes::find($id);
      $class->CLASS_NAME = $form_data['class_name'];
      $class->DEPARTMENT = $form_data['class_department'];
      $class->TRAINING_CYCLE = $form_data['class_training_cycle'];
      $class->SEMESTER = $form_data['class_semester'];
      $class->save();
      return redirect()->route('classes.all');
    }

    public function deleteClass(int $id, Request $request) {
      $class = Classes::find($id);
      $db_data = collect(DB::table('classes')->where('CLASS_ID',$id)
      ->delete());
      return redirect()->route('classes.all');
    }
    public function exportClassesCsv(Request $request)
    {
        $fileName = 'Classes.csv';
        $Classes = Classes::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Class Name', 'Department', 'Class Training Cycle', 'Class Semester');

        $callback = function() use($Classes, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($Classes as $Class) {
                $row['Class Name']  = $Class->CLASS_NAME;
                $row['Department']    = $Class->DEPARTMENT;
                $row['Class Training Cycle']    = $Class->TRAINING_CYCLE;
                $row['Class Semester']  = $Class->SEMESTER;

                fputcsv($file, array($row['Class Name'], $row['Department'], $row['Class Training Cycle'], $row['Class Semester']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
