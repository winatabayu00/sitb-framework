<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SITB</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">SITB</li>
        <li class="{{ request()->is('terduga-tb*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('terduga-tb.index') }}">
                <i class="fa fa-columns"></i> <span>Terduga TB</span>
            </a>
        </li>
        <li class="{{ request()->is('permohonan-lab*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('permohonan-lab.index') }}">
                <i class="fa fa-columns"></i> <span>Permohonan Lab</span>
            </a>
        </li>

        <li class="{{ request()->is('hasil-lab*') ? 'active' : '' }}">
            <a class="nav-link" href="#">
                <i class="fa fa-columns"></i> <span>Hasil Lab</span>
            </a>
        </li>

        <li class="{{ request()->is('hasil-diagnosa*') ? 'active' : '' }}">
            <a class="nav-link" href="#">
                <i class="fa fa-columns"></i> <span>Hasil Diagnosis</span>
            </a>
        </li>


        <li class="{{ request()->is('konfirmasi*') ? 'active' : '' }}">
            <a class="nav-link" href="#">
                <i class="fa fa-columns"></i> <span>Konfirmasi</span>
            </a>
        </li>


        <li class="{{ request()->is('hasilAkhir*') ? 'active' : '' }}">
            <a class="nav-link" href="#">
                <i class="fa fa-columns"></i> <span>Hasil Akhir</span>
            </a>
        </li>
        
    </ul>
</aside>
