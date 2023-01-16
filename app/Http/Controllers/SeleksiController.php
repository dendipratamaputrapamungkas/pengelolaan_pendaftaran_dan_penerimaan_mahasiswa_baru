<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\lulusExport;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\EmailNotification;
use App\Mail\PemberitahuanEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\EmailPengingat;

class SeleksiController extends Controller
{
    public $pdf;
    public function index()
    {
        $calonMhs = Pendaftar::all();

        return view('seleksi.index', compact('calonMhs'))->render();
    }
    public function seleksi(Request $request)
    {
        $pendaftar = Pendaftar::get();
        foreach ($pendaftar as $item) {
            $id = $item->no_reg;
            $ujian = $item->nilai_ujian;
            $indonesia = $item->nilai_indonesia;
            $nilaiIndonesia = explode(",", $indonesia);
            $total_indonesia = array_sum($nilaiIndonesia);
            $inggris = $item->nilai_inggris;
            $nilaiinggris = explode(",", $inggris);
            $total_inggris = array_sum($nilaiinggris);
            $mtk = $item->nilai_mtk;
            $nilaimtk = explode(",", $mtk);
            $total_mtk = array_sum($nilaimtk);
            $total_nilai = [$total_mtk, $total_indonesia, $total_inggris, $ujian];
            $patokan = array_sum($total_nilai);
            if ($patokan >= 800) {
                $datasave = [
                    'lulus' => 1,
                ];
                DB::table('pendaftars')->where('no_reg', '=', $id)->update($datasave);
            } else {
                $datasave = [
                    'lulus' => 0,
                ];
                DB::table('pendaftars')->where('no_reg', '=', $id)->update($datasave);
            }
        }
        return redirect()->back();
        // $id = $request->id;
        // for($i = 0; $i<count($id); $i++){
        //     $datasave = [
        //         'total_nilai' => $request['nilai'][$i]
        //     ];
        //     DB::table('pendaftars')->where('no_reg', '=', $id[$i])->update($datasave);
        // }
        // $pendaftar = Pendaftar::get();
        // foreach ($pendaftar as $value)
        // {
        //     DB::table('pendaftars')->where('total_nilai', '>', '899')->update([
        //         'lulus' => 1
        //     ]);
        // }
        // return redirect()->back();
    }
    public function export()
    {
        return Excel::download(new lulusExport, 'pendaftar_yang_lulus.xlsx');
    }
    public function print_pdf()
    {
        $prints = Pendaftar::all();
        $pdf = PDF::loadView('dashboard.pdf', [
            'prints' => $prints
        ]);


        return $pdf->download('Hasil_Seleksi.pdf');
    }

    public function email()
    {
        $emails = Pendaftar::pluck('email_daftar');
        foreach($emails as $email){
            $details = [
                'title' => 'Pengumuman',
                'body' => 'Informasi Kelulusan Sudah Bisa Dicek Pada Link DI Bawah',
                'url' => route('cekLulus')
            ];
            Mail::to($email)->queue(new PemberitahuanEmail($details));
        }
        $notification = [
            'message' => 'Email Sukses Dikirim',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
    public function emailPengingat()
    {
        $emails = User::pluck('email');
        foreach($emails as $email){
            Mail::to($email)->queue(new EmailPengingat());
        }
        $notification = [
            'message' => 'Email Pengingat Berhasil Dikirim',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}