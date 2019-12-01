<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class MenuAdmin extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function carisiswa(Request $r)
    {
        $data = DB::table('tbsiswa')->where('nis', $r->nis)->get();
        return view('dashboard', ['siswa' => $data]);
    }
    public function inputAbsen(Request $r)
    {
        DB::table('tbkehadiran')->insert(
            ['nis' => $r->nis, 'sakit' => $r->sakit, 'izin' => $r->izin, 'tanpa_keterangan' => $r->tanpa_keterangan]
        );
        return view('dashboard');
    }
    public function cariulangan(Request $r)
    {
        $data = DB::table('tbsiswa')->where('nis', $r->nis)->get();
        $data2 = DB::table('tbmapel')->get();

        return view('dashboard', ['siswa' => $data, 'mapel' => $data2]);
    }
    public function inputUlanganHarian(Request $r)
    {
        DB::table('tbulanganharian')->insert(
            ['nis' => $r->nis, 'kode_mapel' => $r->kode_mapel, 'tanggal_pelaksanaan' => $r->tanggal_pelaksanaan, 'materi_test' => $r->materi_test, 'nilai' => $r->nilai]
        );
        return view('dashboard');
    }
    public function inputTtsTas(Request $r)
    {
        if ($r->test == 'tts') {
            DB::table('tb_tts')->insert(
                ['nis' => $r->nis, 'kode_mapel' => $r->kode_mapel, 'tts' => $r->hasil_ujian]
            );
        }
        if ($r->test == 'tas') {
            DB::table('tb_tas')->insert(
                ['nis' => $r->nis, 'kode_mapel' => $r->kode_mapel, 'tas' => $r->hasil_ujian]
            );
        }
        return view('dashboard');
    }

    public function inputEkskul(Request $r)
    {

        DB::table('tbekskul')->insert(
            ['nis' => $r->nis, 'nama_kegiatan' => $r->nama_ekskul, 'nilai_ekskul' => $r->nilai_ekskul]
        );
        return view('dashboard');
    }

    public function inputKarakter(SymfonyRequest $r)
    {
        DB::table('tbkarakter')->insert(
            ['nis' => $r->nis, 'nilai_akhlak' => $r->akhlak, 'nilai_kepribadian' => $r->kepribadian]
        );
        return view('dashboard');
    }
}
