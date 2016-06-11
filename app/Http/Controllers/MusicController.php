<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\tb_music;
use App\tb_production;
use App\tb_singer;
use Carbon\Carbon;
use Session;

class MusicController extends Controller
{
    private $m, $s, $p,$music;
    /*
    *   Create Constructor
    */
    public function __construct(tb_singer $s, tb_production $p, tb_music $m){
        $this->m = $m;
        $this->p = $p;
        $this->s = $s;

        $this->music = $this->m 
                        ->join('tb_singers', 'tb_musics.singer_id', '=', 'tb_singers.sid')
                        ->join('tb_productions', 'tb_musics.production_id', '=', 'tb_productions.pid');                       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('music/admin/music');
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
        if($request->hasFile('txtFile')) {
            $title =  $request->txtTitle;
            $s =  $request->txtSinger;
            $production =  $request->txtProduction;
            $vol =  $request->txtVol;
            $music = $this->music->where('singer_name', $s)->first();
            $file = $request->file('txtFile');
            $extension = $file->getClientOriginalExtension();
            $filename = 'munamuth_'.sha1(Carbon::now()).'.'.$extension;
            $path ='public/music/'.$vol.'/';

            echo $music->sid;
            if($extension == "mp3") {
                $this->m->music_title = $title;
                $this->m->music_location = $path.$filename;
                $this->m->singer_id = $music->sid;
                $this->m->production_id = $music->pid;
                $this->m->vol = $vol;
                $this->m->created_at = Carbon::now();
                $this->m->updated_at = Carbon::now();

                $file->move($path,$filename);
                $this->m->save();
                return back();
            } else{
                echo '<script>alert("mp3 file only")</script>';                
            }
        }   else{
            echo '<script>alert("can not get file")</script>';
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
            $music = $this->music->where('mid', $id)->first();
        if(!$music) {
            return response()->json([
                'STATUSE' => false,
                'MESSAGE' => 'Request not found',
                'CODE' => 404
            ]);
        } else {
            return response()->json([
                'STATUS' => true,
                'MESSAGE' => 'Record found',
                'MUSIC'  => $music
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $my_id = preg_replace('#[^0-9]#', '', $id);
        $music = $this->music->where('mid', $my_id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /*show all music
    */
    public function all(){  
        $singer = $this->s->get();       
        $production = $this->p->get();       
        $music = $this->music->orderBy('mid','desc')->get();       
        if(!$singer) {
            return response()->json([
                'STATUSE' => false,
                'MESSAGE' => 'Request not found',
                'CODE' => 404
            ]);
        } else {
            return response()->json([
                'STATUS' => true,
                'MESSAGE' => 'Record found',
                'SINGER'  => $singer,
                'PRODUCTION'  => $production,
                'MUSIC'  => $music,
            ]);
        }

    }
}
