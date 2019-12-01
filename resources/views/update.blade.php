@extends('layout/template')
@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/mycss/update.css')}}">
@endsection
@section('container')
<div class="container2 ">
    <div class="row row-utama">
        <div class="col-sm-3  leftCol">
            <a class="nav-link nav-pills btn-primary active nav flex-column tombol" id="lihatdata" href="/home">Back To Home</a>

            <div class="card" style="width: 18rem;">
                @foreach($siswa as $s)
                <img src="data:image/jpg;base64,{{base64_encode($s->foto) }} " class="card-img" alt="img" />
                @endforeach
                <div class="card-body">
                    <div class="card-body">
                        @foreach($siswa as $s)
                        <table class="table table-borderless font-weight-bold">
                            <tr>
                                <th scope="row">NIS </th>
                                <td>{{$s->nis}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{$s->nama_siswa}}</td>
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
        <div class="col-sm-9 form-update">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="ulangan-harian" data-toggle="tab" href="#ulhar" role="tab" aria-controls="ulhar" aria-selected="true">Ulangan Harian</a>
                    <a class="nav-item nav-link" id="TTS" data-toggle="tab" href="#tts1" role="tab" aria-controls="tts1" aria-selected="false">Test Tengah Semester</a>
                    <a class="nav-item nav-link" id="TAS" data-toggle="tab" href="#tas1" role="tab" aria-controls="tas1" aria-selected="false">Test Akhir Semester</a>
                    <a class="nav-item nav-link" id="absen" data-toggle="tab" href="#absen1" role="tab" aria-controls="absen1" aria-selected="false">Absen</a>
                    <a class="nav-item nav-link" id="karakter" data-toggle="tab" href="#karakter1" role="tab" aria-controls="karakter1" aria-selected="false">Penilaian Non Akademis</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="ulhar" role="tabpanel" aria-labelledby="ulangan-harian">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr class="ukuran">
                                <th scope="col">NO</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Tanggal Pelaksanaan</th>
                                <th scope="col" class="materi">Materi Test</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($ulangan as $u)
                            @foreach($mapel as $m)
                            @if($u->kode_mapel==$m->kode_mapel)
                            <tr class="ukuran">
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$m->nama_mapel}}</td>
                                <td>{{$u->tanggal_pelaksanaan}}</td>
                                <td class="materi">{{$u->materi_test}}</td>
                                <td>{{$u->nilai}}</td>
                                <td id="opsi">
                                    <button type="button" class="btn kirimmapel btn-primary" data-toggle="modal" data-target="#update-ulhar" data-mapel="{{$m->nama_mapel}}" data-id="{{$u->id}}" data-tgl="{{$u->tanggal_pelaksanaan}}" data-nilai="{{$u->nilai}}" data-materi="{{$u->materi_test}}">
                                        Edit
                                    </button>
                                    <form action="/deleteulhar" method="post">
                                        @csrf
                                        <button type="submit" name="id" value="{{$u->id}}" class="btn btn-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="tts1" role="tabpanel" aria-labelledby="TTS">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tts as $t)
                            @foreach($mapel as $m)
                            @if($t->kode_mapel==$m->kode_mapel)
                            <tr class="ukuran">
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$m->nama_mapel}}</td>
                                <td>{{$t->tts}}</td>
                                <td id="opsi">
                                    <button type="button" class="btn kirimtts btn-primary" data-toggle="modal" data-target="#update-tts" data-mapeltts="{{$m->nama_mapel}}" data-nilaitts="{{$t->tts}}" data-idtts="{{$t->id}}">
                                        Edit
                                    </button>
                                    <form action="/deletetts" method="post">
                                        @csrf
                                        <button type="submit" name="id" value="{{$t->id}}" class="btn btn-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="tas1" role="tabpanel" aria-labelledby="TAS">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tas as $t)
                            @foreach($mapel as $m)
                            @if($t->kode_mapel==$m->kode_mapel)
                            <tr class="ukuran">
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$m->nama_mapel}}</td>
                                <td>{{$t->tas}}</td>
                                <td id="opsi">
                                    <button type="button" class="btn kirimtas btn-primary" data-toggle="modal" data-target="#update-tas" data-mapeltas="{{$m->nama_mapel}}" data-nilaitas="{{$t->tas}}" data-idtas="{{$t->id}}">
                                        Edit
                                    </button>
                                    <form action="/deletetas" method="post">
                                        @csrf
                                        <button type="submit" name="id" value="{{$t->id}}" class="btn btn-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="absen1" role="tabpanel" aria-labelledby="absen">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr class="ukuran">
                                <th scope="col">NO</th>
                                <th scope="col">Sakit</th>
                                <th scope="col">Izin</th>
                                <th scope="col">Tanpa Keterangan</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead class="thead-dark">
                        <tbody>
                            @foreach($absen as $a)
                            <tr class="ukuran">
                                <th scope="row">1</th>
                                <td>{{$a->sakit}}</td>
                                <td>{{$a->izin}}</td>
                                <td>{{$a->tanpa_keterangan}}</td>
                                <td><button type="button" class="btn btn-primary kirimabsen" data-toggle="modal" data-target="#update-absensi" data-idabsen="{{$a->nis}}" data-sakit="{{$a->sakit}}" data-izin="{{$a->izin}}" data-ket="{{$a->tanpa_keterangan}}">
                                        Edit
                                    </button>
                                    <form action="/deleteabsensi" method="post">
                                        @csrf
                                        <button type="submit" name="id" value="{{$a->nis}}" class="btn btn-primary">Delete</button>
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="karakter1" role="tabpanel" aria-labelledby="karakter">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th colspan="5" scope="col">Kegiatan Ektra Kurikuler</th>
                            <tr>
                            <tr class="ukuran">
                                <th scope="col">NO</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ekskul as $e)
                            <tr class="ukuran">
                                <th scope="row">{{$loop->index}}</th>
                                <td>{{$e->nama_kegiatan}}</td>
                                <td>{{$e->nilai_ekskul}}</td>
                                <td><button type="button" class="btn kirimekskul btn-primary" data-toggle="modal" data-target="#update-ekskul" data-idekskul="{{$e->id}}" data-namakegiatan="{{$e->nama_kegiatan}}" data-nilaiekskul="{{$e->nilai_ekskul}}">
                                        Edit
                                    </button>
                                    <form action="/deleteekskul" method="post">
                                        @csrf
                                        <button type="submit" name="id" value="{{$e->id}}" class="btn btn-primary">Delete</button>
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- tabel penilaian akhlak -->
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th colspan="5" scope="col">Panilaian Karakter</th>
                            <tr>
                            <tr class="ukuran">
                                <th scope="col">NO</th>
                                <th scope="col">Nilai Akhlak</th>
                                <th scope="col">Nilai Kepribadian</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karakter as $k)
                            <tr class="ukuran">
                                <th scope="row">{{$loop->index}}</th>
                                <td>{{$k->nilai_akhlak}}</td>
                                <td>{{$k->nilai_kepribadian}}</td>
                                <td><button type="button" class="btn kirimkarakter btn-primary" data-toggle="modal" data-idakhlak="{{$k->id}}" data-akhlak="{{$k->nilai_akhlak}}" data-kepribadian="{{$k->nilai_kepribadian}}" data-target="#update-karakter">
                                        Edit
                                    </button>
                                    <form action="/deletekarakter" method="post">
                                        @csrf
                                        <button type="submit" name="id" value="{{$k->id}}" class="btn btn-primary">Delete</button>
                                    </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
<!-- modal ulangan harian -->
<div class="modal fade" id="update-ulhar" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Update Ulangan Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/updateulhar">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mapel">Id Mapel</label>
                        <input type="text" class="form-control" name="mapelId" id="mapelId" value="" readonly />
                    </div>
                    <div class="form-group">
                        <label for="mapelname">Mata Pelajaran</label>
                        <input type="text" class="form-control" name="mapelname" id="mapelname" value="" />
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal pelaksanaan</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" value="">
                    </div>
                    <div class="form-group">
                        <label for="materi">Materi Test</label>
                        <textarea class="form-control" id="materi" name="materi" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nilaiulhar">Nilai</label>
                        <input type="number" class="form-control" id="nilaiulhar" name="nilaiulhar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal tts -->
<div class="modal fade" id="update-tts" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Update Test Tengah Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/updatetts">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="idtts">Id Hasil TTS</label>
                        <input type="number" class="form-control" name="idtts" id="idtts" readonly>
                    </div>
                    <div class="form-group">
                        <label for="mapeltts">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="mapeltts" name="mapeltts">
                    </div>
                    <div class="form-group">
                        <label for="nilaitts">Nilai</label>
                        <input type="number" class="form-control" id="nilaitts" name="nilaitts">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal tas -->
<div class="modal fade" id="update-tas" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Update Test Akhir Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/updatetas">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="idtas">Id Hasil TAS</label>
                        <input type="number" class="form-control" name="idtas" id="idtas" readonly>
                    </div>
                    <div class="form-group">
                        <label for="mapeltas">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="mapeltas" name="mapeltas">
                    </div>
                    <div class="form-group">
                        <label for="nilaitas">Nilai</label>
                        <input type="number" class="form-control" id="nilaitas" name="nilaitas">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal absensi -->
<div class="modal fade" id="update-absensi" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Update Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/updateabsensi" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nis">Nis</label>
                        <input type="text" class="form-control" name="nis" id="nis">
                    </div>
                    <div class="form-group">
                        <label for="sakit">Sakit</label>
                        <input type="number" class="form-control" name="sakit" id="sakit">
                    </div>
                    <div class="form-group">
                        <label for="izin">Izin</label>
                        <input type="number" class="form-control" name="izin" id="izin" value="">
                    </div>
                    <div class="form-group">
                        <label for="ket">Tanpa Keterangan</label>
                        <input type="number" class="form-control" name="ket" id="ket" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal ekskul -->
<div class="modal fade" id="update-ekskul" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Update Penilaian Ektra Kurikuler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/updateekskul" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_ekskul">ID ekskul</label>
                        <input type="number" name="id_ekskul" class="form-control" id="id_ekskul">
                    </div>
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="nilai_ekskul">Nilai</label>
                        <input type="number" class="form-control" id="nilai_ekskul" name="nilai_ekskul" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal karakter -->
<div class="modal fade" id="update-karakter" tabindex="-1" role="dialog" aria-labelledby="judul" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul">Update Penilaian Karakter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/updatekarakter" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="idakhlak">Id Penilaian Karakter</label>
                        <input type="number" class="form-control" id="idakhlak" name="idakhlak">
                    </div>
                    <div class="form-group">
                        <label for="akhlak">Penilaian Akhlak</label>
                        <input type="number" class="form-control" id="akhlak" name="akhlak">
                    </div>
                    <div class="form-group">
                        <label for="kepribadian">Panilaian Kepribadian</label>
                        <input type="number" class="form-control" id="kepribadian" name="kepribadian" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('js')
<script>
    $(document).on("click", ".kirimmapel", function() {
        var myId = $(this).data('id');
        var mapel = $(this).data('mapel');
        var tgl = $(this).data('tgl');
        var materi = $(this).data('materi');
        var nilai = $(this).data('nilai');
        $(".modal-body #mapelId").val(myId);
        $(".modal-body #mapelname").val(mapel);
        $(".modal-body #tgl").val(tgl);
        $(".modal-body #materi").val(materi);
        $(".modal-body #nilaiulhar").val(nilai);
        $('#update-ulhar').modal('show');
    });
    $(document).on("click", ".kirimtts", function() {
        var idtts = $(this).data('idtts');
        var nilaitts = $(this).data('nilaitts');
        var mapeltts = $(this).data('mapeltts');
        $(".modal-body #idtts").val(idtts);
        $(".modal-body #nilaitts").val(nilaitts);
        $(".modal-body #mapeltts").val(mapeltts);
        $('#update-tts').modal('show');
    });
    $(document).on("click", ".kirimtas", function() {
        var idtas = $(this).data('idtas');
        var nilaitas = $(this).data('nilaitas');
        var mapeltas = $(this).data('mapeltas');
        $(".modal-body #idtas").val(idtas);
        $(".modal-body #nilaitas").val(nilaitas);
        $(".modal-body #mapeltas").val(mapeltas);
        $('#update-tas').modal('show');
    });
    $(document).on("click", ".kirimabsen", function() {
        var id = $(this).data('idabsen');
        var sakit = $(this).data('sakit');
        var izin = $(this).data('izin');
        var ket = $(this).data('ket');
        $(".modal-body #nis").val(id);
        $(".modal-body #sakit").val(sakit);
        $(".modal-body #ket").val(ket);
        $(".modal-body #izin").val(izin);
        $('#update-absensi').modal('show');
    });
    $(document).on("click", ".kirimekskul", function() {
        var id = $(this).data('idekskul');
        var nama = $(this).data('namakegiatan');
        var nilai = $(this).data('nilaiekskul');
        $(".modal-body #id_ekskul").val(id);
        $(".modal-body #nama_kegiatan").val(nama);
        $(".modal-body #nilai_ekskul").val(nilai);
        $('#update-ekskul').modal('show');
    });
    $(document).on("click", ".kirimkarakter", function() {
        var id = $(this).data('idakhlak');
        var nama = $(this).data('akhlak');
        var nilai = $(this).data('kepribadian');
        $(".modal-body #idakhlak").val(id);
        $(".modal-body #akhlak").val(nama);
        $(".modal-body #kepribadian").val(nilai);
        $('#update-karakter').modal('show');
    });
</script>
@endsection