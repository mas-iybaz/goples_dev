<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('home') }}" class="waves-effect"><i
                    class="mdi mdi-home-analytics"></i><span>Homepage</span></a>
        </li>

        <li>
            <a href="{{ route('secretary_dashboard') }}" class="waves-effect"><i
                    class="mdi mdi-home-analytics"></i><span>Sekretaris
                    Dashboard</span></a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-black-mesa"></i><span>Master
                    Data</span></a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('secretary_classification') }}">Buat Klasifikasi</a></li>

            </ul>
        </li>
        <li>
            <a href="{{ route('inbox_secretary') }}" class="waves-effect"><i
                    class="mdi mdi-home-analytics"></i><span>Surat
                    Masuk</span></a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-black-mesa"></i><span>Olah
                    Surat Keluar</span></a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('data_concept') }}">Baca Konsep</a></li>
                <li><a href="{{ route('outbox_data') }}">Daftar Surat Keluar</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                    class="mdi mdi-black-mesa"></i><span>Retensi Surat</span></a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('inbox_retention_sec') }}">Retensi Surat Masuk</a></li>
                <li><a href="{{ route('outbox_retention_sec') }}">Retensi Surat Keluar</a></li>
            </ul>
        </li>
    </ul>
</div>
