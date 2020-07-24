<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.css" >
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<script src="/js/jquery.js"></script>
	<style type="text/css"> 
		a:link{
			text-decoration: none;
			color:#1b2a49;
		}
	</style>
	<title>Mantou - Sleman Tour</title> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
@include(
'includes.nav')
</nav>
<br>
<div class="container">

		<p>

	</p> 
	<div class="row">
		@foreach($homepages as $s) 
		<div class="col-md-3 my-2">
		        <a href="/homeOpen/{{$s->id_home}}&&{{$s->id_status}}" class="card card-experience shadow petualangan" style="text-decoration:none; color:#363a40"> 
		            <div class="card-header">
						Waktu Upload : {{$s->waktu_upload}}
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
{{$homepages->links()}}

<footer class="page-footer font-small mdb-color pt-4 navd">
	@include('includes.footer')
</footer> 
</body>
</html>