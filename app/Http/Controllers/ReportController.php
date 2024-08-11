<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\karyawan;
use App\Models\pinjaman;
use App\Models\simpanan;
use App\Models\transaksi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function anggota()
    {
        $anggota = anggota::all();
        $pdf = Pdf::loadview('anggota.anggota-report', compact('anggota'));
        return $pdf->download('laporan-anggota-koperasi.pdf');
    }
    public function karyawan()
    {
        $karyawan = User::all();
        $pdf = Pdf::loadview('karyawan.karyawan-report', compact('karyawan'));
        return $pdf->download('laporan-karyawan-koperasi.pdf');
    }
    public function pinjaman()
    {
        $pinjaman = pinjaman::all();
        $pdf = Pdf::loadview('pinjaman.pinjaman-report', compact('pinjaman'));
        return $pdf->download('laporan-pinjaman-koperasi.pdf');
    }
    public function simpanan(Request $request)
    {
        $carinama = session('carinama');
        $carijenis = session('carijenis');
        $total = session('total');
        $filteredSimpanan = session('filteredSimpanan');

        $pdf = Pdf::loadview('simpanan.simpanan-report', compact('carinama', 'carijenis', 'total', 'filteredSimpanan'));
        return $pdf->download('laporan-simpanan-koperasi.pdf');
    }
    public function transaksi()
    {
        $transaksi = transaksi::all();
        $pdf = Pdf::loadview('transaksi.transaksi-report', compact('transaksi'));
        return $pdf->download('laporan-transaksi-koperasi.pdf');
    }
}
