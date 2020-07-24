<style type="text/css">
  a {
    font:600 'Open Sans',sans-serif; 
  }
</style>
<link rel="icon" href="{{asset('/img/logo/logo.jpg')}}" type="image/gif" sizes="16x16">  
<link rel="stylesheet" href="{{asset('/css/font-awesome.css')}}"> 

<link href="{{asset('/css/app.css')}}" rel="stylesheet">
 <a class="navbar-brand" href="/home">
  <img src="{{asset('/img/logo/logo.png')}}" width="50px">
 </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">Beranda
          <span class="sr-only">(current)</span>
        </a>
      </li>
<!--       <li class="nav-item">
        <a href="/status/7" class="nav-link">Desa Wisata</a>
      </li> -->
      <li>
        @guest
                @if (Route::has('register'))

                @endif
                @else
                    @if(Auth::user()->admin==0 || Auth::user()->admin==2)
                        
                    @else
                      <a class="nav-link" href="/crud" >
                    Lihat Data
                      </a> 
                    @endif 
        @endguest
      </li>
  </ul>
  <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" >
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
<!--                             @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" >{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item fa fa-user" style="color: black;" href="/account">
                                        My Account
                                    </a>
                                    <a class="dropdown-item fa fa-sign-out" style="color: black;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    <form class="form-inline" action="/cari" method="get">
      <div class="md-form my-0">
        <input class="form-control mr-sm-2" type="text" name="cari" placeholder="Search" aria-label="Search">
      </div>
    </form>
  </div>