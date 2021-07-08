<?php

namespace App\Http\Controllers;

use App\Models\CreateTicketCard;
use App\Models\createTicketLable;
use Illuminate\Http\Request;
use App\Models\CreateWorkspace;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\CreateTicketTransection;
use App\Models\CreateWorkspaceProjects;
use App\Models\members;
use App\Models\User;
use CreateCreateWorkspaceProjectsTable;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Role::create(['name' => 'writer']);
        // Permission::create(['name' => 'write post']);


        // $permission = Permission::create(['name' => 'update post']);

        // $role = Role::findById(1);
        // // $permission = Permission::findById(1);
        // // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // auth()->user()->givePermissionTo('edit post');
        // auth()->user()->assignRole('writer');


        // return View('dashboard');
    }
    public function show()
    {

        $userid = Auth::user()->id;
        $workspace = CreateWorkspace::where('user_id', $userid)->get()->all();
        $workspaceId = CreateWorkspace::where('user_id', $userid)->select('id')->first();
        if (isset($workspaceId)) {
            $workspaceId_id = $workspaceId->id;
            $workspaceprojects = CreateWorkspaceProjects::where('workspace_id', $workspaceId_id)->first();
            $currentmembers = CreateWorkspaceProjects::with(['users' => function ($q) use ($workspaceprojects) {
                $q->where('create_workspace_projects_id', $workspaceprojects->id);
            }])
                ->whereHas('users', function ($query) use ($workspaceprojects) {
                    $query->where('create_workspace_projects_id', $workspaceprojects->id);
                })->get()->pluck('users');
        } else {
            $workspaceprojects = CreateWorkspaceProjects::whereHas('users', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->first();
            $workspace = CreateWorkspace::where('id', $workspaceprojects->workspace_id)->get()->all();
            $currentmembers = CreateWorkspaceProjects::with(['users' => function ($q) use ($workspaceprojects) {
                $q->where('create_workspace_projects_id', $workspaceprojects->id);
            }])
                ->whereHas('users', function ($query) use ($workspaceprojects) {
                    $query->where('create_workspace_projects_id', $workspaceprojects->id);
                })->get()->pluck('users');
        }
        $tickets = CreateTicketTransection::orderBy('id', 'ASC')->get()->all();
        $cards = CreateTicketCard::with('users')->get();
        $members = user::get()->all();
        $lables = createTicketLable::get()->all();
        return View('dashboard')->with(compact('workspace', 'lables', 'workspaceprojects', 'tickets', 'cards', 'currentmembers',  'members'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}