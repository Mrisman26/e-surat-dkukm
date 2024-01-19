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
            <h4>Tambah Pegawai</h4>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <!-- Vertical Form -->
                    <form action="{{ url('submits') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row gx-4">
                            <div class="col-lg-12">
                                <div class="card mb-2">
                                    <div class="card-header">

                                    </div>
                                    <div class="card-body mt-3">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Masukan Nama Pegawai.." required>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Pangkat</label>
                                            <div class="col-md-9">
                                                {{--  <input type="text" name="pangkat" class="form-control"
                                                    placeholder="Masukan Nama Pangkat..">  --}}
                                                <select name="jabatan" id="" class="form-control">
                                                    <option value="">-- Masukan Nama Jabatan --</option>
                                                    <option value="Penata Tk. I, III/d">Penata Tk. I, III/d</option>
                                                    <option value="Penata Muda Tk. 1, III/b">Penata Muda Tk. 1, III/b
                                                    </option>
                                                    <option value="Penata Muda, III/d">Penata Muda, III/d</option>
                                                    <option value="Penata Muda, III/a">Penata Muda, III/a</option>
                                                    <option value="-">-</option>
                                                </select>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Jabatan</label>
                                            <div class="col-md-9">
                                                {{--  <input type="text" name="jabatan" class="form-control"
                                                    placeholder="Masukan Nama Jabatan.." required>  --}}
                                                <select name="pangkat" id="" class="form-control">
                                                    <option value="">-- Masukan Nama Pangkat --</option>
                                                    <option
                                                        value="Kepala Bidang Pelayanan Izin Pengawasan dan Penilaian Koperasi">
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

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Masukan Nama Email.." required>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="post_id" class="col-sm-3 col-form-label">Level</label>
                                            <div class="col-md-9">
                                                <select name="level" id="" class="form-control">
                                                    <option value="">-- pilih Level --</option>
                                                    <option value="SUPERADMIN">SUPERADMIN</option>
                                                    <option value="SEKERTARIAT">SEKERTARIAT</option>
                                                    <option value="PEGAWAI">PEGAWAI</option>
                                                </select>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="post_id" class="col-sm-3 col-form-label">Bidang</label>
                                            <div class="col-md-9">
                                                <select name="idbidang" id="" class="form-control">
                                                    <option value="">-- pilih Bidang --</option>
                                                    <option value="1">
                                                        Bidang Pelayanan Izin Pengawasan dan Penilaian Koperasi
                                                    </option>
                                                    <option value="2">
                                                        Bidang Usaha Kecil dan Menengah
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Foto</label>
                                            <div class="col-md-9">
                                                <input type="file" name="foto" class="form-control"
                                                    placeholder="Masukan Nama Jabatan.." required>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="letter_file" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9 mt-6">
                                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                <a type="submit" class="btn btn-danger"
                                                    href="{{ url('/Datapegawai') }}">Kembali</a>
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
