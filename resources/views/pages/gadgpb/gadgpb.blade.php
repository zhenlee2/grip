@extends('layouts.simple.master')
@section('title', 'GAD | Plan and Budget')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.min.css')}}">
@endsection

@section('style')
<style>
        .page-wrapper .page-body-wrapper .page-title {
            padding-top: 25px;
            padding-bottom: 5px;
        }
            .card .card-header {
            background-color: #fff;
            padding: 30px;
            border-bottom: 1px solid #ecf3fa;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            position: relative;
        }
        /* Add custom CSS for freezing table header */
        .table-container {
            max-height: 550px; /* Adjust max-height as needed */
            overflow-y: auto;
        }
        .sticky-header th {
            position: sticky;
            color: white;
            top: 0;
            background-color: #57bb8a; /* Adjust background color if needed */
            /* z-index: 1; Ensure it overlays other content properly */
            border: 1px solid #ccc; /* Add border to table header cells */
            padding: 0px; /* Adjust padding as needed */
            text-align: center; /* Center align text */
            vertical-align: middle; /* Center vertical alignment */
        }
    </style>
@endsection

@section('breadcrumb-title')
<h5>Gender and Development - Plan and Budget</h5>
@endsection

@section('filter')
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">GAD GPB</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
         <div class="dropdown-basic">
                                        <div class="dropdown">
                                            <button class="dropbtn btn-primary btn-sm" type="button">Dropdown Button <span><i class="icofont icofont-arrow-down"></i></span></button>
                                            <div class="dropdown-content">
                                                <a href="#">Link 1</a><a href="#">Link 2</a><a href="#">Link 3</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#">Another Link</a>
                                            </div>
                                        </div>
                                    </div>
         <div class="card-header" style="padding: 20px;">
                <div align="center">
                    <div  class="dt-ext table-responsive table-container">
                        <table class="table " style="padding:0px 0px; border:none;">
                            <tr>
                                <td style="border:none;">
                                    <select id="filter_year" class="btn btn-outline-primary" >
                                        <option value="" disabled>Select Year</option>
                                        <option value="0000">0000</option>
                                        
                                    </select>
                                <!-- </td>
                                <td style="text-align:left"> -->
                                    <select name="quarter" id="quarter" class="btn btn-outline-primary bordered" data-control="select2">
                                        
                                    </select>
                                    <!-- <span class="btn bg-dark text-white" id="btn-filter-year" style="cursor: pointer;">Filter Quarter</span> -->
                                    <span class="btn bg-dark text-white" id="btn-filter-year" style="cursor: pointer;">Filter</span>
                                </td>
                                <!-- <td class="col-3" ></td> -->
                                <td  style="text-align:right; border:none;">
                                    <a id="exportButton" class="btn btn-outline-success">
                                        <i class="icofont icofont-file-excel"></i>
                                        <span> Generate</span>
                                    </a>
                                    <a id="pdfButton" href="{{ url('/gadar-pdf') }}" class="btn btn-outline-primary" target="_blank">Download PDF</a>
                                    <button class="btn btn-outline-success " type="submit" id="view" data-bs-original-title="View Status" data-bs-toggle="modal" data-idUpdate="" data-bs-target="#statusModal"><i class="icofont icofont-ui-check"></i><span> Status</span></button>
                                    <button class="btn btn-outline-success " type="submit" id="view" data-bs-original-title="View MOV's" data-bs-toggle="modal" data-idUpdate="" data-bs-target="#movsModal"><i class="fa fa-file-photo-o"></i><span> MOVs</span></button>
                                    <button class="btn btn-outline-secondary" type="submit" id="view" data-bs-original-title="View GAD AR Logs" data-bs-toggle="modal" data-idUpdate="" data-bs-target="#logModal"><i class="icon-harddrives"></i><span> Logs</span></button>
                                    <button class="btn btn-outline-primary" type="submit" id="view" data-bs-original-title="Additional Indicator" data-bs-toggle="modal" data-idUpdate="" data-bs-target="#addIndicatorModal"><i class="icofont icofont-plus-circle"></i><span> Add Indicator</span></button>
                                
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="dt-ext table-responsive">
                  <table class="table border table-xs" style="padding: 1px 1px;">
                        <thead class="sticky-header">
                            <th class="border " style="text-align: center; vertical-align: middle; padding: 4px">ID</th>
                            <th class="border col-6" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Gender Issue or GAD Mandate</th>
                            <th class="border col-3" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Results Indicator</th>
                            <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px">Male</th>
                            <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px">Female</th>
                            <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px">Total</th>
                            <th class="border col-2 p-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">PAP Description</th>
                            <th class="border col-2 p-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">GAD Activities</th>
                            <th class="border col-1 p-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Target Tier One</th>
                            <th class="border col-1 p-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Target Tier Two</th>
                            <th class="border col-1 p-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Target Tier Total</th>
                            <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;  padding: 4px;">Fund Source</th>
                            <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;  padding: 4px;">Responsible Unit/Office</th>
                            <th class="border col-1 p-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Action</th>
                        </thead>
                     <tbody>
                        <tr>
                           <th class="border p-1" colspan="14" style="background-color: #9fdac4;">A. Client-Focused</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 1)
                                <tr>
                                    <td class="border p-1" style="text-align: center; display:none;" data-id="{{ $g->id }}">{{ $g->id }}</td>
                                    <td class="border p-0" style="text-align: center; padding: 4px">{{ $g->indicator_code }}</td>
                                    <td class="border p-1" data-mandate="{{ $g->gad_mandate }}">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1" data-res="{{ $g->result_indicator }}">{{ $g->result_indicator }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-tmale="{{ $g->target_male }}">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-tfemale="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-ttotal="{{ $g->target_totalsex }}">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1" data-pap="{{ $g->pap_desc }}">{{ $g->pap_desc }}</td>
                                    <td class="border p-1" style=" padding: 4px" data-gadactivity="{{ $g->gad_activity }}">{{ $g->gad_activity }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtierone="{{ $g->budget_tierone }}">{{  $g->budget_tierone }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtiertwo="{{ $g->budget_tiertwo }}">{{  $g->budget_tiertwo }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtotal="{{ $g->budget_totalamount }}">{{ $g->budget_totalamount }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-source="{{ $g->source }}">{{ $g->source }}</td>
                                    <!-- @if ($g->responsible_unit == '[]')
                                        <td class="border p-1" ></td>
                                        @else
                                        <td class="border p-1" data-resunit="{{ $g->responsible_unit}}">{{ $g->responsible_unit}}</td>
                                    @endif
                                    @if ($g->unit == '[]')
                                        <td class="border p-1" ></td>
                                        @else
                                        <td class="border p-1" data-unit="{{ $g->unit}}">{{ $g->unit}}</td>
                                    @endif -->
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-rawunit="{{ $g->rawresponsible_unit }}">{{ $g->rawresponsible_unit }}</td>
                                    <td class="border p-1">
                                        <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                        <!-- <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button> -->
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                           <th class="border p-1" colspan="14" style="background-color: #9fdac4;">B. Organization-Focused</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 2)
                            <tr>
                                    <td class="border p-1" style="text-align: center; display:none;" data-id="{{ $g->id }}">{{ $g->id }}</td>
                                    <td class="border p-0" style="text-align: center; padding: 4px">{{ $g->indicator_code }}</td>
                                    <td class="border p-1" data-mandate="{{ $g->gad_mandate }}">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1" data-res="{{ $g->result_indicator }}">{{ $g->result_indicator }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-tmale="{{ $g->target_male }}">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-tfemale="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-ttotal="{{ $g->target_totalsex }}">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1" data-pap="{{ $g->pap_desc }}">{{ $g->pap_desc }}</td>
                                    <td class="border p-1" style=" padding: 4px" data-gadactivity="{{ $g->gad_activity }}">{{ $g->gad_activity }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtierone="{{ $g->budget_tierone }}">{{  $g->budget_tierone }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtiertwo="{{ $g->budget_tiertwo }}">{{  $g->budget_tiertwo }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtotal="{{ $g->budget_totalamount }}">{{ $g->budget_totalamount }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-source="{{ $g->source }}">{{ $g->source }}</td>
                                    <!-- @if ($g->responsible_unit == '[]')
                                        <td class="border p-1" ></td>
                                        @else
                                        <td class="border p-1" data-resunit="{{ $g->responsible_unit}}">{{ $g->responsible_unit}}</td>
                                    @endif
                                    @if ($g->unit == '[]')
                                        <td class="border p-1" ></td>
                                        @else
                                        <td class="border p-1" data-unit="{{ $g->unit}}">{{ $g->unit}}</td>
                                    @endif -->
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-rawunit="{{ $g->rawresponsible_unit }}">{{ $g->rawresponsible_unit }}</td>
                                    <td class="border p-1">
                                        <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                        <!-- <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button> -->
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                           <th class="border p-1 m-0;" colspan="14" style="background-color: #9fdac4;">C. GAD-Attributed Programs or Projects</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 3)
                            <tr>
                                    <td class="border p-1" style="text-align: center; display:none;" data-id="{{ $g->id }}">{{ $g->id }}</td>
                                    <td class="border p-0" style="text-align: center; padding: 4px">{{ $g->indicator_code }}</td>
                                    <td class="border p-1" data-mandate="{{ $g->gad_mandate }}">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1" data-res="{{ $g->result_indicator }}">{{ $g->result_indicator }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-tmale="{{ $g->target_male }}">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-tfemale="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-ttotal="{{ $g->target_totalsex }}">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1" data-pap="{{ $g->pap_desc }}">{{ $g->pap_desc }}</td>
                                    <td class="border p-1" style=" padding: 4px" data-gadactivity="{{ $g->gad_activity }}">{{ $g->gad_activity }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtierone="{{ $g->budget_tierone }}">{{  $g->budget_tierone }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtiertwo="{{ $g->budget_tiertwo }}">{{  $g->budget_tiertwo }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-budtotal="{{ $g->budget_totalamount }}">{{ $g->budget_totalamount }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-source="{{ $g->source }}">{{ $g->source }}</td>
                                    <!-- @if ($g->responsible_unit == '[]')
                                        <td class="border p-1" ></td>
                                        @else
                                        <td class="border p-1" data-resunit="{{ $g->responsible_unit}}">{{ $g->responsible_unit}}</td>
                                    @endif
                                    @if ($g->unit == '[]')
                                        <td class="border p-1" ></td>
                                        @else
                                        <td class="border p-1" data-unit="{{ $g->unit}}">{{ $g->unit}}</td>
                                    @endif -->
                                    <td class="border p-1" style="text-align: center; padding: 4px" data-rawunit="{{ $g->rawresponsible_unit }}">{{ $g->rawresponsible_unit }}</td>
                                    <td class="border p-1">
                                        <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                        <!-- <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button> -->
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Update Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="updatePCModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePCModalLabel">Add Gender and Development Plan and Budget</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" id="editform" name="editform" method="POST">
                    <!-- <div class="container-fluid"> -->
                    <div class="container-fluid">
                        <div class="select2-drpdwn">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- <div class="card">
                                        <div class="card-body"> -->
                                            <div class="form theme-form">
                                                <br>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label>Gender Issue or GAD Mandate</label>
                                                            <p id="gadar_id" style="display: none;"></p>
                                                            <textarea class="form-control" id="mandate" type="text" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label>Results Indicator</label>
                                                            <textarea class="form-control" id="result" type="text" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xxl-6 col-lg-6">
                                                    <div class="card">
                                                        <!-- <span class="badge badge-success">Done</span> -->
                                                        <h6>Previous Accomplishment</h6>
                                                            <div class="dt-ext table-responsive">
                                                            <table class="table border table-xs" style=" padding: 1px 1px; ">
                                                                    <thead>
                                                                        <th colspan="2" class="border"  style="vertical-align: middle; text-align: center; padding: 4px;">Physical</th>
                                                                        <th colspan="2" class="border" style="vertical-align: middle; text-align: center; padding: 4px;">GAD Expenditure</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="border">
                                                                            <td class="border col-1" style="text-align: center;">Male:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevm"></td>
                                                                            <td class="border col-1" style="text-align: center;">Tier 1:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevtierone"></td>
                                                                            <!-- <td rowspan="3" style="vertical-align: middle; text-align: center;">10</td> -->
                                                                        </tr>
                                                                        <tr class="border">
                                                                            <td class="border col-1" style="text-align: center;">Female:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevf"></td>
                                                                            <td class="border col-1" style="text-align: center;">Tier 2:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevtiertwo"></td>
                                                                        </tr>
                                                                        <tr class="border">
                                                                            <td class="border col-1" style="text-align: center;">Total:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevtotalsex"></td>
                                                                            <td class="border col-1" style="text-align: center;">Total Amount:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevbudget"></td>
                                                                        </tr>        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-lg-6">
                                                    <div class="card">
                                                        <!-- <span class="badge badge-success">Done</span> -->
                                                        <h6>Target to Accomplishment</h6>
                                                            <div class="dt-ext table-responsive">
                                                            <table class="table border table-xs" style=" padding: 1px 1px; ">
                                                                    <thead>
                                                                        <th colspan="2" class="border"  style="vertical-align: middle; text-align: center; padding: 4px;">Physical</th>
                                                                        <th colspan="2" class="border" style="vertical-align: middle; text-align: center; padding: 4px;">GAD Expenditure</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr class="border">
                                                                            <td class="border col-1" style="text-align: center;">Male:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevm"></td>
                                                                            <td class="border col-1" style="text-align: center;">Tier 1:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevtierone"></td>
                                                                            <!-- <td rowspan="3" style="vertical-align: middle; text-align: center;">10</td> -->
                                                                        </tr>
                                                                        <tr class="border">
                                                                            <td class="border col-1" style="text-align: center;">Female:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevf"></td>
                                                                            <td class="border col-1" style="text-align: center;">Tier 2:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevtiertwo"></td>
                                                                        </tr>
                                                                        <tr class="border">
                                                                            <td class="border col-1" style="text-align: center;">Total:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevtotalsex"></td>
                                                                            <td class="border col-1" style="text-align: center;">Total Amount:</td>
                                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="prevbudget"></td>
                                                                        </tr>        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(auth()->user()->level_id == 3)
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label>GAD Activities</label>
                                                            <textarea class="form-control" id="activity" type="text" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xxl-6 col-lg-6">
                                                        <!-- <div class="card"> -->
                                                            <div class="card-body o-hidden">
                                                                <div class="mb-2">
                                                                    <div class="col-form-label">Select Division</div>
                                                                    <select id="js-division-basic-multiple" class="col-sm-12" multiple="multiple">
                                                                        @foreach ($division as $d)
                                                                            <option value="{{$d->id}}">{{$d->code}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <!-- </div> -->
                                                    </div>
                                                    <!-- Default Textbox start-->
                                                    <div class="col-xxl-6 col-lg-6">
                                                        <!-- <div class="card"> -->
                                                            <div class="card-body o-hidden">
                                                                <div class="mb-2">
                                                                    <div class="col-form-label">Select Section</div>
                                                                    <select id="js-section-basic-multiple" class="col-sm-12" multiple="multiple">
                                                                        @foreach ($section as $s)
                                                                            <option value="{{$s->id}}">{{$s->sec_code}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label>Raw Responsible Unit</label>
                                                            <input class="form-control" id="rawunit" type="text" ></input>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label>Justification</label>
                                                            <textarea class="form-control" id="justification" type="text"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label>Secretariat Remarks</label>
                                                            <textarea class="form-control" id="remark" type="text"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-secondary btn-sm editButton" type="submit"  id="addIndicatorButton">Save</button>
                                            </div>
                                        </div>
                                    <!-- </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
                
        </div>
        </div>
    </div> 
    <!-- End of Update Modal -->
    <!-- Start MOV Modal -->

    <div class="modal fade" id="movModal" tabindex="-1" role="dialog" aria-labelledby="movsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="movsModalLabel">MOV Gender and Development Accomplishment Report</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="" id="editform" name="editform" method="POST">
                        <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                <div class="form theme-form">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-secondary btn-sm editButton" type="submit"  id="editButton">Update</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
            </div>
        </div>
    </div> 
        <!-- End of MOV Modal -->
@endsection
@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<!-- <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script> -->
<script>
    $('#js-division-basic-multiple').select2({
        dropdownParent: $('#editModal')
    });

    $('#js-section-basic-multiple').select2({
        dropdownParent: $('#editModal')
    });

    function get_indicator(){
        var row = $(event.target).closest('tr');
        // var year = row.find('[data-year]').data('year');
        var gadar_id = row.find('[data-id]').data('id');
        // var code = row.find('[data-code]').data('code');
        var mandate = row.find('[data-mandate]').data('mandate');
        var result = row.find('[data-res]').data('res');
        var activity = row.find('[data-gadactivity]').data('gadactivity');
        
        var rawunit = row.find('[data-rawunit]').data('rawunit');
        // var targetm = row.find('[data-targetm]').data('targetm');
        // var targetf = row.find('[data-targetf]').data('targetf');
        // var targetts = row.find('[data-targetts]').data('targetts');
        // var prevm = row.find('[data-prevm]').data('prevm');
        // var phymale = row.find('[data-phymale]').data('phymale');
        // var phyfemale = row.find('[data-phyfemale]').data('phyfemale');
        // var phyother = row.find('[data-phyother]').data('phyother');
        // var phytotal = row.find('[data-phytotal]').data('phytotal');
        // var prevf = row.find('[data-prevf]').data('prevf');
        // var tieroneexpen = row.find('[data-tieroneexpen]').data('tieroneexpen');
        // var tiertwoexpen = row.find('[data-tiertwoexpen]').data('tiertwoexpen');
        // var expen = row.find('[data-expen]').data('expen');
        // var actualact = row.find('[data-actualact]').data('actualact');
        // var justify = row.find('[data-justify]').data('justify');
        // var prevtotalsex = row.find('[data-prevtotalsex]').data('prevtotalsex');
        // var prevbudget = row.find('[data-prevbudget]').data('prevbudget');
        // var tierone = row.find('[data-tierone]').data('tierone');
        // var tiertwo = row.find('[data-tiertwo]').data('tiertwo');
        // var totalamount = row.find('[data-totalamount]').data('totalamount');
        // var prevtierone = prevbudget;
        // var prevtiertwo = 0;

        $('#gadar_id').val(gadar_id);
        $('#mandate').text(mandate);
        $('#result').text(result);
        $('#activity').text(activity);
        $('#rawunit').val(rawunit);
        // $('#prevm').text(prevm);
        // $('#prevf').text(prevf);
        // $('#prevtotalsex').text(prevtotalsex);
        // $('#prevtierone').text(prevtierone);
        // $('#prevtiertwo').text(prevtiertwo);
        // $('#prevbudget').text(prevbudget);
        // $('#targetm').text(targetm);
        // $('#targetf').text(targetf);
        // $('#targetts').text(targetts);
        // $('#tierone').text(tierone);
        // $('#tiertwo').text(tiertwo);
        // $('#totala').text(totalamount);
        // $('#actualmale').val(phymale);
        // $('#actualfemale').val(phyfemale);
        // $('#totalactual').text(phytotal);
        // $('#actualtierone').val(tieroneexpen);
        // $('#actualtiertwo').val(tiertwoexpen);
        // $('#actualtiertwo').val(phyother);
        // // $('#totalactualamount').text(expen);
        // $('#actualActivity').text(actualact);
        // $('#justification').text(justify);
        
        

        $('#js-division-basic-multiple').change(function() {
            var selectedValues = $(this).val();
            // console.log(selectedValues); // This will log the selected values to the console
        });
        $('#js-section-basic-multiple').change(function() {
            var selectedValues = $(this).val();
            // console.log(selectedValues); // This will log the selected values to the console
        });
    }
        // $('#totalactualamount').text(formatAsCurrency(expen));
        //     // console.log("Grand Total Budget:", totalSum);

        //     function formatAsCurrency(amount) {
        //         return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
        //     }

        // $('#totala').text(formatAsCurrency(totalamount));
        //     // console.log("Grand Total Budget:", totalSum);

        //     function formatAsCurrency(amount) {
        //         return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
        //     }

        // $('#prevbudget').text(formatAsCurrency(prevbudget));
        //     // console.log("Grand Total Budget:", totalSum);

        //     function formatAsCurrency(amount) {
        //         return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
        //     }

       
        // $(document).ready(function() {
        //     // Attach change event listener to input fields with IDs starting with 'actual'
        //     $('input[id^="actual"]').change(function() {
        //         updateTotal(); // Call the updateTotal function when any of these input fields change
        //     });
        // });

        $("#addIndicatorButton").click(function(event) {
            event.preventDefault();
            var gadar_id = $('#gadar_id').val();
            var mandate = $('#mandate').val();
            var result = $('#result').val();
            var activity = $('#activity').val();
            var division = $('#js-division-basic-multiple').val();
            var section = $('#js-section-basic-multiple').val();
            let dataDiv =`[${division.join(', ')}]`;
            let dataSec =`[${section.join(', ')}]`;
            console.log(dataDiv);
            console.log(dataSec);
            var justification = $('#justification').val();
            var remark = $('#remark').val();
            var rawunit = $('#rawunit').val();
            
            // console.log(mandate);
            // console.log(result);
            // console.log(activity);
            // console.log("Division :" + dataDiv);
            // console.log("Section :" + dataSec);
            var formData = new FormData();

            formData.append('gadar_id', gadar_id);
            formData.append('mandate', mandate);
            formData.append('result', result);
            formData.append('activity', activity);
            formData.append('dataDiv', dataDiv);
            formData.append('dataSec', dataSec);
            formData.append('justification', justification);
            formData.append('remark', remark);
            formData.append('rawunit', rawunit);
            
            // console.log(formData);
            var dataToSend = {
                id : gadar_id,
                mandate: mandate,
                // category: $('#category-name').val(),
                // name: $('#activity-name').val(),
                // sub: $('#subWa').val(),
                // sort: $('#indicator-code').val(),
                // target: $('#targetIndicator').val(),
                // quantity: $('#quantity').val(),
                // quality: $('#quality').val(),
                // timeliness: $('#timeliness').val(),
                // alloted: $('#alloted').val(),
                // center: $('#center').val()
            };
            if (Object.keys(dataToSend).length > 0) {
            Swal.fire({
                title: 'Are you sure you want to Update?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update it!'
            }).then((result) => {
                // console.log(dataToSend);
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: BASE_URL + 'gender_and_development/gadgpb/upload',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire(
                                'Confirm!',
                                'Your file has been saved.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(error) {
                            Swal.fire(
                                'Failed!',
                                'Your file has no changes',
                                'error'
                            );
                        }
                    });
                }
            });
        } else {
            console.log('Data to send is empty');
        }
    });

</script>
@endsection
