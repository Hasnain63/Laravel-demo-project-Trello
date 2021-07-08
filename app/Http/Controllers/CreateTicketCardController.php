<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateWorkspace;
use App\Models\CreateTicketCard;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateTicketTransection;
use App\Models\CreateWorkspaceProjects;
use CreateCreateTicketTransectionsTable;
use Illuminate\Support\Facades\Validator;

class CreateTicketCardController extends Controller
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
            $workspaceTicketId = CreateTicketTransection::where('workspaceProjects_id', $workspaceProjactId->id)->select('id')->first();
            $ticketCard = new CreateTicketCard();
            $ticketCard->title = $request->title;
            $ticketCard->workspace_id = $workspaceId->id;
            $ticketCard->ticketTransection_id = $request->ticketTransection_id;
            $ticketCard->workspaceProjects_id = $workspaceProjactId->id;
            $ticketCard->user_id = Auth::user()->id;
            $ticketCard->save();
            $request->Session()->flash('message', 'Ticket Created Successfully!');
            return response()->json($ticketCard);
        }
    }

    public function addCardmembers(Request $request)
    {
        $ticketCard = CreateTicketCard::find($request->cardId);
        $ticketCard->users()->attach($request->members);
        return response()->json(true);
    }


    public function descriptionUpdate($id, Request $request)
    {

        $CardDescription = CreateTicketCard::find($id)->update(['description' => $request->description]);
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreateTicketCard  $createTicketCard
     * @return \Illuminate\Http\Response
     */
    public function show(CreateTicketCard $createTicketCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreateTicketCard  $createTicketCard
     * @return \Illuminate\Http\Response
     */
    public function edit(CreateTicketCard $createTicketCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreateTicketCard  $createTicketCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreateTicketCard $createTicketCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreateTicketCard  $createTicketCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreateTicketCard $createTicketCard)
    {
        //
    }
}