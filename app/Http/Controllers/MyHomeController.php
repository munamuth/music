<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tb_singer;
use App\tb_production;
use App\tb_music;

class MyHomeController extends Controller
{
    private $p, $s, $m, $music;
    public function __construct(tb_music $m, tb_production $p, tb_singer $s){
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
        return view('/music/user/index');
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
    public function edit($id)
    {
        //
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
