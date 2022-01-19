<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use PDF;

class CertificateController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function preview(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:30',
                'number' => 'required|integer|unique:certificates',
                'course' => 'required|min:3|max:30',
                'date' => 'required|min:5|max:20',
            ]);
        $data = $request->all();
        Certificate::create($data);
        return view('preview', compact('data'));
    }

    public function generatePDF()
    {
        $info = Certificate::latest()->first();
        $pdf = PDF::loadView('generate', ['data' => $info])->setPaper('a5', 'landscape');
        return $pdf->download('Certificate.pdf');
    }

    public function showAll()
    {
        $certificates = Certificate::paginate(10);
        return view('table', compact('certificates'));

    }

    public function download($id)
    {
        $certificate = Certificate::find($id);
        $pdf = PDF::loadView('generate', ['data' => $certificate])->setPaper('a5', 'landscape');
        return $pdf->download('Certificate.pdf');

    }
}
