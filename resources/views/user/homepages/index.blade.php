<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}" >
	<link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
	<script src="{{asset('/js/jquery.js')}}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Mantou - Sleman Tour</title> 
</head> 
<body> 
		<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
 @include('includes.nav')
</nav>
 
<div class="container" style="background-color: white;  opacity: 0.95;filter: alpha(opacity=50);">
<header>
	@include('includes.header')
</header>
		
		<!--EVENT-->
<div class="row">
	<div class="col-8">
		<table class="table">
			  <thead>
			    <tr>
			      <th colspan="2">Event</th>
			    </tr>
			  </thead>
			  <tbody class="ukh">
			    <tr >
			      	<td>
			      		<a href="homeOpen/{{$event1->id_home}}&&{{$event1->id_status}}" class="card card-experience shadow petualangan" style="text-decoration:none; color:#363a40">
			      		<div class="carousel-item active img">
							<img src="/img/event/{{$event1->gambar}}" class="d-block w-100" height=395px alt="..." style="height: 500px">
								<div class="carousel-caption d-none d-md-block">
								<h2><b>{{$event1->judul}}</b></h2>
								</div>
						</div>
					</a>
			      	</td>
			    </tr>
			  </tbody>
		</table>	
	</div>
	<div class="col-4">
		<table class="table">
  <thead>
    <tr>
      <th> 
	  <br>
	  </th>
    </tr>
  </thead>
  <tbody class="ukh"> 
    <tr>
      	<td>
		  <strong>Hai Sobat Visiting!</strong>
		  <br>
		  <p align="justify">
			{{substr($event1->isi_berita,0,900)}}...
		</p>
    </tr>
  </tbody>

</table>	
	</div>
</div>

<!--CARDS EVENT-->
<div class="row">
	@foreach($eventall as $e)
	<div class="col-md-3 my-2">
        <a href="homeOpen/{{$e->id_home}}&&{{$e->id_status}}" class="card card-experience shadow petualangan" style="text-decoration:none; color:#363a40">
            <div class="card-body" style="min-height:100px;">
				<img src="/img/event/{{$e->gambar}}" class="card-img-top" alt="..." style="height: 150px">
            </div>
            <div class="card-footer" style="min-height:220px;">
                <strong>{{$e->judul}}</strong>
                <br> 
                <small>{{substr($e->isi_berita,0,200)}}...</small>
            </div>
        </a>
    </div>
	@endforeach
</div> 
<div class="button_cont" align="center"><a class="example_e" href="/status/8">Lihat Selengkapnya</a></div>
<!--BERITA TERBARU-->

<div class="row">
	<div class="col-12">
		<table class="table">
			  <thead>
			    <tr>
			      <th colspan="2">Berita Terbaru</th>
			    </tr>
			  </thead>
			  <tbody class="ukh">
			  </tbody>
			</table>
		</div>
	</div>
<div class="bd-example img">
			<div id="carouselExampleCaptions2" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleCaptions2" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleCaptions2" data-slide-to="1"></li>
					<li data-target="#carouselExampleCaptions2" data-slide-to="2"></li>
				</ol> 
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="/img/berita terbaru/kepatihan.jpg" class="d-block w-100" height=500px alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h2><b>Kepatihan Meriahkan Selasa Wage Dengan Peduli Seni dan Budaya</b></h2>
							<p>5 November 2019</p>
						</div>
					</div>
					@foreach($beritabaru as $b)
					
						<div class="carousel-item"> 
							<a href="homeOpen/{{$b->id_home}}&&{{$b->id_status}}">
							<img src="/img/berita terbaru/{{$b->gambar}}"  class="d-block w-100" height=500px alt="..."> 
						</a>
							<div class="carousel-caption d-none d-md-block">
								<h2>{{$b->judul}}</h2>
								<p>{{date('d F Y',strtotime($b->waktu_upload))}}</p>
							</div> 
						</div>
					
					@endforeach
				</div> 
				<a class="carousel-control-prev" href="#carouselExampleCaptions2" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleCaptions2" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

<!--KULINER-->
<div class="row">
	<div class="col-12">
		<table class="table">
		  <thead>
		    <tr>
		      <th colspan="3">Kuliner</th>
		    </tr>
		  </thead>
		  <tbody class="ukh">
		  <tr>
		  	<td>
		  		<div class="row">
		  	@foreach($kuliner1 as $k)
					<div class="col-3 my-2">
				        <a href="homeOpen/{{$k->id_home}}&&{{$k->id_status}}" class="card card-experience shadow petualangan" style="text-decoration:none; color:#363a40">
				            <div class="card-body" style="min-height:100px;">
								<img src="/img/kuliner/{{$k->gambar}}" class="card-img-top" alt="..." style="height: 150px">
				            </div>
				            <div class="card-footer" style="min-height:220px;">
				                <strong>
				                	@if(strlen($k->judul)>60)
				                		{{substr($k->judul,0,50)}}
				                	@else
				                	{{$k->judul}} 
				                	@endif  
				                </strong>
				                <br> 
				                <small>{{substr($k->isi_berita,0,200)}}...</small>
				            </div> 
				    	</a>
				    </div>
					
			@endforeach
			</div>
			<div class="button_cont" align="center"><a class="example_e" href="/status/3">Lihat Selengkapnya</a></div>
			</td>
			    </tr> 
		  </tbody>
		</table>	
	</div>
</div>

<!-- FOTO JOGJA-->
<div class="row">
	<div class="col-12">
		<table class="table">
			  <thead>
			    <tr>
			      <th colspan="2">Foto Jogja</th>
			    </tr>
			  </thead>
			  <tbody class="ukh">
			  </tbody>
			</table>
		</div>
	</div>
<div class="bd-example img">
			<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				</ol>
				<a href="">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="row">
							<div class="col-8">
								
									<tbody class="ukh">
			    				<tr >
			      					<td>
						<img src="/img/foto/sunset.jpg" class="d-block w-100" height=500px alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h2><b>Sunset di Embung Nglanggeran Gunung Kidul</b></h2>
							<p>Administrator 16 November 2019</p>
						</div>
					</td>
				</tr>
			</tbody>
		
	</div>
	<div class="col-4">
			<tbody class="ukh">
				<tr>
			      	<td><img src="/img/foto/cahaya.jpg" class="d-block w-100" height=165px alt="...">
						<div class="top-centered carousel-caption d-none d-md-block">
							<h5><b>Cahaya Surga Air Terjun Banyunibo – Gedangsari Gunungkidul</b></h5>
						</div></td>
			    </tr>
			    <tr>
			      	<td><img src="/img/foto/air.jpg" class="d-block w-100" height=165px alt="...">
						<div class=" centered caption carousel-caption d-none d-md-block">
							<h5><b>Air terjun Srigethuk – Gunungkidul</b></h5>
						</div>
					</td>
			    </tr>
			    <tr>
			      	<td><img src="/img/foto/ngandong.jpg" class="d-block w-100" height=165px alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5><b>Pantai Ngandong – Tepus, Gunungkidul</b></h5>
						</div></td>
			    </tr>
			</tbody>
			</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-8">
								
									<tbody class="ukh">
			    				<tr >
			      					<td>
						<img src="/img/foto/selfi.jpg" class="d-block w-100" height=500px alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h2><b>Selfi – Alun alun Selatan Keraton Yogyakarta</b></h2>
							<p>Administrator 16 November 2019</p>
						</div>
					</td>
				</tr>
			</tbody>
		
	</div>
	<div class="col-4">
			<tbody class="ukh">
				<tr>
			      	<td><img src="/img/foto/dolanan.jpg" class="d-block w-100" height=165px alt="...">
						<div class="top-centered carousel-caption d-none d-md-block">
							<h5><b>Dolanan Gangsing – Candi Prambanan</b></h5>
						</div></td>
			    </tr>
			    <tr>
			      	<td><img src="/img/foto/gunungan.jpg" class="d-block w-100" height=165px alt="...">
						<div class="centered carousel-caption d-none d-md-block">
							<h5><b>Gunungan – Alun alun Utara Keraton Yogyakarta</b></h5>
						</div></td>
			    </tr>
			    <tr>
			      	<td><img src="/img/foto/lava.jpg" class="d-block w-100" height=165px alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5><b>Wisata Lava Tour – Kawasan Wisata Merapi</b></h5>
						</div></td>
			    </tr>
			</tbody>
			</div>
						</div>
					</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-8">
								
									<tbody class="ukh">
			    				<tr >
			      					<td>
						<img src="/img/foto/watulumbung.jpg" class="d-block w-100" height=500px alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h2><b>Eksotis Pantai Watulumbung – Gunungkidul</b></h2>
							<p>Administrator November 2019</p>
						</div>
					</td>
				</tr>
			</tbody>
		
	</div>
	<div class="col-4">
			<tbody class="ukh">
				<tr>
			      	<td><img src="/img/foto/merapi.jpg" class="d-block w-100" height=165px alt="...">
						<div class="top-centered carousel-caption d-none d-md-block">
							<h5><b>Merapi & Prambanan</b></h5>
						</div></td>
			    </tr>
			    <tr>
			      	<td><img src="/img/foto/sand.jpg" class="d-block w-100" height=165px alt="...">
						<div class="centered carousel-caption d-none d-md-block">
							<h5><b>The Sand Boarding – Gumuk Pasir Parangtritis</b></h5>
						</div></td>
			    </tr>
			    <tr>
			      	<td><img src="/img/foto/prosesi.jpg" class="d-block w-100" height=165px alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5><b>Prosesi Ngguyang Jaran – Bendung Kayangan, Kulon Progo</b></h5>
						</div>
					</td>
			    </tr>
			</tbody>
	</div>
		</div>
					</div>

					</div>
				</div>
			</a>

<!--DESTINASI DAN TEMPAT WISATA-->
<div class="col">
<div class="row">
	<div class="col-6">
		<table class="table">
		  <thead>
		    <tr>
		      <th>Destinasi</th>
		    </tr>
		  </thead>
		  <tbody class="ukh">
		  	<tr>
			      	<td>
			      		<a href="homeOpen/{{$destinasi1->id_home}}&&{{$destinasi1->id_status}}">
			      		<div class="carousel-item active img">
						<img src="/img/destinasi/{{$destinasi1->gambar}}" class="d-block w-100 img" height="300px" alt="..." >
						<div class="carousel-caption d-none d-md-block">
							<h2><b>{{$destinasi1->judul}}</b></h2>
							<p>Puncak Sosok</p>
						</div>
					</div>
				</a>
			      	</td>
			 </tr> 
			 @foreach($destinasiall as $d)
		    <tr>
		      	<td>
		      		<a href="homeOpen/{{$d->id_home}}&&{{$d->id_status}}" style="text-decoration:none; color:#363a40">
		      		<div class="card mb-3 cards1" style="min-height: 220px; ">
					  <div class="row no-gutters">
					    <div class="col-md-4"><br>
					      <img src="/img/destinasi/{{$d->gambar}}" class="card-img" height=150px alt="..." >
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">{{$d->judul}}</h5>
					        <p class="card-text">{{substr($d->isi_berita,0,100)}}..</p>
					        <p class="card-text">
						        <small class="text-muted">
						        	{{date('d F Y',strtotime($e->waktu_upload))}} <i class="fa fa-eye" style="padding-left:5px;"> {{$d->views}}</i>
						        </small>
					        </p>
					      </div>
					    </div>
					  </div>
					</div>
				</a>
		      	</td>
		    </tr>
		    @endforeach
		    <tr>
		    	<td>
		    		<div class="button_cont" align="center"><a class="example_e" href="/status/6">Lihat Selengkapnya</a></div>
		    	</td>
		    </tr>
		  </tbody>

		</table>	
	</div>
	<div class="col-6">
		<table class="table">
		  <thead>
		    <tr>
		      <th>Desa Wisata</th>
		    </tr>
		  </thead>
		  <tbody class="ukh">
		  	<tr >
			    <td>
			    	<a href="homeOpen/{{$desa1->id_home}}&&{{$desa1->id_status}}">
			      		<div class="carousel-item active img">
						<img src="/img/desa/{{$desa1->gambar}}" class="d-block w-100" height=300px alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h2><b>{{$desa1->judul}}</b></h2>
							<p>Turi, Sleman</p>
						</div>
					</div></a>
			     </td>
			</tr>
			@foreach($desa_all as $d)
		    <tr>
		      	<td>
		      		<a href="homeOpen/{{$d->id_home}}&&{{$d->id_status}}">
		      		<div class="card mb-3 cards1" style="min-height: 220px;">
					  <div class="row no-gutters">
					    <div class="col-md-4"><br>
					      <img src="/img/desa wisata/{{$d->gambar}}" class="card-img" height=150px alt="...">
					    </div>
					    <div class="col-md-8">
					      <div class="card-body">
					        <h5 class="card-title">{{$d->judul}}</h5>
					        <p class="card-text">{{substr($d->isi_berita,0,100)}}..</p>
					        <p class="card-text"><small class="text-muted"> 
				            {{date('d F Y',strtotime($e->waktu_upload))}} <i class="fa fa-eye" style="padding-left:5px;"> {{$d->views}}</i>
					        </small></p>
					      </div>
					    </div>
					  </div>
					</div>
				</a>
		      	</td>
		    </tr>
		    @endforeach
		    <tr>
		    	<td>
		    		<div class="button_cont" align="center"><a class="example_e" href="/status/7">Lihat Selengkapnya</a></div>
		    	</td>
		    </tr>
		  </tbody>
		</table>	
	</div>
</tbody>
</table>	
</div>
</div>


<!--AKOMODASI-->
<div class="container">
<div class="row">
	<div class="col-12">
		<table class="table">
		  <thead>
		    <tr>
		      <th colspan="3">Akomodasi</th>
		    </tr>
		  </thead>
		  <tbody class="ukh">
		  <tr>
		  	<td>
		  		<div class="row">
			  	@foreach($akomodasi as $ak) 
					<div class="col-md-3 my-2">
				        <a href="homeOpen/{{$ak->id_home}}&&{{$ak->id_status}}" class="card card-experience shadow petualangan" style="text-decoration:none; color:#363a40">
				            <div class="card-body" style="min-height:100px;">
								<img src="/img/hotel/{{$ak->gambar}}" class="card-img-top" alt="..." style="height: 150px">
				            </div>
				            <div class="card-footer" style="min-height:220px;">
				                <strong>{{$ak->judul}}</strong>
				                <br> 
				                <small>{{substr($ak->isi_berita,0,200)}}...</small>
				            </div>
				        </a>
				    </div>    	
				@endforeach
				</div>
			</td>
		  </tr> 
		  <tr>
		  	<td>
		  		<div class="button_cont" align="center"><a class="example_e" href="/status/2">Lihat Selengkapnya</a></div>
		  	</td>
		  </tr>
		  </tbody>
		</table>	
	</div>
</div>
</div>
</div>
 
<footer class="page-footer font-small navd pt-4">
	@include('includes.footer')
</footer> 
 
</body> 
</html>