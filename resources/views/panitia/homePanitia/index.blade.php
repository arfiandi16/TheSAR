
@if(Auth::user()->admin==0 && Auth::user()->verification==0 || Auth::user()->admin==2)
    Anda tidak punya Hak akses
@else
<script src="{{asset('/js/jquery.js')}}"></script>
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav>

<div class="container">
    <div class="row justify-content-center">
            <table class="col-md-9">
                <tbody>
                    <!-- <a href="/crud/create" class="btn btn-primary">Tambah info wisata</a> -->
                </tbody>
            </table>
        <div class="col-md-12">
            <br>
            <div class="card">
                    <table class="table table-stripped" width="100%">
                        <thead class="thead-dark">
                            <th>
                                No
                            </th>
                            <th>
                                Judul
                            </th>
                            <th>
                                Gambar
                            </th>
                            <th>
                                Deskripsi
                            </th>
                            <th width="10%">Rating
                                @if($highToLow==1)
                                <a href="/highToLow=1"><i class="fa fa-caret-down" aria-hidden="true"></i>
</a> 
                                @else
                                <a href="/highToLow=0"><i class="fa fa-caret-up" aria-hidden="true"></i>
</a>
                                @endif
                            </th>
                            <th>
                                Uploader
                            </th>
                            <th>
                                Jenis 
                            </th>
                            <th>
                                
                            </th>
                        </thead>

                        <tbody>
                            @foreach($homepages as $d)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->judul}}</td>
                            <td><img src="/img/{{$d->nama_status}}/{{$d->gambarHP}}" width="150px" height="120px"></td>
                            <td>{{substr($d->isi_berita,0,200)}}...</td>
                            <td>{{$d->rating}}</td>
                            <td>{{$d->nama}}</td>
                            <td>{{$d->nama_status}}</td>
                            <td width="200px">
                                <form method="post" action="/crud/{{$d->id_home}}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info btn-sm" href="/crud/{{$d->id_home}}/edit">Edit</a> 
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?')">Delete</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {{$homepages->links()}}
            </div>
        </div>
    </div>
</div> 
<footer class="page-footer font-small mdb-color pt-4 navd">
    @include('includes.footer')
</footer>
@endif  