<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('home') }}" class="waves-effect"><i
                    class="mdi mdi-home-analytics"></i><span>Homepage</span></a>
        </li>

        <li>
            <a href="{{ route('archivist_dashboard') }}" class="waves-effect"><i
                    class="mdi mdi-home-analytics"></i><span>Arsiparis
                    Dashboard</span></a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-black-mesa"></i><span>Master
                    Data</span></a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('archivist_classification') }}">Buat Klasifikasi</a></li>
                <li><a href="{{ route('inbox_archivist') }}">Surat Masuk</a></li>
                <li><a href="{{ route('outbox_data_arc') }}">Surat Keluar</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                    class="mdi mdi-black-mesa"></i><span>Retensi Surat</span></a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('inbox_retention_arc') }}">Retensi Surat Masuk</a></li>
                <li><a href="{{ route('outbox_retention_arc') }}">Retensi Surat Keluar</a></li>
            </ul>
        </li>
    </ul>
</div>
