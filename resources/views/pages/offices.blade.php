@extends('layouts.simple.master')
{{-- @section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/jsgrid.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Office Performance Contract List</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">Office</li>
@endsection --}}

@section('content')

@section('title', 'JS Grid Tables')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/jsgrid.css') }}">
@endsection
@section('style')
@endsection
{{-- @section('breadcrumb-title')
    <h3>JS Grid Tables</h3>
@endsection --}}
@section('breadcrumb-title')
<h3>OFFICE LIBRARY</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item active">Office Library</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <h5>Office Library</h5>
                        {{-- <span>Grid with filtering, editing, inserting, deleting, sorting and paging. Data provided by
                            controller.</span> --}}
                    </div> -->
                    
                    <div class="card-body">
                        <div class="d-inline">
                            {{-- <a class="btn btn-success" href="{{route('createpc')}}"><i class="fa fa-plus-circle"></i> Create New Performance Contract</a> --}}
                        </div>
                        <div id="basicScenario"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/jsgrid/jsgrid.min.js') }}"></script>
    
    <script>
        $("#basicScenario").jsGrid({
            width: "100%",
            filtering: true,
            editing: true,
            inserting: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 9,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete the office?",
            controller: {
                loadData: function(filter) {
                    var deferred = $.Deferred();
                    $.ajax({
                        type: "GET",
                        url: "get_offices",
                        dataType: "json",
                        data: filter,
                        success: function(response) {
                            deferred.resolve(response.results);
                        }
                    });
                    return deferred.promise();
                },
                insertItem: function(insertingClient) {
                    var deferred = $.Deferred();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "store_offices",
                        dataType: "json",
                        data: insertingClient,
                        success: function(response) {
                            deferred.resolve(response.results);
                            $("#basicScenario").jsGrid("loadData");
                        }
                    });
                    return deferred.promise();
                },
                updateItem: function(updatingClient) {
                    var deferred = $.Deferred();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "update_offices",
                        dataType: "json",
                        data: updatingClient,
                        success: function(response) {
                            deferred.resolve(response.results);
                        }
                    });
                    return deferred.promise();
                },
                deleteItem: function(deletingClient) {
                    var deferred = $.Deferred();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "delete_offices",
                        dataType: "json",
                        data: deletingClient,
                        success: function(response) {
                            deferred.resolve(response.results);
                        }
                    });
                    return deferred.promise();
                }
            },
            fields: [{
                    name: "id",
                    //type: "text",
                    title: "#",
                    width: 10
                },
                {
                    name: "name",
                    type: "text",
                    title: "Offices",
                    validate: { message: "Offices should be specified", validator: "rangeLength", param: [1, 250] } ,
                    width: 200
                },
                {
                    name: "code",
                    type: "text",
                    title: "Abbreviation",
                    validate: { message: "Abbreviation should be specified", validator: "rangeLength", param: [1, 250] } ,
                    width: 40
                },
                {
                    name: "created_at",
                    //type: "text",
                    title: "Date Created",
                    width: 70
                },
                // {
                //     name: "updated_at",
                //     //type: "text",
                //     title: "Date Updated",
                //     width: 70
                // },
                // {
                //     name: "country",
                //     type: "select",
                //     title: "Year",
                //     items: [{
                //             Name: "",
                //             Id: 0
                //         },
                //         {
                //             Name: "United States",
                //             Id: 1
                //         },
                //         {
                //             Name: "Canada",
                //             Id: 2
                //         },
                //         {
                //             Name: "United Kingdom",
                //             Id: 3
                //         },
                //         {
                //             Name: "France",
                //             Id: 4
                //         },
                //         {
                //             Name: "Brazil",
                //             Id: 5
                //         },
                //         {
                //             Name: "China",
                //             Id: 6
                //         },
                //         {
                //             Name: "Russia",
                //             Id: 7
                //         },
                //         {
                //             Name: "Philippines",
                //             Id: 8
                //         }
                //     ],
                //     valueField: "Id",
                //     textField: "Name"
                // },
                // {
                //     name: "married",
                //     type: "checkbox",
                //     title: "Is Married",
                //     sorting: false
                // },
                {
                    type: "control"
                }
            ]
        });
    </script>
@endsection
