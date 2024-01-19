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
            <h4>Edit Pegawai</h4>
        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <!-- Vertical Form -->
                    <form action="{{ url('updateData', ['email' => $userData->email]) }}" method="post" enctype="multipart/form-data">
                        {{--  <form action="{{ route('update', ['email' => $userData->email]) }}" method="post">  --}}
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
                                                <input type="text" name="name" class="form-control" value="{{ $pegawaiData->name }}"
                                                    required>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Pangkat</label>
                                            <div class="col-md-9">
                                                <input type="text" name="pangkat" class="form-control" value="{{ $pegawaiData->pangkat }}"
                                                    required>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Jabatan</label>
                                            <div class="col-md-9">
                                                <input type="text" name="jabatan" class="form-control" value="{{ $pegawaiData->jabatan }}"
                                                    required>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" name="email" class="form-control" value="{{ $pegawaiData->email }}"
                                                    required>
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="text" name="password" class="form-control" value=""
                                                    >
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="post_id" class="col-sm-3 col-form-label">Level</label>
                                             <div class="col-md-9">
                                                {{--  <select name="level" id="" class="form-control">
                                                    <option value="">{{ $userData->level }}</option>
                                                    <option value="SUPERADMIN">SUPERADMIN</option>
                                                    <option value="ADMIN">ADMIN</option>
                                                    <option value="TEKNISI">TEKNISI</option>  --}}
                                                    <input type="text" name="level" class="form-control" value="{{ $userData->level }}"
                                                    required readonly>
                                                </select>
                                             </div>

                                            <div class="invalid-feedback"></div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label for="letter_no" class="col-sm-3 col-form-label">Foto</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="file" name="foto" id="foto">
                                                <input type="hidden" name="old_foto" value="{{ $pegawaiData->foto }}">
                                                {{--  <input type="file" name="foto" class="form-control" value="{{ $pegawaiData->foto }}">  --}}
                                            </div>

                                            <div class="invalid-feedback"></div>

                                        </div>

                                        <div class="mb-3 row">
                                            <label for="letter_file" class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9 mt-6">
                                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                                                <a type="submit" class="btn btn-danger" href="{{ url('/Datapegawai') }}">Kembali</a>
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
