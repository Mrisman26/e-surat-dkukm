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
            <h1>Tambah Surat Keluar</h1>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <!-- Vertical Form -->
                    <form action="{{ url('subsuratkeluar') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-4">
                            <div class="col-lg-12">
                                <div class="card mb-2">
                                    <div class="card-header">
                                        Form Surat Keluar
                                    </div>
                                    <div class="card-body mt-3">
                                        {{--  <div class="mb-3 row">
                                            <label for="letter_type" class="col-sm-3 col-form-label">Jenis Surat</label>
                                            <div class="col-sm-9">
                                                <select name="letter_type" class="form-control" required>
                                                    <option value="">Pilih..</option>
                                                    <option value="Surat Masuk">Surat Masuk</option>
                                                    <option value="Surat Keluar">Surat Keluar</option>
                                                </select>
                                            </div>

                                            <div class="invalid-feedback">

                                            </div>

                                        </div>  --}}
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">No. Surat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" value="" name="nosurat"
                                                    placeholder="Nomor Surat.." required>
                                            </div>

                                            <div class="invalid-feedback">

                                            </div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tujuan Surat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control " placeholder="Tujuan Surat.." value="" name="tujuan" required>
                                            </div>

                                            <div class="invalid-feedback">

                                            </div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="date_received" class="col-sm-3 col-form-label">Tanggal
                                                Surat</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" value="" name="tglsurat" required>
                                            </div>

                                            <div class="invalid-feedback">

                                            </div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="regarding" class="col-sm-3 col-form-label">Isi Surat</label>
                                            <div class="col-sm-9">
                                                {{--  <input type="text" class="text-are" value="" name=""
                                                    placeholder="Perihal.." required>  --}}
                                                    <textarea class="form-control" placeholder="Isi Surat.." name="isisurat" style="height: 100px"></textarea>
                                            </div>

                                            <div class="invalid-feedback">

                                            </div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="regarding" class="col-sm-3 col-form-label">Perihal</label>
                                            <div class="col-sm-9">
                                                {{--  <input type="text" class="text-are" value="" name=""
                                                    placeholder="Perihal.." required>  --}}
                                                    <textarea class="form-control" placeholder="Perihal.." name="perihal" style="height: 100px"></textarea>
                                            </div>

                                            <div class="invalid-feedback">

                                            </div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="foto" class="col-sm-3 col-form-label">File</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" value="" name="foto"
                                                    required>
                                                <div id="foto" class="form-text">Gambar</div>
                                            </div>

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_file" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a type="submit" class="btn btn-danger" href="{{ url('/Suratkeluar') }}">Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Vertical Form -->
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
    <!-- =======  Script  ======= -->
    @include('template.script')
    <!-- =======  End Script  ======= -->
</body>

</html>
