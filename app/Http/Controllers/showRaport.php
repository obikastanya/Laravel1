<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class showRaport extends Controller
{
    public function showraport(Request $r)
    {

        $data = DB::table('tbmapel')->orderBy('kode_mapel', 'asc')->get();
        $data1 = DB::table('tb_tts')->where('nis', $r->nis and 'tgl_lahir', $r->tgl_lahir)->orderBy('kode_mapel', 'asc')->get();
        $data2 = DB::table('tb_tas')->where('nis', $r->nis and 'tgl_lahir', $r->tgl_lahir)->orderBy('kode_mapel', 'asc')->get();
        $data3 = DB::table('tbulanganharian')->where('nis', $r->nis and 'tgl_lahir', $r->tgl_lahir)->get();
        $data4 = DB::table('tbekskul')->where('nis', $r->nis and 'tgl_lahir', $r->tgl_lahir)->get();
        $data5 = DB::table('tbsiswa')->where('nis', $r->nis and 'tgl_lahir', $r->tgl_lahir)->get();
        $data6 = DB::table('tbkehadiran')->where('nis', $r->nis and 'tgl_lahir', $r->tgl_lahir)->get();
        $tts = [];
        $tas = [];
        $ulanganharian = [];
        $ulangan = 0;
        $nol = [0];
        $count = 0;
        $boo = 0;
        $boo1 = 0;
        for ($i = 1; $i < 10; $i++) {
            foreach ($data3 as $d) {
                if ($d->kode_mapel == $i) {
                    $ulangan = $ulangan + $d->nilai;
                    $count++;
                }
            }
            $ulangan = $ulangan / $count;
            $ulanganharian = array_merge($ulanganharian, [$ulangan]);
            $ulangan = 0;
            $count = 0;
        }
        foreach ($data as $databaru) {
            foreach ($data1 as $d) {
                if ($d->kode_mapel == $databaru->kode_mapel) {
                    $tts = array_merge($tts, [$d->tts]);
                    $boo = 1;
                }
            }
            if ($boo == 0) {
                $tts = array_merge($tts, $nol);
            }
        }
        foreach ($data as $databaru) {
            foreach ($data2 as $d) {
                if ($d->kode_mapel ==  $databaru->kode_mapel) {
                    $tas = array_merge($tas, [$d->tas]);
                    $boo1 = 1;
                }
            }
            if ($boo1 == 0) {
                $tas = array_merge($tas, $nol);
            }
        }
        return view('showRaport', ['mapel' => $data, 'tts' => $tts, 'tas' => $tas, 'ulangan' => $ulanganharian, 'ekskul' => $data4, 'siswa' => $data5, 'absen' => $data6]);
    }
    public function showraportadmin(Request $r)
    {

        $data = DB::table('tbmapel')->orderBy('kode_mapel', 'asc')->get();
        $data1 = DB::table('tb_tts')->where('nis', $r->nis)->orderBy('kode_mapel', 'asc')->get();
        $data2 = DB::table('tb_tas')->where('nis', $r->nis)->orderBy('kode_mapel', 'asc')->get();
        $data3 = DB::table('tbulanganharian')->where('nis', $r->nis)->get();
        $data4 = DB::table('tbekskul')->where('nis', $r->nis)->get();
        $data5 = DB::table('tbsiswa')->where('nis', $r->nis)->get();
        $data6 = DB::table('tbkehadiran')->where('nis', $r->nis)->get();
        $tts = [];
        $tas = [];
        $ulanganharian = [];
        $ulangan = 0;
        $nol = [0];
        $count = 0;
        $boo = 0;
        $boo1 = 0;
        for ($i = 1; $i < 10; $i++) {
            foreach ($data3 as $d) {
                if ($d->kode_mapel == $i) {
                    $ulangan = $ulangan + $d->nilai;
                    $count++;
                }
            }
            $ulangan = $ulangan / $count;
            $ulanganharian = array_merge($ulanganharian, [$ulangan]);
            $ulangan = 0;
            $count = 0;
        }
        foreach ($data as $databaru) {
            foreach ($data1 as $d) {
                if ($d->kode_mapel == $databaru->kode_mapel) {
                    $tts = array_merge($tts, [$d->tts]);
                    $boo = 1;
                }
            }
            if ($boo == 0) {
                $tts = array_merge($tts, $nol);
            }
        }
        foreach ($data as $databaru) {
            foreach ($data2 as $d) {
                if ($d->kode_mapel ==  $databaru->kode_mapel) {
                    $tas = array_merge($tas, [$d->tas]);
                    $boo1 = 1;
                }
            }
            if ($boo1 == 0) {
                $tas = array_merge($tas, $nol);
            }
        }
        return view('showRaport', ['mapel' => $data, 'tts' => $tts, 'tas' => $tas, 'ulangan' => $ulanganharian, 'ekskul' => $data4, 'siswa' => $data5, 'absen' => $data6]);
    }
}
