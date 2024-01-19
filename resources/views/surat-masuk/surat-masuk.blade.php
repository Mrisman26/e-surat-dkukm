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

        <div class="pagetitle">
            <h1>Data Surat Masuk</h1>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title ">
                                @if(auth()->user()->level=="SEKERTARIAT")
                                <a class="btn btn-sm btn-primary" href="{{ route('Tambahsuratmasuk') }}">
                                    <i class="bi bi-envelope-plus"></i>
                                    Tambah Surat
                                </a>
                                {{--  <a class="btn btn-sm btn-primary" href="{{ route('print-surat-masuk') }}" target="_blank">
                                    <i class="bi bi-printer"></i> &nbsp;
                                    Cetak Laporan
                                </a>  --}}
                                <a class="btn btn-sm btn-primary" href="{{ route('cetak-surat-masuk') }}">
                                    <i class="bi bi-printer"></i> &nbsp;
                                    Cetak Laporan
                                </a>
                                @else
                                {{--  <a class="btn btn-sm btn-primary" href="{{ route('print-surat-masuk') }}" target="_blank">
                                    <i class="bi bi-printer"></i> &nbsp;
                                    Cetak Laporan
                                </a>  --}}
                                <a class="btn btn-sm btn-primary" href="{{ route('cetak-surat-masuk') }}">
                                    <i class="bi bi-printer"></i> &nbsp;
                                    Cetak Laporan
                                </a>
                                @endif
                            </h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th class="col">No.</th>
                                        <th class="col">No. Surat</th>
                                        <th class="col">Tanggal Diterima</th>
                                        <th class="col">Perihal</th>
                                        <th class="col">Ringkasan</th>
                                        <th class="col">Status</th>
                                        {{--  @foreach ($suratmasuk as $risman)
                                        @if($risman->status == 'Sedang Di Proses')

                                            @else
                                            <th class="col">Aksi</th>
                                        @endif
                                        @endforeach  --}}
                                        <th class="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($suratmasuk)
                                    @foreach ($suratmasuk as $risman)
                                    <tr>
                                        <td class="align-middle">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->nosurat}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->tglditerima}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->perihal}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->ringkasan}}
                                        </td>
                                        <td class="align-middle">
                                            @if($risman->status == 'Sedang Di Proses')
                                            <a class="btn btn-warning">{{$risman->status}}</a>
                                            @else
                                            <a class="btn btn-success">{{$risman->status}}</a>
                                            @endif
                                        </td>
                                        <td>

                                            @if(auth()->user()->level=="SUPERADMIN" && $risman->status == 'Sedang Di Proses')
                                            <a class="btn btn-sm btn-secondary btn-proses-disposisi"
                                                data-idsuratmasuk="{{$risman->idsuratmasuk}}" data-bs-toggle="modal"
                                                data-bs-target="#createModal">
                                                <i class="bi bi-book-half">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger btn-sm ml-1"
                                            href="/detailsuratmasuk/{{$risman->idsuratmasuk}}">
                                            <i class="bi bi-zoom-in">Detail</i>
                                            </a>
                                            @elseif(auth()->user()->level=="PEGAWAI" || auth()->user()->level=="SEKERTARIAT" || auth()->user()->level=="ADMIN" && $risman->status == 'Sudah Di Proses' )
                                            <a class="btn btn-danger btn-sm ml-1"
                                                href="/detailsuratmasuk/{{$risman->idsuratmasuk}}">
                                                <i class="bi bi-zoom-in">Detail</i>
                                            </a>
                                            @elseif($risman->status == 'Sudah Di Proses' && auth()->user()->level=="SUPERADMIN")
                                            <a class="btn btn-danger btn-sm ml-1"
                                                href="/detailsuratmasuk/{{$risman->idsuratmasuk}}">
                                                <i class="bi bi-zoom-in">Detail</i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    Data Kosong
                                    @endif
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
    <!-- End #main -->

    <div class="modal fade" id="createModal" role="dialog" aria-labelledby="createModal" aria-hidden="true"
        style="overflow:hidden;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Data Disposisi</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('subdispo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">ID Surat Masuk</label>
                                <input type="text" name="idsuratmasuk" value="" readonly class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Perihal</label>
                                <input type="text" name="perihal" class="form-control" placeholder="Perihal Surat.."
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Isi </label>
                                <input type="text" name="isi" class="form-control" placeholder="Isi.." required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Tanggal </label>
                                <input type="date" name="tanggal" class="form-control" placeholder="Tanggal.." required>
                            </div>
                        </div>
                        {{--  <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Tujuan Disposisi </label>
                                <select name="tujuandisposisi" id="" class="form-control">
                                    <option value="">-- Masukan Nama Pangkat --</option>
                                    <option value="Kepala Bidang Pelayanan Izin Pengawasan dan Penilaian Koperasi">
                                        Kepala Bidang Pelayanan Izin Pengawasan dan Penilaian Koperasi
                                    </option>
                                    <option value="Pengelola Data ">Pengelola Data</option>
                                    <option value="Pengawas Koperasi Ahli Muda">Pengawas Koperasi Ahli
                                        Muda</option>
                                    <option value="Analis Koperasi">Analis Koperasi</option>
                                    <option value="Petugas Tenaga Administrasi">Petugas Tenaga
                                        Administrasi</option>
                                </select>
                            </div>
                        </div>  --}}
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Catatan </label>
                                <input type="text" name="catatan" class="form-control" placeholder="Catatan.." required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Sifat</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="sangatsegera" name="sifat"
                                        value="Sangat Segera">
                                    <label class="form-check-label" for="sangat-segera">Sangat Segera</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="segera" name="sifat"
                                        value="Segera">
                                    <label class="form-check-label" for="segera">Segera</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- =======  Script  ======= -->
    @include('template.script')

    <script>
        $(document).ready(function () {
            // Menggunakan class btn-proses-disposisi sebagai selector
            $('.btn-proses-disposisi').click(function () {
                var idsuratmasuk = $(this).data('idsuratmasuk');

                // Mengatur nilai idsuratmasuk pada input hidden di dalam modal
                $('input[name="idsuratmasuk"]').val(idsuratmasuk);

                // Menampilkan modal
                $('#createModal').modal('show');
            });
        });
    </script>
    <!-- =======  End Script  ======= -->
</body>

</html>
