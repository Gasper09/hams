<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use DB;
use App\allocations;
use App\Room;
use App\Bed;
use App\Year;
use App\Student;
use App\StudentRequest;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // $data = ['title' => 'coding driver test title'];
        // $pdf = PDF::loadView('generate_pdf', $data);
  
        // return $pdf->download('codingdriver.pdf');

        $allocations = allocations::all();
        $studentRequest = StudentRequest::all();
        $rooms = Room::all();
        $beds = Bed::all();
        $room = Room::with('allocation')->get();

        $pdf = PDF::loadView('generate_pdf', [
            'allocations' => $allocations,
            'rooms' => $rooms,
            'beds' => $beds
        ]);

        $pdf->setOptions(['dpi' => 250, 'defaultFont' => 'sans-serif', 
       'isPhpEnabled' => true, 'isHtml5ParserEnabled' => true]);

        $pdf->setPaper('a4','potrait');

        // Output the generated PDF to Browser
       return $pdf->stream();
    }
}
