<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" crossorigin="anonymous">
  <script type="text/javascript" src="{{asset('/js/jquery.js')}}"></script>
  <title></title>
</head>
<body>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav> 
  <div class="card">
  <div class="card-header" align="center">
    Edit Your Profile
  </div>
  <form action="/account/{{Auth::user()->id_user}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
   <div class="card-body">
    <div class="form-group">
      <label >Nama</label>
      <input type="text" class="form-control" name="nama" value="{{Auth::user()->nama}}">
    </div>
    <div class="form-group">
      <label >Email</label>
      <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
    </div>
    <div class="form-group">
      <label>Tanggal Lahir</label>
      <input type="date" class="form-control" name="tanggal_lahir" placeholder="" name="" value="{{Auth::user()->tanggal_lahir}}">
      </div>
    <div class="form-group">
      <label>Jenis Kelamin</label>
      <div class="radio">
      
      <label><input type="radio" name="jenis_kelamin" value="L" checked>Laki Laki</label>
      <label><input type="radio" name="jenis_kelamin" value="P">Perempuan</label>
    </div>
    </div>
    
    <div class="form-group">
      <label >Gambar</label>
      <input type="file" class="form-control" name="gambar" id="imgInp">
      <img id="blah" width="200px" height="200px" />
    </div>
    
    <div class="form-group">
      <label>Nomor Telepon</label>
      <input type="text" class="form-control" name="nomor_telepon" value="{{Auth::user()->nomor_telepon}}">
    </div>
    <br>
    <div align="center">
      <button type="submit" class="btn btn-primary">
      Save
      </button>
      <br>
    </div>
  </div>   
  </form>

</div>
</div>
<footer class="page-footer font-small navd pt-4">
    @include('includes.footer')
</footer>
<script type="text/javascript">
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>

</body>
</html>