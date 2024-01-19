<!DOCTYPE html>
<html lang="en">

{{--  Start Head  --}}

<head>
    @include('template.head')
</head>
{{--  End Head --}}

<body>

    <!-- ======= Header ======= -->
    @include('template.navbar')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('template.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            {{--  <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-5">  --}}
            <header class="page-header page-header-dark bg-secondary pb-2">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-12">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i class="bi bi-activity"></i></div>
                                    Dashboard
                                </h1>
                                <h5 class="text-white">
                                    <div class="page-header-icon"></div>
                                    Dinas Koperasi, Usaha Kecil dan Menengah
                                </h5>
                                <h5 class="text-white align-center">
                                    <div class="page-header-icon"></div>
                                    Kabupaten Sukabumi
                                </h5>
                            </div>
                            <img class="text-center" src="/admin/img/illustrations/logo.png" style="max-width: 12rem" />
                        </div>
                    </div>
                </div>
            </header>
            <!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="row">
                        <div class="col-xl-4 col-xl-12 mb-2">
                            <div class="card h-70">
                                <div class="card-body h-85 p-2">
                                    <div class="row align-items-center">
                                        <div class="col-xl-6 col-xl-6">
                                            <div class="text-center text-xl-start text-xxl-center mb-12 mb-xl-2">
                                                <h1 class="text-primary">Selamat Datang {{ Auth::user()->level }}!</h1>
                                                    <h7>--------------------------------</h6>
                                                <h5 class="text-gray-700 mb-0">Di Website E-Surat</h5>
                                            </div>
                                        </div>
                                        <div class=" text-center">
                                            <img class="rounded float-end" src="/admin/img/illustrations/at-work.svg"
                                                style="max-width: 17rem" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-6 col-xl-6 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">Surat Masuk</div>
                                    <div class="text-lg fw-bold">{{ $masuk }}</div>
                                </div>
                                <i class="feather-xl text-white-50" data-feather="mail"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="text-dark stretched-link" href="http://e-surat-dkukm.test/Suratmasuk">Selengkapnya</a>
                            <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 mb-4">
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">Surat Keluar</div>
                                    <div class="text-lg fw-bold">{{ $keluar }}</div>
                                </div>
                                <i class="feather-xl text-white-50" data-feather="mail"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="text-dark stretched-link" href="http://e-surat-dkukm.test/Suratkeluar">Selengkapnya</a>
                            <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <!-- End main -->



    {{--  <!-- ======= Footer ======= -->
    @include('template.footer')
    <!-- ======= End Footer ======= -->  --}}

    <!-- =======  Script  ======= -->
    @include('template.script')
    <!-- =======  End Script  ======= -->

</body>

</html>
