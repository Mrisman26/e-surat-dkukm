<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">
            <h6>Menu</h6>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Dashboard') }}">
                <i class="bi bi-activity"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard -->

        @if(auth()->user()->level=="SUPERADMIN")
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Databidang') }}">
                <i class="bi-menu-button-wide"></i>
                <span>Data Bidang</span>
            </a>
        </li>
        <!-- End Departemen -->


        {{--  <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Pengirimsurat') }}">
                <i class="bi bi-people"></i>
                <span>Pengirim Surat</span>
            </a>
        </li>  --}}
        <!-- End Pengirim -->

        {{--  <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Tambahsurat') }}">
                <i class="bi bi-envelope-arrow-up"></i>
                <span>Tambah Surat</span>
            </a>
        </li>  --}}
        <!-- End Tambah Surat -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Suratmasuk') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Surat Masuk</span>
            </a>
        </li>
        <!-- End Surat Masuk -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Suratkeluar') }}">
                <i class="bi bi-box-arrow-left"></i>
                <span>Surat Keluar</span>
            </a>
        </li>

        {{--  <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Disposisi') }}">
                <i class="bi bi-bookmarks"></i>
                <span>Data Disposisi</span>
            </a>
        </li>  --}}
        <!-- End surat Keluar -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Datapegawai') }}">
                <i class="bi bi-person-bounding-box"></i>
                <span>Data Pegawai</span>
            </a>
        </li>

        {{--  <li class="nav-item">
            <a class="nav-link collapsed" href="/Profile/{{$risman->email}}">
                <i class="bi bi-gear-fill"></i>
                <span>Profile</span>
            </a>
        </li>  --}}
        <!-- End -->


        @elseif(auth()->user()->level== "SEKERTARIAT" || "ADMIN" )
        {{--  <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Tambahsuratmasuk') }}">
                <i class="bi bi-envelope-arrow-up"></i>
                <span>Tambah Surat</span>
            </a>
        </li>  --}}
        <!-- End Tambah Surat -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Suratmasuk') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Surat Masuk</span>
            </a>
        </li>
        <!-- End Surat Masuk -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Suratkeluar') }}">
                <i class="bi bi-box-arrow-left"></i>
                <span>Surat Keluar</span>
            </a>
        </li>

        <!-- End Keluar-->


        @endif

    </ul>

</aside>
