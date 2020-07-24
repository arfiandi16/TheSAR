<script src="{{asset('/js/jquery.js')}}"></script>
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 
                    @if(Auth::user()->verification==0 && Auth::user()->admin==0)
                        <b>Silahkan Menunggu Untuk Hasil Verifikasi dari admin</b>
                        <a class="nav-link" href="/homepage">Ke Halaman awal</a>
                    @elseif(Auth::user()->admin==2)
                    <b>Selamat Datang {{Auth::user()->nama}}</b>
                    @else
                        <b>Anda sudah resmi menjadi Panitia</b>
                        <br>
                        <a class="nav-link" href="/dashboard" style="color: blue">Tempat Wisata anda</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="page-footer font-small navd pt-4" style="bottom:0;position: absolute; width: 100%">
    @include('includes.footer')
</footer> 