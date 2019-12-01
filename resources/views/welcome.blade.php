@extends('layout/template')
@section('judul', 'Welcome')
@section ('css')
<link rel="stylesheet" href="{{asset('/assets/css/mycss/landing.css')}}">
@endsection
@section('container')
<div class="container-fluid">
    <nav class="navbar navbar1 navbar-expand-lg fixed-top navbar-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="carisiswa" data-toggle="pill" href="#tampilcarisiswa" role="tab" aria-controls="tampilcarisiswa" aria-selected="false">Cari Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="faq" data-toggle="pill" href="#pills-faq" role="tab" aria-controls="pills-faq" aria-selected="false">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="about" data-toggle="pill" href="#tampilabout" role="tab" aria-controls="tampilabout" aria-selected="false">About Us</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- bagian landing -->

    <div class="tab-content " id="pills-tabContent">
        <div class="tab-pane fade show active bg" id="pills-home" role="tabpanel" aria-labelledby="home">
            <div class="row">
                <div class="col-sm-9 home-landing align-middle">

                    <h1>Selamat Datang</h1>
                    <p class="text-justify desk">Go Raport adalah layanan raport online yang diberikan oleh SMA Yayasan Giveaway<br>dalam rangka mewujudkan komitmen untuk membentuk sinergi dengan orang tua/wali murid dalam hal pendidikan dan pengajaran. Diharapkan dengan hadirnya layanan ini, orang tua/wali dapat memantau perkembangan siswa dalam bidang akademis.</p>
                    <!--  -->
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/home') }}">Home</a>
                    @else
                    <a class="btn btn-primary login-guru" href="{{ route('login') }}" role="button">Login Guru Disini</a>
                    @endauth
                    @endif
                    <!--  -->

                    <section>
                        <img src="{{asset('/assets/img/landing/1.jpg')}}" width="100%" height="100%" alt="">
                        <p>Pantau capaian akademis dan non akademis anak anda disini!</p>
                    </section>
                </div>

            </div>
            <div class="row white-black">
                <div class="col-sm-4 black-side">

                </div>
                <div class="col-sm-8  white-side">
                    <h1>Hasil Ulangan Harian dan Test Siswa</h1>
                    <p>selalu kami update agar orang tua dapat mengetahui perkembangan siswa.</p>
                </div>

            </div>
            <div class="row">
                <div class="col-12 card-side">
                    <h1 class="text-center mb-5">Kemudahan yang ditawarkan Go Raport</h1>
                    <div class="row">

                        <div class="col-sm-2 offset-sm-1">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="badge badge-primary">1</h1>
                                    <p>Akses raport siswa tanpa ribet</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-3">

                            <div class="card">
                                <div class="card-body">
                                    <h1 class="badge badge-primary">2</h1>
                                    <p>Pantau perkembangan anak secara akademis dan non akademis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="badge badge-primary">3</h1>
                                    <p>Nilai di update secara berkala.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="badge badge-primary">4</h1>
                                    <p>Lihat Statistik perkembangan siswa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row image-text">
                <div class="col-sm-6 image-text1">
                    <p>Kami sangat mendukung</p>
                    <h1>Sinergi Orang Tua dan Guru </h1>
                    <p>dalam upaya pembentukan sumber daya manusia yang handal.</p>

                </div>
                <div class="col-sm-6 image-text2">
                    <img src="{{asset('/assets/img/landing/5.jpg')}}" width="100%" height="500px" alt="">

                </div>
            </div>

            <div class="row footer">
                <div class="col-sm-12">
                    <hr>
                    <p><span class="text-left">Copyright by</span> <span class="text-right">PAINO PROJECT </span></p>
                </div>
            </div>
        </div>

        <div class="tab-pane fade bg-dark" id="tampilcarisiswa" role="tabpanel" aria-labelledby="carisiswa">
            <div class="row">
                <div class="col-sm-12 align-middle">
                    <h2 class="ml-3 mb-4">Cari Raport Siswa </h2>
                    <form class="form-inline" action="/showraport" method="post">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukin Tanggal Lahir">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 ">Cari</button>
                    </form>
                    <p class="ml-3">*Masukkan nis dan tanggal lahir siswa</p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-faq" role="tabpanel" aria-labelledby="faq">
            <div class="row ask position-fixed">
                <div class="col-sm-12">
                    <h1 class="ml-4 mt-4 mb-5">Frequent Asked Question</h1>
                    @foreach($faq as $f)

                    <a href="#{{$loop->index}}" class="text-decoration-none d-block font-weight-bold text-dark ml-5">{{$loop->index+1}}. &nbsp;{{$f->pertanyaan}}</a><br>
                    @endforeach
                </div>
            </div>
            <div class="row answer">
                <div class="col-sm-12 mt-5">

                    @foreach($faq as $f)
                    <a id="{{$loop->index}}" class="text-decoration-none font-weight-bold ml-4">{{$loop->index+1}}. &nbsp;{{$f->pertanyaan}}</a><br>
                    <p class="ml-5">Answer:</p>
                    <p class="ml-5">{{$f->jawaban}}</p>
                    @endforeach
                </div>
                <div class="fixed-bottom pl-5 pr-5">
                    <hr>
                    <p class="">Copyright by PAINO PROJECT</p>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="tampilabout" role="tabpanel" aria-labelledby="about">
            <div class="row row1">
                <div class="col-sm-12">
                    <p>Create by</p>
                    <h1>PAINO PROJECT.</h1>
                    <p>'Modern Design to your modern website'</p>
                </div>

            </div>
            <div class="row row2">
                <div class="col-sm-2"></div>
                <div class="col-sm-6">
                    <h1 class="ml-4 mb-5">Development Team: </h1>
                    <table>
                        <tr>
                            <td>
                                <p class="ml-4 mr-5 ">Obi Kastanya </p>
                            </td>
                            <td>
                                <p>(672017162)</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="ml-4 mr-5 ">Ardisena Pandu Pradana </p>
                            </td>
                            <td>
                                <p>(672017178)</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="ml-4 mr-5">Vandi Kristiawan </p>
                            </td>
                            <td>
                                <p>(672017172)</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row row3">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="offset-sm-1 col-sm-3">
                            <img src="{{asset('assets/img/contact/1.svg')}}" class="logo" alt="">
                            <p class="font-weight-bold">@Painoproject</p>
                        </div>
                        <div class="col-sm-3">
                            <img src="{{asset('assets/img/contact/2.svg')}}" class="logo" alt="">
                            <p class="font-weight-bold">Paino Project website</p>

                        </div>
                        <div class="col-sm-4">
                            <img src="{{asset('assets/img/contact/3.svg')}}" alt="" class="logo">
                            <p class="font-weight-bold">Painoproject@gmail.com</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row row4">
                <div class="col-sm-12 pl-5 pr-5">
                    <hr>
                    <p class="">Copyright by PAINO PROJECT</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection