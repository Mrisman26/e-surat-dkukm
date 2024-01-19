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
                            <h5 class="page-header-title align-middle">
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                Cetak Laporan Surat Masuk Per Tanggal
                            </h5>
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pilih Tanggal</h5>

                <!-- Vertical Form -->
                <form class="row g-3">
                    <div class="col-12">
                        <label for="label" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tglawal" id="tglawal">
                    </div>
                    <div class="col-12">
                        <label for="label" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tglakhir" id="tglakhir">
                    </div>

                        {{--  <button type="submit" class="btn btn-primary form-control">Submit</button>  --}}
                        <a href="" onclick="this.href='/print-pertanggal/'+ document.getElementById('tglawal').value +
                            '/' +  document.getElementById('tglakhir').value " target="_blank"
                            class="btn btn-primary col-md-12">
                            CETAK <i class="bi bi-printer"></i>
                        </a>

                </form><!-- Vertical Form -->

            </div>
        </div>
        </div>
        </div>
        </div>
    </main>

    <!-- =======  Script  ======= -->
    @include('template.script')

</body>

</html>
