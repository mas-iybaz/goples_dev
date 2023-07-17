<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('home') }}" class="waves-effect"><i
                    class="mdi mdi-home-analytics"></i><span>Homepage</span></a>
        </li>

        <li>
            <a href="{{ route('leaderdashboard') }}" class="waves-effect"><i
                    class="mdi mdi-home-analytics"></i><span>Pimpinan
                    Dashboard</span></a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="mdi mdi-black-mesa"></i><span>Master
                    Data</span></a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('mailconcept') }}">Konsep Surat</a></li>
                <li><a href="{{ route('autograph') }}">Data TTD</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('inbox') }}"class="waves-effect"><i class="mdi mdi-home-analytics"></i><span>Surat
                    Masuk</span></a>
        </li>
        <li>
            <a href="{{ route('mail_correct') }}" class="waves-effect"><i
                    class="mdi mdi-home-analytics"></i><span>Koreksi Surat
                    Keluar</span></a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                    class="mdi mdi-black-mesa"></i><span>Retensi Surat</span></a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('inbox_retention') }}">Retensi Surat Masuk</a></li>
                <li><a href="{{ route('outbox_retention') }}">Retensi Surat Keluar</a></li>
            </ul>
        </li>
    </ul>
</div>
