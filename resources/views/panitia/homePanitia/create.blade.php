@if(Auth::user()->admin==0 && Auth::user()->verification==0 || Auth::user()->admin==2)
    Anda Tidak Punya Hak akses
@else
<script src="{{asset('/js/jquery.js')}}"></script>
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav>
<div class="container">
  <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Masukkan Informasi</div>
        <form method="POST" action="/crud" enctype="multipart/form-data">
          @csrf 
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Judul berita" name="judul">
            </div>

            <div class="form-group">
              <div class="custom-file">
              <input type="file" class="custom-file-input" name="gambar">
              <label class="custom-file-label" for="gambar">Choose Image</label>
              </div>
            </div>

            <div class="form-group">
              <input type="date" class="form-control" placeholder="waktu_upload" name="waktu_upload">
            </div>
              
            <div class="form-group">
              <input type="text" hidden="hidden" class="form-control" value="{{Auth::user()->id_user}}" name="id_uploader">
            </div>

            <br>
            <div class="form-group"> 
            <select name="id_status" class="custom-select">
              @foreach($statuses as $s)
                <option value="{{$s->id_status}}">{{$s -> nama_status}}</option>
              @endforeach
            </select>
              </div>

          <div class="form-group">
            <textarea class="form-control" rows="5" placeholder="Deskripsi lokasi/berita" name="isi_berita"></textarea>
            </div>
            
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Embed Map HTML" name="alamat_maps">
            </div>
            <div align="center">
               <button class="btn btn-primary" type="submit">Submit Informasi</button>
            </div>
             <br>
        </form>
      </div>
      </div>
    </div>
  </div>
</div> 
<footer class="page-footer font-small mdb-color pt-4 navd">
  @include('includes.footer')
</footer>

@endif 
