<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trello </title>
    <link href="{{asset('css/board.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="{{asset('js/drop.js')}}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Masthead -->
    <header class="masthead">

        <div class="boards-menu">

            <button class="boards-btn btn"><i class="fab fa-trello boards-btn-icon"></i>Boards</button>

            <div class="board-search">
                <input type="search" class="board-search-input" aria-label="Board Search">
                <i class="fas fa-search search-icon" aria-hidden="true"></i>
            </div>

        </div>

        <div class="logo">

            <h1><i class="fab fa-trello logo-icon" aria-hidden="true"></i>Trello</h1>

        </div>

        <div class="user-settings">

            <button class="user-settings-btn btn" aria-label="Create" data-toggle="modal"
                data-target="#exampleModalLong">
                <i class="fas fa-plus" aria-hidden="true"></i>
            </button>

            <button class="user-settings-btn btn" aria-label="Information">
                <i class="fas fa-info-circle" aria-hidden="true"></i>
            </button>

            <button class="user-settings-btn btn" aria-label="Notifications">
                <i class="fas fa-bell" aria-hidden="true"></i>

            </button>

            <a href="{{route('logout')}}" class="user-settings-btn btn" aria-label="User Settings">
                <i class="fas fa-user-circle" aria-hidden="true"></i>

            </a>

        </div>

    </header>
    <!-- End of masthead -->
    <!-- Board info bar -->
    <section class="board-info-bar">

        <div class="board-controls">

            <button class="board-title btn">
                @if(isset($workspaceprojects))
                <h2 id='projectid' pid="{{$workspaceprojects->id}}"> {{$workspaceprojects->title}} </h2>
                @endif
            </button>

            <div class="board-title btn">
                @if(isset($workspace))
                <select class="board-title-drop" id="workspace" name="workspace">
                    @foreach($workspace as $workspaces)
                    <option {{$workspaces->default_workspace==1?'selected':''}} value="{{$workspaces->id}}">
                        {{$workspaces->name}}
                    </option>
                    @endforeach
                </select>
                @endif

            </div>
            <button class="star-btn btn" aria-label="Star Board">
                <i class="far fa-star" aria-hidden="true"></i>
            </button>

            <button class="personal-btn btn">Personal</button>

            <button class="private-btn btn"><i class="fas fa-briefcase private-btn-icon"
                    aria-hidden="true"></i>Private</button>
            @if(isset($currentmembers))
            <p>
                @foreach($currentmembers[0] as $currentmember)
            <p class="member">{{$currentmember->name}}</p>


            @endforeach
            </p>
            @endif
            <button class="private-btn btn" data-toggle="modal" data-target="#invite"><i
                    class="fas fa-envelope-square private-btn-icon" aria-hidden="true"></i>Invite</button>
        </div>
        <button class="menu-btn btn"><i class="fas fa-ellipsis-h menu-btn-icon" aria-hidden="true"></i>Show
            Menu</button>
    </section>
    @yield('content');






    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Create</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button class="CreateButtton" data-toggle="modal" data-target="#createBoard" data-dismiss="modal"><i
                            class="fab fa-trello"></i><span>Create Board</span><span><br>
                            <p>A board is made up of cards ordered on lists. Use it to manage projects, track
                                information, or organize anything.</p>
                    </button>
                    <br>
                    <button class="CreateButtton" data-toggle="modal" data-target="#createWorkshop"
                        data-dismiss="modal"><i class="fas fa-user-plus"></i><span>Create Workspace</span><span><br>
                            <p>A Workspace is a group of boards and people. Use it to organize your company, side
                                hustle, family, or friends.</p>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('createproject')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Workspace Name</label>
                            <input type="text"
                                class="form-control {{($errors->any() && $errors->first('title'))?'is-invalid':''}} "
                                id="title" name="title" aria-describedby="emailHelp" placeholder="Title" required>
                            <small id="emailHelp" class="form-text text-muted">This is the name of your company ,team
                                and organization</small>
                            @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('title')}}</p>
                            @endif
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createWorkshop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Create</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('createworkspace')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Workspace Name</label>
                            <input type="text"
                                class="form-control {{($errors->any() && $errors->first('name'))?'is-invalid':''}} "
                                id="name" name="name" aria-describedby="emailHelp" placeholder="Taco's.com" required>
                            <small id="emailHelp" class="form-text text-muted">This is the name of your company ,team
                                and organization</small>
                            @if($errors->any())
                            <p class="invalid-feedback">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Worksapce Description</label>
                            <textarea class="form-control  " rows="6" id="description" name="description"
                                placeholder="Our team organize everything here "></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#createBoard"
                                data-dismiss="modal">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function() {
    $('#workspace').on('change', function() {
        let id = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'set-current-workspace/' + id,
            success: function(response) {
                location.reload();
            }
        });
    });
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>