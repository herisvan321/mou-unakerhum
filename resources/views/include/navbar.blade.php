        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #20487f;">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <span class="brand-text font-weight-light">HUMAS</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                   
                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                Login
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <div class="container" style="min-width: 220px">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Password:</label>
                                                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter Email">
                                                    @error('password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" value="Login">
                                                    <input type="reset" class="btn btn-default">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @else
                        
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tambahkan</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                            @if(Auth::user()->level != 0)
                            <li> <a href="{{ route('insert.data') }}" class="dropdown-item">Kerjasama</a></li>
                            <li> <a href="{{ route('insert.kegiatan') }}" class="dropdown-item">Kegiatan</a></li>
                            @elseif(Auth::user()->level == 0)
                            <li> <a href="{{ route('insert.slide.show') }}" class="dropdown-item">Slide Show</a></li>
                            <li> <a href="{{ route('insert.akun.baru') }}" class="dropdown-item">Akun Baru</a></li>
                            @endif
                        </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </ul>
                </div>

                
            </div>
        </nav>