<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = ['title' => 'Welcome to sabaytraining.com'];
        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('sabaytraining.pdf');
    }
}
