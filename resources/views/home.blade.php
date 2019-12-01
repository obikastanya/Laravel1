@extends('layout/template')
@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/mycss/dashboard.css')}}">
@endsection
@section('container')
<!-- navigasi atas -->

<!-- navigasi samping -->
<div class="container2">
    <div class="row rowutama">

        <div class="col-sm-2 leftCol">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="profile"><img src="{{asset('assets/img/guru/teacher.png')}}" srcset="">
                    <a href="#" class="name_profile"> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a>
                </div>
                <a class="nav-link nav-pills opsian" id="lihatdata" data-target="#exampleModal" data-toggle="modal" href="/showraport">Lihat Data</a>
                </button>
                <br>
                <a class="nav-link nav-pills opsian" id="update_delete_data" href="/update">Ubah Data</a>
                <br>
                <a class="nav-link nav-pills opsian" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Absensi</a>
                <a class="nav-link nav-pills opsian" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Penilaian Siswa</a>
                <a class="nav-link nav-pills opsian" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Pengembangan Diri dan Kepribadian</a>
                <a class="nav-link nav-pills ml-0 opsian" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <div class="col-sm-10">

            <div class="row">
                <div class="col-sm-6 offset-sm-1 partInput">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <form method="POST" action="/cari">
                                {{csrf_field()}}

                                <div class="form-group">
                                    @if(isset($_POST['Carisiswa']))
                                    @foreach($siswa as $s)
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="{{$s->nis}}" placeholder="">
                                    @endforeach
                                    @else
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="" placeholder="">
                                    @endif
                                </div>

                                <button type="submit" name="Carisiswa" class="btn btn-primary">Cari</button>
                            </form>


                            <!--isi form dengan data dari pencarian nim  -->
                            @if(isset($_POST['Carisiswa']))
                            @foreach($siswa as $s)

                            <form method="POST" action="/input">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" name="nis" value="{{$s->nis}}">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{$s->nama_siswa}}">

                                    <label for="kelas">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" value="{{$s->kelas}}">
                                    <label for="sakit">Sakit</label>
                                    <input type="number" class="form-control" name="sakit" id="sakit">
                                    <label for="izin">Izin</label>
                                    <input type="number" class="form-control" name="izin" id="izin">
                                    <label for="Tanpa_Keterangan">Tanpa Keterangan</label>
                                    <input type="number" class="form-control" name="tanpa_keterangan" id="Tanpa_Keterangan">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                            @endforeach
                            @endif
                        </div>



                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <!-- bagian input nilai ulangan -->
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#ulangan_harian" role="tab" aria-controls="pills-profile" aria-selected="false">Ulangan Harian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#tts_tas" role="tab" aria-controls="pills-home" aria-selected="true">Test Tengah/Akhir Semester</a>
                                </li>
                            </ul>
                            <!-- ini bagian untuk mengisi nilai ulangan , tts dan tas -->
                            <div class="tab-content" id="pills-tabContent">
                                <!-- ulangan harian -->
                                <!--  cari siswa -->
                                <div class="tab-pane fade " id="tts_tas" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <form method="POST" action="/cariulangan">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            @if(isset($_POST['Carisiswa0']))
                                            @foreach($siswa as $s)
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="{{$s->nis}}" placeholder="">
                                            @endforeach
                                            @else
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="" placeholder="">
                                            @endif
                                        </div>

                                        <button type="submit" name="Carisiswa0" class="btn btn-primary">Cari</button>
                                    </form>
                                    <!--isi form dengan data dari pencarian nim  -->
                                    @if(isset($_POST['Carisiswa0']))
                                    @foreach($siswa as $s)
                                    <form method="POST" action="/inputTtsTas">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="1">
                                            <input type="hidden" name="nis" value="{{$s->nis}}">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{$s->nama_siswa}}" id="nama">
                                            <label for="kelas">Kelas</label>
                                            <input type="text" class="form-control" name="kelas" value="{{$s->kelas}}" id="kelas">
                                            @endforeach
                                            <label for="mapel">Mata Pelajaran</label>
                                            <select name="kode_mapel" class="custom-select" id="mapel">
                                                @foreach($mapel as $m)
                                                <option value={{$m->kode_mapel}}>{{$m->nama_mapel}}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="test" id="gridRadios1" value="tts">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Test Tengah Semester
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="test" id="gridRadios2" value="tas">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Test Akhir Semester
                                                </label>
                                            </div>
                                            <label for="hasil_ujian">Hasil Ujian</label>
                                            <input type="number" name="hasil_ujian" class="form-control" id="hasil_ujian">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    @endif

                                </div>
                                <!-- ulangan harian -->
                                <div class="tab-pane fade show active" id="ulangan_harian" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <form method="POST" action="/cariulangan">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            @if(isset($_POST['Carisiswa1']))
                                            @foreach($siswa as $s)
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="{{$s->nis}}" placeholder="">
                                            @endforeach
                                            @else
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="" placeholder="">
                                            @endif
                                        </div>
                                        <button type="submit" name="Carisiswa1" class="btn btn-primary">Cari</button>
                                    </form>


                                    <!--isi form dengan data dari pencarian nim  -->
                                    @if(isset($_POST['Carisiswa1']))
                                    @foreach($siswa as $s)
                                    <form method="POST" action="inputUlanganHarian">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="1">
                                            <input type="hidden" name="nis" value="{{$s->nis}}">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{$s->nama_siswa}}" id="nama">
                                            <label for="kelas">Kelas</label>
                                            <input type="text" class="form-control" name="kelas" value="{{$s->kelas}}" id="kelas">
                                            @endforeach
                                            <label for="mapel">Mata Pelajaran</label>
                                            <select name="kode_mapel" class="custom-select" id="mapel">
                                                @foreach($mapel as $m)
                                                <option value={{$m->kode_mapel}}>{{$m->nama_mapel}}</option>
                                                @endforeach
                                            </select>
                                            <label for="tgl">Tanggal Ulangan</label>
                                            <input type="date" name="tanggal_pelaksanaan" class="form-control" id="tgl">
                                            <label for="materi">Materi yang diujikan</label>
                                            <input type="text" name="materi_test" class="form-control" id="materi">
                                            <label for="nilai">Hasil Ujian</label>
                                            <input type="number" name="nilai" class="form-control" id="nilai">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    @endif
                                </div>
                                <!-- pengembangan siswa -->

                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#ekskul" role="tab" aria-controls="pills-home" aria-selected="true">Kegiatan Ekskul</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#karakter" role="tab" aria-controls="pills-profile" aria-selected="false">Penilaian Kepribadian</a>
                                </li>
                            </ul>
                            <!-- ini bagian untuk mengisi nilai ulangan , tts dan tas -->
                            <div class="tab-content" id="pills-tabContent">
                                <!--  cari siswa -->
                                <div class="tab-pane fade show active" id="ekskul" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <form method="POST" action="/cariulangan">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            @if(isset($_POST['Carisiswa2']))
                                            @foreach($siswa as $s)
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="{{$s->nis}}" placeholder="">
                                            @endforeach
                                            @else
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="" placeholder="">
                                            @endif
                                        </div>

                                        <button type="submit" name="Carisiswa2" class="btn btn-primary">Cari</button>
                                    </form>
                                    <!--isi form dengan data dari pencarian nim  -->
                                    @if(isset($_POST['Carisiswa2']))
                                    @foreach($siswa as $s)
                                    <form method="POST" action="/inputEkskul">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="1">
                                            <input type="hidden" name="nis" value="{{$s->nis}}">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{$s->nama_siswa}}" id="nama">
                                            <label for="kelas">Kelas</label>
                                            <input type="text" class="form-control" name="kelas" value="{{$s->kelas}}" id="kelas">
                                            @endforeach
                                            <label for="nama_ekskul">Nama Kegiatan</label>
                                            <input type="text" class="form-control" name="nama_ekskul" id="nama_ekskul">
                                            <label for="nilai_ekskul">nilai</label>
                                            <input type="number" class="form-control" name="nilai_ekskul" id="nilai_ekskul">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    @endif
                                </div>
                                <!-- tts -->
                                <div class="tab-pane fade" id="karakter" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <form method="POST" action="/cariulangan">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            @if(isset($_POST['Carisiswa3']))
                                            @foreach($siswa as $s)
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="{{$s->nis}}" placeholder="">
                                            @endforeach
                                            @else
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="nis" value="" placeholder="">
                                            @endif
                                        </div>

                                        <button type="submit" name="Carisiswa3" class="btn btn-primary">Cari</button>
                                    </form>
                                    <!--isi form dengan data dari pencarian nim  -->
                                    @if(isset($_POST['Carisiswa3']))
                                    @foreach($siswa as $s)
                                    <form method="POST" action="/inputKarakter">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="hidden" name="id">
                                            <input type="hidden" name="nis" value="{{$s->nis}}">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="{{$s->nama_siswa}}" id="nama">
                                            <label for="kelas">Kelas</label>
                                            <input type="text" class="form-control" name="kelas" value="{{$s->kelas}}" id="kelas">
                                            @endforeach
                                            <label for="akhlak">Predikat Akhlak</label>
                                            <input type="number" class="form-control" name="akhlak" id="akhlak">
                                            <label for="kepribadian">Hasil Predikat Kepribadian</label>
                                            <input type="number" name="kepribadian" class="form-control" id="kepribadian">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- @if(isset($_POST['carisiswa'])) -->
                <!-- <div class="col-sm-4 foto">
                    <img src="{{asset('assets/img/guru/masYere.jpg')}}" srcset="">
                    <p>Yeremia</p>
                </div> -->
                <!-- @endif -->


            </div>
        </div>

        <!-- end of this suffering, kill me please -->
    </div>
    <!-- modal lihat raport -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cari Raport Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/showraportadmin" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nis" placeholder="Masukkan Nis Siswa!">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Lihat Raport Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>