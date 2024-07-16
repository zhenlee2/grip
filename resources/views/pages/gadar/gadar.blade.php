@extends('layouts.simple.master')
@section('title', 'GAD | Accomplishment Report')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
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
        .filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .select-container, .dropdown-basic {
            display: flex;
            align-items: top;
            gap: 5px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
@endsection

@section('breadcrumb-title')
<h5>Gender and Development Accomplishment Report</h5>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">GAD AR</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header" style="padding: 20px;">
                <div class="filter-container">
                    <div class="select-container">
                        <select id="filter_year" class="btn btn-outline-primary">
                            <option value="" disabled>Select Year</option>
                            <option value="0000">0000</option>
                            @foreach ($filteryear as $key => $y)
                                <option value="{{ $y->year }}" {{ $selectedYear == $y->year ? 'selected' : '' }}>
                                    {{ $y->year }}
                                </option>
                            @endforeach
                        </select>
                        <select name="quarter" id="quarter" class="btn btn-outline-primary bordered" data-control="select2">
                            <option value="" disabled {{ is_null($selectedQuarter) ? 'selected' : '' }}>Select Quarter</option>
                            <option value="1" {{ $selectedQuarter == '1' ? 'selected' : '' }}>1st Quarter</option>
                            <option value="2" {{ $selectedQuarter == '2' ? 'selected' : '' }}>2nd Quarter</option>
                            <option value="3" {{ $selectedQuarter == '3' ? 'selected' : '' }}>3rd Quarter</option>
                            <option value="4" {{ $selectedQuarter == '4' ? 'selected' : '' }}>4th Quarter</option>
                        </select>
                        <button class="btn bg-dark text-white" id="btn-filter-year" style="cursor: pointer;">Filter</button>

                    </div>
                    
                    <div class="dropdown-basic">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary" type="button">Summary <span><i class="icofont icofont-arrow-down"></i></span></button>
                            <div class="dropdown-content">
                                <a type="submit" id="view" data-bs-toggle="modal" data-bs-target="#statusModal">Status</a>
                                <a type="submit" id="view" data-bs-toggle="modal" data-bs-target="#movsModal">MOV's</a>
                                <a type="submit" id="view" data-bs-toggle="modal" data-bs-target="#movsModal">Log</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-primary" type="button">Generate Report <span><i class="icofont icofont-arrow-down"></i></span></button>
                            <div class="dropdown-content">
                                <a id="exportButton">Excel</a>
                                <a id="pdfButton" href="{{ url('/gadar-pdf') }}" target="_blank">PDF</a>
                            </div>
                        </div>
                        <div>
                        <button class="btn btn-outline-primary " type="submit" id="view" data-bs-original-title="Additional Indicator" data-bs-toggle="modal" data-idUpdate="" data-bs-target="#addIndicatorModal"><i class="icofont icofont-plus-circle"></i><span> Add Indicator</span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                               
                <div class="dt-ext table-responsive table-container">
                  <table class="table border table-xs" style="padding: 1px 1px; " >
                     <thead class="sticky-header">
                        <th class="border " style="text-align: center; vertical-align: middle; padding: 4px;">ID</th>
                        <th class="border col-4" style="text-align: center; vertical-align: middle; padding: 4px;">Gender Issue or GAD Mandate</th>
                        <th class="border col-2" style="text-align: center; vertical-align: middle; padding: 4px;">Results Indicator</th>
                        <!-- <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px; display:none;">Male</th>
                        <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px; display:none;">Female</th> -->
                        @foreach ($gadar as $key => $g)
                            @if ($key === 0)
                                <th class="border p-1" style="text-align: center; vertical-align: middle; padding: 1px;">FY {{$g->year}} Physical Target</th>
                            @endif
                        @endforeach
                        @foreach ($gadar as $key => $g)
                            @if ($key === 0)
                            <th class="border p-1" style="text-align: center; vertical-align: middle; padding: 1px;">FY {{$g->year}} Actual Accomplishment</th>
                            @endif
                        @endforeach
                        <!-- <th class="border col-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px">Tier 1</th> -->
                        <!-- <th class="border col-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 0px">Tier 2</th> -->
                        <th class="border" style="text-align: center; vertical-align: middle; padding: 1px;">GAD Budget</th>
                        <th class="border"  style="text-align: center; vertical-align: middle; padding: 1px;">GAD Expenditure</th>
                        <!-- <th class="border col-2" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">PAP Description</th> -->
                        <th class="border col-2" style="text-align: center; vertical-align: middle; padding: 1px;">GAD Activities</th>
                        <th class="border col-2" style="text-align: center; vertical-align: middle; padding: 1px;">Actual Activities</th>
                        <!-- <th class="border" style="text-align: center; vertical-align: middle; padding: 1px;">Lead Division/Office</th> -->
                        <th class="border" style="text-align: center; vertical-align: middle; padding: 1px;">Responsible Unit/Office</th>
                        <th class="border col-2" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;">Remarks / Justification</th>
                        <th class="border col-2" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;">Remarks from GAD Focal Person</th>
                        <th class="border col-1 p-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Action</th>
                     </thead>
                     <tbody>
                        <tr>
                           <th class="border p-1" colspan="14" style="background-color: #9fdac4; ">A. Client-Focused</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 1 )
                                @php
                                    $textRed = (!isset($g->physical_sextotal) || $g->physical_sextotal == 0) && !isset($g->gadar_actualactivity) && !isset($g->justification) ? 'color: red;' : '';
                                    $quarter = $g->quarter; // Assuming 'quarter' is the property name
                                    $disableAddButton = ($quarter == 1) ? 'disabled' : '';
                                @endphp
                                <tr class="budget-rowa">
                                    <td class="border p-1" style="text-align: center; display:none;" data-year="{{ $g->year }}">{{ $g->year }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-id="{{ $g->id }}">{{ $g->id }}</td>
                                    <td class="border p-1" style="{{ $textRed }} text-align: center;" id="indicatorCode" data-code="{{ $g->indicator_code }}">{{ $g->indicator_code }}
                                        @if(auth()->user()->level_id == 1)
                                            @if($g->verify_id == 0 && $g->verify_id == NULL)
                                                <span class="badge pill-badge-danger"><i class="icofont icofont-error" ></i></span>
                                            @else
                                                <span class="badge pill-badge-success"><i class="icofont icofont-ui-check"></i></span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border p-1" style="{{ $textRed }}" id="gadMandate" data-mandate="{{ $g->gad_mandate }}">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1" style="{{ $textRed }}" id="resultindicator" data-result="{{ $g->result_indicator }}">{{ $g->result_indicator }}</td>
                                    <!-- Previous Year -->
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevm="{{ $g->prev_male }}">{{ $g->prev_male }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevf="{{ $g->prev_female }}">{{ $g->prev_female }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevtotalsex="{{ $g->prev_totalsex }}">{{ $g->prev_totalsex }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevbudget="{{ $g->prev_budget }}">{{ $g->prev_budget }}</td>
                                    <!-- <td class="border p-1" style="text-align: center; padding: 4px; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td> -->
                                    <!-- End Previous Year -->
                                    <td class="border p-1" style="text-align: center; display:none;" data-targetm="{{ $g->target_male }}">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center;" data-targetts="{{ $g->target_totalsex }}">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phymale="{{ $g->physical_male}}">{{$g->physical_male}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phyfemale="{{ $g->physical_female}}">{{$g->physical_female}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phyother="{{$g->physical_other}}">{{$g->physical_other}}</td>
                                    <td class="border p-1" style="text-align: center;" data-phytotal="{{$g->physical_sextotal}}">{{ number_format($g->physical_sextotal, 0, '.', ',') }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tierone="{{ $g->budget_tierone }}">{{ $g->budget_tierone }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tiertwo="{{ $g->budget_tiertwo }}">{{ $g->budget_tiertwo }}</td>
                                    <td class="border p-1 col-1" style="text-align: center;" data-totalamount="{{ $g->budget_totalamount}}">{{ number_format( $g->budget_totalamount, 1, '.', ',') }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tieroneexpen="{{ $g->tierone_actual }}">{{ $g->tierone_actual}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tiertwoexpen="{{ $g->tiertwo_actual }}">{{ $g->tiertwo_actual}}</td>
                                    <td class="border p-1 col-1" style="text-align: center;" data-expen="{{$g->total_actualexpen}}">{{ number_format($g->total_actualexpen, 1, '.', ',') }}</td>
                                    <td class="border p-1" style="display:none;">{{ $g->pap_desc }}</td>
                                    <td class="border p-1" style="{{ $textRed }} padding: 1px;" data-activity="{{$g->gad_activity }}">{{ $g->gad_activity }}</td>
                                    <td class="border p-1" style="padding: 4px;" data-actualact="{{$g->gadar_actualactivity}}">{{$g->gadar_actualactivity}}</td>
                                    <td class="border p-1" style="padding: 4px; text-align: center; {{ $textRed }}">{{ $g->rawresponsible_unit}}</td>
                                    <!-- <td class="border p-1" style="padding: 4px; text-align: center; {{ $textRed }}">{{ $g->unit}}</td> -->
                                    <td class="border p-1" style="padding: 4px;" data-justify="{{$g->justification}}">{{$g->justification}}</td>
                                    <td class="border p-1" style="padding: 4px; color: red;" data-remark="{{$g->remark_secretariat}}">{{$g->remark_secretariat}}</td>
                                    <!-- <td class="border p-1" style="padding: 4px;" ></td> -->
                                    <td class="border p-1" align="center">
                                        <button class="btn-sm btn-success " type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Add Accomplishment" data-bs-toggle="modal" data-idUpdate="" data-bs-target="#editModal" {{$disableAddButton}}><span class="icon-save-alt"></span></button>
                                        <br>
                                        <br>
                                        @if(auth()->user()->level_id == 2 || auth()->user()->level_id == 3)
                                            @if($g->verify_id == 0 || $g->verify_id == NULL)
                                                <!-- <a data-bs-toggle="modal" data-bs-target="#approveModal"><span class="badge badge-danger">Verify</span></a> -->
                                                <!-- <a id="verify" value="1"><span class="badge badge-danger">Verify</span></a> -->
                                                <button class="btn btn-xs btn-outline-danger" type="submit" id="verify" onclick="verify()" {{$disableAddButton}}>Verify</button>
                                            @elseif($g->verify_id >= 0)
                                                <span class="badge badge-success">Verified</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                           <th class="border p-1" colspan="5">Sub-Total A</th>
                           <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1" id="totalBudgetAmountA"></th>
                           <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1" id="totalExpenditureAmountA"></th>
                           <th class="border p-1" colspan="9"></th>
                        </tr>
                        <tr>
                           <th class="border p-1" colspan="14" style="background-color: #9fdac4; ">B. Organization-Focused</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 2)
                                @php
                                $textRed = (!isset($g->physical_sextotal) || $g->physical_sextotal == 0) && !isset($g->gadar_actualactivity) && !isset($g->justification) ? 'color: red;' : '';
                                    $quarter = $g->quarter; // Assuming 'quarter' is the property name
                                    $disableAddButton = ($quarter == 1) ? 'disabled' : '';
                                @endphp
                                <tr class="budget-rowb">
                                    <td class="border p-1" style="text-align: center; display:none;" data-year="{{ $g->year }}">{{ $g->year }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-id="{{ $g->id }}">{{ $g->id }}</td>
                                    <td class="border p-1" style="{{ $textRed }} text-align: center;" id="indicatorCode" data-code="{{ $g->indicator_code }}">{{ $g->indicator_code }}
                                        @if(auth()->user()->level_id == 1)
                                            @if($g->verify_id == 0 && $g->verify_id == NULL)
                                                <span class="badge pill-badge-danger"><i class="icofont icofont-error" ></i></span>
                                            @else
                                                <span class="badge pill-badge-success"><i class="icofont icofont-ui-check"></i></span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border p-1" style="{{ $textRed }}" id="gadMandate" data-mandate="{{ $g->gad_mandate }}">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1" style="{{ $textRed }}" id="resultindicator" data-result="{{ $g->result_indicator }}">{{ $g->result_indicator }}</td>
                                    <!-- Previous Year -->
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevm="{{ $g->prev_male }}">{{ $g->prev_male }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevf="{{ $g->prev_female }}">{{ $g->prev_female }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevtotalsex="{{ $g->prev_totalsex }}">{{ $g->prev_totalsex }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevbudget="{{ $g->prev_budget }}">{{ $g->prev_budget }}</td>
                                    <!-- <td class="border p-1" style="text-align: center; padding: 4px; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td> -->
                                    <!-- End Previous Year -->
                                    <td class="border p-1" style="text-align: center; display:none;" data-targetm="{{ $g->target_male }}">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center;" data-targetts="{{ $g->target_totalsex }}">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phymale="{{ $g->physical_male}}">{{$g->physical_male}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phyfemale="{{ $g->physical_female}}">{{$g->physical_female}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phyother="{{$g->physical_other}}">{{$g->physical_other}}</td>
                                    <td class="border p-1" style="text-align: center;" data-phytotal="{{$g->physical_sextotal}}">{{ number_format($g->physical_sextotal, 0, '.', ',') }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tierone="{{ $g->budget_tierone }}">{{ $g->budget_tierone }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tiertwo="{{ $g->budget_tiertwo }}">{{ $g->budget_tiertwo }}</td>
                                    <td class="border p-1 col-1" style="text-align: center;" data-totalamount="{{ $g->budget_totalamount}}">{{ number_format( $g->budget_totalamount, 1, '.', ',') }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tieroneexpen="{{ $g->tierone_actual }}">{{ $g->tierone_actual}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tiertwoexpen="{{ $g->tiertwo_actual }}">{{ $g->tiertwo_actual}}</td>
                                    <td class="border p-1 col-1" style="text-align: center;" data-expen="{{$g->total_actualexpen}}">{{ number_format($g->total_actualexpen, 1, '.', ',') }}</td>
                                    <td class="border p-1" style="display:none;">{{ $g->pap_desc }}</td>
                                    <td class="border p-1" style="{{ $textRed }} padding: 1px;">{{ $g->gad_activity }}</td>
                                    <td class="border p-1" style="padding: 4px;" data-actualact="{{$g->gadar_actualactivity}}">{{$g->gadar_actualactivity}}</td>
                                    <td class="border p-1" style="padding: 4px; text-align: center; {{ $textRed }}">{{ $g->rawresponsible_unit}}</td>
                                    <!-- <td class="border p-1" style="padding: 4px; text-align: center; {{ $textRed }}">{{ $g->unit}}</td> -->
                                    <td class="border p-1" style="padding: 4px;" data-justify="{{$g->justification}}">{{$g->justification}}</td>
                                    <td class="border p-1" style="padding: 4px; color: red;" data-remark="{{$g->remark_secretariat}}">{{$g->remark_secretariat}}</td>
                                    <!-- <td class="border p-1" style="padding: 4px;" ></td> -->
                                    <td class="border p-1" align="center">
                                        <button class="btn-sm btn-success " type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Add Accomplishment" data-bs-toggle="modal" data-idUpdate="" data-bs-target="#editModal" {{$disableAddButton}}><span class="icon-save-alt"></span></button>
                                        <br>
                                        <br>
                                        @if(auth()->user()->level_id == 2 || auth()->user()->level_id == 3)
                                            @if($g->verify_id == 0 || $g->verify_id == NULL)
                                                <!-- <a data-bs-toggle="modal" data-bs-target="#approveModal"><span class="badge badge-danger">Verify</span></a> -->
                                                <!-- <a id="verify" value="1"><span class="badge badge-danger">Verify</span></a> -->
                                                <button class="btn btn-xs btn-outline-danger" type="submit" id="verify" onclick="verify()" {{$disableAddButton}}>Verify</button>
                                            @elseif($g->verify_id >= 0)
                                                <span class="badge badge-success">Verified</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                           <th class="border p-1" colspan="5">Sub-Total B</th>
                           <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1" id="totalBudgetAmountB"></th>
                           <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1" id="totalExpenditureAmountB"></th>
                           <th class="border p-1" colspan="9"></th>
                        </tr>
                        <tr>
                           <th class="border p-1 m-0;" colspan="14" style="background-color: #9fdac4; ">C. GAD-Attributed Programs or Projects</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 3)
                            @php
                                    $textRed = (!isset($g->physical_sextotal) || $g->physical_sextotal == 0) && !isset($g->gadar_actualactivity) && !isset($g->justification) ? 'color: red;' : '';
                                    $quarter = $g->quarter; // Assuming 'quarter' is the property name
                                    $disableAddButton = ($quarter == 1) ? 'disabled' : '';
                                @endphp
                                <tr class="budget-rowc">
                                    <td class="border p-1" style="text-align: center; display:none;" data-year="{{ $g->year }}">{{ $g->year }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-id="{{ $g->id }}">{{ $g->id }}</td>
                                    <td class="border p-1" style="{{ $textRed }} text-align: center;" id="indicatorCode" data-code="{{ $g->indicator_code }}">{{ $g->indicator_code }}
                                        @if(auth()->user()->level_id == 1)
                                            @if($g->verify_id == 0 && $g->verify_id == NULL)
                                                <span class="badge pill-badge-danger"><i class="icofont icofont-error" ></i></span>
                                            @else
                                                <span class="badge pill-badge-success"><i class="icofont icofont-ui-check"></i></span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border p-1" style="{{ $textRed }}" id="gadMandate" data-mandate="{{ $g->gad_mandate }}">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1" style="{{ $textRed }}" id="resultindicator" data-result="{{ $g->result_indicator }}">{{ $g->result_indicator }}</td>
                                    <!-- Previous Year -->
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevm="{{ $g->prev_male }}">{{ $g->prev_male }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevf="{{ $g->prev_female }}">{{ $g->prev_female }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevtotalsex="{{ $g->prev_totalsex }}">{{ $g->prev_totalsex }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-prevbudget="{{ $g->prev_budget }}">{{ $g->prev_budget }}</td>
                                    <!-- <td class="border p-1" style="text-align: center; padding: 4px; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td> -->
                                    <!-- End Previous Year -->
                                    <td class="border p-1" style="text-align: center; display:none;" data-targetm="{{ $g->target_male }}">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-targetf="{{ $g->target_female }}">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center;" data-targetts="{{ $g->target_totalsex }}">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phymale="{{ $g->physical_male}}">{{$g->physical_male}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phyfemale="{{ $g->physical_female}}">{{$g->physical_female}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-phyother="{{$g->physical_other}}">{{$g->physical_other}}</td>
                                    <td class="border p-1" style="text-align: center;" data-phytotal="{{$g->physical_sextotal}}">{{ number_format($g->physical_sextotal, 0, '.', ',') }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tierone="{{ $g->budget_tierone }}">{{ $g->budget_tierone }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tiertwo="{{ $g->budget_tiertwo }}">{{ $g->budget_tiertwo }}</td>
                                    <td class="border p-1 col-1" style="text-align: center;" data-totalamount="{{ $g->budget_totalamount}}">{{ number_format( $g->budget_totalamount, 1, '.', ',') }}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tieroneexpen="{{ $g->tierone_actual }}">{{ $g->tierone_actual}}</td>
                                    <td class="border p-1" style="text-align: center; display:none;" data-tiertwoexpen="{{ $g->tiertwo_actual }}">{{ $g->tiertwo_actual}}</td>
                                    <td class="border p-1 col-1" style="text-align: center;" data-expen="{{$g->total_actualexpen}}">{{ number_format($g->total_actualexpen, 1, '.', ',') }}</td>
                                    <td class="border p-1" style="display:none;">{{ $g->pap_desc }}</td>
                                    <td class="border p-1" style="{{ $textRed }} padding: 1px;">{{ $g->gad_activity }}</td>
                                    <td class="border p-1" style="padding: 4px;" data-actualact="{{$g->gadar_actualactivity}}">{{$g->gadar_actualactivity}}</td>
                                    <td class="border p-1" style="padding: 4px; text-align: center; {{ $textRed }}">{{ $g->rawresponsible_unit}}</td>
                                    <!-- <td class="border p-1" style="padding: 4px; text-align: center; {{ $textRed }}">{{ $g->unit}}</td> -->
                                    <td class="border p-1" style="padding: 4px;" data-justify="{{$g->justification}}">{{$g->justification}}</td>
                                    <td class="border p-1" style="padding: 4px; color: red;" data-remark="{{$g->remark_secretariat}}">{{$g->remark_secretariat}}</td>
                                    <!-- <td class="border p-1" style="padding: 4px;" ></td> -->
                                    <td class="border p-1" align="center">
                                        <button class="btn-sm btn-success " type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Add Accomplishment" data-bs-toggle="modal" data-idUpdate="" data-bs-target="#editModal" {{$disableAddButton}}><span class="icon-save-alt"></span></button>
                                        <br>
                                        <br>
                                        @if(auth()->user()->level_id == 2 || auth()->user()->level_id == 3)
                                            @if($g->verify_id == 0 || $g->verify_id == NULL)
                                                <!-- <a data-bs-toggle="modal" data-bs-target="#approveModal"><span class="badge badge-danger">Verify</span></a> -->
                                                <!-- <a id="verify" value="1"><span class="badge badge-danger">Verify</span></a> -->
                                                <button class="btn btn-xs btn-outline-danger" type="submit" id="verify" onclick="verify()" {{$disableAddButton}}>Verify</button>
                                            @elseif($g->verify_id >= 0)
                                                <span class="badge badge-success">Verified</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                           <th class="border p-1" colspan="5">Sub-Total C</th>
                           <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1" id="totalBudgetAmountC"></th>
                           <th class="border p-1" style="text-align: center; padding: 4px;" colspan="1" id="totalExpenAmountC"></th>
                           <th class="border p-1" colspan="9"></th>
                        </tr>
                        <tr>
                           <th class="border p-1" colspan="5" style="vertical-align: middle; "><h6><strong>Grand Total</strong></h6></th>
                           <th class="border p-1" style="text-align: center; vertical-align: middle; padding: 4px;" colspan="1" id="grandTotal"></th>
                           <th class="border p-1" style="text-align: center; vertical-align: middle; padding: 4px;" colspan="1" id="grandExpen"></th>
                           <th class="border p-1" colspan="9"></th>
                        </tr>
                     </tbody>
                  </table>
               </div>
                @php
                    $hideClass = (auth()->user()->level_id != 2 && auth()->user()->level_id != 3) ? 'd-none' : '';
                    $buttonDisplayed = false;
                @endphp
                @foreach($gadarStatus as $gs)
                    @if($gs->division_id == auth()->user()->division_id)
                        @if($gs->submit_id)
                            <div class="{{ $hideClass }}" style="text-align: right;">
                                </br>
                                <button class="btn btn-success" type="submit" id="submit" disabled>
                                    <i class="icofont icofont-checked"></i><span> Submitted</span>
                                </button>
                            </div>
                        @else
                            <div class="{{ $hideClass }}" style="text-align: right;">
                                </br>
                                <button class="btn btn-success" type="submit" id="submit" onclick="submit()" data-bs-target="#verifyModal">
                                    <i class="icofont icofont-checked"></i><span> Submit</span>
                                </button>
                            </div>
                        @endif
                        @php $buttonDisplayed = true; @endphp
                        @break
                    @endif
                @endforeach

                @if(!$buttonDisplayed)
                    <div class="{{ $hideClass }}" style="text-align: right;">
                        </br>
                        <button class="btn btn-success" type="submit" id="submit" onclick="submit()" data-bs-target="#verifyModal">
                            <i class="icofont icofont-checked"></i><span> Submit</span>
                        </button>
                    </div>
                @endif
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
                <h5 class="modal-title" id="updatePCModalLabel">Update Gender and Development Accomplishment Report</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="" id="editform" name="editform" method="POST">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="form theme-form">
                                <div class="row">
                                    <div class="col-xxl-12 col-lg-6">
                                        <!-- <div class="project-box"> -->
                                            <!-- <span class="badge badge-success">Done</span> -->
                                            <h6>Gender Issue or GAD Mandate</h6>
                                            <div class="dt-ext table-responsive">
                                                <div class="project-box">
                                                    <p id="gadar_id" style="display: none;"></p>
                                                    <p id="mandate">
                                                    <!-- RA 11861 (Expanded Solo Parent Welfare Act) Section 8. Educational Benefits. - The DepEd, CHED, and TESDA shall provide scholarship programs for solo parents and a full scholarship for one (1) child of a solo parent in institutions of basic, higher and technical vocational shills education: Provided, That the said solo parent or child of a solo parent has all the qualifications set for the scholarship program of the DepEd, CHED, or TESDA: Provided, further, That the other children, if any, of a solo parent shall be given priority in the education programs under Republic Act No. 10687, otherwise known as the 'Unified Student Financial Assistance System for Tertiary Education (UniFAST) Act', Republic Act No. 10931 otherwise known as the 'Universal Access to Quality Tertiary Education Act', and other laws relating to education programs of the government. Non-formal education programs appropriate for solo parents and their children may, likewise be provided. -->
                                                    </p>
                                                </div>
                                                
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-12 col-lg-6">
                                        <!-- <div class="project-box"> -->
                                            <!-- <span class="badge badge-success">Done</span> -->
                                            <h6>Results Indicator</h6>
                                            <div class="dt-ext table-responsive">
                                                <div class="project-box">
                                                    <p id="result">
                                                    </p>
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-6 col-lg-6">
                                       <div class="project-box">
                                          <!-- <span class="badge badge-success">Done</span> -->
                                            <h6>Target</h6>
                                            <div class="dt-ext">
                                                <table class="table border table-xs" style=" padding: 1px 1px;">
                                                    <thead>
                                                        <th colspan="2" class="border" style="text-align: center;">Physical</th>
                                                        <th colspan="2" class="border" style="text-align: center;">GAD Budget</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border">
                                                            <td class="border col-1" style="text-align: center; ">Male:</td>
                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="targetm"></td>
                                                            <td class="border col-1" style="text-align: center; ">Tier 1:</td>
                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="tierone"></td>
                                                            <!-- <td rowspan="3" style="vertical-align: middle; text-align: center;">10</td> -->
                                                        </tr>
                                                        <tr class="border">
                                                            <td class="border col-1" style="text-align: center;">Female:</td>
                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="targetf"></td>
                                                            <td class="border col-1" style="text-align: center;">Tier 2:</td>
                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="tiertwo"></td>
                                                        </tr>
                                                        <tr class="border">
                                                            <td class="border col-1" style="text-align: center;">Other:</td>
                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="targetf"></td>
                                                            <td class="border col-1" rowspan="2" style="vertical-align: middle; text-align: center; padding: 4px;">Total Amount:</td>
                                                            <td class="border col-1" rowspan="2" style="vertical-align: middle; text-align: center; padding: 4px;" id="totala"></td>
                                                        </tr>
                                                        <tr class="border">
                                                            <td class="border col-1" style="text-align: center; padding: 1px;">Total:</td>
                                                            <td class="border col-1" style="vertical-align: middle; text-align: center; padding: 4px;" id="targetts"></td>
                                                        </tr>                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                       </div>
                                    </div>
                                    <div class="col-xxl-6 col-lg-6">
                                       <div class="project-box">
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
                                </div>
                                <div class="row">
                                    <div class="col-xxl-12 col-lg-6">
                                        <div class="project-box">
                                            <h6>Actual Accomplishment</h6>
                                            <div class="dt-ext table-responsive">
                                                <table class="table border table-sm" style=" padding: 1px 1px; ">
                                                    <thead>
                                                        <th colspan="2" class="border " style="text-align: center; vertical-align: middle; padding: 4px;">Physical</th>
                                                        <th colspan="2" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">GAD Expenditure</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border">
                                                            <td class="border" colspan="1">Male:</td>
                                                            <td class="border" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;"><input id="actualmale" class="form-control" style=" border:none; font-size: 14px;" placeholder="Type Here"></td>
                                                            <td class="border" colspan="1">Tier 1:</td>
                                                            <td class="border"  style="vertical-align: middle; text-align: center; padding: 4px;"><input id="actualtierone" class="form-control" style=" border:none; font-size: 14px;" placeholder="Type Here"></td>
                                                        </tr>
                                                        <tr class="border">
                                                            <td class="border">Female:</td>
                                                            <td class="border" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;"><input id="actualfemale" class="form-control" style=" border:none; font-size: 14px;" placeholder="Type Here" type="numfmt_format_currency"></td>
                                                            <td class="border" colspan="1">Tier 2:</td>
                                                            <td class="border" style="vertical-align: middle; text-align: center; padding: 4px;"><input id="actualtiertwo" class="form-control" style=" border:none; font-size: 14px;" placeholder="Type Here"></td>
                                                        </tr>
                                                        <tr class="border">
                                                            <td class="border">Other:</td>
                                                            <td class="border" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;"><input id="other" class="form-control" style=" border:none; font-size: 14px;" placeholder="Type Here" type="numfmt_format_currency"></td>
                                                            <td class="border" colspan="1" rowspan="2" style="vertical-align: middle; text-align: center; padding: 4px;">Total Amount:</td>
                                                            <td class="border" rowspan="2" style="vertical-align: middle; text-align: center; font-size: 18px; padding: 4px;" id="totalactualamount"></td>
                                                        </tr>
                                                        <tr class="border">
                                                            <td class="border">Total:</td>
                                                            <td class="border" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;" id="totalactual"></td>
                                                        </tr>                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                          <h6>Actual Accomplishment</h6>
                                          <i><span>Please provide the accomplishments of the quarter.</span></i>
                                          <div class="dt-ext table-responsive">
                                                <table class="table border table-sm" style=" padding: 1px 1px; ">
                                                    <thead>
                                                        <th colspan="1" class="border" style="text-align: center; vertical-align: middle;">GAD Actvities</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border">
                                                            <td class="border form-control" style="text-align: center; vertical-align: middle;"><textarea id="actualActivity" class="form-control" style=" border:none; font-size: 14px;" placeholder="Type Here"></textarea></td>
                                                        </tr>                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                          <h6>Remarks / Justification</h6>
                                          <div class="dt-ext table-responsive">
                                                <table class="table border table-sm" style=" padding: 1px 1px; ">
                                                    <tbody>
                                                        <tr class="border">
                                                            <td class="border" style="text-align: center; vertical-align: middle;"><textarea id="justification" class="form-control" style=" border:none; font-size: 14px;" placeholder="Type Here"></textarea></td>
                                                        </tr>                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                                @php
                                    $hideClass = (auth()->user()->level_id != 2 && auth()->user()->level_id != 3) ? 'd-none' : '';
                                @endphp
                                <div class="row {{ $hideClass }}">
                                    <div class="col-xxl-12 col-lg-12">
                                        <div class="project-box">
                                            <h6>Remarks from GAD Focal Person / Secretariat</h6>
                                            <div class="dt-ext table-responsive">
                                                <table class="table border table-sm" style="padding: 1px 1px;">
                                                    <tbody>
                                                        <tr class="border">
                                                            <td class="border" style="text-align: center; vertical-align: middle;">
                                                                <textarea id="remark" class="form-control" style="border:none; font-size: 14px;" placeholder="Type Here"></textarea>
                                                            </td>
                                                        </tr>                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!-- <textarea id="remark" class="form-control" style=" border:none; font-size: 14px;" placeholder="Type Here" hidden></textarea> -->
                                <div class="row">
                                    <div class="col-xxl-12 col-lg-4">
                                        <div class="dt-ext table-responsive">
                                            <table class="table border table-sm" style=" padding: 1px 1px; ">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" class="border" style="text-align: center; vertical-align: middle;">Upload MOV's</th>
                                                    </tr>
                                                <tbody>
                                                    <tr class="border">
                                                        <!-- <td  colspan="1" style="text-align: center; vertical-align: middle;"><input class="form-control" id="division" style="border:none; font-size: 14px;" placeholder="Type Here your Section"></input></td>
                                                        <td  colspan="1" style="text-align: center; vertical-align: middle;"><input class="form-control" id="section" style=" border:none; font-size: 14px;" placeholder="Type Here your Division"></input></td> -->
                                                        <td  colspan="1" style="text-align: center; vertical-align: middle;"><input class="form-control" id="file-input" style=" border:none; font-size: 14px;" name="file" type="file" style="border:none;" placeholder="Type Here your Section" multiple></input></td>
                                                    </tr>                                        
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-secondary btn-sm editButton" type="submit"  id="editButton">Save</button>
                    </div>
                    </div>
                    </div>
                    </div>
                    </form>
            </div>
        </div>
    </div> 
    <!-- End of Update Modal -->

    <div class="modal fade" id="movsModal" tabindex="-1" role="dialog" aria-labelledby="movsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 75%">
        <div class="modal-content">
            <div class="card">
                <div class="modal-header">
                            @foreach ($gadar as $key => $g)
                                @if ($key === 0)
                                <h5 class="modal-title" id="updatePCModalLabel">Submitted MOV's FY {{$g->year}}</h5>
                                <!-- <th class="border col-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;">FY {{$g->year}} Actual Accomplishment</th> -->
                                @endif
                            @endforeach
                    
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="dt-ext">
                        <table class="table border table-sm" style=" padding: 1px 1px; " id="basic-1">
                            <thead>
                                <!-- <tr>
                                    <th colspan="5" class="border" style="text-align: center; vertical-align: middle;">Upload MOV's</th>
                                </tr> -->
                                <tr>
                                    <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Date Uploaded</th>
                                    <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">ID</th>
                                    <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Code</th>
                                    <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Division/Section</th>
                                    <!-- <th colspan="1" class="border" style="text-align: center; vertical-align: middle;">Section</th> -->
                                    <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">File Name</th>
                                    <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">File Size</th>
                                    <!-- <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Date Uploaded</th> -->
                                </tr>
                            <tbody>
                            @foreach($gadar as $mov)
                                @if (count($mov->mov_details) > 0)
                                    @foreach($mov->mov_details as $m)
                                        <tr class="border">
                                            <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">
                                                @if ($m['created_at'])
                                                    {{ \Carbon\Carbon::parse($m['created_at'])->format('F d, Y h:i:s') }}
                                                @endif
                                            </td>
                                            <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">{{$loop->parent->iteration}}</td>
                                            <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">{{$mov->indicator_code}}</td>
                                            <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">{{$mov->rawresponsible_unit}}</td>
                                            <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">{{ $m['file_name'] }}</td>
                                            <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">{{ $m['file_size'] }} byte</td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
                <!-- <form action="" id="editform" name="editform" method="POST">
                    <div class="container-fluid">
                    <div class="row">

                    </div>
                    </div>
                </form> -->
        </div>
        </div>
    </div>

    <div class="modal fade" id="logModal" tabindex="-1" role="dialog" aria-labelledby="logModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 50%">
        <div class="modal-content">
            
            <div class="card">
            <div class="modal-header">
                        @foreach ($gadar as $key => $g)
                            @if ($key === 0)
                            <h5 class="modal-title" id="updatelogsModalLabel">GAD Accomplishment Report - Logs FY {{$g->year}}</h5>
                            <!-- <th class="border col-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;">FY {{$g->year}} Actual Accomplishment</th> -->
                            @endif
                        @endforeach
                
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="card-body">
            <div class="dt-ex">
                    <table class="table border table-sm" style=" padding: 1px 1px; " id="export-button">
                        <thead>
                            <!-- <tr>
                                <th colspan="5" class="border" style="text-align: center; vertical-align: middle;">Upload MOV's</th>
                            </tr> -->
                            <tr>
                                <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Date Input</th>
                                <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Time</th>
                                <!-- <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Count</th> -->
                                <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Code</th>
                                <th colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">Division/Section</th>
                                <!-- <th colspan="1" class="border" style="text-align: center; vertical-align: middle;">Section</th> -->
                                <!-- <th colspan="1" class="border" style="text-align: center; vertical-align: middle;">File Size</th>
                                <th colspan="1" class="border" style="text-align: center; vertical-align: middle;">Date Uploaded</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($gadar as $l)
                            @if ($l->verify_id)
                                <tr class="border">
                                    <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">
                                        @if($l->created_att)
                                            {{$l->created_att->format('Y-m-d')}}
                                        @endif
                                    </td>
                                    <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">
                                        @if($l->created_att)
                                            {{$l->created_att->format('h:i:s A')}}
                                        @endif
                                    </td>
                                    <!-- <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">{{$loop->iteration}}</td> -->
                                    <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">{{$l->indicator_code}}</td>
                                    <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">{{$l->rawresponsible_unit}}</td>
                                    <!-- <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">
                                        @if($l->created_att)
                                            {{$l->created_att->format('Y-m-d')}}
                                        @endif
                                    </td>
                                    <td colspan="1" class="border" style="text-align: center; vertical-align: middle; padding: 4px;">
                                        @if($l->created_att)
                                            {{$l->created_att->format('h:i:s A')}}
                                        @endif
                                    </td> -->
                                </tr>
                            @endif
                        @endforeach             
                        </tbody>
                    </table>
                </div>
           </div>
            
            </div>
            
                <!-- <form action="" id="editform" name="editform" method="POST">
                    <div class="container-fluid">
                    <div class="row">

                    </div>
                    </div>
                </form> -->
        </div>
        </div>
    </div>

    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 50%">
        <div class="modal-content">
            <div class="card">
                <div class="modal-header">
                            @foreach ($gadar as $key => $g)
                                @if ($key === 0)
                                <h5 class="modal-title" id="updatelogsModalLabel">Status of Submission {{$g->year}}</h5>
                                <!-- <th class="border col-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px;">FY {{$g->year}} Actual Accomplishment</th> -->
                                @endif
                            @endforeach
                    
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="dt-ext table-responsive ">
                        <table class="table border " >
                            <thead>
                                <th class="border col-1">Division</th>
                                <th class="border col-1">Status</th>
                                <th class="border col-1">Data Submitted</th>
                            </thead>
                            <tbody>
                                @foreach($gadarStatus as $key => $gs)
                                    <tr>
                                        <td>{{$gs->code}}</td>
                                        @if($gs->submit_id == 1)
                                            <td>Submitted</td>
                                        @endif
                                        <td>{{ $gs->created_at->format('l, F j, Y g:i A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 35%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIndicatorModalLabel">Verification</h5>
            </div>
            <div class="modal-body">
                <form action="" id="editform" name="editform" method="POST">
                </form>
                
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-danger btn-sm" type="button" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-success btn-sm" type="button" data-bs-dismiss="modal">Verify</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="addIndicatorModal" tabindex="-1" role="dialog" aria-labelledby="addIndicatorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                @foreach ($gadar as $key => $g)
                    @if ($key === 0)
                    <h5 class="modal-title" id="addIndicatorModalLabel">Additional Indicator in {{$g->year}}</h5>
                    @endif
                @endforeach
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="" id="editform" name="editform" method="POST">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="form theme-form">
                                    <div class="row">
                                        <div class="col-sm-12">
                                                <div class="mb-3">
                                                    <label style="font-size: 18px;">Date Created : {{ now()->format('F d, Y') }} | Time Created : {{ now()->format('H:i:s') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-6 text-center">
                                                <select class="form-select rounded-0" data-control="select2" id="filter_ppa" required>
                                                    <option value="" disabled selected>Select PPA Focus</option>
                                                    <option value="1">A. Client-Focused</option>
                                                    <option value="2">B. Organization-Focused</option>
                                                    <option value="3">C. GAD-Attributed Programs or Projects</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label>Gender Issue or GAD Mandate</label>
                                                <textarea class="form-control" name="add-gadmandate" id="add-gadmandate" type="text" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                        <label>Results Indicator</label>
                                            <textarea class="form-control" name="add-indicator" id="add-indicator" type="text" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-sm-12">
                                            <div class="mb-3 text-center">
                                                <label><strong>PREXC</strong></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3 text-center">
                                            <label>PAP Description</label>
                                            <input class="form-control" name="add-papDesc" id="add-papDesc" type="text" required></input>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3 text-center">
                                            <label>PAP ID</label>
                                            <input class="form-control" name="add-papId" id="add-papId" type="text" required></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                            <label>Source</label>
                                            <textarea class="form-control" name="add-source" id="add-source" type="text" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- <div class="mb-3"> -->
                                            <label>Responsible Unit/Office</label>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                            <!-- <select class="form-select rounded-0" data-control="select2" id="filter_year">
                                                    <option value="" disabled selected>Select Division</option>
                                                    </optgroup>
                                                </select> -->
                                                <input type="text" class="form-control" id="add-division" placeholder="Type Division" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                            <label style="display: none;">Responsible Unit/Office</label>
                                                <!-- <select class="form-select rounded-0" data-control="select2" id="filter_year">
                                                    <option value="" disabled selected>Select Section</option>
                                                    </optgroup>
                                                </select> -->
                                                <input type="text" class="form-control" id="add-section" placeholder="Type Section" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                            <label>REMARKS / JUSTIFICATION</label>
                                            <textarea class="form-control" name="add-justification" id="add-justification" type="text" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                            <label>REMARKS FROM SECRETARIAT</label>
                                            <textarea class="form-control" name="add-remark" id="add-remark" type="text" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-secondary btn-sm editButton" type="submit"  id="addIndicatorButton">Save</button>
                                </div>
                            </div>
                            </div>
                        </div>   
                        </div>
                    </div>
                    </div>
                </form>
        </div>
        </div>
    </div> 
    <!-- End of Update Modal -->
    <!-- Start MOV Modal -->
@endsection

@section('script')
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script>
    // $('#js-quarter-placeholder-multiple').select2({
    //     // dropdownParent: $('#editModal')
    // });
    $(document).ready(function() {
        function calculateTotalBudgetAmountA() {
            var totalBudgetAmountA = 0;
            var totalBudgetAmountB = 0;
            var totalBudgetAmountC = 0;

            $('.budget-rowa').each(function() {
                var budgetAmount = parseFloat($(this).find('[data-totalamount]').data('totalamount'));
                if (!isNaN(budgetAmount)) {
                    totalBudgetAmountA += budgetAmount;
                    // console.log("Budget Amount A:", budgetAmount);
                }
            });

            $('.budget-rowb').each(function() {
                var budgetAmount = parseFloat($(this).find('[data-totalamount]').data('totalamount'));
                if (!isNaN(budgetAmount)) {
                    totalBudgetAmountB += budgetAmount;
                    // console.log("Budget Amount B:", budgetAmount);
                }
            });

            $('.budget-rowc').each(function() {
                var budgetAmount = parseFloat($(this).find('[data-totalamount]').data('totalamount'));
                if (!isNaN(budgetAmount)) {
                    totalBudgetAmountC += budgetAmount;
                    // console.log("Budget Amount C:", budgetAmount);
                }
            });

            $('#totalBudgetAmountA').text(formatAsCurrency(totalBudgetAmountA));
            // console.log("Total Budget Amount A:", totalBudgetAmountA);

            $('#totalBudgetAmountB').text(formatAsCurrency(totalBudgetAmountB));
            // console.log("Total Budget Amount B:", totalBudgetAmountB);

            $('#totalBudgetAmountC').text(formatAsCurrency(totalBudgetAmountC));
            // console.log("Total Budget Amount C:", totalBudgetAmountC);

            var totalSum = totalBudgetAmountA + totalBudgetAmountB + totalBudgetAmountC;

            $('#grandTotal').text(formatAsCurrency(totalSum));
            // console.log("Grand Total Budget:", totalSum);

            function formatAsCurrency(amount) {
                return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
            }
        }

        calculateTotalBudgetAmountA();
    });

    $(document).ready(function() {
    function calculateTotalExpenAmountA() {
        var totalExpenAmountA = 0;
        var totalExpenAmountB = 0;
        var totalExpenAmountC = 0;

        $('.budget-rowa').each(function() {
            var expenAmount = parseFloat($(this).find('[data-expen]').data('expen'));
            if (!isNaN(expenAmount)) {
                totalExpenAmountA += expenAmount;
                // console.log("Expenditure Amount A:", expenAmount);
            }
        });

        $('.budget-rowb').each(function() {
            var expenAmount = parseFloat($(this).find('[data-expen]').data('expen'));
            if (!isNaN(expenAmount)) {
                totalExpenAmountB += expenAmount;
                // console.log("Expenditure Amount B:", expenAmount);
            }
        });

        $('.budget-rowc').each(function() {
            var expenAmount = parseFloat($(this).find('[data-expen]').data('expen'));
            if (!isNaN(expenAmount)) {
                totalExpenAmountC += expenAmount;
                // console.log("Expenditure Amount C:", expenAmount);
            }
        });

        $('#totalExpenditureAmountA').text(formatAsCurrency(totalExpenAmountA));
        // console.log("Total Expenditure Amount A:", totalExpenAmountA);

        $('#totalExpenditureAmountB').text(formatAsCurrency(totalExpenAmountB));
        // console.log("Total Expenditure Amount B:", totalExpenAmountB);

        $('#totalExpenAmountC').text(formatAsCurrency(totalExpenAmountC));
        
        // console.log("Total Expenditure Amount C:", totalExpenAmountC);

        var totalSum = totalExpenAmountA + totalExpenAmountB + totalExpenAmountC;

        // $('#grandExpen').text(totalSum.toFixed(2));
        // console.log("Grand Total Expenditure:", totalSum);
        $('#grandExpen').text(formatAsCurrency(totalSum));

        function formatAsCurrency(amount) {
            return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
        }
    }

    calculateTotalExpenAmountA();
});


    function get_indicator(){
        var row = $(event.target).closest('tr');
        var year = row.find('[data-year]').data('year');
        var gadar_id = row.find('[data-id]').data('id');
        var code = row.find('[data-code]').data('code');
        var mandate = row.find('[data-mandate]').data('mandate');
        var result = row.find('[data-result]').data('result');
        var targetm = row.find('[data-targetm]').data('targetm');
        var targetf = row.find('[data-targetf]').data('targetf');
        var targetts = row.find('[data-targetts]').data('targetts');
        var prevm = row.find('[data-prevm]').data('prevm');
        var phymale = row.find('[data-phymale]').data('phymale');
        var phyfemale = row.find('[data-phyfemale]').data('phyfemale');
        var phyother = row.find('[data-phyother]').data('phyother');
        var phytotal = row.find('[data-phytotal]').data('phytotal');
        var prevf = row.find('[data-prevf]').data('prevf');
        var tieroneexpen = row.find('[data-tieroneexpen]').data('tieroneexpen');
        var tiertwoexpen = row.find('[data-tiertwoexpen]').data('tiertwoexpen');
        var expen = row.find('[data-expen]').data('expen');
        var actualact = row.find('[data-actualact]').data('actualact');
        var justify = row.find('[data-justify]').data('justify');
        var prevtotalsex = row.find('[data-prevtotalsex]').data('prevtotalsex');
        var prevbudget = row.find('[data-prevbudget]').data('prevbudget');
        var tierone = row.find('[data-tierone]').data('tierone');
        var tiertwo = row.find('[data-tiertwo]').data('tiertwo');
        var totalamount = row.find('[data-totalamount]').data('totalamount');
        var remark = row.find('[data-remark]').data('remark');
        var prevtierone = prevbudget;
        var prevtiertwo = 0;

        $('#filter_year').val(year);
        $('#gadar_id').text(gadar_id);
        $('#mandate').text(mandate);
        $('#result').text(result);
        $('#prevm').text(prevm);
        $('#prevf').text(prevf);
        $('#prevtotalsex').text(prevtotalsex);
        $('#prevtierone').text(prevtierone);
        $('#prevtiertwo').text(prevtiertwo);
        $('#prevbudget').text(prevbudget);
        $('#targetm').text(targetm);
        $('#targetf').text(targetf);
        $('#targetts').text(targetts);
        $('#tierone').text(tierone);
        $('#tiertwo').text(tiertwo);
        $('#totala').text(totalamount);
        $('#actualmale').val(phymale);
        $('#actualfemale').val(phyfemale);
        $('#other').val(phyother);
        $('#totalactual').text(phytotal);
        $('#actualtierone').val(tieroneexpen);
        $('#actualtiertwo').val(tiertwoexpen);
        // $('#totalactualamount').text(expen);
        $('#actualActivity').text(actualact);
        $('#justification').text(justify);
        $('#remark').text(remark);

        $('#totalactualamount').text(formatAsCurrency(expen));
            // console.log("Grand Total Budget:", totalSum);

            function formatAsCurrency(amount) {
                return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
            }

        $('#totala').text(formatAsCurrency(totalamount));
            // console.log("Grand Total Budget:", totalSum);

            function formatAsCurrency(amount) {
                return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
            }

        $('#prevbudget').text(formatAsCurrency(prevbudget));
            // console.log("Grand Total Budget:", totalSum);

            function formatAsCurrency(amount) {
                return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'PHP' }).format(amount);
            }

       
        $(document).ready(function() {
            // Attach change event listener to input fields with IDs starting with 'actual'
            $('input[id^="actual"]').change(function() {
                updateTotal(); // Call the updateTotal function when any of these input fields change
            });
        });

        // Define the updateTotal function
        function updateTotal() {
            // Get the input elements
            var maleValue = parseFloat($('#actualmale').val()) || 0;
            var femaleValue = parseFloat($('#actualfemale').val()) || 0;
            var otherValue = parseFloat($('#other').val()) || 0;
            console.log(otherValue);
            var total = maleValue + femaleValue + otherValue;
            var tierOneValue = parseFloat($('#actualtierone').val()) || 0;
            var tierTwoValue = parseFloat($('#actualtiertwo').val()) || 0;
            var totalamount = tierOneValue + tierTwoValue;
            // Update the total field with the calculated value
            $('#totalactual').text(total);
            $('#totalactualamount').text(totalamount);
        }

    
        $("#editButton").click(function(event) {
        event.preventDefault();
        var actualmale = $('#actualmale').val();
        var actualfemale = $('#actualfemale').val();
        var actualother = $('#other').val();
            var maleValue = parseFloat($('#actualmale').val()) || 0;
            var femaleValue = parseFloat($('#actualfemale').val()) || 0;
            var otherValue = parseFloat($('#other').val()) || 0;
            var total = maleValue + femaleValue + otherValue;
        var totalactual = total;
        var actualtierone = $('#actualtierone').val();
        var actualtiertwo = $('#actualtiertwo').val();
            var tierOneValue = parseFloat($('#actualtierone').val()) || 0;
            var tierTwoValue = parseFloat($('#actualtiertwo').val()) || 0;
            var totalamount = tierOneValue + tierTwoValue;
        var actualtotalamount = totalamount;
        var actualActivity = $('#actualActivity').val();
        var justification = $('#justification').val();
        var files = $('#file-input')[0].files;
        // var division = $('#division').val();
        // var section = $('#section').val();
        var selectedQuarter = $('#quarter').val();
        var remark = $('#remark').val();
        var selectedYear = $('#filter_year').val();


        
        var formData = new FormData();
        for (var i = 0; i < files.length; i++) {
            formData.append('files[]', files[i]);
        }
        
        formData.append('gadar_id', gadar_id);
        // formData.append('filterquarter', filterquarter);
        formData.append('actualmale', actualmale);
        formData.append('actualfemale', actualfemale);
        formData.append('actualother', actualother);
        formData.append('totalactual', totalactual);
        formData.append('actualtierone', actualtierone);
        formData.append('actualtiertwo', actualtiertwo);
        formData.append('actualtotalamount', actualtotalamount);
        formData.append('actualActivity', actualActivity);
        formData.append('justification', justification);
        formData.append('remark', remark);
        formData.append('quarter', selectedQuarter);
        formData.append('year', selectedYear);
        
        // console.log('actualActivity:', formData.get('actualActivity'));
        // formData.append('gadaractual_id', id);
        // formData.append('division', division);
        // formData.append('section', section);
        
        var dataToSend = {
            id: gadar_id,
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
        // console.log(dataToSend);
        // Check if dataToSend is not empty before sending the request
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
                        url: BASE_URL + 'gender_and_development/gadar/upload',
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
    }

    $(document).ready(function() {
    // Define your base URL
    var BASE_URL = "{{ url('/') }}"; // Assuming your Laravel application is served from the root URL

        $('#btn-filter-year').click(function() {
            event.preventDefault();
            
            // Get the selected value
            var selectedYear = $('#filter_year').val();
            var selectedQuarter = $('#quarter').val();
            $.ajax({
                // Construct the URL by appending the route segment to the base URL
                url: BASE_URL + '/gender_and_development/gadar/year/quarter', // Your Laravel route for filtering data
                method: 'GET',
                data: {
                    year: selectedYear,
                    quarter: selectedQuarter
                },
                success: function(response) {
                    // Handle the filtered data response
                    window.location.href = "{{ route('gadar.year.quarter', ['year' => ':year', 'quarter' => ':quarter']) }}"
                    .replace(':year', selectedYear)
                    .replace(':quarter', selectedQuarter);
                    $('#filter_year').text(selectedYear);
                    $('#quarter').text(selectedQuarter);
                    // Update your frontend to display the filtered data
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });

    // function add_indicator(){
        // var row = $(event.target).closest('tr');
        // var year = row.find('[data-year]').data('year');
        // console.log(year);  // This logs the actual value of 'year'

        $("#addIndicatorButton").click(function(event) {
            event.preventDefault();
        var currentYear = new Date().getFullYear();
        var addppa = $('#filter_ppa').val();
        var addgadmanadate = $('#add-gadmandate').val();
        var addindicator = $('#add-indicator').val();
        var addpapdesc= $('#add-papDesc').val();
        var addpapid = $('#add-papId').val();
        var addactualact = $('#add-actualact').val();
        var addactualtierone = $('#add-actualtierone').val();
        var addactualtiertwo = $('#add-actualtiertwo').val();
            var tierOneValue = parseFloat($('#add-actualtierone').val()) || 0;
            var tierTwoValue = parseFloat($('#add-actualtiertwo').val()) || 0;
            var totalamount = tierOneValue + tierTwoValue;
        var addactualtotalamount = totalamount;
        var addjustification = $('#add-justification').val();
        var addsource= $('#add-source').val();
        var addremark= $('#add-remark').val();
        var adddivision= $('#add-division').val();
        var addsection= $('#add-section').val();
        
        // var formData = new FormData();
        // for (var i = 0; i < files.length; i++) {
        //     formData.append('files[]', files[i]);
        // }

        var formData = new FormData();

        // formData.append('gadar_id', gadar_id);
        formData.append('year', currentYear);
        formData.append('addppa', addppa);
        formData.append('addgadmanadate', addgadmanadate);
        formData.append('addindicator', addindicator);
        formData.append('addpapdesc', addpapdesc);
        formData.append('addpapid', addpapid);
        // formData.append('addactualact', addactualact);
        // formData.append('addactualtierone', addactualtierone);
        // formData.append('addactualtiertwo', addactualtiertwo);
        // formData.append('addactualtotalamount', addactualtotalamount);
        formData.append('addjustification', addjustification);
        formData.append('addsource', addsource);
        formData.append('addremark', addremark);
        formData.append('adddivision', adddivision);
        formData.append('addsection', addsection);
        // formData.append('quarter', selectedQuarter);

        var dataToSend = {
            id: gadar_id,
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
        console.log(dataToSend);
        // Check if dataToSend is not empty before sending the request
        if (Object.keys(dataToSend).length > 0) {
            Swal.fire({
                title: 'Are you sure you want to Update in selectedQuarter?',
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
                        url: BASE_URL + 'gender_and_development/gadar/save',
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
    // }
    
    function verify() {
    var row = $(event.target).closest('tr');
    var gadar_id = row.find('[data-id]').data('id');
    var actualact = row.find('[data-actualact]').data('actualact');
    var justify = row.find('[data-justify]').data('justify');
    var prevtotalsex = row.find('[data-prevtotalsex]').data('prevtotalsex');
    var verify_id = 1;
    var selectedQuarter = $('#quarter').val();
    // Log the values for debugging
    // console.log("actualact:", actualact);
    // console.log("justify:", justify);

    // Convert undefined to an empty string for comparison
    prevtotalsex = prevtotalsex === undefined ? '' : prevtotalsex;
    actualact = actualact === undefined ? '' : actualact;
    justify = justify === undefined ? '' : justify;

    // Log the converted values for debugging
    // console.log("Converted actualact:", actualact);
    // console.log("Converted justify:", justify);

     var dataToSend = {
            id: gadar_id,
            verify_id : verify_id,
            quarter: selectedQuarter
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

        console.log(dataToSend);
    if (!actualact && !justify && !prevtotalsex) {
        Swal.fire(
            'Failed!',
            'No Actual Activity Submitted or Remarks / Justification',
            'error'
        );
    } else {
        Swal.fire({
            title: 'Are you sure you want to Verify This?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Verify it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: BASE_URL + 'gender_and_development/gadar/verify',
                    type: 'POST',
                    data: dataToSend,
                    success: function(response) {
                        Swal.fire(
                            'Confirm!',
                            'Your verification has been saved.',
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
    }
}

function submit(){
    var selectedYear = $('#filter_year').val();
    var selectedQuarter = $('#quarter').val();
    var division_id = "{{ auth()->user()->division_id }}";
    var submit_id = "1";
    

    $(document).ready(function() {
        let errors = [];

        $('tr.budget-rowa').each(function() {
            // Get data attributes
            var actualActivity = $(this).find('[data-actualact]').data('actualact');
            var justification = $(this).find('[data-justify]').data('justify');
            var totalphytotal = $(this).find('[data-phytotal]').data('phytotal');
            
            var submit_id = "1";

            if (justification === null || justification === undefined || justification === '') {
                if (actualActivity === null || actualActivity === undefined || actualActivity === '') {
                    $(this).find('[data-activity]').css('color', 'red');
                    errors.push('actualActivity');
                    if (totalphytotal === null || totalphytotal === undefined) {
                    $(this).find('[data-phytotal]').css('color', 'red');
                    errors.push('totalphytotal');
                }
                }
            }
        });

        var dataToSend = {
            year: selectedYear,
            quarter : selectedQuarter,
            division_id: division_id,
            submit_id : submit_id,
        };
        console.log(errors);
        // Final conditional check
        if (errors.length > 0) {
            console.log("Error: There are issues with the data.");
            // Perform additional actions if needed
            Swal.fire(
                'Submission Failed!',
                'Either an actual activity submission or remarks/justification is missing.',
                'error'
            );
        } else {
            console.log("All data is valid.");
            // Perform additional actions if needed
            Swal.fire({
            title: 'Are you sure you want to Verify This?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Verify it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: BASE_URL + 'gender_and_development/gadar/submit',
                        type: 'POST',
                        data: dataToSend,
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
        }

    });
}

$(document).ready(function() {
    function updateExportHref() {
        var selectedYear = $('#filter_year').val();
        var selectedQuarter = $('#quarter').val();
        var baseUrl = "{{ route('gadar.export', ['year' => ':year', 'quarter' => ':quarter']) }}";

        // Replace placeholders with actual values
        var exportUrl = baseUrl.replace(':year', selectedYear || 'null').replace(':quarter', selectedQuarter || 'null');

        $('#exportButton').attr('href', exportUrl);
    }

    // Update the href when the select elements change
    $('#filter_year, #quarter').on('change', function() {
        updateExportHref();
    });

    // Initial call to set the href based on initial selections
    updateExportHref();
});

$(document).ready(function() {
    function updateExportHref() {
        var selectedYear = $('#filter_year').val();
        var selectedQuarter = $('#quarter').val();
        var baseUrl = "{{ route('gadar-pdf', ['year' => ':year', 'quarter' => ':quarter']) }}";

        // Replace placeholders with actual values
        var exportUrl = baseUrl.replace(':year', selectedYear || 'null').replace(':quarter', selectedQuarter || 'null');

        $('#pdfButton').attr('href', exportUrl);
    }

    // Update the href when the select elements change
    $('#filter_year, #quarter').on('change', function() {
        updateExportHref();
    });

    // Initial call to set the href based on initial selections
    updateExportHref();
});
</script>

<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script> -->
<script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script> -->
<script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script> -->
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script> -->
<script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
<!-- End of Datatable -->

<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection