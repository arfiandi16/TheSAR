<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\HomePage;
use App\Status;
use App\User;
use App\Comment;
use App\Rating;
use Auth;

class CRUDAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $highToLow=1;
        $homepages = HomePage::select('home_pages.gambar as gambarHP','home_pages.*','statuses.*','users.*')->join('users','id_user','=','id_uploader')->join('statuses','statuses.id_status','=','home_pages.id_status')->where('home_pages.id_status',7)->paginate(10); 
         // dd($homepages);
        return view('panitia/homePanitia.index',compact('homepages','highToLow'));
    }

    public function orderByrating($highToLow){
        if($highToLow==1){
         $homepages = HomePage::select('home_pages.gambar as gambarHP','home_pages.*','statuses.*','users.*')->join('users','id_user','=','id_uploader')->join('statuses','statuses.id_status','=','home_pages.id_status')->where('home_pages.id_status',7)->orderBy('rating','ASC')->paginate(10);            
            $highToLow=0;
        }
        else{
        $homepages = HomePage::select('home_pages.gambar as gambarHP','home_pages.*','statuses.*','users.*')->join('users','id_user','=','id_uploader')->join('statuses','statuses.id_status','=','home_pages.id_status')->where('home_pages.id_status',7)->orderBy('rating','DESC')->paginate(10); 
            $highToLow=1;
        }
        return view('panitia/homePanitia.index',compact('homepages','highToLow'));
    }

    public function create()
    {
        $homepages = HomePage::all();
        $statuses = Status::all();
        return view('panitia/homePanitia.create',compact('homepages','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'waktu_upload' => 'required',
            'id_uploader' => 'required',
            'id_status' => 'required',
            'isi_berita' => 'required', 
        ]);
        $nama_status = Status::all()->where('id_status',$request->id_status)->first();  
        if($request->hasFile('gambar')){
            $image = $request->file('gambar'); 
            $new_image = date('YmdHis')."-".$image->getClientOriginalName();
            $image->move(public_path("img/{$nama_status->nama_status}"), $new_image);
            
            HomePage::create(["judul"=>$request->judul,
                "gambar"=>$new_image,
                "waktu_upload"=>$request->waktu_upload,
                "id_uploader"=>$request->id_uploader,
                "id_status"=>$request->id_status,
                "isi_berita"=>$request->isi_berita,
                "alamat_maps"=>$request->alamat_maps
            ]);
            if(Auth::user()->admin==1){
                return redirect('/crud');
            }
            else{

                return redirect('/dashboard');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_home)
    {
        $homepages =HomePage::findOrFail($id_home);
        $statuses = Status::all();
        $stat = Status::all()->where('id_status',$homepages->id_status)->first();  
        return view('panitia/homePanitia.edit',compact('homepages','statuses','stat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_home)
    {

        $request -> validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'waktu_upload' => 'required',
            'id_uploader' => 'required',
            'id_status' => 'required',
            'isi_berita' => 'required'
        ]);

        $datas = HomePage::findOrFail($id_home);
        $nama_status = Status::all()->where('id_status',$request->id_status)->first();  
        if($request->hasFile('gambar')){ 
            $image = $request->file('gambar'); 
            $new_image = $image->getClientOriginalName();
            $image->move(public_path("img/{$nama_status->nama_status}"), $new_image);
            $datas->gambar = $new_image;
        }

        $datas->judul = $request->judul;
        $datas->id_status = $request->id_status;
        $datas->isi_berita = $request->isi_berita;
        $datas->alamat_maps = $request->alamat_maps;
        $datas->id_uploader = $request->id_uploader;
        $datas->waktu_upload = $request->waktu_upload;
        $datas->save();
        return redirect('/dashboard')->with('success', 'Data telah berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_home)
    {
        $homepages = HomePage::findOrFail($id_home);
        $comment = Comment::where('id_home',$id_home);
        $rating = Comment::where('id_home',$id_home);
        $rating = Rating::where('id_home',$id_home);
        $rating->delete();
        $comment->delete();
        $homepages->delete();
        return redirect('/crud')->with('success', 'data telah dihapus');
    }

    public function verif($id_user){
        $users = User::findOrFail($id_user);
        return view('admin.verif',compact('users'));
    }
    public function verifTerima(Request $request, $id_user)
    {
        $user = User::findOrFail($id_user);
        $user->verification = 1; 
        $user->save();
        return redirect('/home')->with('success', 'Panitia telah berhasil diedit');
    }
    public function verifTolak($id_user)
    {
        $user = User::findOrFail($id_user);
        $user -> delete();
        return redirect('/home')-> with('success', 'Panitia telah dihapus');
    } 
 

    public function dashboard(){
        if(is_null(Auth::user())){
            return redirect('/status/7');
        }
        $statuspages = HomePage::where('id_status',7)->orderBy('rating','DESC')->get();
        $st = HomePage::where('id_status',7)->first();
        $statusall = HomePage::All();
        $id_home = $st->id_home;
        $nm = Status::findOrFail(7);


        $dashPengurus = HomePage::where([['id_uploader',Auth::user()->id_user]])->first();

        if(Auth::user()->admin==1){

            return view('dashboard.admin',compact('statuspages','statusall','nm'));
        }

        else if(Auth::user()->admin==0){ 
            if(is_null($dashPengurus)){
                $homepages = HomePage::all();
                $statuses = Status::all();
                return view('panitia/homePanitia.create',compact('homepages','statuses'));
             }
            else{
                
        $id_homeCari = HomePage::where('id_uploader',Auth::user()->id_user)->first(); 
        $id_homeRate = $id_homeCari->id_home;

           $komenbagus = Comment::join('users','users.id_user','=','comments.id_user')->where([['id_home',$id_homeRate],['isi_komentar','LIKE','%bagus%']])->orwhere([['id_home',$id_homeRate],['isi_komentar','LIKE','%keren%']])->orwhere([['id_home',$id_homeRate],['isi_komentar','LIKE','%mantab jiwa%']])->orwhere([['id_home',$id_homeRate],['isi_komentar','LIKE','%mantab%']])->get(); 
           $komenjelek = Comment::join('users','users.id_user','=','comments.id_user')->where([['id_home',$id_homeRate],['isi_komentar','LIKE','%jelek%']])->orwhere([['id_home',$id_homeRate],['isi_komentar','LIKE','%tidak puas%']])->orwhere([['id_home',$id_homeRate],['isi_komentar','LIKE','%kurang puas%']])->orwhere([['id_home',$id_homeRate],['isi_komentar','LIKE','%buruk%']])->get();  


           $ratingb1 = Rating::where([['id_home',$id_homeRate],['jumlah',1.00]])->get();
           $ratingb2 = Rating::where([['id_home',$id_homeRate],['jumlah',2.00]])->get();
           $ratingb3 = Rating::where([['id_home',$id_homeRate],['jumlah',3.00]])->get();
           $ratingb4 = Rating::where([['id_home',$id_homeRate],['jumlah',4.00]])->get();
           $ratingb5 = Rating::where([['id_home',$id_homeRate],['jumlah',5.00]])->get();
 
           $ratingAll = Rating::where('id_home',$id_homeRate)->get();
           if((count($ratingAll))==0){
             $a=1;
            } 
           else{
            $a= count($ratingAll);
            }
           $totalRating1 = (count($ratingb1)/$a)*100; 
           $totalRating2 = (count($ratingb2)/$a)*100; 
           $totalRating3 = (count($ratingb3)/$a)*100; 
           $totalRating4 = (count($ratingb4)/$a)*100; 
           $totalRating5 = (count($ratingb5)/$a)*100; 

        
                return view('dashboard.pengurus',compact('dashPengurus','statusall','nm','totalRating1','totalRating2','totalRating3','totalRating4','totalRating5','komenbagus','komenjelek'));
            }
        }
        else{

            return redirect('/status/7');
        }
        
    }
}
