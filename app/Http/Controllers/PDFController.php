<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Users;
use App\Models\Gadar;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // $data = ['title' => 'Welcome to Laravel PDF generation'];

        $gadar = Gadar::all();
        // Set the paper size to A4 and orientation to landscape
        // $pdf = PDF::loadView('pages.gadar.my_pdf', $data)->setPaper('a4', 'portrait');
        // return $pdf->stream('document.pdf');

        $pdf = PDF::loadView('pages.gadar.my_pdf', ['gadar' => $gadar])->setPaper('legal', 'landscape');
    return $pdf->stream('gadar.pdf');
    }
}
