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
            <h1>Data Surat Keluar</h1>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title ">
                                {{--  <a class="btn btn-sm btn-primary" href="" target="_blank">
                                    <i class="bi bi-printer"></i>
                                    Cetak Laporan
                                </a>  --}}
                                @if(auth()->user()->level=="PEGAWAI")
                                <a class="btn btn-sm btn-primary" href="{{ route('Tambahsuratkeluar') }}">
                                    <i class="bi bi-envelope-plus"></i>
                                    Tambah Surat
                                </a>
                                @else
                                <a class="btn btn-sm btn-primary" href="{{ route('cetak-surat-keluar') }}">
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
                                        <th class="col">Tujuan</th>
                                        <th class="col">Isi Surat</th>
                                        <th class="col">Tanggal Surat</th>
                                        <th class="col">Perihal</th>
                                        <th class="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($suratkeluar)
                                    @foreach ($suratkeluar as $risman)
                                    <tr>
                                        <td class="align-middle">
                                            {{$loop->iteration}}

                                        <td class="align-middle">
                                            {{$risman->nosurat}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->tujuan}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->isisurat}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->tglsurat}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->perihal}}
                                        </td>
                                    </td>
                                    {{--  <td class="align-middle">
                                        {{$risman->tglsurat}}
                                    </td>  --}}
                                        <td>
                                            <a class="btn btn-danger btn-sm ml-1"
                                            href="/detailsuratkeluar/{{$risman->idsuratkeluar}}">
                                            <i class="bi bi-zoom-in">Detail</i>
                                            </a>
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
                    <h5 class="modal-title" id="createModal">Tambah Data Departemen</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Nama Departemen</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Masukan Nama Departemen.." required>
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
    <!-- =======  End Script  ======= -->
</body>

</html>
