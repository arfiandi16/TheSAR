<!doctype html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <link rel="stylesheet" href="{{asset('/css/jquery.rateyo.css')}}"/>
  <script src="{{asset('/js/jquery.js')}}"></script>
  <script src="{{asset('/js/jquery.rateyo.js')}}"></script>
	<title>Mantou - Sleman Tour</title> 
</head> 
<style type="text/css">
  .rating-card{
  padding:3px;
  background-color:#F5F5F5;
  width:100%;
  border-radius:10px;
  text-align: center;
  margin: 0 auto; 
  box-shadow: 2px 2px 5px -2px #337AB7;
}
.fa-star,.fa-star-o{
  color:orange;
}
.rating-card h1{
  color:#337AB7;
  margin-bottom:10px;
} 
}
.rating p{
  margin-top:10px;
  font-size: 20px; 
}
.rating h2{
  margin:0px;
  font-size:10px;
  font-weight: normal;
}
.rating-process{
  width: 100%;
  text-align: left;
  float:right;
}
.rating-right-part{
  margin-bottom:3px;
}
.rating-right-part p{
  margin:0px;
}
.progress,.progress-2,.progress-3,.progress-4,.progress-5{
    background:#c2c2c2;
    border-radius: 13px;
    height:18px;
    width:75%; 
    margin:-20px 0px 0px 50px;
    display: block;
}
.progress:after,.progress-2:after,.progress-3:after,.progress-4:after,.progress-5:after{
    content: '';
    display: block;
    background: #337AB7;
    width:0%;
    height: 100%;
    border-radius: 9px;
}
.progress-2:after{ 
}
.progress-3:after{ 
}
.progress-4:after{ 
}
.progress-5:after{ 
}
@media (min-width:230px) and (max-width:640px){
  .rating{
    width: 100%;
  }
  .rating-process{
    width:100%;
  } 
}
</style>
<body> 
		<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color navd fixed-top">
  @include('includes.nav')
</nav> 
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Rating</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
                @guest
                @if (Route::has('register'))
                <center>Anda Login Dulu</center>
                @endif
                @else
                @if(!$rating)
                  <form action="/rate/{{$homepages->id_home}}&&{{Auth::user()->id_user}}" method="POST">
                        @csrf
                        <div class="modal-body">
                          <bdo dir="rtl">
                            <div class="rate">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
                        </bdo> 
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form> 
                    @else
                    <center>anda sudah memberikan rating ;)</center>
                    @endif
                @endguest
              
          </div>
        </div>
      </div>

	<div class="container" style="background-color: white;opacity: 0.95;"> 
    <div class="row">
    	<div class="col-12">  
            <h1 align="center">{{$homepages->judul}}</h1>
            <center>
                  <small> 
                      By <b>{{$uploader->nama}}</b> - {{date('d F Y',strtotime($homepages->waktu_upload))}}
                      <i class="fa fa-eye" style="padding-left:5px;"> {{$homepages->views}} </i>
                  </small> 
                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                           Rate this
                        </button> 
                    <div id="rateYo" style="pointer-events: none;"></div>  
                      <h2>{{$homepages->rating}}</h2> 
            </center>
    		<table class="table" border="0">

    			  <tbody class="ukh">
    			    <tr >
    			      	<td width="70%">  
    							<img src="/img/{{$status->nama_status}}/{{$homepages->gambar}}" class="d-block w-100" height=400px alt="..."> 
                  <br>
    								<p align="justify">{{$homepages->isi_berita}}</p>
                    <br>
                    <div align="center">
                      {!!$homepages->alamat_maps!!}
                    </div>
                    <br>
                    <br>

                        <h2><span id="comments_count">{{$cn}}</span> Comment(s)</h2>
                          <hr>
                          <!-- comments wrapper -->
                        
                          <div id="comments-wrapper">
                            @foreach($comments as $c)
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
                    <br>
                    @guest
                @if (Route::has('register'))

                  @endif
                  @else
                  <form method="POST" action="/add_comment/{{$homepages->id_home}}&&{{Auth::user()->id_user}}">
                      @csrf

                          <div class="form-group" hidden="">
                              {{Auth::user()->nama}}
                          </div>
                          <div class="form-group" hidden="">
                              {{date("d/m/y h:i:s")}}
                          </div>
                          <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_komentar" placeholder="Isi komentar...."></textarea>
                          </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                    </form>

                @endguest


                    
                    </td>
                        <td>
                        <table align="center"> 
                        @foreach($homeall as $h) 
                            <tr>
                                <td style="line-height:top">
                                  <a href="/homeOpen/{{$h->id_home}}&&{{$h->id_status}}"><img src="/img/header/{{$h->gambar}}" width="100px" style="float: left;" height=80px></a> </td>
                                <td> 
                                <h6>{{$h->judul}} </h6> 
                                <small> {{date('d F Y',strtotime($h->waktu_upload))}}</small> 
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                          <td colspan="2">
                           <!--  <div class="rating-card">
                              <div><h1>Total Rating</h1></div>
                              <div class="rating">
                                <div id="rateYoPage" style="pointer-events: none; margin:0 30%;"></div> </i> {{$totalRate}} total</p>
                              </div>
                              <div class="rating-process">
                                <div class="rating-right-part">
                                  <p><i aria-hidden="true" class="fa fa-star"></i>5 0%</p>
                                  <div class="progress"></div>
                                </div>
                                <div class="rating-right-part">
                                  <p><i aria-hidden="true" class="fa fa-star"></i>4 0%</p>
                                  <div class="progress-2"></div>
                                </div>
                                <div class="rating-right-part">
                                  <p><i aria-hidden="true" class="fa fa-star"></i>3 0%</p>
                                  <div class="progress-3"></div>
                                </div>
                                <div class="rating-right-part">
                                  <p><i aria-hidden="true" class="fa fa-star"></i>2 0%</p>
                                  <div class="progress-4"></div>
                                </div>
                                <div class="rating-right-part">
                                  <p><i aria-hidden="true" class="fa fa-star"></i>1 0%</p>
                                  <div class="progress-5"></div>
                                </div>
                              </div>
                              <div style="clear:both;"></div>
                            </div> -->
                          </td>
                        </tr>
                        </table>
                        <td>
    			    </tr>
              <tr>
                <td style="padding-left:5%;">  

                </td>
              </tr>
    			  </tbody>

    		</table>	
    	</div>

    </div>
</div>

<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4 navd">
  @include('includes.footer')
</footer>
<script type="text/javascript">
  $(function () {
  
  $("#rateYo").rateYo({
    "rating": "{{$homepages->rating}}",
    "starWidth": "30px",
  });

  $("#rateUpload").rateYo({ 
    "starWidth": "30px",
  });
  $("#rateYoPage").rateYo({
    "rating": "{{$homepages->rating}}",
    "starWidth": "20px",
  });  

});
</script> 
 
</body> 
</html>