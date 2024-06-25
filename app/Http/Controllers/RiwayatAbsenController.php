<?php

namespace App\Http\Controllers;

use App\Models\RiwayatAbsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Dompdf\Dompdf;
use Dompdf\Options;

class RiwayatAbsenController extends Controller
{
    public function index()
    {
        $riwayatAbsens = RiwayatAbsen::all();
        return view('riwayat_absen.index', compact('riwayatAbsens'));
    }

    public function terima($id)
    {
        try {
            $riwayatAbsen = RiwayatAbsen::findOrFail($id);
            $riwayatAbsen->status = 'Diterima';
            $riwayatAbsen->save();

            return redirect()->back()->with('success', 'Absen telah diterima.');
        } catch (\Exception $e) {
            Log::error('Error accepting absence: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memproses permintaan.');
        }
    }

    public function tolak($id)
    {
        try {
            $riwayatAbsen = RiwayatAbsen::findOrFail($id);
            $riwayatAbsen->status = 'Ditolak';
            $riwayatAbsen->save();

            return redirect()->back()->with('success', 'Absen telah ditolak.');
        } catch (\Exception $e) {
            Log::error('Error rejecting absence: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memproses permintaan.');
        }
    }


    public function exportPdf()
    {
        // Ambil data riwayat absen
        $riwayatAbsens = RiwayatAbsen::all();

        // Setup Dompdf
        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isPhpEnabled', true);
        $pdfOptions->set('defaultFont', 'Arial');
        
        $dompdf = new Dompdf($pdfOptions);

        // Load view content into Dompdf
        $pdfView = view('riwayat_absen.pdf', compact('riwayatAbsens'))->render();
        $dompdf->loadHtml($pdfView);

        // Render PDF (optional: set paper size 'A4' or 'letter' etc.)
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (download)
        return $dompdf->stream('riwayat_absen.pdf');
    }
}

