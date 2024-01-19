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
            <h1>Data Pegawai</h1>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a type="button" class="btn btn-primary pull-left" href="formpegawai">
                                    Tambah Data Pegawai
                                </a>
                            </h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th class="col">NO</th>
                                        <th class="col">Nama Pegawai</th>
                                        {{--  <th class="col">Email</th>  --}}
                                        {{--  <th class="col">Pangkat</th>  --}}
                                        <th class="col">Jabatan</th>
                                        {{--  <th class="col">Foto</th>  --}}
                                        <th class="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pegawai)
                                    @foreach ($pegawai as $risman)
                                    <tr>
                                        <td class="align-middle">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="align-middle">
                                            {{$risman->name}}
                                        </td>
                                        {{--  <td class="align-middle">
                                            {{$risman->email}}
                                        </td> --}}
                                        {{--  <td class="align-middle">
                                            {{$risman->pangkat}}
                                        </td> --}}
                                        <td class="align-middle">
                                            {{$risman->jabatan}}
                                        </td>
                                        {{--  <td>
                                            <img src="{{ url("storage/users/".$risman->foto) }}" width="70dp">
                                        </td>  --}}
                                        <td>
                                            <a class="btn btn-danger btn-sm ml-1 mt-2 delete" href="#" data-id="{{$risman->email}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                </svg>
                                            </a>


                                            <a class="btn btn-warning btn-sm ml-1 mt-2" href="/edits/{{$risman->email}}">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <a class="btn btn-primary btn-sm ml-1 mt-2" href="/detailpegawai/{{$risman->name}}"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg>
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

    {{-- Modal Add --}}
    {{--  <div class="modal fade" id="createModal" role="dialog" aria-labelledby="createModal" aria-hidden="true"
        style="overflow:hidden;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Tambah Data Pegawai</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('submits') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Nama Pegawai</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukan Nama Pegawai.."
                                    required>
                            </div>
                            <div class="col-md-12">
                                <label for="post_id">Pangkat</label>
                                <input type="text" name="pangkat" class="form-control"
                                    placeholder="Masukan Nama Pangkat.." required>
                            </div>
                            <div class="col-md-12">
                                <label for="post_id">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control"
                                    placeholder="Masukan Nama Jabatan.." required>
                            </div>
                            <div class="col-md-12">
                                <label for="post_id">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Masukan Email.."
                                    required>
                            </div>
                            <div class="col-md-12">
                                <label for="post_id">Level</label>
                                <select name="level" id="" class="form-control">
                                    <option value="">-- pilih PC --</option>
                                    <option value="SUPERADMIN">SUPERADMIN</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="TEKNISI">TEKNISI</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="post_id">Foto Pegawai</label>
                                <input type="file" name="foto" class="form-control" placeholder="Masukan Foro Pegawai.."
                                    required>
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
    </div>  --}}

    <!-- =======  Script  ======= -->
    @include('template.script')
    <!-- =======  End Script  ======= -->

    <script>
        $('.delete').click(function () {
            var pegawaiemail = $(this).attr('data-id');
            swal({
                title: "Yakin?",
                text: "Kamu akan menghapus data pegawai dengan email "+pegawaiemail+" ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletes/"+pegawaiemail+""
                  swal("Data Berhasil Di Hapus", {
                    icon: "success",
                  });
                } else {
                  swal("Data Tidak Jadi Di Hapus");
                }
              });
        });

    </script>

</body>

</html>
