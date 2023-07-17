@extends('siswa.layouts.master')

@section('title', 'Dashboard Peserta Didik')

@section('navbar')
    @include('siswa.layouts.gate-sidebar')
@stop

<!-- start page title -->
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Selamat datang kembali
                    <strong>{{ $nama }}</strong> !
                </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>

                    </ol>
                </div>


            </div>
        </div>
    </div>
    @if (empty($classroom->id))
        <div class="col-md-12">
            <div class="card">
                <div class="vector p-3 justify-content-center mx-auto" style="max-width: 300px">
                    <h4> Anda belum masuk kelas
                    </h4>
                    <img src="{{ asset('assets/images/No.svg') }}" alt="" class="img-responsive m-3">
                    <a href="{{ route('std_list_class') }}" class="btn btn-primary btn-lg mx-4">Bergabung
                        ke
                        Kelas</a>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header pt-3 bg-light ">Kelas <span>
                            <a href="{{ route('std_classdetail') }}"
                                class="btn btn-primary waves-effect waves-light float-right">
                                <i class="mdi mdi-arrow-right-thick"></i> Kunjungi
                                Kelas</a></span></h5>
                    <div class="card-body bg-dark">
                        <h4 class="card-title text-white">{{ $classroom->class_name }}</h4>


                    </div>
                </div>
            </div>
            @if (!empty($group))
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header pt-3 bg-white"> Perusahaan <span>
                                <a href="{{ route('join_company') }}"
                                    class="btn btn-primary waves-effect waves-light float-right"><i
                                        class="mdi mdi-arrow-right-thick"></i> Kunjungi
                                    Perusahaan</a></span></h5>
                        <div class="card-body bg-dark">
                            <h4 class="card-title text-white">{{ $group->groupname }}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
        </div>
        @if ($user_group_status == true)
            <div class="row">
                <div class="col-md-4 col-sm-12 ">
                    <div class="card text-white ">
                        <img class="card-img img-fluid" src="{{ asset('assets/images/leader.jpg') }}" alt="Card image">
                        <div class="card-img-overlay d-flex align-content-end flex-wrap">
                            <div class="bg-light p-1 mb-3">
                                <h5 class="card-title text-dark">Pimpinan</h5>
                                <p class="card-text text-dark bg-light p-1" style="font-size:0.8vw;">
                                    Bertugas
                                    untuk
                                    membuat konsep dan
                                    mengkoreksi surat keluar dan melakukan tanda tangan pada surat
                                    keluar
                                </p>
                            </div>
                            <a href="{{ route('leaderdashboard') }}"
                                class="btn btn-primary btn-sm waves-effect waves-light float-right"
                                style="font-size:0.8vw;"><i class="mdi mdi-arrow-right-thick"></i>
                                Masuk
                                Pimpinan</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white">
                        <img class="card-img img-fluid" src="{{ asset('assets/images/secretary.jpg') }}" alt="Card image">
                        <div class="card-img-overlay d-flex align-content-end flex-wrap">
                            <div class="bg-light p-1 mb-3">
                                <h5 class="card-title text-dark">Sekretaris</h5>
                                <p class="card-text bg-light text-dark" style="font-size:0.8vw;">
                                    Bertugas
                                    melakukan melakukan manajemen
                                    surat masuk
                                    dan membuat surat keluar sesuai dengan konsep surat yang telah
                                    dibuat
                                    pimpinan
                                    sebelumnya.</p>
                            </div>
                            <a href="{{ route('secretary_dashboard') }}"
                                class="btn btn-primary btn-sm waves-effect waves-light float-right"
                                style="font-size:0.8vw;"><i class="mdi mdi-arrow-right-thick"></i>
                                Masuk
                                Sekretaris</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card text-white">
                        <img class="card-img img-fluid" src="{{ asset('assets/male-office-worker.jpg') }}"
                            alt="Card image">
                        <div class="card-img-overlay d-flex align-content-end flex-wrap">
                            <div class="bg-light p-1 mb-3">
                                <h5 class="card-title text-dark bg-light ">Arsiparis</h5>
                                <p class="card-text bg-light text-dark" style="font-size:0.8vw;">
                                    Bertugas
                                    untuk
                                    melakukan pengolahan dan manajemen surat
                                    masuk dan surat
                                    keluar serta melakukan pengolahan retensi surat masuk dan keluar.</p>
                            </div>
                            <a href="{{ route('archivist_dashboard') }}"
                                class="btn btn-primary btn-sm waves-effect waves-light float-right"
                                style="font-size:0.8vw;"><i class="mdi mdi-arrow-right-thick"></i>
                                Masuk
                                Arsiparis</a>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="col-md-6">
            <div class="card">

                <h5 class="card-header pt-3 bg-white"> Perusahaan <span>
                        <a href="{{ route('join_company') }}"
                            class="btn btn-primary waves-effect waves-light float-right"><i
                                class="mdi mdi-arrow-right-thick"></i> Gabung
                            Perusahaan</a></span></h5>
                <div class="card-body bg-dark">
                    <h4 class="card-title text-white">Kamu belum gabung perusahaan</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->
        </div>
    @endif
    @endif
    <!-- row container-fluid -->
@endsection
