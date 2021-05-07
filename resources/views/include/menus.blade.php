<div class="col-md-3">
<!-- Widget: user widget style 2 -->
<div class="card card-danger card-widget widget-user-2 shadow-sm">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="card-header" >
    <h3 class="card-title">Menu</h3>
    </div>
    <div class="card-footer p-0">
    <ul class="nav flex-column">
        <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">
            Dashboard
        </a>
        </li>
        @if(Auth::user()->level != 0)
        <li class="nav-item">
        <a href="{{ route('insert.data') }}" class="nav-link">
            Tambah Data 
        </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('insert.kegiatan') }}" class="nav-link">
            Tambah Kegiatan 
        </a>
        </li>
        @else
        <li class="nav-item">
        <a href="{{ route('insert.slide.show') }}" class="nav-link">
            Slide Show
        </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('insert.akun.baru') }}" class="nav-link">
            Akun baru
        </a>
        </li>
        @endif
    </ul>
    </div>
</div>
<!-- /.widget-user -->
</div>