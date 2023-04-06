<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Namecompany;
use App\Models\About;
use App\Models\Service;
use App\Models\Ourteam;
class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatitle = Namecompany::where('part', 'title_company')->get();
        $titlecompany[] =$datatitle;

        $dataabout = About::where('part', 'about_company')->get();
        $aboutcompany[] = $dataabout;

        $servicecompany = Service::all();
        $ourteamcompany = Ourteam::all();
        return view('welcome', 
        [
        'titlecompany'=>$titlecompany[0][0], 
        'aboutcompany'=>$aboutcompany[0][0], 
        'servicecompany'=>$servicecompany,
        'ourteamcompany'=>$ourteamcompany,
        ]);
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
}
