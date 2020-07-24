<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav> 
<script src="{{asset('/js/jquery.js')}}"></script>
<div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Informasi Pendaftar</div>

                <div class="card-body">
                    <table class="table-group" width="100%">
                     <tr>
                                <td>
                                    Nama
                                </td>
                                <td>
                                	{{$users->nama}}
                                </td>
                            </tr>
                            <tr>
                            <td>Tanggal Lahir</td>
                            <td>{{$users->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                	{{$users->email}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    No HP
                                </td>
                                <td>
                                	{{$users->nomor_telepon}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Kelamin
                                </td>
                                <td>
                                    @if($users->jenis_kelamin=='L')
                                        Laki-Laki
                                    @else
                                        Perempuan
                                    @endif 
                                </td>
                            </tr>
                            <tr> 
                                <td colspan="2"> 
                                    <form action="/verifTolak/{{$users->id_user}}" method="get">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-success btn-sm" href="/verifTerima/{{$users->id_user}}">Terima</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menolak pendaftar?')">Tolak</button>
                                    </form>

                                    </td>
                                <td> 
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="page-footer font-small navd pt-4">
    @include('includes.footer')
</footer>  