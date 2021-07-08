<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateWorkspace;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateWorkspaceProjects;
use Illuminate\Support\Facades\Validator;

class CreateWorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.layout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            // error
            return redirect('CreateWorkspacePage')->withErrors($validator)->withInput();
        } else {
            // data sve in db

            $workspace = new CreateWorkspace;
            $workspace->name = $request->name;
            $workspace->description = $request->description;
            $workspace->user_id = $request->user()->id;
            $workspace->save();
            $request->Session()->flash('msg', 'WorkSpace Created Successfully!');
            return redirect('CreateWorkspacePage');
        }
    }
    public function  setWorkspace($id)
    {
        $workspace = CreateWorkspace::find($id);
        $workspace->default_workspace = 1;
        $workspace->save();
        CreateWorkspace::where('id', '!=', $id)->where('user_id', Auth::user()->id)->update(['default_workspace' => 0]);

        return response()->json(true);
    }
    public function addmembers(Request $request)
    {
        $workspaceProject = CreateWorkspaceProjects::find($request->projectid);
        $workspaceProject->users()->attach($request->members);
        return response()->json(true);
    }
}