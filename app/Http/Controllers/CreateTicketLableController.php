<?php

namespace App\Http\Controllers;

use App\Models\createTicketLable;
use Illuminate\Http\Request;

class CreateTicketLableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


        $lables = new createTicketLable();
        $lables->title = $request->title;
        $lables->color_name =  $request->color_name;
        $lables->save();
        return response()->json($lables);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\createTicketLable  $createTicketLable
     * @return \Illuminate\Http\Response
     */
    public function edit(createTicketLable $createTicketLable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\createTicketLable  $createTicketLable
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\createTicketLable  $createTicketLable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, createTicketLable $createTicketLable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\createTicketLable  $createTicketLable
     * @return \Illuminate\Http\Response
     */
    public function destroy(createTicketLable $createTicketLable)
    {
        //
    }
}