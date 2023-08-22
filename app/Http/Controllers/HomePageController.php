<?php

namespace App\Http\Controllers;

use App\HomePage;
use App\Status;
use App\User;
use Auth;
use App\Rating;
use App\Comment;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homepages = HomePage::all();
        
        $beritabaru = Homepage::all()->where('id_status',1)->sortByDesc('id_home')->take(2);
        $event1= Homepage::all()->where('id_status',8)->sortByDesc('id_home')->first();
        $eventall=Homepage::where('id_status',8)->paginate(4)->sortByDesc('id_home');
        
        $kuliner1=Homepage::all()->where('id_status',3)->sortByDesc('id_home')->take(4);
        
        $destinasi1=Homepage::all()->whereIn('id_status',[4,5,6])->sortByDesc('id_home')->first();
        $destinasiall=Homepage::all()->whereIn('id_status',[4,5,6])->sortByDesc('id_home')->take(4);

        $desa1=Homepage::all()->where('id_status',7)->sortByDesc('id_home')->first();
        $desa_all=Homepage::all()->where('id_status',7)->sortByDesc('id_home')->take(4);

        $akomodasi=Homepage::all()->where('id_status',2)->sortByDesc('id_home')->take(4);

        $statuses = Status::all();
        return view('user/homepages.index',
            compact('homepages',
                    'event1',
                    'statuses',
                    'eventall',
                    'kuliner1',
                    'destinasi1',
                    'destinasiall',
                    'desa1',
                    'desa_all',
                    'akomodasi',
                    'beritabaru'
                )); 
    }

    public function homeOpen($id_home,$id_status)
    {
        $homepages = HomePage::findOrFail($id_home);
        $homepages->increment('views');
        $user = User::all();
        $uploader = User::All()->where('id_user',$homepages->id_uploader)->first();
        $homeall = HomePage::All()->take(4);
        $status = Status::findOrFail($id_status);
        $cnew = Comment::where('id_home',$id_home)->get();
        $cn = count($cnew);
        // $rating = Rating::where(['id_user',Auth::user()->id_user],['id_home',$homepages]);
        if (is_null(Auth::user())){
            $rating = Rating::all()->first();
        }
        else{
            $rating = Rating::where([
            ['id_home',$id_home],
            ['id_user',Auth::user()->id_user]
            ])->first();
        }
        
        $tRating = Rating::where('id_home',$id_home)->get();

        $totalRate = count($tRating);

        $comments = Comment::join('users','users.id_user','=','comments.id_user')->where('id_home',$id_home)->orderBy('id_komentar')->get();
        return view('user/homeOpen.index',compact('homepages','homeall','status','uploader','comments','user','cn','rating','totalRate','tRating'));
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $homepages = HomePage::where('judul','like',"%".$cari."%")->paginate(8);
        $nm = Status::all();
        return view('user/homeOpen.search',compact('homepages','nm'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit($id_home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage,$id_home)
    { 

    }

    public function comment(Request $request)
    { 
        // dd($request->id_user);
        $h= Homepage::findOrFail($request->id_home);
        $h->increment('banyak_komentar');
        Comment::create(["id_user"=>$request->id_user,
            "isi_komentar"=>$request->isi_komentar,
            "id_home"=>$request->id_home]);
        return redirect()->back();
    }

    


    public function uploadRating(Request $request)
    {
        $rtCheck = Rating::all()->where(['id_user',$request->id_user],['id_home',$request->id_home])->first(); 
        //dd($rtCheck);
        if($rtCheck==null){  
            // dd($rtCheck);
            Rating::create(["jumlah"=>$request->rating,
                            "id_home"=>$request->id_home,
                            "id_user"=>$request->id_user]);
            $hp = HomePage::findOrFail($request->id_home);
            $avgStar = Rating::where('id_home',$request->id_home)->avg('jumlah');
            $hp->rating =  $avgStar;
            $hp->save();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}
