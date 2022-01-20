<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use PDF;

class CertificateController extends Controller
{
    public function create()
    {
        return view('certificates.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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
        $certificate = Certificate::latest()->first();
        Certificate::generatePDF($certificate);
        return redirect('all');

    }

    /**
     *
     */
//    public function generatePDF()
//    {
//        $certificate = Certificate::latest()->first();
//        $pdf = PDF::loadView('certificates.generate', ['certificate' => $certificate])->setPaper(Certificate::FORMAT_PAPER, Certificate::PAGE_ORIENTATION);
//        return $pdf->download('Certificate.pdf');
//    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAll()
    {
        $certificates = Certificate::orderBy('id', 'desc')->paginate(10);
        return view('certificates.table', compact('certificates'));

    }

    /**
     * @param $id
     * @return mixed
     */
    public function download($id)
    {
        $certificate = Certificate::find($id);
        $pdf = PDF::loadView('certificates.generate', ['certificate' => $certificate])->setPaper(Certificate::FORMAT_PAPER, Certificate::PAGE_ORIENTATION);
        return $pdf->download('Certificate.pdf');

    }
}
