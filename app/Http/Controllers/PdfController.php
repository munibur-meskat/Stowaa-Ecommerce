<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller {

    public function generate_pdf() {

    $pdf = Pdf::loadView('invoice.order-invoice', compact(''));
    return $pdf->stream('order-invoice.pdf');

    }

    public function download_pdf()
    {
        //
    }
    
}
