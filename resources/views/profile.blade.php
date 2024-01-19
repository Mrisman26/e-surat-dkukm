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

      <h1> <i class="bi bi-person-circle"></i> Profile - Informasi Akun </h1>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="{{ url("storage/users/".$pegawai->foto) }}" width="70dp">
              {{--  <h2>{{ Auth::user()->name }}</h2>
              <h3>{{ Auth::user()->level }}</h3>  --}}

              <h2> {{$pegawai->name}}</h2>
              <h3>{{$user->level}}</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-1">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    {{--  <h5 class="card-title">
                        TATA KERJA
                    </h5>
                    @if(auth()->user()->level=="SUPERADMIN")
                            <p class="small fst-italic">
                                Kepala Dinas bertanggungjawab memimpin dan
                                mengkoordinasikan bawahan masing masing dan
                                memberikan bimbingan serta petunjuk bagi pelaksanaan
                                tugas bawahannya.
                            </p>
                    @elseif(auth()->user()->level=="ADMIN")
                            <p class="small fst-italic">
                                Pembinaan, pengendalian dan pengawasan
                                pelaksanaan tugas dibidang Pelayanan Izin,
                                Pengawasan dan Penilaian Koperasi;
                            </p>
                    @else(auth()->user()->level=="PEGAWAI")
                            <p class="small fst-italic">
                                Pembinaan, pengendalian dan pengawasan
                                pelaksanaan tugas dibidang Pelayanan Izin,
                                Pengawasan dan Penilaian Koperasi;
                            </p>
                    @endif  --}}
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">  {{$pegawai->name}} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Pangkat</div>
                    <div class="col-lg-9 col-md-8">{{$pegawai->pangkat}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jabatan</div>
                    <div class="col-lg-9 col-md-8">{{$pegawai->jabatan}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$pegawai->email}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nama Bidang</div>
                    <div class="col-lg-9 col-md-8">{{$pegawai->namabidang}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Level</div>
                    <div class="col-lg-9 col-md-8">{{$user->level}}</div>
                  </div>

                </div>

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form  method="POST" action="{{ route('update-password') }}">
                    @csrf
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

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
