<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDF;

class Certificate extends Model
{
    use HasFactory;

    const FORMAT_PAPER = 'a5';
    const PAGE_ORIENTATION = 'landscape';

    protected array $fillable = [
        'name',
        'date',
        'number',
        'course',
    ];
    public static  function generatePDF($certificate)
    {
        $pdf = PDF::loadView('certificates.generate', ['certificate' => $certificate])->setPaper(Certificate::FORMAT_PAPER, Certificate::PAGE_ORIENTATION);
       return $pdf->download('Certificate.pdf');
    }
}
