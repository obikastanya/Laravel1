<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function carisiswa(Request $r)
    {
        $data = DB::table('tbsiswa')->where('nis', $r->nis)->get();
        return view('home', ['siswa' => $data]);
    }
    public function inputAbsen(Request $r)
    {
        DB::table('tbkehadiran')->insert(
            ['nis' => $r->nis, 'sakit' => $r->sakit, 'izin' => $r->izin, 'tanpa_keterangan' => $r->tanpa_keterangan]
        );
        return view('home');
    }
    public function cariulangan(Request $r)
    {
        $data = DB::table('tbsiswa')->where('nis', $r->nis)->get();
        $data2 = DB::table('tbmapel')->get();

        return view('home', ['siswa' => $data, 'mapel' => $data2]);
    }
    public function inputUlanganHarian(Request $r)
    {
        DB::table('tbulanganharian')->insert(
            ['nis' => $r->nis, 'kode_mapel' => $r->kode_mapel, 'tanggal_pelaksanaan' => $r->tanggal_pelaksanaan, 'materi_test' => $r->materi_test, 'nilai' => $r->nilai]
        );
        return view('home');
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
        return view('home');
    }

    public function inputEkskul(Request $r)
    {

        DB::table('tbekskul')->insert(
            ['nis' => $r->nis, 'nama_kegiatan' => $r->nama_ekskul, 'nilai_ekskul' => $r->nilai_ekskul]
        );
        return view('home');
    }

    public function inputKarakter(SymfonyRequest $r)
    {
        DB::table('tbkarakter')->insert(
            ['nis' => $r->nis, 'nilai_akhlak' => $r->akhlak, 'nilai_kepribadian' => $r->kepribadian]
        );
        return view('home');
    }
    public function update()
    {
        $mapel = DB::table('tbmapel')->get();
        $tts = DB::table('tb_tts')->where('nis', '000001')->get();
        $tas = DB::table('tb_tas')->where('nis', '000001')->get();
        $ulanganharian = DB::table('tbulanganharian')->where('nis', '000001')->orderBy('kode_mapel', 'asc')->get();
        $ekskul = DB::table('tbekskul')->where('nis', '000001')->get();
        $siswa = DB::table('tbsiswa')->where('nis', '000002')->get();
        $absen = DB::table('tbkehadiran')->where('nis', '000001')->get();
        $karakter = DB::table('tbkarakter')->where('nis', '000001')->get();
        return view('update', ['mapel' => $mapel, 'tts' => $tts, 'tas' => $tas, 'ulangan' => $ulanganharian, 'ekskul' => $ekskul, 'siswa' => $siswa, 'absen' => $absen, 'karakter' => $karakter]);
    }
    public function updateUlanganHarian(Request $r)
    {

        DB::table('tbulanganharian')
            ->where('id', $r->mapelId)
            ->update(['tanggal_pelaksanaan' => $r->tgl, 'materi_test' => $r->materi, 'nilai' => $r->nilaiulhar]);
        return redirect('update');
    }
    public function deleteUlanganHarian(Request $r)
    {
        DB::table('tbulanganharian')
            ->where('id', $r->id)->delete();
        return redirect('update');
    }

    public function updatetts(Request $r)
    {
        DB::table('tb_tts')
            ->where('id', $r->idtts)
            ->update(['tts' => $r->nilaitts]);
        return redirect('update');
    }
    public function updatetas(Request $r)
    {
        DB::table('tb_tas')
            ->where('id', $r->idtas)
            ->update(['tas' => $r->nilaitas]);
        return redirect('update');
    }
    public function deletetas(Request $r)
    {
        DB::table('tb_tas')
            ->where('id', $r->id)->delete();
        return redirect('update');
    }
    public function deletetts(Request $r)
    {
        DB::table('tb_tts')
            ->where('id', $r->id)->delete();
        return redirect('update');
    }
    public function updateabsensi(Request $r)
    {
        DB::table('tbkehadiran')
            ->where('nis', $r->nis)
            ->update(['sakit' => $r->sakit, 'izin' => $r->izin, 'tanpa_keterangan' => $r->ket]);
        return redirect('update');
    }
    public function deleteabsensi(Request $r)
    {
        DB::table('tbkehadiran')
            ->where('nis', $r->id)
            ->delete();
        return redirect('update');
    }
    public function updateekskul(Request $r)
    {
        DB::table('tbekskul')
            ->where('id', $r->id_ekskul)
            ->update(['nama_kegiatan' => $r->nama_kegiatan, 'nilai_ekskul' => $r->nilai_ekskul]);
        return redirect('update');
    }
    public function deleteekskul(Request $r)
    {
        DB::table('tbekskul')
            ->where('id', $r->id)
            ->delete();
        return redirect('update');
    }
    public function updatekarakter(Request $r)
    {
        DB::table('tbkarakter')
            ->where('id', $r->idakhlak)
            ->update(['nilai_akhlak' => $r->akhlak, 'nilai_kepribadian' => $r->kepribadian]);
        return redirect('update');
    }
    public function deletekarakter(Request $r)
    {
        DB::table('tbkarakter')
            ->where('id', $r->id)
            ->delete();
        return redirect('update');
    }
}
