<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}" >
	<link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
<script src="{{asset('/js/jquery.js')}}"></script>
	<title>Mantou - Sleman Tour</title> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
@include('includes.nav')
</nav>
<br>
<div class="container">

		<p>
		<h1 style="font-size:30px; font-weight: bold; font-weight: 700; font-family:Roboto, sans-serif; color:black;"> 
				{{$nm->nama_status}} 
		</h1>
	</p> 
	<div class="row">
		@foreach($statuspages as $s)  
			<div class="col-md-3 my-2">
		        <a href="/homeOpen/{{$s->id_home}}&&{{$s->id_status}}" class="card card-experience shadow petualangan" style="text-decoration:none; color:#363a40">
		            <div class="card-body" style="min-height:100px;">
						<img src="/img/{{$nm->nama_status}}/{{$s->gambar}}" class="card-img-top" alt="..." style="height: 150px">
		            </div>
		            <div class="card-header">
						<small>Waktu Upload : {{date('d F Y',strtotime($s->waktu_upload))}}
							<br>
							<i class="fa fa-eye" style="padding-left:5px;"> {{$s->views}}</i>
							<i class="fa fa-comment" style="padding-left:5px;"> {{$s->banyak_komentar}}</i>
							<i style="margin-left:70px ">Rating : {{$s->rating}}</i>
						</small>
					</div>
		            <div class="card-footer" style="min-height:260px;">
		                <strong>@if(strlen($s->judul)>100)
				                		{{substr($s->judul,0,80)}}
				                	@else
				                	{{$s->judul}} 
				                	@endif </strong>
		                <br> 
		                <small>{{substr($s->isi_berita,0,200)}}...</small>
		            </div>
		        </a>
		    </div> 
		@endforeach
	</div>
</div>

<div style="padding-left: 13%;">
	
</div>

<footer class="page-footer font-small mdb-color pt-4 navd">
	@include('includes.footer')
</footer>
</body>
</html>