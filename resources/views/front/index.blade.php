@extends('layouts.app')
@section('title','JobEntry - Job Portal Website')
@section('content')


        <x-nav/>


        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="front/img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That
                                        You Deserved</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                        dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                        rebum sea elitr.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="front/img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job
                                        That Fit You</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                        dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                        rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search
                                        A Job</a>
                                    <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A
                                        Talent</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->



        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        @foreach ($lowongans as $lowongan)
        <div class="tab-pane fade show p-0 active">
            <!-- Konten untuk jenis pekerjaan part-time -->
            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid border rounded"
                            src="{{ asset('storage/' . $lowongan->perusahaan->gambar) }}" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h5 class="mb-3">{{ $lowongan->judul }}</h5>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $lowongan->lokasi }}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $lowongan->jenis_pekerjaan }}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>Rp {{ number_format($lowongan->gaji, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <div class="d-flex mb-3">
                            <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                            <a class="btn btn-primary" href="">Apply Now</a>
                        </div>
                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $lowongan->tanggal_akhir }}</small>
                    </div>
                </div>
            </div>
        </div>
@endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


        <x-footer />
        
