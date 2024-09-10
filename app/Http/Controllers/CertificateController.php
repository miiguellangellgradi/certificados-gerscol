<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\certificates;
use App\Models\courses;
use App\Models\students;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->get('BusquedaCedula');

        return view('certificate.index', [
            'certificate' => certificates::where('students_id', 'like', "%$busqueda%")->paginate(10)
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
            'courses_id' => 'required',
            'students_id' => 'required',
            'certificate_expedition' => 'required',
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

    /**
     * Generate and download a PDF of the certificate.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($id)
    {
        setlocale(LC_TIME, 'spanish');
        $certificates = certificates::find($id);
        $qrCodeSvg = QrCode::format('svg')->size(120)->generate(route('certificate.show', $id));
        $qrCodeBase64 = base64_encode($qrCodeSvg);

        $pdf = Pdf::loadView('certificate.download', compact('certificates', 'qrCodeBase64'))
            ->setPaper('letter', 'landscape');

        return $pdf->download("CertificadoGerscol_$id.pdf");
    }

    /**
     * Display a PDF of the certificate in the browser.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPDF($id)
    {
        setlocale(LC_TIME, 'spanish');
        $certificates = certificates::find($id);
        $qrCodeSvg = QrCode::format('svg')->size(120)->generate(route('certificate.show', $id));
        $qrCodeBase64 = base64_encode($qrCodeSvg);

        $pdf = Pdf::loadView('certificate.show', compact('certificates', 'qrCodeBase64'))
            ->setPaper('letter', 'landscape');

        return $pdf->stream("CertificadoGerscol_$id.pdf");
    }

    /**
     * Display the verification PDF of the certificate in the browser.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showverifyPDF($id)
    {
        setlocale(LC_TIME, 'spanish');
        $certificates = certificates::find($id);
        $qrCodeSvg = QrCode::format('svg')->size(120)->generate(route('certificate.show', $id));
        $qrCodeBase64 = base64_encode($qrCodeSvg);

        $pdf = Pdf::loadView('certificate.showverification', compact('certificates', 'qrCodeBase64'))
            ->setPaper('letter', 'portrait');

        return $pdf->stream("CertificadoGerscol_$id.pdf");
    }

    /**
     * Generate and download the verification PDF of the certificate.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadverifyPDF($id)
    {
        setlocale(LC_TIME, 'spanish');
        $certificates = certificates::find($id);
        $qrCodeSvg = QrCode::format('svg')->size(120)->generate(route('certificate.show', $id));
        $qrCodeBase64 = base64_encode($qrCodeSvg);

        $pdf = Pdf::loadView('certificate.downloadverification', compact('certificates', 'qrCodeBase64'))
            ->setPaper('letter', 'portrait');

        return $pdf->download("CertificadoGerscol_$id.pdf");
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
        $certificates->update([
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
     * @param  certificates  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificates $certificate)
    {
        $certificate->delete();

        return redirect()->route('certificate.index');
    }

    /**
     * Show the form for creating a new certificate.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = courses::all();
        $students = students::all();

        return view('certificate.create')->with(compact('students', 'courses'));
    }

    /**
     * Show the form for editing the specified certificate.
     *
     * @param  certificates  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(certificates $certificate)
    {
        $courses = courses::all();
        $students = students::all();

        return view('certificate.edit', [
            'certificate' => $certificate
        ]);
    }
}
