@extends('layouts.layout')
@section('content')
<!-- Lists container -->
<div class="main">
    <div class="modal fade card-detail-window" id="invite" tabindex="-1" role="dialog" aria-labelledby="inviteTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content content-invite">
                <div class="modal-header .window-header">
                    <h5 style="text-align: center;">Invite to board</h5>
                </div>

                <div class="modal-body">
                    <form id="testing">
                        @csrf
                        <select class="js-example-basic-multiple" style="width: 100%;" name="members[]"
                            multiple="multiple">
                            @foreach($members as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Add</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div class="content">
        <div class="dash">
            <div id="board" class="board">
                @foreach($tickets as $ticket)
                <div class="column" id="column{{ $ticket->id}}">
                    <div class="box" style="z-index:1000" id="box1">
                        <div>
                            <div class="list-header-target" id="showData"> {{$ticket->title}}
                            </div>
                            @foreach($cards as $card)
                            @if($ticket->id == $card->ticketTransection_id)

                            <div class="list-card-details list-card  "
                                onClick="openmodal('{{$card->title}}','{{$ticket->title}}' ,'{{$card->description}}' ,'{{$card->id}}' ,' {{$card->users}}')"
                                id="showaCardData{{$card->id}}" data-target="#description">
                                {{$card->title}}
                                <!-- <span class="list-card-operation">

                                    <i class="fas fa-edit  icon-sm"></i>

                                </span> -->

                                @if(isset($card->users))
                                <div>
                                    @foreach($card->users as $cardmember)
                                    <p class="member ">{{$cardmember->name}}</p>


                                    @endforeach
                                </div>
                                @endif
                            </div>

                            @endif

                            @endforeach
                            <div id="ajaxCardData{{$ticket->id}}">
                            </div>
                            <form id="createCard">
                                @csrf
                                <input type="hidden" name="ticketTransection_id" value="{{ $ticket->id}}">
                                <div class="input_fields_wrap{{$ticket->id}}">
                                </div>
                            </form>
                            <div class="card-composer-container" id="add_a_list{{$ticket->id}}">
                                <a id="createInput{{$ticket->id}}" class="open-card-composer btn add_field_buttonC"
                                    value='{{$ticket->id}}' href="#"><i class="fas fa-plus"></i></span>Add
                                    a
                                    card</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="column" id="newcolumn">
                    <div class="box" style="z-index:1000" id="box1">
                        <div>
                            <div id="showData"> </div>
                            <form id="createticketTransection">
                                @csrf
                                <div class="input_fields_wrap">
                                </div>
                            </form>
                            <div class="card-composer-container" id="add_a_list">
                                <a id="createInput" class="open-card-composer add_field_button btn" href="#"><i
                                        class="fas fa-plus"></i></span>Add
                                    a
                                    list</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade card-detail-window" id="descriptionTitle" tabindex="-1" role="dialog"
        aria-labelledby="descriptionTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content content-modal">
                <div class="modal-header .window-header">
                    <div>
                        <h3> <span><i class="far fa-credit-card" id="cardTitle"> &nbsp;</i> </span> </h3>

                        <p id="ticketTitle"> </p>
                    </div>
                </div>
                <div class="container col-md-12">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-8">

                                <div id="cardMemberShow" style="padding-bottom: 20px;">
                                </div>
                                <div>
                                    <h3 class="u-inline-block" style="padding: 19px !important"> <i
                                            class="fas fa-align-left"></i> &nbsp;Description</h3>
                                </div>

                                <div id="cardDescription">

                                </div>
                                <div>
                                    <form method="POST" action="{{url('addDescription/'. $card->id)}}">
                                        @csrf
                                        <div class="form-group">
                                            <textarea type="text" class="form-control" id="description"
                                                name="description" placeholder="Add a description for Card"
                                                required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="window-sidebar">
                                    <div class="window-module u-clearfix">
                                        <h3 class="mod-no-top-margin js-sidebar-add-heading">Add to card</h3>
                                    </div>
                                    <div>
                                        <a class="button-link js-change-card-members" data-toggle="modal"
                                            data-target="#addMember" href="#" title="Members"><span> <i
                                                    class="fas fa-user"></i></span> &nbsp;<span
                                                class="js-sidebar-action-text link">Members</span></a>
                                        <a class="button-link js-change-card-members" data-toggle="modal"
                                            data-target="#addlables" href="#" title="labels"><span><i
                                                    class="fas fa-tag"></i></span> &nbsp;<span
                                                class="js-sidebar-action-text link">Labels</span></a>
                                        <a class="button-link js-change-card-members" href="#" title="Members"><span> <i
                                                    class="far fa-check-square"></i></span> &nbsp;<span
                                                class="js-sidebar-action-text link">Checklist</span></a>
                                        <a class="button-link js-change-card-members" href="#" title="Members"><span> <i
                                                    class="fas fa-clock"></i></span> &nbsp;<span
                                                class="js-sidebar-action-text link">Date</span></a>
                                        <a class="button-link js-change-card-members" href="#" title="Members"><span> <i
                                                    class="fas fa-paperclip"></i></span> &nbsp;<span
                                                class="js-sidebar-action-text link">Attachment</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade card-detail-window" id="addMember" tabindex="-1" role="dialog" aria-labelledby="inviteTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content content-addmember">
                <div class="modal-header .window-header">
                    <h5 style="text-align: center;">Add to Card Members</h5>
                </div>

                <div class="modal-body">
                    <form id="addmemberCard">
                        @csrf
                        <input type="hidden" name="cardId" id="cardId" value="">
                        <select class="js-example-basic-multiple" style="width: 100%;" name="members[]"
                            multiple="multiple">
                            @foreach($members as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Add</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade card-detail-window" id="addlables" tabindex="-1" role="dialog" aria-labelledby="inviteTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content content-addlables">
                <div class="modal-header .window-header">
                    <h5 style="text-align: center;">Add Lables</h5>
                </div>

                <div class="modal-body">
                    <form id="lables">
                        @csrf
                        <!-- <select class="js-example-basic-multiple" style="width: 100%;" name="lables[]"
                            multiple="multiple"> -->

                        @foreach($lables as $lable)
                        <option class="{{$lable->color_name}}"
                            style="width: 100%; height: 30px; text-align:center; color:white; margin-top:5px;"
                            value="{{$lable->id}}">
                            {{$lable->title}}
                        </option>
                        @endforeach
                        <!-- </select> -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Add</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <button data-toggle="modal" data-target="#addCardLable" data-dismiss="modal"
                    class="buttonLable mb-4">Create a new
                    label </button>


            </div>
        </div>
    </div>
    <div class="modal fade card-detail-window" id="addCardLable" tabindex="-1" role="dialog"
        aria-labelledby="inviteTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content content-addlablesnew">
                <div class="modal-header .window-header">
                    <h4 style="text-align: center;">Create a new
                        label </h4>
                </div>

                <div class="modal-body">
                    <form id="Cardlables">
                        @csrf

                        <div class="form-group ">
                            <label for="lableTitle">Name</label>
                            <input type="text" class="form-control-file" id="lableTitle" name="title"
                                style="width: 100%;">
                            <input type="hidden" class="form-control-file" id="lableColor" name="color_name"
                                style="width: 100%;">
                            <label>Select a color</label>
                            <div class="u-clearfix">
                                <span id="card-label-green " class="card-label mod-edit-label  card-label-green  ">
                                </span>
                                <span id="card-label-yellow " class="card-label mod-edit-label  card-label-yellow  ">
                                </span>
                                <span id=" card-label-red" class="card-label mod-edit-label  card-label-red  ">
                                </span>
                                <span id=" card-label-purple" class="card-label mod-edit-label  card-label-purple  ">
                                </span>
                                <span id="card-label-blue" class="card-label mod-edit-label  card-label-blue  ">
                                </span>
                                <span id=" card-label-sky" class="card-label mod-edit-label  card-label-sky  ">
                                </span>
                                <span id="card-label-lime" class="card-label mod-edit-label  card-label-lime  ">
                                </span>
                                <span id="card-label-pink " class="card-label mod-edit-label  card-label-pink  ">
                                </span>
                                <span id="card-label-black " class="card-label mod-edit-label  card-label-black  ">
                                </span>
                                <span id=" card-label-orange" class="card-label mod-edit-label  card-label-orange ">
                                </span>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Add</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>


            </div>
        </div>
    </div>
    <!-- End of lists container  -->
    <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    $(document).ready(function() {

        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count

        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();

            x++; //text box increment
            $(wrapper).append(
                '<div > <input class="form-control {{($errors->any() && $errors->first("title")) ?" is-invalid":""}}"placeholder="Enter a list title" name="title"><button class="btn btn-primary desplay flex mt-4">Add List</button> <button class="remove_field btn">X</button></div>'
            ); //add input box
            $("#add_a_list").css("display", "none");

        });
        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
            $("#add_a_list").css("display", "block");
        })

        //Fields wrapper
        var wrapper = $(".input_fields_wrap");
        var add_button = $(".add_field_button");
        var x = 1; //initlal text box count
        var id;
        $('.add_field_buttonC').click(function(e) { //on add input button click
            e.preventDefault();
            id = $(this).attr("value")
            x++; //text box increment
            if ($(`.input_fields_wrap${id}`).css('display') == 'none') {
                $(`.input_fields_wrap${id}`).css("display", "block");
            } else {
                $('.input_fields_wrap' + id).append(
                    '<div > <textarea class="form-control {{($errors->any() && $errors->first("title")) ?" is-invalid":""}}"placeholder="Enter a  title for this card" name="title" rows="3" cols="50"></textarea><button class="btn btn-primary desplay flex mt-4  mb-4">Add Card</button>   <a class="add-card-btn remove_field' +
                    id + ' btn" onClick= alertclick(' + id + ');  href="#"> X </div>'
                ); //add input box
                $("#add_a_list" + id).css("display", "none");
            }

        });
    });
    </script>

    <script>
    function alertclick(id) {
        $(`.input_fields_wrap${id}`).on("click", `.remove_field${id}`, function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            $("#add_a_list" + id).css("display", "block");
        })
    }




    $('body').on('submit', '#createticketTransection', function(e) {
        e.preventDefault();
        var fdata = new FormData(this);
        // // console.log($(this), $(this).id)
        // var url = $(this).id === "createticketTransection" ? '{{url("CreateTicketTransection")}}' : ''
        // var url = $(this).id === "createCard" ? '{{url("CreateTicketCard")}}' : ''
        // console.log(url)

        $.ajax({
            url: 'CreateTicketTransection',
            type: 'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data) {
                let html1 = '<p>' + data.title + ' </p>';
                let html = '    <div class="box" style="z-index:1000" id="box1"> ';
                html += '         <div> ';
                html += '                <form method="POST" id="createticketTransection' +
                    data[
                        'id'] +
                    '" ';
                html += '                    action="{{route("createticketTransection")}}">';
                html += '                    @csrf ';
                html += '                     <div id="input_fields_wrap' + data['id'] +
                    '" class="input_fields_wrap"> ';
                html += '                     </div> ';
                html += '                </form> ';
                html += '                 <div class="" id="add_a_list' + data['id'] + '"> ';
                html += '  <a id="createInput1' + data['id'] +
                    '"  class="add-card-btn add_field_button btn" href="#"><i ';
                html += '                             class="fas fa-plus"></i></span>Add ';
                html += '                        a ';
                html += '                        list</span></a> ';
                html += '                </div> ';
                html += '            </div> ';
                html += '         </div> ';
                html += '     </div> ';
                $('#showData').html(html1);
                $('#newcolumn').html(html);
                $('#createInput1' + data['id']).click(function(e) { //on add input button click
                    e.preventDefault();
                    $("#input_fields_wrap" + data['id']).append(
                        '<div > <input class="form-control {{($errors->any() && $errors->first("title")) ?" is-invalid":""}}"placeholder="Enter a list title" name="title"><button class="btn btn-primary desplay flex mt-4">Add List</button> <button id="#remove_field"' +
                        data['id'] + ' class="remove_field btn">X</button></div>'
                    ); //add input box
                    $(" #add_a_list" + data['id']).css("display", "none");

                });
                $('#input_fields_wrap' + data['id']).on("click", "remove_field" + data['id'],
                    function(
                        e) { //user click on remove text
                        e.preventDefault();
                        $(this).parent('div').remove();
                    })

                console.log(html);
            }
        });

    });



    $('body').on('submit', '#testing', function(e) {
        e.preventDefault();
        var projid = $('#projectid').attr("pid");
        var fdata = new FormData(this);
        fdata.append('projectid', projid)
        $.ajax({
            url: 'addmembers',
            type: 'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data) {
                location.reload();
            }
        });
    });


    $('body').on('submit', '#addmemberCard', function(e) {
        e.preventDefault();
        var fdata = new FormData(this);
        $.ajax({
            url: 'addCardmembers',
            type: 'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data) {
                location.reload();
            }
        });
    });





    $('body').on('submit', '#createCard', function(e) {
        e.preventDefault();
        var fdata = new FormData(this);
        var tid;
        for (var pair of fdata.entries()) {
            if (pair[0] == 'ticketTransection_id')
                tid = pair[1];
        }
        // var url = $(this).id === "createticketTransection" ? '{{url("CreateTicketTransection")}}' : ''
        // var url = $(this).id === "createCard" ? '{{url("CreateTicketCard")}}' : ''
        // console.log(url)

        $.ajax({
            url: 'CreateTicketCard',
            type: 'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data) {
                let html2 = '<p>' + data.title + ' </p>';
                $(`.input_fields_wrap${tid}`).css("display", "none");
                $("#add_a_list" + tid).css("display", "block");

                $(`#ajaxCardData${tid}`).append($('<div class=" showdata list-card">' +
                    data
                    .title + ' </div>'));

            }
        });

    });

    function openmodal(title, cardtitle, description, cardid, cardmembers) {
        $('#cardTitle').text('');
        $('#ticketTitle').text('');
        $('#cardDescription').text('');
        $('#cardTitle').append(title);
        $('#ticketTitle').append(cardtitle);
        $('#cardId').val(cardid);
        newCardMembers = JSON.parse(cardmembers);
        let html = "";
        if (cardmembers.length !== 0) {
            html += " <p> ";
            for (cardmember of newCardMembers) {
                html += `<p class="member"> ` + cardmember.name + `</p>`;
            }
            html += " </p> ";
        }

        if (description !== "null") {
            $('#cardDescription').append(description);
        }
        $('#cardMemberShow').html(html);
        $('#descriptionTitle').modal('show');
    }



    $('body').on('submit', '#Cardlables', function(e) {
        e.preventDefault();
        var fdata = new FormData(this);
        $.ajax({
            url: '/addCardLabels',
            type: 'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data) {
                location.reload();
            }
        });
    });

    $(".card-label").on('click', function(e) {
        var Value = $('#lableColor').val();
        if (Value != "") {
            document.getElementById(Value).style.borderColor = "";
            document.getElementById(Value).style.border = "";
        }
        document.getElementById($(this).attr('id')).style.borderColor = "red";
        document.getElementById($(this).attr('id')).style.border = "2px solid";
        $('#lableColor').val($(this).attr('id'));
    })
    </script>

    <!-- search member -->

    @endsection