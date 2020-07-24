@if(Auth::user()->admin==0 && Auth::user()->verification==0 || Auth::user()->admin==2)
    Anda Tidak punya hak akses 
@else
<script src="{{asset('/js/jquery.js')}}"></script>
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav>
<style type="text/css"> 
</style>
<div class="container">
  <div class="row justify-content-center">
        <div class="col-md-6" style="background-color: white">
            <div class="card">
                <div class="card-header">edit data</div>
        <form method="post" action="{{ route('crud.update',$homepages->id_home)}}" enctype="multipart/form-data">
          @csrf
          @method('put')
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Nama Lokasi/Judul berita" name ="judul" value="{{$homepages->judul}}">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" hidden="" placeholder="Uploader" name="id_uploader" value="{{Auth::user()->id_user}}">
            </div>
            <div class="form-group"> 
              <select name="id_status" class="custom-select">
              
                  <option value="7">Desa Wisata</option>
              
              </select>
            </div>
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="form-control" name="gambar" id="imgInp"> 
              </div>
              <img id="blah" src="/img/{{$stat->nama_status}}/{{$homepages->gambar}}" width="200px" height="200px" >
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="5" name="isi_berita">
                {{$homepages->isi_berita}}
              </textarea>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Embed Map HTML" name="alamat_maps" value="{{$homepages->alamat_maps}}">
            </div>
            <div class="form-group">
              <input type="date" class="form-control" placeholder="waktu_upload" name="waktu_upload" value="{{$homepages->waktu_upload}}" readonly="">
            </div>
            <br>
            <div class="form-group">
               <button class="btn btn-primary" type="submit">Submit</button>
               <button class="btn btn-danger" type="reset">Cancel</button>
            </div>
          </div>
             <br>
        </form>
      </div>
    </div>
  </div>
</div>
<footer class="page-footer font-small mdb-color pt-4 navd">
  @include('includes.footer')
</footer>
@endif  
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