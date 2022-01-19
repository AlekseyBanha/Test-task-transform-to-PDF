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

    /**
     * @param Request $request
     * @return string
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:30',
                'number' => 'required|integer|digits_between:1,6|unique:certificates',
                'course' => 'required|min:3|max:30',
                'date' => 'required|min:5|max:20',
            ]);
        $data = $request->all();
        Certificate::create($data);
        $this->generatePDF();
        return redirect('all');

    }

    public function generatePDF()
    {
        $info = Certificate::latest()->first();
        $pdf = PDF::loadView('generate', ['data' => $info])->setPaper(Certificate::FORMAT_PAPER, Certificate::CHANGE_ME);
         $pdf->download('Certificate.pdf');
    }

    public function showAll()
    {
        $certificates = Certificate::orderBy('id', 'desc')->paginate(10);
        return view('table', compact('certificates'));

    }

    public function download($id)
    {
        $certificate = Certificate::find($id);
        $pdf = PDF::loadView('generate', ['data' => $certificate])->setPaper(Certificate::FORMAT_PAPER, Certificate::CHANGE_ME);
        return $pdf->download('Certificate.pdf');

    }
}
