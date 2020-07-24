<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}


/* Style the container/contact section */
.container1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

.a1{
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 350px;
}

</style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav> 

<div class="container1 container">
  <div style="text-align:center">
    <h2>My Profile</h2> 
  </div>
  <div class="row">
    <div class="column">
      @php
      if(Auth::user()->admin==1){
      $nama = 'admin';
      }
      elseif(Auth::user()->admin==2){
      $nama = 'user';
      }
      else{
      $nama = 'panitia';
      }
      @endphp
      <img src="/img/profile/{{$nama}}/{{Auth::user()->gambar}}" alt="kamu belum punya foto" style="width:100%">
    </div>
    <div class="column"> 
      	<a href="/account/{{Auth::user()->id_user}}/edit" class="btn btn-info btn-lg a1" width='350px'>
          <span class="glyphicon glyphicon-edit"></span> Change your Profile
        </a>
    <br>
    <br>
    <br>
    <br> 
      	<div class="form-row">
      		<div class="col-sm-4"><label for="fname">Nama</label></div>
      		<div class="col-sm-4"> {{Auth::user()->nama}}</div>
      	</div>
      	<br>
        <div class="form-row">
      		<div class="col-sm-4"><label for="email">Email</label></div>
      		<div class="col-sm-4"> {{Auth::user()->email}}</div>
      	</div>
      	<br>
      	<div class="form-row">
      		<div class="col-sm-4"><label for="tgl">Tanggal Lahir</label></div>
      		<div class="col-sm-4">{{date('d F Y',strtotime(Auth::user()->tanggal_lahir))}}</div>
      	</div>
      	<br>
      	<div class="form-row">
      		<div class="col-sm-4"><label for="fname">Jenis Kelamin</label></div>
      		<div class="col-sm-4"> @if(Auth::user()->jenis_kelamin=='L')
                                    Laki-Laki
                                  @else(Auth::user()->jenis_kelamin=='P')
                                    Perempuan
                                  @endif
          </div>
      	</div>
      	<br>
      	<div class="form-row">
      		<div class="col-sm-4"><label for="noHP">Nomor Telepon</label></div>
      		<div class="col-sm-4"> {{Auth::user()->nomor_telepon}}</div>
      	</div>
      	<br> 
    </div>
  </div>
</div>
<footer class="page-footer font-small navd pt-4">
    @include('includes.footer')
</footer> 
</body>
</html>
