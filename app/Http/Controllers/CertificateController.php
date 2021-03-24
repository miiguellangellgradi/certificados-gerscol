<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\certificates;
use App\Models\courses;
use App\Models\students;
use Barryvdh\DomPDF\Facade as PDF;
use App\Providers\RouteServiceProvider;


class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $busqueda_curso = $request->get('Busqueda');

          return view('certificate.index', [

            'certificate'=> certificates::where('students_id','like', "%$busqueda_curso%") ->paginate(10)

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



                'courses_id'=>'required',

                'students_id'=>'required',

                'certificate_expedition'=>'required',


            ]);


             certificates::create($fields);

            return redirect()->route('certificate.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('certificate.show', [
        'certificates' => certificates::find($id)
            ]);
    }



    public function downloadPDF($id) {
        setlocale(LC_TIME, "spanish");
        $certificates = certificates::find($id);
        $pdf = PDF::loadView('certificate.show', compact('certificates'))->setPaper('letter', 'landscape');

        return $pdf->download("CertificadoGerscol  $id .pdf");
      }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(certificates $certificates)
    {
        $courses = courses::all();
        $students = Students::all();
        $certificates -> update([

        'certificate_name' => request('certificate_name'),
        'certificate_description' => request('certificate_description'),
        'certificate_duration' => request('certificate_duration'),
        'certificate_validation' => request('certificate_validation'),

        ]);

        return redirect()->route('certificate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificates $certificate)
    {
        $certificate->delete();

        return redirect()->route('certificate.index');
    }

    public function create(){
        $courses = courses::all();
        $students = Students::all();
        return view('certificate.create')->with(compact('students','courses'));

    }
    public function edit(certificates $certificate)
    {
        $courses = courses::all();
        $students = Students::all();
        return view('certificate.edit', [
            'certificate' => $certificate
        ]);
    }

}
