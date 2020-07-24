<!DOCTYPE html>
<html lang="en">

<head>
<style>
div.ex1 {
  background-color;
  width: 90%;
  height: 150px;
  overflow: auto;
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style type="text/css">
  	i .fa-star {
  		background-color: yellow;
  	}
  </style>
</head>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav> 
  <!-- Page Wrapper -->
  <div id="wrapper"  style="width: 85%; margin-left: 7.5%"> 
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Average Rate</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" align="center">
                      	<i class="fas fa-star fa-2x"></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<br>
                      	<h3 align="center">{{$dashPengurus->rating}}</h3>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Views</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dashPengurus->views}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-eye fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"></div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          
                        </div>
                        <div class="col"> 
                          <center>
                            <i class="fa fa-pencil fa-3x" aria-hidden="true"></i>
                            </center>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"> <a class="btn btn-info btn-sm" href="/crud/{{$dashPengurus->id_home}}/edit">Edit</a> 
                            </div> 
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Comments</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Positif : {{count($komenbagus)}}
                        <br>
                        Negatif : {{count($komenjelek)}}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
 

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-7">
              <div class="card shadow mb-4" style="min-height: 750px">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">{{$dashPengurus->judul}}</h6>
                  <div class="dropdown no-arrow">
                 
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body" align="justify">
                	<img src="/img/{{$nm->nama_status}}/{{$dashPengurus->gambar}}" class="d-block w-100" height=400px alt="...">
                	<br>
 						{{$dashPengurus->isi_berita}}
                </div>

                <div class="card shadow mb-4" style="width: 90%;margin-left: 5%">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Positive comments</h6>
                  <div class="dropdown no-arrow"> 
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                <div class="ex1" style="margin-left: 20px; padding: 2%;">
                  <div id="comments-wrapper">
                            @foreach($komenbagus as $c)
                            @if($c->admin==1) 
                            <div hidden="">{{$nama = 'admin'}}</div>
                            @elseif($c->admin==2) 
                            <div hidden="">{{$nama = 'user'}}</div>
                            @else 
                            <div hidden="">{{$nama = 'panitia'}}</div>
                            @endif
                            <div class="comment clearfix">
                                <img src="/img/profile/{{$nama}}/{{$c->gambar}}" alt="" class="profile_pic">
                                <div class="comment-details">
                                  <span class="comment-name">{{$c->nama}}</span>

                                  <span class="comment-date">{{$c->created_at}}</span>
                                  <p>{{$c->isi_komentar}}</p>
                                </div>
                              </div>
                              @endforeach
                            </div>

                </div>
                     
                </div>
              </div>
                              <div class="card shadow mb-4" style="width: 90%;margin-left: 5%">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Negative comments</h6>
                  <div class="dropdown no-arrow"> 
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                <div class="ex1" style="margin-left: 20px; padding: 2%;">
                  <div id="comments-wrapper">
                            @foreach($komenjelek as $c)
                            @if($c->admin==1) 
                            <div hidden="">{{$nama = 'admin'}}</div>
                            @elseif($c->admin==2) 
                            <div hidden="">{{$nama = 'user'}}</div>
                            @else 
                            <div hidden="">{{$nama = 'panitia'}}</div>
                            @endif
                            <div class="comment clearfix">
                                <img src="/img/profile/{{$nama}}/{{$c->gambar}}" alt="" class="profile_pic">
                                <div class="comment-details">
                                  <span class="comment-name">{{$c->nama}}</span>

                                  <span class="comment-date">{{$c->created_at}}</span>
                                  <p>{{$c->isi_komentar}}</p>
                                </div>
                              </div>
                              @endforeach
                            </div>

                </div>
                     
                </div>
              </div>

              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-5 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Maps</h6>
                  <div class="dropdown no-arrow"> 
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body"> 
                  	<div style="overflow: hidden; max-height:300px">
                  		{!!$dashPengurus->alamat_maps!!}
                  	</div>
                     
                </div>
              </div>
               <div class="card shadow mb-4" >
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Rating Status</h6>
                </div> 
                <div class="card-body" style="scale:.7; font-size: 20px;  padding:0px;">
                  <h4 class="small font-weight-bold">
                  		<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                  <span class="float-right">{{number_format($totalRating5,1)}}%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$totalRating5}}%" ></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i> 
                  	<span class="float-right">{{number_format($totalRating4,1)}}%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$totalRating4}}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                  	    <i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i> 
                  <span class="float-right">{{number_format($totalRating3,1)}}%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$totalRating3}}%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      	<i class="fas fa-star fa-2x "></i>
                      	<i class="fas fa-star fa-2x "></i> 
                  	<span class="float-right">{{number_format($totalRating2,1)}}%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$totalRating2}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">
                      	<i class="fas fa-star fa-2x "></i> 
                  	<span class="float-right">{{number_format($totalRating1,1)}}%</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$totalRating1}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div> 
            </div>
            </div>

          </div> 
<!--           <div class="row">  
            <div class="col-lg-6 mb-4">
 
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                </div>
              </div>
 
            </div>
          </div> -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
 

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 
<footer class="page-footer font-small mdb-color pt-4 navd">
  @include('includes.footer')
</footer>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
