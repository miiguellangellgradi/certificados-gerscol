<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class StudentsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          $busqueda_curso = $request->get('BusquedaEstudiante');

          return view('students.index', [

            'students'=> students::where('id','like', "%$busqueda_curso%") ->paginate(10)

            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function store()
        {

           $fields = request()->validate([

                'id'=>'required',

                'student_name'=>'required',

                'student_description'=>'required',

                'student_mail'=>'required',

                'student_age'=>'required',

            ]);


             students::create($fields);

            return redirect()->route('students.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('students.show', [
            'students' => students::find($id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(students $students)
    {
        $students -> update([
        'id' => request('student_id'),
        'student_name' => request('student_name'),
        'student_description' => request('student_description'),
        'student_age' => request('student_age'),
        'student_mail' => request('student_mail'),

        ]);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(students $students)
    {
        $students->delete();

        return redirect()->route('students.index');
    }

    public function create(){
        return view('students.create');

    }
    public function edit(students $students)
    {
        return view('students.edit', [
            'students' => $students
        ]);
    }


}
