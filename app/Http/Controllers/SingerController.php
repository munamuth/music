<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\VerifyCsrfToken;

use App\Http\Requests;
use App\tb_singer;
use Carbon\Carbon;

class SingerController extends Controller
{

     private $m, $s, $p,$music;
    /*
    *   Create Constructor
    */
    public function __construct(tb_singer $s) {
        $this->s = $s;
                       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('music/admin/singer');
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
        $this->s->singer_name = $request->txtName;
        $this->s->sex = $request->txtSex;
        $this->s->created_at = Carbon::now();
        $this->s->updated_at = Carbon::now();

        $this->s->save();
        return back();
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
}
