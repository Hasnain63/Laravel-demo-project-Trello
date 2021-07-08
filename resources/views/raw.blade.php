@extends('layouts.layout')
@section('content')
<!-- Lists container -->
<div class="main">
    <div class="content">
        <div class="dash">
            <div id="board" class="board">
                <div class="column" id="column1" ondrop="drop(this, event)" ondragover="allowDrop(event)">
                    <div class="box" style="z-index:1000" draggable="true" id="box1" ondragstart="drag(event)">
                        <!-- <div class="box-header">
                            Task To Do
                        </div> -->
                        <div class="">
                            <a class="add-card-btn btn" href="#"><span class="placeholder"><span><i
                                            class="fas fa-plus"></i></span>Add a list</span></a>
                        </div>
                        <!-- <div class="">
                            <button class="add-card-btn btn"><i class="fas fa-plus"> </i> Add a
                                List</button>
                        </div> -->

                        <!-- <div class="box-body">

                            <div class="card" id="card1" draggable="true" ondragstart="drag(event)">


                                <div class="card-body">Body1</div>

                            </div>
                            <div class="card" id="card2" draggable="true" ondragstart="drag(event)">

                                <div class="card-body">Body2</div>

                            </div>
                            <div class="card" id="card3" draggable="true" ondragstart="drag(event)">

                                <div class="card-body">Body3</div>

                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="add-card-btn btn">Add a card</button>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="column" id="column2" ondrop="drop(this, event)" ondragover="allowDrop(event)">
                    <div class="box" draggable="true" id="box2" ondragstart="drag(event)">
                        <div class="box-header">
                            Doing
                        </div>
                        <div class="box-body">
                            <div class="card" id="card4" draggable="true" ondragstart="drag(event)">

                                <div class="card-body">Body4</div>

                            </div>
                            <div class="card" id="card5" draggable="true" ondragstart="drag(event)">

                                <div class="card-body">Body5</div>

                            </div>
                            <div class="card" id="card6" draggable="true" ondragstart="drag(event)">

                                <div class="card-body">Body6</div>

                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="add-card-btn btn">Add a card</button>
                        </div>
                    </div>
                </div>
                <div class="column" id="column3" ondrop="drop(this, event)" ondragover="allowDrop(event)">
                    <div class="box" draggable="true" id="box3" ondragstart="drag(event)">
                        <div class="box-header">
                            Done
                        </div>
                        <div class="box-body">
                            <div class="card" id="card7" draggable="true" ondragstart="drag(event)">

                                <div class="card-body">Body7</div>

                            </div>
                            <div class="card" id="card8" draggable="true" ondragstart="drag(event)">

                                <div class="card-body">Body8</div>

                            </div>
                            <div class="card" id="card9" draggable="true" ondragstart="drag(event)">

                                <div class="card-body">Body9</div>

                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="add-card-btn btn">Add a card</button>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

    </div>

</div>
<!-- End of lists container  -->
@endsection



PS C:\xampp\htdocs\Trello> php artisan make:migration create_create_workspace_projects_users_table --create
--table=create_workspace_projects_users
Created Migration: 2021_07_03_152901_create_create_workspace_projects_users_table
PS C:\xampp\htdocs\Trello> php artisan migrate
Migrating: 2021_07_03_152901_create_create_workspace_projects_users_table