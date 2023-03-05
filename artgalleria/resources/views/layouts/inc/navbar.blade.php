<nav class="navbar navbar-expand-lg navbar-dark  bg-dark bg-body-tertiary" >
    <div class="container" style="font-family: 'Rockwell Nova'">
        <a class="navbar-brand" href="{{url('/')}}" >
            <img style="width:80px; height: 50px;" src="/image/aa.jpg">
            ArtGalleriA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/kategoriler')}}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/sepet')}}">Sepet</a>
                </li>
                @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Giriş Yap') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Kayıt Ol') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                <li>
                                        <a class="dropdown-item" href="{{url('siparislerim')}}">
                                            Siparişlerim
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            Profilim
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Çıkış') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

            </ul>
        </div>
    </div>
</nav>
