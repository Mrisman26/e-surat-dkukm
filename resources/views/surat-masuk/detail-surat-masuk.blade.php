<!DOCTYPE html>
<html lang="en">

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

        <header class="page-header page-header-compact page-header-light  bg-white mb-2 mt-0">
            <div class="container-fluid px-1">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h4 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                Detail Surat
                            </h4>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-sm btn-light text-primary"
                                onclick="javascript:window.history.back();">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali Ke Semua Surat
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <div class="container-fluid px-1">
            <div class="row gx-2">
                <div class="col-lg-6">
                    @if ($result)
                    <div class="card mb-4">
                        <div class="card-header">Detail Surat</div>
                        <div class="card-body">
                            <div class="mb-1 row">
                                <table class="table">

                                    <tr>
                                        <th>ID Surat</th>
                                        <td>{{ $result->idsuratmasuk }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Surat</th>
                                        <td>{{  $result->nosurat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Surat</th>
                                        <td>{{  $result->tglsurat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Diterima</th>
                                        <td>{{  $result->tglditerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Perihal</th>
                                        <td>{{  $result->perihal }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pengirim</th>
                                        <td>{{  $result->pengirim }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tujuan Bidang</th>
                                        <td>{{  $result->namabidang }}</td>
                                    </tr>
                                    <tr>
                                        <th>File Name</th>
                                        <td>{{  $result->original_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ringkasan</th>
                                        <td>{{  $result->ringkasan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{  $result->status }}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">Detail Disposisi</div>
                        <div class="card-body">
                            <div class="mb-1 row">
                                <table class="table">

                                    <tr>
                                        <th>ID Disposisi</th>
                                        <td>{{ $result->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Perihal</th>
                                        <td>{{ $result->perihal }}</td>
                                    </tr>
                                    <tr>
                                        <th>Isi Disposisi</th>
                                        <td>{{ $result->isi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>{{ $result->tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <th>catatan</th>
                                        <td>{{ $result->catatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sifat Disposisi</th>
                                        <td>{{ $result->sifat }}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    Handle the case where no record is found
                    <p>No record found.</p>
                    @endif
                </div>



                <div class="col-lg-6">
                    <div class="card mb-4">
                        {{--  <div class="card-header">
                            File Surat -
                            <a href="/download-surat/{{ $detail->idsuratmasuk}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Surat
                        </a>
                    </div> --}}
                    <div class="card-body">
                        <div class="mb-3 row">

                            <embed src="{{ url("storage/users/". $result->foto) }}" width="400" height="715"
                                type="application/pdf">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <!-- End #main -->
    <!-- =======  Script  ======= -->
    @include('template.script')

    <!-- =======  End Script  ======= -->
</body>

</html>
