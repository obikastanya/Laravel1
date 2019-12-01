@extends('layout/template')
@section('title','Raport Online')
@section('css')
<link rel="stylesheet" href="{{asset('/assets/css/mycss/showraport.css')}}">
@endsection

@section('container')
<div class="container">
    <a class="btn btn-primary position-absolute tombol " href="/" role="button">Back to Home</a>
    <div class="row">


        <div class="col-sm-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-sm-4">
                        @foreach($siswa as $s)
                        <img src="data:image/jpg;base64,{{base64_encode($s->foto) }} " class="card-img" alt="img" />
                        @endforeach
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            @foreach($siswa as $s)
                            <table class="table table-borderless font-weight-bold">
                                <tr>
                                    <th scope="row" class="w-50">
                                        <h5 class="card-title">Profile Siswa </h5>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row">NIS </th>
                                    <td>{{$s->nis}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>{{$s->nama_siswa}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Lahir</th>
                                    <td>{{$s->tgl_lahir}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelas</th>
                                    <td>{{$s->kelas}}</td>
                                </tr>
                            </table>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <table class="table table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th class="align-middle" scope="col">No</th>
                        <th class="align-middle" scope="col">Mata Pelajaran</th>
                        <th class="align-middle" scope="col">KKM</th>
                        <th class="align-middle" scope="col">Rata Rata Ulangan</th>
                        <th class="align-middle" scope="col">TTS</th>
                        <th class="align-middle" scope="col">TAS</th>
                        <th class="align-middle" scope="col">Nilai Akhir</th>
                        <th class="align-middle" scope="col">Keterangan </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($mapel as $m)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$m->nama_mapel}}</td>
                        <td>{{$m->kkm}}</td>
                        <td>{{$ulangan[$loop->index]}}</td>
                        <td>{{$tts[$loop->index]}}</td>
                        <td>{{$tas[$loop->index]}}</td>




                        @if(($tts[$loop->index]+$tas[$loop->index]+($ulangan[$loop->index]*2))/4>=$m->kkm)
                        <td class="text-center font-weight-bolder" style="color:#00454A;">{{($tts[$loop->index]+$tas[$loop->index]+($ulangan[$loop->index]*2))/4}}</td>
                        <td class="text-center  font-weight-bolder" style="color:#00454A;">Lulus KKM</td>

                        @else
                        <td class="text-center  font-weight-bolder" style="color:#44000D;">{{($tts[$loop->index]+$tas[$loop->index]+($ulangan[$loop->index]*2))/4}}</td>
                        <td class="text-center font-weight-bolder" style="color:#44000D;">Tidak Lulus KKM </td>
                        @endif
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
    <div class="row ">
        <div class="col-sm-8 tbEkskul">
            <table class="table table-hover  ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ekskul as $s)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$s->nama_kegiatan}}</td>
                        <td>{{$s->nilai_ekskul}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row ">
        <div class="col-sm-8 tbEkskul">
            <table class="table table-hover text-center ">
                <thead class="">
                    <tr class="thead-dark">
                        <th colspan="4" scope="col">Ketidakhadiran</th>
                    </tr>
                    <tr>
                        <th scope="col">Sakit</th>
                        <th scope="col" colspan="2">Izin </th>
                        <th scope="col">Tanpa Keterangan</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($absen as $a)
                    <tr>
                        <td>{{$a->sakit}}</td>
                        <td colspan="2">{{$a->izin}}</td>
                        <td>{{$a->tanpa_keterangan}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection