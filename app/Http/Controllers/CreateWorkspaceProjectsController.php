<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateWorkspace;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateWorkspaceProjects;
use Illuminate\Support\Facades\Validator;

class CreateWorkspaceProjectsController extends Controller
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
    public function create(Request $request)
    {
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
            return redirect('CreateWorkspacePage')->withErrors($validator)->withInput();
        } else {
            // data sve in db
            $workspaceId = CreateWorkspace::where('user_id', Auth::user()->id)->select('id')->first();

            $workspaceproject = new CreateWorkspaceProjects;
            $workspaceproject->title = $request->title;
            $workspaceproject->workspace_id = $workspaceId->id;
            $workspaceproject->user_id = Auth::user()->id;
            $workspaceproject->save();
            // $request->Session()->flash('msg', 'WorkSpace Project Created Successfully!');
        }
    }
}