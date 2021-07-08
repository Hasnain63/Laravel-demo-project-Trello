<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateWorkspace;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateTicketTransection;
use App\Models\CreateWorkspaceProjects;
use Illuminate\Support\Facades\Validator;

class CreateTicketTransectionController extends Controller
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
        $validator = validator::make($request->all(), [
            'title' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            // error
            return redirect('dashboard')->withErrors($validator)->withInput();
        } else {
            // data sve in db
            $workspaceId = CreateWorkspace::where('user_id', Auth::user()->id)->select('id')->first();
            $workspaceProjactId = CreateWorkspaceProjects::where('workspace_id', $workspaceId->id)->select('id')->first();
            $ticketTransection = new CreateTicketTransection;
            $ticketTransection->title = $request->title;
            $ticketTransection->workspace_id = $workspaceId->id;
            $ticketTransection->workspaceProjects_id = $workspaceProjactId->id;
            $ticketTransection->user_id = Auth::user()->id;
            $ticketTransection->save();
            $request->Session()->flash('message', 'Ticket Created Successfully!');
            return response()->json($ticketTransection);
        }
    }
    public function show(CreateTicketTransection $createTicketTransection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreateTicketTransection  $createTicketTransection
     * @return \Illuminate\Http\Response
     */
    public function edit(CreateTicketTransection $createTicketTransection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreateTicketTransection  $createTicketTransection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreateTicketTransection $createTicketTransection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreateTicketTransection  $createTicketTransection
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreateTicketTransection $createTicketTransection)
    {
        //
    }
}