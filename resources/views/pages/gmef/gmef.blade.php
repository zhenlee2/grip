@extends('layouts.simple.master')
@section('title', 'GMEF Tool')

@section('css')
@endsection

@section('style')
    <style>
      .page-wrapper .page-body-wrapper .page-title {
            padding-top: 25px;
            padding-bottom: 5px;
        }
    </style>
        <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #c6b6d9;
            padding: 8px;
            text-align: left;
            vertical-align: middle;
            max-width: 300px; /* Set maximum width for table cells */
            word-wrap: break-word; /* Wrap long words */
            /* overflow: hidden; */
            /* text-overflow: ellipsis; Add ellipsis for overflow text */
            /* white-space: nowrap; Prevent text from wrapping */
        }
        .table th {
            background-color: #c6b6d9;
            color: white;
        }
        .table .header {
            background-color: #674ea7;
        }
        .score-input {
            width: 100%;
            text-align: center;
            border: none;
            color: white;
            background-color: #c6b6d9;
        }
        select {
            width: 100%;
        }
    </style>
@endsection

@section('breadcrumb-title')
<h3>Gender Mainstreaming Evaluation Framework Tool</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">GMEF</li>
                  
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
               <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="policy-tab" data-bs-toggle="tab" href="#policy" role="tab" aria-controls="policy" aria-selected="true"><i class="icofont icofont-list"></i>POLICY</a></li>
                    <li class="nav-item"><a class="nav-link" id="people-tab" data-bs-toggle="tab" href="#people" role="tab" aria-controls="people" aria-selected="false"><i class="icofont icofont-list"></i>PEOPLE</a></li>
                    <li class="nav-item"><a class="nav-link" id="enabling-mechanism-tab" data-bs-toggle="tab" href="#enabling-mechanism" role="tab" aria-controls="enabling-mechanism" aria-selected="false"><i class="icofont icofont-list"></i>ENABLING MECHANISMS</a></li>
                    <li class="nav-item"><a class="nav-link" id="paps-tab" data-bs-toggle="tab" href="#paps" role="tab" aria-controls="paps" aria-selected="false"><i class="icofont icofont-list"></i>Programs, Activities and Projects (PAPs)</a></li>
                    <li class="nav-item"><a class="nav-link" id="over-all-level-tab" data-bs-toggle="tab" href="#over-all-level" role="tab" aria-controls="over-all-level" aria-selected="false"><i class="icofont icofont-ui-rating"></i>OVER ALL LEVEL</a></li>
				</ul>
            
					<div class="tab-content" id="icon-tabContent">
						<div class="tab-pane fade show active" id="policy" role="tabpanel" aria-labelledby="policy-tab">
                            <div class="card mb-0">
                                <div class="card-body p-0">
                                    <div class="row list-persons" id="addcon">
                                        <div class="col-xl-12 col-md-12">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                                    <div class="card-body">
                                                        <div class="dt-ext table-responsive">
                                                        <table class="table border gy-6 table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="5">
                                                                        <h5>POLICY ORGANIZATIONAL ASSESSMENT QUESTIONNAIRE</h5>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center border p-1" style="color: white; background-color: #c6b6d9; vertical-align: middle;" colspan="2">
                                                                        <h6><strong>TOTAL GMEF SCORE <i>(POLICY)</i></strong></h6>
                                                                    </td>
                                                                    <td class="text-center border p-1" style="color: white; background-color: #c6b6d9; vertical-align: middle;"  colspan="1">
                                                                        <h5 id="grandTotalCell">0</h5>
                                                                    </td>
                                                                    <td class="border" style="color: white; background-color: #c6b6d9; vertical-align: middle;" colspan="2"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border w-400px p-1" rowspan="2" style="color: white; background-color: #c6b6d9; vertical-align: middle;">DESCRIPTORS</th>
                                                                    <th class="text-center border p-1" colspan="1" style="color: white; background-color: #c6b6d9; vertical-align: middle;">SCORE</th>
                                                                    <th class="text-center border p-1" colspan="1" rowspan="2" style="color: white; background-color: #c6b6d9; vertical-align: middle;">Score Per Item</th>
                                                                    <th class="text-center border p-1" style="color: white; background-color: #c6b6d9; vertical-align: middle;" rowspan="1">Means of Verification/Remarks</th>
                                                                    <th class="text-center border p-1" style="color: white; background-color: #c6b6d9; vertical-align: middle;" rowspan="1">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style="cursor: pointer;" >
                                                                    <th  colspan="6" class="border p-1 " data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="heading1">
                                                                        @foreach($indicator as $key => $g)
                                                                            @if($g->indicator_id == 1)  
                                                                                {{ $g->title_indi }} <i>{{$g->title_parenthesis}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    </th>
                                                                </tr>
                                                                <tr class="default-according" id="accordionclose" >
                                                                    @foreach($questionnaire as $g)
                                                                        @if($g->indicator_id == 1)
                                                                            <tr class="collapse" id="collapse{{ $g->indicator_id }}" aria-labelledby="heading{{ $g->indicator_id }}" data-bs-parent="#accordionclose">
                                                                                <td class="border p-1">
                                                                                    {{ $g->descriptors }} <i>{{ $g->desc_parenthesis }}</i>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                    <select id="score-select-{{ $g->questionnaire_id }}" class="border p-1" onchange="updateDescriptionAndScore(this.value, this.options[this.selectedIndex].text, {{$g->questionnaire_id}})">
                                                                                        <option value="" disabled selected>Select score</option>
                                                                                            @foreach($g->scores as $score)
                                                                                                <option value="{{ $score->point }}">
                                                                                                {{ $score->score_desc }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                    </select>
                                                                                    <!-- Container for displaying full descriptions -->
                                                                                    <div id="description-container-{{ $g->questionnaire_id }}" class="mt-2"></div>
                                                                                </td>
                                                                                <td class="border p-1" style="text-align: center;" id="score-points-{{ $g->questionnaire_id }}"></td>
                                                                                <td class="border p-1">
                                                                                    <div>
                                                                                        @foreach ($g->instruction as $instruction)
                                                                                            <span>{{$instruction->instruction}} <i>{{$instruction->instruc_parenthesis}}</i></span>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="dt-ext table-responsive">
                                                                                        <table class="table border table-sm">
                                                                                            <thead>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <th class="border">{{ $moves->table_title }}</th>
                                                                                                @endforeach
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <td class="border"></td>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                  <div class="btn btn-outline-primary">Add</div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="2">Sub-total GMEF Score <i>(Level 1 Policy)</i></th>
                                                                    <th class="text-center border" colspan="1" id="subtotalCell5">0</th>
                                                                    <th class="text-center border" colspan="2"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="5"></th>
                                                                </tr>
                                                                <tr style="cursor: pointer;" >
                                                                    <th class="border p-1" colspan="6" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="heading2">
                                                                        @foreach($indicator as $key => $g)
                                                                            @if($g->indicator_id == 2)  
                                                                                {{ $g->title_indi }} <i>{{$g->title_parenthesis}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    </th>
                                                                </tr>
                                                                <tr class="default-according" id="accordionclose" >
                                                                    @foreach($questionnaire as $g)
                                                                        @if($g->indicator_id == 2)
                                                                            <tr class="collapse" id="collapse{{ $g->indicator_id }}" aria-labelledby="heading{{ $g->indicator_id }}" data-bs-parent="#accordionclose">
                                                                                <td class="border p-1">
                                                                                    {{ $g->descriptors }} <i>{{ $g->desc_parenthesis }}</i>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                    <select id="score-select-{{ $g->id }}" class="border p-1" onchange="updateDescriptionAndScore(this, {{ $g->id }})">
                                                                                        <option value="" disabled selected>Select score</option>
                                                                                        @foreach($g->scores as $score)
                                                                                                <option value="{{ $score->point }}">
                                                                                                {{ $score->score_desc }}
                                                                                                </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <!-- Container for displaying full descriptions -->
                                                                                    <div id="description-container-{{ $g->id }}" class="mt-2"></div>
                                                                                </td>
                                                                                <td class="border p-1" style="text-align: center;" id="score-points-{{ $g->id }}"></td>
                                                                                <td class="border p-1">
                                                                                    <div>
                                                                                        @foreach ($g->instruction as $instruction)
                                                                                            <span>{{$instruction->instruction}} <i>{{$instruction->instruc_parenthesis}}</i></span>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="dt-ext table-responsive">
                                                                                        <table class="table border table-sm">
                                                                                            <thead>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <th class="border">{{ $moves->table_title }}</th>
                                                                                                @endforeach
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <td class="border"></td>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                  <div class="btn btn-outline-primary">Add</div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="2">Sub-total GMEF Score <i>(Level 2 Policy)</i></th>
                                                                    <th class="text-center border" colspan="1" id="subtotalCell5">0</th>
                                                                    <th class="text-center border" colspan="2"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="5"></th>
                                                                </tr>
                                                                <tr style="cursor: pointer;" >
                                                                    <th class="border p-1" colspan="6" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="heading3">
                                                                        @foreach($indicator as $key => $g)
                                                                            @if($g->indicator_id == 3)  
                                                                                {{ $g->title_indi }} <i>{{$g->title_parenthesis}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    </th>
                                                                </tr>
                                                                <tr class="default-according" id="accordionclose" >
                                                                    @foreach($questionnaire as $g)
                                                                            @if($g->indicator_id == 3)
                                                                                <tr class="collapse" id="collapse{{ $g->indicator_id }}" aria-labelledby="heading{{ $g->indicator_id }}" data-bs-parent="#accordionclose">
                                                                                    <td class="border p-1">
                                                                                        {{ $g->descriptors }} <i>{{ $g->desc_parenthesis }}</i>
                                                                                    </td>
                                                                                    <td class="border p-1">
                                                                                        <select id="score-select-{{ $g->id }}" class="border p-1" onchange="updateDescriptionAndScore(this, {{ $g->id }})">
                                                                                            <option value="" disabled selected>Select score</option>
                                                                                            @foreach($g->scores as $score)
                                                                                                    <option value="{{ $score->point }}">
                                                                                                    {{ $score->score_desc }}
                                                                                                    </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <!-- Container for displaying full descriptions -->
                                                                                        <div id="description-container-{{ $g->id }}" class="mt-2"></div>
                                                                                    </td>
                                                                                    <td class="border p-1" style="text-align: center;" id="score-points-{{ $g->id }}"></td>
                                                                                    <td class="border p-1">
                                                                                    <div>
                                                                                        @foreach ($g->instruction as $instruction)
                                                                                            <span>{{$instruction->instruction}} <i>{{$instruction->instruc_parenthesis}}</i></span>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="dt-ext table-responsive">
                                                                                        <table class="table border table-sm">
                                                                                            <thead>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <th class="border">{{ $moves->table_title }}</th>
                                                                                                @endforeach
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <td class="border"></td>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                  <div class="btn btn-outline-primary">Add</div>
                                                                                </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="2">Sub-total GMEF Score <i>(Level 3 Policy)</i></th>
                                                                    <th class="text-center border" colspan="1" id="subtotalCell5">0</th>
                                                                    <th class="text-center border" colspan="2"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="5"></th>
                                                                </tr>
                                                                <tr style="cursor: pointer;" >
                                                                    <th class="border p-1" colspan="6" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="heading4">
                                                                        @foreach($indicator as $key => $g)
                                                                            @if($g->indicator_id == 4)  
                                                                                {{ $g->title_indi }} <i>{{$g->title_parenthesis}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    </th>
                                                                </tr>
                                                                <tr class="default-according" id="accordionclose" >
                                                                @foreach($questionnaire as $g)
                                                                        @if($g->indicator_id == 4)
                                                                            <tr class="collapse" id="collapse{{ $g->indicator_id }}" aria-labelledby="heading{{ $g->indicator_id }}" data-bs-parent="#accordionclose">
                                                                                <td class="border p-1">
                                                                                    {{ $g->descriptors }} <i>{{ $g->desc_parenthesis }}</i>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                    <select id="score-select-{{ $g->id }}" class="border p-1" onchange="updateDescriptionAndScore(this, {{ $g->id }})">
                                                                                        <option value="" disabled selected>Select score</option>
                                                                                        @foreach($g->scores as $score)
                                                                                                <option value="{{ $score->point }}">
                                                                                                {{ $score->score_desc }}
                                                                                                </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <!-- Container for displaying full descriptions -->
                                                                                    <div id="description-container-{{ $g->id }}" class="mt-2"></div>
                                                                                </td>
                                                                                <td class="border p-1" style="text-align: center;" id="score-points-{{ $g->id }}"></td>
                                                                                <td class="border p-1">
                                                                                    <div>
                                                                                        @foreach ($g->instruction as $instruction)
                                                                                            <span>{{$instruction->instruction}} <i>{{$instruction->instruc_parenthesis}}</i></span>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="dt-ext table-responsive">
                                                                                        <table class="table border table-sm">
                                                                                            <thead>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <th class="border">{{ $moves->table_title }}</th>
                                                                                                @endforeach
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <td class="border"></td>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                  <div class="btn btn-outline-primary">Add</div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="2">Sub-total GMEF Score <i>(Level 4 Policy)</i></th>
                                                                    <th class="text-center border" colspan="1" id="subtotalCell5">0</th>
                                                                    <th class="text-center border" colspan="2"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="5"></th>
                                                                </tr>
                                                                <tr style="cursor: pointer;" >
                                                                    <th class="border p-1" colspan="6" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="heading5">
                                                                        @foreach($indicator as $key => $g)
                                                                            @if($g->indicator_id == 5)  
                                                                                {{ $g->title_indi }} <i>{{$g->title_parenthesis}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    </th>
                                                                </tr>
                                                                <tr class="default-according" id="accordionclose" >
                                                                @foreach($questionnaire as $g)
                                                                        @if($g->indicator_id == 5)
                                                                            <tr class="collapse" id="collapse{{ $g->indicator_id }}" aria-labelledby="heading{{ $g->indicator_id }}" data-bs-parent="#accordionclose">
                                                                                <td class="border p-1">
                                                                                    {{ $g->descriptors }} <i>{{ $g->desc_parenthesis }}</i>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                    <select id="score-select-{{ $g->id }}" class="border p-1" onchange="updateDescriptionAndScore(this, {{ $g->id }})">
                                                                                        <option value="" disabled selected>Select score</option>
                                                                                        @foreach($g->scores as $score)
                                                                                                <option value="{{ $score->point }}">
                                                                                                {{ $score->score_desc }}
                                                                                                </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <!-- Container for displaying full descriptions -->
                                                                                    <div id="description-container-{{ $g->id }}" class="mt-2"></div>
                                                                                </td>
                                                                                <td class="border p-1" style="text-align: center;" id="score-points-{{ $g->id }}"></td>
                                                                                <td class="border p-1">
                                                                                    <div>
                                                                                        @foreach ($g->instruction as $instruction)
                                                                                            <span>{{$instruction->instruction}} <i>{{$instruction->instruc_parenthesis}}</i></span>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="dt-ext table-responsive">
                                                                                        <table class="table border table-sm">
                                                                                            <thead>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <th class="border">{{ $moves->table_title }}</th>
                                                                                                @endforeach
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <td class="border"></td>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                  <div class="btn btn-outline-primary">Add</div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="2">Sub-total GMEF Score <i>(Level 5 Policy)</i></th>
                                                                    <th class="text-center border" colspan="1" id="subtotalCell5">0</th>
                                                                    <th class="text-center border" colspan="2"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="5"></th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                  <!-- END TAB FOR POLICY -->
                  <!-- START TAB FOR PEOPLE -->
                  <div class="tab-pane fade" id="people" role="tabpanel" aria-labelledby="people-tab">
                        <div class="card mb-0">
                            <div class="card-body p-0">
                                <div class="row list-persons" id="addcon">
                                    <div class="col-xl-12 col-md-12">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                                <div class="card-body">
                                                    <div class="dt-ext table-responsive">
                                                    <table class="table border gy-6 table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="5">
                                                                        <h5>PEOPLE ORGANIZATIONAL ASSESSMENT QUESTIONNAIRE</h5>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center border p-1" style="color: white; background-color: #c6b6d9; vertical-align: middle;" colspan="2">
                                                                        <h6><strong>TOTAL GMEF SCORE <i>(PEOPLE)</i></strong></h6>
                                                                    </td>
                                                                    <td class="text-center border p-1" style="color: white; background-color: #c6b6d9; vertical-align: middle;"  colspan="1">
                                                                        <h5 id="grandTotalCell">0</h5>
                                                                    </td>
                                                                    <td class="border" style="color: white; background-color: #c6b6d9; vertical-align: middle;" colspan="2"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border w-400px p-1" rowspan="2" style="color: white; background-color: #c6b6d9; vertical-align: middle;">DESCRIPTORS</th>
                                                                    <th class="text-center border p-1" colspan="1" style="color: white; background-color: #c6b6d9; vertical-align: middle;">SCORE</th>
                                                                    <th class="text-center border p-1" colspan="1" rowspan="2" style="color: white; background-color: #c6b6d9; vertical-align: middle;">Score Per Item</th>
                                                                    <th class="text-center border p-1" style="color: white; background-color: #c6b6d9; vertical-align: middle;" rowspan="1">Means of Verification/Remarks</th>
                                                                    <th class="text-center border p-1" style="color: white; background-color: #c6b6d9; vertical-align: middle;" rowspan="1">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr style="cursor: pointer;" >
                                                                    <th  colspan="6" class="border p-1 " data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="heading6">
                                                                        @foreach($indicator as $key => $g)
                                                                            @if($g->indicator_id == 6)  
                                                                                {{ $g->title_indi }} <i>{{$g->title_parenthesis}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    </th>
                                                                </tr>
                                                                <tr class="default-according" id="accordionclose" >
                                                                    @foreach($questionnaire as $g)
                                                                        @if($g->indicator_id == 6)
                                                                            <tr class="collapse" id="collapse{{ $g->indicator_id }}" aria-labelledby="heading{{ $g->indicator_id }}" data-bs-parent="#accordionclose">
                                                                                <td class="border p-1">
                                                                                    {{ $g->descriptors }} <i>{{ $g->desc_parenthesis }}</i>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                    <select id="score-select-{{ $g->questionnaire_id }}" class="border p-1" onchange="updateDescriptionAndScore(this.value, this.options[this.selectedIndex].text, {{$g->questionnaire_id}})">
                                                                                        <option value="" disabled selected>Select score</option>
                                                                                            @foreach($g->scores as $score)
                                                                                                <option value="{{ $score->point }}">
                                                                                                {{ $score->score_desc }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                    </select>
                                                                                    <!-- Container for displaying full descriptions -->
                                                                                    <div id="description-container-{{ $g->questionnaire_id }}" class="mt-2"></div>
                                                                                </td>
                                                                                <td class="border p-1" style="text-align: center;" id="score-points-{{ $g->questionnaire_id }}"></td>
                                                                                <td class="border p-1">
                                                                                    <div>
                                                                                        @foreach ($g->instruction as $instruction)
                                                                                            <span>{{$instruction->instruction}} <i>{{$instruction->instruc_parenthesis}}</i></span>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="dt-ext table-responsive">
                                                                                        <table class="table border table-sm">
                                                                                            <thead style="">
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <th class="border" style="text-align: center;">{{ $moves->table_title }}</th>
                                                                                                @endforeach
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <td class="border"></td>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                  <div class="btn btn-outline-primary">Add</div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="2">Sub-total GMEF Score <i>(Level 1 People)</i></th>
                                                                    <th class="text-center border" colspan="1" id="subtotalCell5">0</th>
                                                                    <th class="text-center border" colspan="2"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="5"></th>
                                                                </tr>
                                                                <tr style="cursor: pointer;" >
                                                                    <th  colspan="6" class="border p-1 " data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="heading6">
                                                                        @foreach($indicator as $key => $g)
                                                                            @if($g->indicator_id == 6)  
                                                                                {{ $g->title_indi }} <i>{{$g->title_parenthesis}}</i>
                                                                            @endif
                                                                        @endforeach
                                                                    </th>
                                                                </tr>
                                                                <tr class="default-according" id="accordionclose" >
                                                                    @foreach($questionnaire as $g)
                                                                        @if($g->indicator_id == 6)
                                                                            <tr class="collapse" id="collapse{{ $g->indicator_id }}" aria-labelledby="heading{{ $g->indicator_id }}" data-bs-parent="#accordionclose">
                                                                                <td class="border p-1">
                                                                                    {{ $g->descriptors }} <i>{{ $g->desc_parenthesis }}</i>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                    <select id="score-select-{{ $g->questionnaire_id }}" class="border p-1" onchange="updateDescriptionAndScore(this.value, this.options[this.selectedIndex].text, {{$g->questionnaire_id}})">
                                                                                        <option value="" disabled selected>Select score</option>
                                                                                            @foreach($g->scores as $score)
                                                                                                <option value="{{ $score->point }}">
                                                                                                {{ $score->score_desc }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                    </select>
                                                                                    <!-- Container for displaying full descriptions -->
                                                                                    <div id="description-container-{{ $g->questionnaire_id }}" class="mt-2"></div>
                                                                                </td>
                                                                                <td class="border p-1" style="text-align: center;" id="score-points-{{ $g->questionnaire_id }}"></td>
                                                                                <td class="border p-1">
                                                                                    <div>
                                                                                        @foreach ($g->instruction as $instruction)
                                                                                            <span>{{$instruction->instruction}} <i>{{$instruction->instruc_parenthesis}}</i></span>
                                                                                        @endforeach
                                                                                    </div>
                                                                                    <div class="dt-ext table-responsive">
                                                                                        <table class="table border table-sm">
                                                                                            <thead style="">
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <th class="border" style="text-align: center;">{{ $moves->table_title }}</th>
                                                                                                @endforeach
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach($g->moves as $moves)
                                                                                                    <td class="border"></td>
                                                                                                @endforeach
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="border p-1">
                                                                                  <div class="btn btn-outline-primary">Add</div>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="2">Sub-total GMEF Score <i>(Level 1 People)</i></th>
                                                                    <th class="text-center border" colspan="1" id="subtotalCell5">0</th>
                                                                    <th class="text-center border" colspan="2"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center border" colspan="5"></th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                    <!-- END OF TAB PEOPLE -->
                    <!-- START OF TAB ENABLING MECHANISM -->
                    <div class="tab-pane fade" id="enabling-mechanism" role="tabpanel" aria-labelledby="enabling-mechanism-tab">
                        <div class="card mb-0">
                            <div class="card-body p-0">
                                <div class="row list-persons" id="addcon">
                                    <div class="col-xl-12 col-md-12">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                                <div class="card-body">
                                                    <div class="dt-ext table-responsive">
                                                    <table class="table border gy-6 table-xs">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center border" colspan="6">ENABLING MECHANISMS ORGANIZATIONAL ASSESSMENT QUESTIONNAIRE</th>
                                                            </tr>
                                                             <tr>
                                                                <td class="text-center border" colspan="4"><h5><strong>TOTAL GMEF SCORE <i>(Enabling Mechanisms)</i></strong></h5></td>
                                                                <td class="text-center border"><h5 id="grandTotalCellem">0</h5></td>
                                                                <td class="text-center border" ></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center border w-400px" rowspan="3" style="vertical-align: middle;">DESCRIPTORS</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center border" colspan="3" >SCORE</th>
                                                                <th class="text-center border w-150px" colspan="1" rowspan="2" style="vertical-align: middle;">Score Per Item</th>
                                                                <th class="text-center border" style="vertical-align: middle;" rowspan="2">Means of Verification/Remarks</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center border w-175px" >NO </th>
                                                                <th class="text-center border w-175px">PARTLY</th>
                                                                <th class="text-center border w-175px">YES</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- <tbody id="gmef_policy_body"> -->
                                                            <tr> 
                                                                <th class="border p-1" colspan="6">1. Setting up of Essential GAD Mechanisms <i>(max score: 5; for each item or question, 1.67)</i></th>
                                                            </tr >
                                                            <tr>
                                                                <td class="border p-1">1.1 Has the organization created/ reconstituted its GAD Focal Point System (GFPS) in accordance with Magna Carta of Women Implementing Rules and Regulations (MCW IRR) Sec. 37-C and other pertinent policies issued by oversight agencies? <i>(possible scores are 0, 0.83, and 1.67)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem1(this, 'score-inputem11', 0)">GFPS not created/ reconstituted in accordance with MCW IRR Sec 37-C and pertinent policies issued by concerned oversight agencies</td>
                                                                <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellem1(this, 'score-inputem11', 0.8333333333333333)">GFPS or similar GAD mechanism created/ reconstituted in the central office and/ or selected regional and/or attached agencies/offices only</td>
                                                                <td class="border p-1" data-score="1.666666666666667" onclick="highlightCellem1(this, 'score-inputem11', 1.666666666666667)">GFPS or similar GAD mechanism created/ reconstituted in the central office and all regional offices and attached agencies</td>
                                                                <td class="border"><input type="number" id="score-inputem11" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">
                                                                    <table class="table table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="p-1" colspan="4">Attach the directory of the newly-created/recon- stituted GFPS of the organization, including its regional and attached offices as applicable*</td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="p-1" colspan="4"><i>*Agencies with created/reconstituted GFPS or similar GAD mechanisms in accordance with mentioned pertinent guide- lines with no regional and attached offices will be awarded 1.67 points equivalent to a “yes” answer</i></td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td class="border p-1">1.2 Has the organization initiated exploratory activities with the Philippine Commission on Women (PCW) or other agencies/LGUs, institutions and/or individuals to facilitate gender mainstreaming? <i>(possible scores are 0, 0.83 and 1.67)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem1(this, 'score-inputem12', 0)">No exploratory activities initiated at all</td>
                                                                <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellem1(this, 'score-inputem12', 0.8333333333333333)">Organization conducted initial meetings/ consultations with PCW, organizations and/or individuals to facilitate gender mainstreaming</td>
                                                                <td class="border p-1" data-score="1.666666666666667" onclick="highlightCellem1(this, 'score-inputem12', 1.666666666666667)">Organization initiated exploratory activity/activities with PCW, organizations and/or individuals to facilitate gender mainstreaming</td>
                                                                <td class="border"><input type="text" id="score-inputem12" style="border: none;" required name="enable_one_two" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">If yes, list down the exploratory activities initiated by the organization (e.g. meeting with PCW for the identification of necessary capacity develop- ment activities for GFPS and staff members) to facilitate gender mainstreaming
                                                                    <table class="table table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="text-center border p-1">List of Organizations/ Individuals</th>
                                                                            <th class="text-center border p-1">Exploratory Activities Conducted</th>
                                                                            <th class="text-center border p-1">Remarks</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">1.3 Has the organization collected information towards the establishment of sex- disaggregated database and enhancement of its M&E system? <i>(possible scores are 0, 0.83, and 1.67)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem1(this, 'score-inputem13', 0)">No information collected</td>
                                                                <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellem1(this, 'score-inputem13', 0.8333333333333333)">Data and information collected but are not yet disaggregated by sex</td>
                                                                <td class="border p-1" data-score="1.666666666666667" onclick="highlightCellem1(this, 'score-inputem13', 1.666666666666667)">Intake forms developed and used to collect sex- disaggregated data or gender statistics</td>
                                                                <td class="text-center border"><input type="number" id="score-inputem13" style="border: none;" required name="enable_one_tree" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Attach intake forms such as attendance sheets, profile forms, etc., with separate columns for sex, used by the organization to gather sex- disaggregated data. Include list of information that can be disaggregated by sex (e.g. list of client beneficiaries, service providers, partners, etc.)
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name_two"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment_two" multiple>
                                                                            </td>                               
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                           <tr>
                                                                <td class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 1 Enabling Mechanisms)</strong></td>
                                                                <td class="text-center border" colspan="1" id="subtotalCellem1">0</td>
                                                                <td class="text-center border" colspan="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="6" class="border"></td>
                                                            </tr>
                                                            <tr> 
                                                                <th class="border p-1" colspan="6">2. Functional GAD Mechanisms <i>(max score: 5; for each item or question, 1)</i></th>
                                                            </tr >
                                                            <tr>
                                                                <td class="border p-1">2.1 Does the organization have a functional GAD Focal Point System  based on the provisions of the guidelines issued by relevant oversight agencies? <i>(e.g. PCW MC 2011-01 for NGAs, JMC 2013-01 for LGUs and CHED MO 2015- 01 for SUCs) (possible scores are 0, 0. 5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem2(this, 'score-inputem21', 0)">>No functional GFPS based on the provisions of the guidelines issued by relevant oversight agencies</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem2(this, 'score-inputem21', 0.5)">1-2 policies reflecting the organization’s interest for gender mainstreaming issued</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem2(this, 'score-inputem21', 1)">GFPS members actively performing all the functions based on the provisions of guidelines issued by relevant oversight agencies</td>
                                                                <td class="border"><input type="number" id="score-inputem21" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td colspan="4">If GFPS is performing limited functions, explain the challenges faced by the GFPS of the organization in mainstreaming GAD.</td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">2.2 Has the organization established other GAD mechanisms? <i>(possible scores are 0, 0. 5 and 1)</i>
                                                                </br></br></br>*Other GAD Mechanisms refer to those in addition to the GFPS and the GAD Database
                                                                </td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem2(this, 'score-inputem22', 0)">No other GAD mechanism established</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem2(this, 'score-inputem22', 0.5)">1 other GAD mechanism established</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem2(this, 'score-inputem22', 1)">2 or more other GAD mechanisms established</td>
                                                                <td class="border" ><input type="text" style="border: none;" id="score-inputem22" name="enable_one_two" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Enumerate other GAD mechanisms established <i>[e.g. Committee on Decorum and Investigation (CODI), Violence against Women and their Children (VAWC) Referral System, Barangay Violence against Women (VAW) Desk, Women’s Economic Empowerment (WEE) Desk, etc.]</i>
                                                                    <table class="table table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="text-center border p-1">Other GAD Mechanism/s Established</th>
                                                                            <th class="text-center border p-1">Function/s</th>
                                                                            <th class="text-center border p-1">Members</th>
                                                                            <th class="text-center border p-1">Date Established</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                        </tr >
                                                                        <tr>
                                                                            <td class="text-center" colspan="4"></td>
                                                                            
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td class="border p-1">2.3. Has the organization utilized at least 5% of its budget* to implement GAD PAPs? <i>(possible scores are 0, 0. 5 and 1)</i>
                                                                </br></br></br>*refers to the total GAA of NGAs and LGUs or COB for GOCCs
                                                                </td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem2(this, 'score-inputem23', 0)">No GAD budget utilized</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem2(this, 'score-inputem23', 0.5)">Organization utilized less than 5% of total budget to implement GAD PAPs</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem2(this, 'score-inputem23', 1)">Organization utilized 5% or more of total budget to implement GAD PAPs</td>
                                                                <td class="border"><input type="number" id="score-inputem23" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">
                                                                    <table class="table table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="p-1" colspan="4">Attach the GAD Plan and Budget (GPB) and GAD Accomplishment Report (GAD AR) of the organization for the same fiscal year (e.g. 2013 GPB and GAD AR)</td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td class="border p-1">2.4. Has engagement with organizations such as PCW, LGUs and/or other agencies, and individuals been established towards the conduct of GAD- related PAPs for the organization? <i>(possible scores are 0, 0. 5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem2(this, 'score-inputem24', 0)">Organization has not engaged with agencies/LGUs, institutions and/or individuals towards the conduct of GAD- related PAPs</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem2(this, 'score-inputem24', 0.5)">Organization has sporadic engagement with agencies/LGUs, institutions and/or individuals towards the conduct of GAD- related PAPs</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem2(this, 'score-inputem24', 1)">Organization has established working engagement with agencies/LGUs, institutions and/or individuals towards the conduct of GAD- related PAPs</td>
                                                                <td class="border"><input type="text" style="border: none;" id="score-inputem24" name="enable_one_two" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">List down consultations with organizations/ individuals regarding the conduct of GAD-related PAPs of the organization <i>(e.g. conduct of a series of capacity development activities and technical assistance for the preparation of GPB, etc.):</i>
                                                                    <table class="table table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="text-center border p-1">List of Organizations/ Individuals Engaged</th>
                                                                            <th class="text-center border p-1">Purpose of Engagement (e.g., request for review of GAD PB etc.)</th>
                                                                            <th class="text-center border p-1">Results of Engagement</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                        </tr >
                                                                    </table>
                                                                </td>                                                                               
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">2.5. Is the organization able to collect or generate sex- disaggregated data (SDD) and/or gender statistics*? <i>(possible scores are 0, 0. 5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem2(this, 'score-inputem25', 0)">No effort from the organization yet to collect or generate SDD and/or gender statistics</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem2(this, 'score-inputem25', 0.5)">Organization is in the process of collecting or generating SDD and/or gender statistics</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem2(this, 'score-inputem25', 1)">Organization collecting and generating SDD and/or gender statistics</td>
                                                                <td class="border"><input type="number" id="score-inputem25" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">If yes, enumerate types of SDD and/or gender statistics collected or generated <i>(e.g., sex- disaggregated profile of employees, client beneficiaries, cases of VAW, etc.)</i>.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea><br/>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="p-1" colspan="1">If applicable, list down installed gender- responsive data collection system/s of the organization (e.g. National Violence Against Women (NVAW) referral system, gender- responsive Community-Based Monitoring System (CBMS) etc.)</td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 2 Enabling Mechanisms)</strong></td>
                                                                <td class="text-center border" colspan="1" id="subtotalCellem2">0</td>
                                                                <td class="text-center border" colspan="1"></td>
                                                            </tr>
                                                             <tr>
                                                                <td></td>
                                                            </tr>
                                                            <tr> 
                                                                <th class="border" colspan="6">3. Integration of GAD in the Organization’s Mechanisms <i>(max score: 5; for each item or question, 1)</i></th>
                                                            </tr >
                                                            <tr>
                                                                <td class="border p-1">3.1 Do the organization’s other GAD mechanisms coordinate, monitor and report the progress of the implementation of its functions? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem3(this, 'score-inputem31', 0)">Other GAD mechanisms established but not functional</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem3(this, 'score-inputem31', 0.5)">Other GAD mechanisms coordinate and monitor progress of implementation but do not generate status/progress report</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem3(this, 'score-inputem31', 1)">Other GAD mechanisms coordinate, monitor and generate status/ progress report of implementation</td>
                                                                <td class="border"><input type="number" id="score-inputem31" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Attach status/progress report of the other GAD mechanisms established by the organization, including analysis of its functions and recommendations.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">3.2 Has the organization utilized 30% or more of its total budget* to implement GAD PAPs? <i>(possible scores are 0, 0.5 and 1)</i>
                                                                </br></br></br>*refers to the total GAA of NGAs and LGUs or COB for GOCCs
                                                                </td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem3(this, 'score-inputem32', 0)">Organization utilized 5% or less of total budget to implement GAD PAPs</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem3(this, 'score-inputem32', 0.5)">Organization utilized 6-29% of total budget to implement GAD PAPs</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem3(this, 'score-inputem32', 1)">Organization utilized 30% or more of total budget to implement GAD PAPs</td>
                                                                <td class="border"><input type="number" id="score-inputem32" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Attach the GPB and GAD AR from the same fiscal year <i>(e.g. 2013 GPB and 2013 GAD AR)</i>
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textareaname="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">3.3 Has the organization judiciously utilized its GAD budget to implement GAD activities based on its GPB? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem3(this, 'score-inputem33', 0)">No organizational/ national/sectoral policies on GAD issued</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem3(this, 'score-inputem33', 0.5)">1-2 organizational/ national/ sectoral policies on GAD issued</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem3(this, 'score-inputem33', 1)">3 or more organizational/ national/sectoral policies on GAD issued</td>
                                                                <td class="border"><input type="number" id="score-inputem33" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Attach a copy of the Audit Observation Memo (AOM) or Notice of Suspension and Disallowances (NDs) received from the Commission on Audit (COA) and the organization’s justification, if applicable.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">3.4 Has the organization partnered with agencies/ LGUs, institutions and/or individuals towards the strategic implementation of its GAD PAPs? <i>(possible scores are 0, 0.5 and 1)</td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem3(this, 'score-inputem34', 0)">Has not partnered with other organizations towards the strategic implementation of GAD PAPs</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem3(this, 'score-inputem34', 0.5)">Partnered with 1 organization towards the strategic implementation of GAD PAPs</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem3(this, 'score-inputem34', 1)">Partnered with 2 or more organizations towards the strategic implementation of GAD PAPs</td>
                                                                <td class="border"><input type="number" id="score-inputem34" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">List the partnership/s or joint program/s towards the strategic implementation of the organization’s GAD PAPs <i>(e.g. partnership for the conduct of a GAD-related program)</i>
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="text-center border p-1">Name of Partner Agency/ Institution/ Individual</th>
                                                                            <th class="text-center border p-1">GAD Effort Implemented</th>
                                                                            <th class="text-center border p-1">Type of Engagement</th>
                                                                            <th class="text-center border p-1">Inclusive Dates</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td class="border p-1">3.5 Is the organization utilizing sex- disaggregated data and/or gender statistics in the development planning cycle (planning, implementation and management and monitoring and evaluation)? <i>(possible scores are 0, 0.5 and 1)</td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem3(this, 'score-inputem35', 0)">No SDD or gender statistics utilized in the development planning cycle</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem3(this, 'score-inputem35', 0.5)">SDD and/or gender statistics utilized in 1-2 stages of the development planning cycle</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem3(this, 'score-inputem35', 1)">SDD and/or gender statistics utilized in all stages of the development planning cycle</td>
                                                                <td class="border"><input type="number" id="score-inputem35" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">List GAD-related data and indicators used in the development planning cycle.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="text-center border p-1">Development Planning Cycle Stage</th>
                                                                            <th class="text-center border p-1">Data Utilized</th>
                                                                            <th class="text-center border p-1">Output</th>
                                                                            <th class="text-center border p-1">Indicators Used to Measure Gender- Related Impacts of PAPs</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 3 Enabling Mechanisms)</strong></th>
                                                                <td class="text-center border" colspan="1" id="subtotalCellem3">0</td>
                                                                <td class="text-center border" colspan="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                            </tr>
                                                            <tr> 
                                                                <th class="border p-1" colspan="6">4. Updating and Continuous Enhancement of GAD Policies <i>(max score: 5; for each item or question, 1.67)</i></th>
                                                            </tr >
                                                            <tr>
                                                                <td class="border p-1">4.1 Are the organization’s other GAD mechanisms able to contribute towards the attainment of its desired impact/s? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem4(this, 'score-inputem41', 0)">Other GAD mechanisms are fully functional but still has to contribute to the attainment of desired impact/s</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem4(this, 'score-inputem41', 0.5)">Other GAD mechanisms are fully functional and contributing to the attainment of desired impact/s</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem4(this, 'score-inputem41', 1)">Other GAD mechanisms are fully functional and resulted in desired impact/s</td>
                                                                <td class="border"><input type="number" id="score-inputem41" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Attach status/progress report, client satisfaction survey, results of gender impact assessment, documented testimonies, etc.
                                                                    <table class="table table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">4.2 Has the organization utilized 70% or more of its total budget* to implement GAD PAPs? <i>(possible scores are 0, 0.5 and 1)</i>
                                                                </br></br></br><i>*refers to the total GAA of NGAs and LGUs or COB for GOCCs</i>
                                                                </td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem4(this, 'score-inputem42', 0)">Organization utilized 30% or less of total budget to implement GAD PAPs</td>
                                                                <td class="border p-1" data-score="0." onclick="highlightCellem4(this, 'score-inputem42', 0.5)">Organization utilized 31-69% of total budget to implement GAD PAPs</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem4(this, 'score-inputem42', 1)">Organization utilized 70% or more of total budget to implement GAD PAPs</td>
                                                                <td class="border"><input type="number" id="score-inputem42" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Attach the GPB and GAD AR of the organization for the same fiscal year <i>(e.g. 2013 GPB and 2013 GAD AR)</i>.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">4.3 Is the organization’s database with sex- disaggregated data and/or gender statistics able to generate sector- specific knowledge products (KPs) on GAD? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem4(this, 'score-inputem43', 0)">GAD perspective not yet integrated in the Vision, Mission or Goals</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem4(this, 'score-inputem43', 0.5)">GAD perspective integrated in either the Vision, Mission or Goals</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem4(this, 'score-inputem43', 1)">GAD perspective integrated in the Vision, Mission and Goals</td>
                                                                <td class="border"><input type="number" id="score-inputem43" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Identify where GAD perspective is integrated in the Vision, Mission and/or Goals (VMG) of the organization.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="text-center border p-1">Title of Sector Specific Knowledge Products</th>
                                                                            <th class="text-center border p-1">Content of the Knowledge Products</th>
                                                                            <th class="text-center border p-1">Utilization of the   Knowledge Products</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                             <tr>
                                                                <td class="border p-1">4.4 Is the organization’s M&E system able to track the desired gender-related impacts of its GAD PAPs on clients (internal and external)? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem4(this, 'score-inputem44', 0)">M&E system is not able to track gender- related impacts of GAD PAPs on clients (internal and external)</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem4(this, 'score-inputem44', 0.5)">M&E system able to track gender- related impacts of GAD PAPs on either internal or external clients</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem4(this, 'score-inputem44', 1)">M&E system able to track gender- related impacts of GAD PAPs on both internal and external clients</td>
                                                                <td class="border"><input type="number" id="score-inputem44" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Attach the GPB and GAD AR of the organization for the same fiscal year <i>(e.g. 2013 GPB and 2013 GAD AR)</i>.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="">Identify where GAD perspective is integrated in the Vision, Mission and/or Goals (VMG) of the organization.</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                            <th class="">Identify indicators that measure gender-related impacts of the organization’s GAD PAPs.</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">4.5 Does the organization have a Knowledge Management (KM) System with GAD- related knowledge products (KPs)? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem4(this, 'score-inputem45', 0)">KM system does not have GAD-related KPs</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem4(this, 'score-inputem45', 0.5)">KM system has GAD-related KPs accessed and utilized by either internal or external clients</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem4(this, 'score-inputem45', 1)">KM system has GAD-related KPs accessed and utilized by both internal and external clients</td>
                                                                <td class="border"><input type="number" id="score-inputem45" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Explain how the organization’s KM system facilitates the sharing of GAD-related KPs to its clients (internal and/or external).</i>.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                        <tr> 
                                                                            <th class="">Identify indicators that measure gender-related impacts of the organization’s GAD PAPs.</th>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 4 Enabling Mechanisms)</strong></th>
                                                                <td class="text-center border" colspan="1" id="subtotalCellem4">0</td>
                                                                <td class="text-center border" colspan="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                            </tr>
                                                            <tr> 
                                                                <th class="border p-1" colspan="6">5. Model GAD Structures and Systems <i>(max score: 5; for each item or question:1)</i></th>
                                                            </tr >
                                                            <tr>
                                                                <td class="border p-1">5.1 Has the organization’s GAD Focal Point System been recognized or awarded as a model GAD mechanism by reputable local, national, and international organizations on gender mainstreaming? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem5(this, 'score-inputem51', 0)">GFPS not yet recognized as model GAD mechanism by reputable organizations on gender mainstreaming</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem5(this, 'score-inputem51', 0.5)">GFPS nominated, shortlisted or cited as model GAD mechanism by reputable organizations on gender mainstreaming</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem5(this, 'score-inputem51', 1)">GFPS awarded as model GAD mechanism by reputable organizations on gender mainstreaming</td>
                                                                <td class="border"><input type="number" id="score-inputem51" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">List awards/citations/documented testimonies received.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="text-center border p-1">Awarding Institutions</th>
                                                                            <th class="text-center border p-1">Local/ National/ International</th>
                                                                            <th class="text-center border p-1">Award/ Citations Received</th>
                                                                            <th class="text-center border p-1">Year</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">5.2 Has the organization’s other GAD mechanisms been recognized as models by other organizations? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem5(this, 'score-inputem52', 0)">Other GAD mechanisms not yet recognized by other organizations as models</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem5(this, 'score-inputem52', 0.5)">Other GAD mechanisms recognized as models by 1-2 organizations</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem5(this, 'score-inputem52', 1)">Other GAD mechanisms recognized as models by 3 or more organizations</td>
                                                                <td class="border"><input type="number" id="score-inputem52" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">List awards/citations/documented testimonies received.
                                                                    <table class="table table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <th class="text-center border p-1">Awarding Institutions</th>
                                                                            <th class="text-center border p-1">Local/ National/ International</th>
                                                                            <th class="text-center border p-1">Award/ Citations Received</th>
                                                                            <th class="text-center border p-1">Year</th>
                                                                        </tr >
                                                                        <tr> 
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                            <td class="border"></td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">5.3 Has the organization utilized 100% of its total budget* to implement GAD PAPs? <i>(possible scores are 0, 0.5 and 1)</i>
                                                                </br></br></br>*refers to the total GAA of NGAs and LGUs or COB for GOCCs
                                                                </td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem5(this, 'score-inputem53', 0)">Organization utilized 70% or less of its total budget to implement GAD PAPs</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem5(this, 'score-inputem53', 0.5)">Organization utilized 71-99% or less of its total budget to implement GAD PAPs</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem5(this, 'score-inputem53', 1)">Organization utilized 100% of its total budget to implement GAD PAPs</td>
                                                                <td class="border"><input type="number" id="score-inputem53" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Attach the GPB and GAD AR of the organization for the same fiscal year <i>(e.g. 2013 GPB and 2013 GAD AR)</i>
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">5.4 Has the organization established a centralized database with sex-disaggregated data and/or gender statistics accessible to its regional offices and attached agencies, as well as external clients and partner organizations? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem5(this, 'score-inputem54', 0)">>Database with SDD and/or gender statistics established but accessible only to the central office</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem5(this, 'score-inputem54', 0.5)">Database with SDD and/or gender statistics established and accessible to the central office, regional offices and attached agencies</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem5(this, 'score-inputem54', 1)">Database with SDD and/or gender statistics established and accessible to the central office, regional offices and attached agencies, as well as to external clients and partner organizations</td>
                                                                <td class="border"><input type="number" id="score-inputem54" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Please provide link of database with SDD.
                                                                    </br>If the data is not uploaded in a website, list the information/data that are accessible to regional offices, attached agencies, external clients and partner organizations.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="border p-1">5.5 Is the Knowledge Management (KM) system of the organization integrated with GAD and replicated by other organizations? <i>(possible scores are 0, 0.5 and 1)</i></td>
                                                                <td class="border p-1" data-score="0" onclick="highlightCellem5(this, 'score-inputem55', 0)">KM system of the organization not integrated with GAD and not replicated by other organizations</td>
                                                                <td class="border p-1" data-score="0.5" onclick="highlightCellem5(this, 'score-inputem55', 0.5)">KM system of the organization integrated with GAD and replicated by 1-2 organizations</td>
                                                                <td class="border p-1" data-score="1" onclick="highlightCellem5(this, 'score-inputem55', 1)">KM system of the organization integrated with GAD and replicated by 3 or more organizations</td>
                                                                <td class="border"><input type="number" id="score-inputem55" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                                <td class="border p-1" colspan="2">Explain how GAD is integrated in the KM system of the organization and list down other organizations that replicated the KM system.
                                                                    <table class="table  table-row-bordered gy-6">
                                                                        <tr> 
                                                                            <td class="text-center border">
                                                                                <textarea name="file_name"></textarea>
                                                                                <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                            </td>
                                                                        </tr >
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 5 Enabling Mechanisms)</strong></td>
                                                                <td class="text-center border" colspan="1" id="subtotalCellem5"></td>
                                                                <td class="text-center border" colspan="1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center border" colspan="4"><h5><strong>TOTAL GMEF SCORE <i>(Enabling Mechanisms)</i></strong></h5></td>
                                                                <td class="text-center border" colspan="1"><h5 id="grandTotalCellem1">0</h5></td>
                                                                <td class="text-center border" colspan="1"></td>
                                                            </tr>
                                                        <!-- </tbody> -->
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="paps" role="tabpanel" aria-labelledby="paps-tab">
                    <div class="card mb-0">
                        <div class="card-body p-0">
                            <div class="row list-persons" id="addcon">
                                <div class="col-xl-12 col-md-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                            <div class="card-body">
                                                <div class="dt-ext table-responsive">
                                                <table class="table table-row-bordered gy-6 table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center border" colspan="6">PROGRAMS, ACTIVITIES AND PROJECTS (PAPs) ASSESSMENT QUESTIONNAIRE</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center border" colspan="4"><h5><strong>TOTAL GMEF SCORE <i>(PAPs)</i></strong></h5></td>
                                                            <td class="text-center border"><h5 id="grandTotalCellpap">0</h5></td>
                                                            <td class="border"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center border w-400px" rowspan="3" style="vertical-align: middle;">DESCRIPTORS</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center border" colspan="3" >SCORE</th>
                                                            <th class="text-center border w-150px" colspan="1" rowspan="2" style="vertical-align: middle;">Score Per Item</th>
                                                            <th class="text-center border" style="vertical-align: middle;" rowspan="2">Means of Verification/Remarks</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center border w-175px" >NO </th>
                                                            <th class="text-center border w-175px">PARTLY</th>
                                                            <th class="text-center border w-175px">YES</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="gmef_programs_body">
                                                        <tr>
                                                            <th class="border" colspan="6">1. Issuance of Foundational Policies <i>(max score: 5; for each item or question, 1.67)</i></th>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">1.1 Is the organization observing international/ national/local GAD- related events <i>(possible scores are 0, 0.41 and 0.83)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap1(this, 'score-inputpap11', 0)">Organization has not initiated or participated in the observance of international/ national/ local GAD- related events</td>
                                                            <td class="border p-1" data-score="0.4166666666666667" onclick="highlightCellpap1(this, 'score-inputpap11', 0.4166666666666667)">Organization initiated or participated in 1-2 observance of international/ national/ local GAD- related events</td>
                                                            <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellpap1(this, 'score-inputpap11', 0.8333333333333333)">Organization initiated or participated in 3 or more observance of international/ national/ local GAD-related events</td>
                                                            <td class="border"><input type="number" id="score-inputpap11" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Enumerate GAD-related events initiated or participated by the organization <i>(e.g. International Women’s Day celebration)</i>.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">GAD-related event</th>
                                                                        <th class="text-center border p-1">Initiated</th>
                                                                        <th class="text-center border p-1">Participated</th>
                                                                        <th class="text-center border p-1">Date Conducted</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>

                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">1.2 Has the organization conducted Basic GAD Orientation or Gender Sensitivity Training (GST) for its clients (internal and external)? <i>(possible scores are 0, 0.41 and 0.83)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap1(this, 'score-inputpap12', 0)">No Basic GAD orientation or GST conducted for its clients</td>
                                                            <td class="border p-1" data-score="0.4166666666666667" onclick="highlightCellpap1(this, 'score-inputpap12', 0.4166666666666667)">Basic GAD Orientation or GST conducted for either internal or external clients</td>
                                                            <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellpap1(this, 'score-inputpap12', 0.8333333333333333)">Basic GAD Orientation or GST conducted for both internal and external clients</td>
                                                            <td class="border"><input type="number" id="score-inputpap12" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach training design, attendance sheets and results of training evaluation, if available.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr >
                                                                    <tr> 
                                                                        <td>If no, explain why GAD Orientation or Gender Sensitivity Training (GST) has not been conducted for the organization’s clients.</td>
                                                                    </tr >
                                                                    <tr> 
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">1.3 Has the organization conducted consultation activities with clients (internal and external) to identify gender issues and corresponding strategies? <i>(possible scores are 0, 0.41 and 0.83)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap1(this, 'score-inputpap13', 0)">No consultation conducted with clients</td>
                                                            <td class="border p-1" data-score="0.4166666666666667" onclick="highlightCellpap1(this, 'score-inputpap13', 0.4166666666666667)">Conducted consultation with either internal or external clients to identify gender issues and corresponding strategies</td>
                                                            <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellpap1(this, 'score-inputpap13', 0.8333333333333333)">Conducted consultation with both internal and external clients to identify gender issues and corresponding strategies</td>
                                                            <td class="border"><input type="number" id="score-inputpap13" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Discuss the results of consultation activities conducted.</i>.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">Group Consulted (Internal/ External)</th>
                                                                        <th class="text-center border p-1">Purpose</th>
                                                                        <th class="text-center border p-1">Results of Consultation (gender issues and strategies identified)</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">1.4 Has theorganization consulted PCW and relevant organizations/ individuals on its GAD mainstreaming efforts? <i>(possible scores are 0, 0.41 and 0.83)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap1(this, 'score-inputpap14', 0)">No consultation conducted at all</td>
                                                            <td class="border p-1" data-score="0.4166666666666667" onclick="highlightCellpap1(this, 'score-inputpap14', 0.4166666666666667)">Initiated consultation with either PCW or relevant organizations/ individuals on its GAD mainstreaming efforts</td>
                                                            <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellpap1(this, 'score-inputpap14', 0.8333333333333333)">Initiated consultation with both PCW and relevant organizations/ individuals on its GAD mainstreaming efforts</td>
                                                            <td class="border"><input type="number" id="score-inputpap14" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Enumerate results of consultations initiated including names of organizations/individuals
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">Name of organizations/ individuals Consulted</th>
                                                                        <th class="text-center border p-1">Agenda of the Consultation</th>
                                                                        <th class="text-center border p-1">Results of the Consultation</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">1.5 Has the organization reviewed and revised existing Information/Education/ Communication (IEC) materials and Knowledge Products (KPs) to ensure use of gender-fair language and images? <i>(possible scores are 0, 0.41 and 0.83)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap1(this, 'score-inputpap15', 0)">No review of existing IEC materials and KPs conducted</td>
                                                            <td class="border p-1" data-score="0.4166666666666667" onclick="highlightCellpap1(this, 'score-inputpap15', 0.4166666666666667)">1-3 existing IEC materials and KPs reviewed but not revised</td>
                                                            <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellpap1(this, 'score-inputpap15', 0.8333333333333333)">4 or more existing IEC materials and KPs reviewed and revised</td>
                                                            <td class="border"><input type="number" id="score-inputpap15" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Provide a list of IEC materials reviewed and revised to ensure use of gender-fair language and images.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <td class="text-center border">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">1.6 Has the organization set up a GAD corner? <i>(possible scores are 0, 0.41 and 0.83)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap1(this, 'score-inputpap16', 0)">No plan to set up GAD corner</td>
                                                            <td class="border p-1" data-score="0.4166666666666667" onclick="highlightCellpap1(this, 'score-inputpap16', 0.4166666666666667)">GAD IEC materials and KPs compiled and collected to set up GAD corner</td>
                                                            <td class="border p-1" data-score="0.8333333333333333" onclick="highlightCellpap1(this, 'score-inputpap16', 0.8333333333333333)">Established GAD corner with updated GAD IEC materials and KPs</td>
                                                            <td class="border"><input type="number" id="score-inputpap16" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Provide a copy of the plan or photo layout of the GAD corner and list down titles of existing Information/Education/Communication (IEC) materials and KPs available for use and reference of clients and GAD Focal Point System (GFPS) members.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center border" colspan="4"><strong>Sub-total GMEF Score <i>(Level 1 PAPs)</i></strong></th>
                                                            <th class="text-center border"><h5 id="subtotalCellpap1"></h5></th>
                                                            <th class="border" ></th>
                                                        </tr>
                                                        <tr>
                                                            <td class="border" colspan="6"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1" colspan="6">2. Establishing Commitment towards Gender Mainstreaming <i>(max score: 5; for each item or question: 0.62)</i></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">2.1 Has the organization formulated GAD agenda or strategic framework? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap2(this, 'score-inputpap21', 0)">No GAD agenda or strategic framework formulated</td>
                                                            <td class="border p-1" data-score="0.3125" onclick="highlightCellpap2(this, 'score-inputpap21', 0.3125)">Draft GAD agenda or strategic framework formulated</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap2(this, 'score-inputpap21', 0.625)">GAD agenda or strategic framework formulated and approved</td>
                                                            <td class="border"><input type="number" id="score-inputpap21" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach draft or approved GAD agenda and/or strategic framework <i>(e.g. Department Order setting 3-year GAD agenda of agencies or GAD Code for LGUs)</i>.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">2.2 Has the organization developed its GAD Plan and Budget (GPB) based on GAD agenda, emerging gender issues, international/ national GAD mandates and/or results of gender analysis? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap2(this, 'score-inputpap22', 0)">GPB is not based on GAD agenda/GAD Code, emerging gender issues, international/national GAD mandates and/ or results of gender analysis</td>
                                                            <td class="border p-1" data-score="0.3125" onclick="highlightCellpap2(this, 'score-inputpap22', 0.3125)">GPB is based on at least 1 of the following: GAD agenda/GAD Code, emerging gender issues, international/ national GAD mandates and/or results of gender analysis</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap2(this, 'score-inputpap22', 0.625)">GPB is based on at least 3 of the following: GAD agenda/GAD Code, emerging gender issues, international/ national GAD mandates and/or results of gender analysis</td>
                                                            <td class="border"><input type="number" id="score-inputpap22" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach GPB for the most recent fiscal year citing the basis for its development.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border P-1">Content of GPB</th>
                                                                        <th class="text-center border P-1">Basis of Development (GAD agenda/ GAD Code, emerging gender issues, international/ national GAD mandates/ results of gender analysis)</th>
                                                                        <th class="text-center border P-1">Remarks</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">2.3 Has the organization conducted deepening sessions on GAD based on the results of the Training Needs Assessment (TNA) or updated GAD policies and tools as part of the continuing capacity development of GAD Focal Point System (GFPS) and concerned staff members? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap2(this, 'score-inputpap23', 0)">No deepening sessions on GAD conducted</td>
                                                            <td class="border p-1" data-score="0.3125" onclick="highlightCellpap2(this, 'score-inputpap23', 0.3125)">Conducted deepening session/s on GAD for either the GFPS or concerned staff members but not based on the results of TNA or updated GAD policies or tools</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap2(this, 'score-inputpap23', 0.625)">Conducted deepening sessions on GAD for either GFPS or concerned staff members based on the results of TNA or updated GAD policies or tools</td>
                                                            <td class="border"><input type="number" id="score-inputpap23" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Enumerate the deepening sessions on GAD conducted for GFPS and concerned staff:
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">Title of Deepening Session</th>
                                                                        <th class="text-center border p-1">TA Provider (in house trainer, PCW)</th>
                                                                        <th class="text-center border p-1">Date Conducted</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                    <tr>
                                                                        <td class="" colspan="3">Also attach a copy of Training Needs Analysis (TNA) results and design of deepening sessions.</td> 
                                                                    </tr>    
                                                                    <tr> 
                                                                        <td class="border text-center" colspan="3">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr >
                                                                    <tr>
                                                                        <td class="" colspan="3">Also attach a copy of Training Needs Analysis (TNA) results and design of deepening sessions.</td> 
                                                                    </tr>
                                                                    <tr> 
                                                                        <td class="border text-center" colspan="3">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">2.4 Has the organization used Gender Analysis (GA) tools and techniques in the review, enhancement or development of PAPs? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap2(this, 'score-inputpap24', 0)">No GA tool applied to develop, review and/or enhance PAPs</td>
                                                            <td class="border p-1" data-score="0.3125" onclick="highlightCellpap2(this, 'score-inputpap24', 0.3125)">Results of the application of GA tools used to review, enhance or develop 1-2 PAPs</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap2(this, 'score-inputpap24', 0.625)">Results of the application of GA tools used to review, enhance or develop 3 or more PAPs</td>
                                                            <td class="border"><input type="number" id="score-inputpap24" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Enumerate GA tools used to develop, review and/or enhance PAPs
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">GA tools Applied</th>
                                                                        <th class="text-center border p-1">Name of PAPs</th>
                                                                        <th class="text-center border p-1">Results of Application</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">2.5 Does the organization have facilities and services that address the gender issues and concerns of its clients (internal and external)? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap2(this, 'score-inputpap25', 0)">No facilities and services addressing gender issues and concerns of the organization’s client</td>
                                                            <td class="border p-1" data-score="0.3125" onclick="highlightCellpap2(this, 'score-inputpap25', 0.3125)">With existing facilities and services that address the gender issues and concerns of either internal or external clients</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap2(this, 'score-inputpap25', 0.625)">With existing facilities and services that address gender issues and concerns of both internal and external clients</td>
                                                            <td class="border"><input type="number" id="score-inputpap25" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Enumerate facilities and services addressing gender issues and concerns of the organization.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">GAD Facilities and Services</th>
                                                                        <th class="text-center border p-1">Clients (internal/ external)</th>
                                                                        <th class="text-center border p-1">Gender Issues and Concerns Addressed</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                    <tr>
                                                                        <td class="p-1" colspan="3"><i>(e.g. Facilities to address strategic and practical gender needs of women and men employees such as child-minding center, breastfeeding center, and CODI, among others)</i></td> 
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">2.6 Has the organization developed orientation modules for new employees with gender-sensitivity as a core competency? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap2(this, 'score-inputpap26', 0)">No GAD orientation module with gender sensitivity as a core competency developed</td>
                                                            <td class="border p-1" data-score="0.3125" onclick="highlightCellpap2(this, 'score-inputpap26', 0.3125)">Developed GAD orientation module but not yet included in the orientation of new employees</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap2(this, 'score-inputpap26', 0.625)">Developed GAD orientation module and included in the orientation of new employees</td>
                                                            <td class="border"><input type="number" id="score-inputpap26" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach copy of GAD orientation module(s) with gender-sensitivity as a core competency.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">2.7 Has the organization developed and disseminated new Information/Education/ Communication (IEC) materials on GAD to clients (internal and external)? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap2(this, 'score-inputpap27', 0)">No new GAD IEC materials developed</td>
                                                            <td class="border p-1" data-score="0.3125" onclick="highlightCellpap2(this, 'score-inputpap27', 0.3125)">Developed but has not disseminated new GAD IEC materials</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap2(this, 'score-inputpap27', 0.625)">Developed and disseminated new GAD IEC materials</td>
                                                            <td class="border"><input type="number" id="score-inputpap27" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Provide list of new GAD IEC materials and the target audience.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">GAD IEC Materials</th>
                                                                        <th class="text-center border p-1">Target Audience</th>
                                                                        <th class="text-center border p-1">Remarks</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">2.8 Has the organization created a GAD section in its website? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap2(this, 'score-inputpap28', 0)">No GAD section in the agency website</td>
                                                            <td class="border p-1" data-score="0.3125" onclick="highlightCellpap2(this, 'score-inputpap28', 0.3125)">Developed GAD section in organization website but not updated</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap2(this, 'score-inputpap28', 0.625)">Developed GAD section in organization website and regularly updated</td>
                                                            <td class="border"><input type="number" id="score-inputpap28" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Please list website link for the GAD Section of the organization.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 2 PAPs)</strong></td>
                                                            <td class="text-center border"><h5 id="subtotalCellpap2"></h5></td>
                                                            <td class="text-center border"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="border p-1" colspan="6">3. GAD Application <i>(max score: 5; for each item or question: 0.71)</i></th>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">3.1 Has the organization monitored the implementation of its GAD Programs/ Activities/Projects (PAPs)? <i>(possible scores are 0, 0.35 and 0.71)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap3(this, 'score-inputpap31', 0)">Implementation of GAD PAPs not monitored</td>
                                                            <td class="border p-1" data-score="0.3571428571428571" onclick="highlightCellpap3(this, 'score-inputpap31', 0.3571428571428571)">Implementation of GAD PAPs intermittently monitored and not reported</td>
                                                            <td class="border p-1" data-score="0.7142857142857143" onclick="highlightCellpap3(this, 'score-inputpap31', 0.7142857142857143)">Implementation of GAD PAPs regularly monitored and reported</td>
                                                            <td class="border"><input type="number" id="score-inputpap31" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach monitoring reports on the implementation of GAD PAPs.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border p-1">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">3.2 Has the organization prepared and submitted  on time its GAD Plan and Budget (GPB) and GAD Accomplishment Report (GAD AR)? <i>(possible scores are 0, 0.35 and 0.71)</i>
                                                            </br></br></br><i>*PCW endorses GPBs of NGAs, GOCCs and SUCs</i>
                                                            </br></br></br><i>**DILG endorses GPBs of LGUs</i>                                                                                                                                                                          
                                                            </td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap3(this, 'score-inputpap32', 0)">GPB and GAD AR not submitted to PCW/DILG</td>
                                                            <td class="border p-1" data-score="0.3571428571428571" onclick="highlightCellpap3(this, 'score-inputpap32', 0.3571428571428571)">GPB and GAD AR submitted to PCW*/ DILG** but not endorsed</td>
                                                            <td class="border p-1" data-score="0.7142857142857143" onclick="highlightCellpap3(this, 'score-inputpap32', 0.7142857142857143)">GPB and GAD AR endorsed by PCW*/ DILG**</td>
                                                            <td class="border"><input type="number" id="score-inputpap32" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Provide copies of submitted and/or endorsed GAD Plans and Budgets (GPBs) and GAD Accomplishment Reports (GAD ARs), including cover letters.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">3.3  Has the organization conducted and sustained the GAD capacity development of its clients (internal and external)? <i>(possible scores are 0, 0.35 and 0.71) disseminated new Information/Education/ Communication (IEC) materials on GAD to clients (internal and external)? <i>(possible scores are 0, 0.31 and 0.62)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap3(this, 'score-inputpap33', 0)">No GAD capacity development conducted and sustained for clients</td>
                                                            <td class="border p-1" data-score="0.3571428571428571" onclick="highlightCellpap3(this, 'score-inputpap33', 0.3571428571428571)">GAD capacity development conducted and sustained for either internal or external clients</td>
                                                            <td class="border p-1" data-score="0.7142857142857143" onclick="highlightCellpap3(this, 'score-inputpap33', 0.7142857142857143)">GAD capacity development conducted and sustained for both internal and external clients</td>
                                                            <td class="border"><input type="number" id="score-inputpap33" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">List GAD capacity development activities conducted for clients.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">GAD Capacity Development Activities</th>
                                                                        <th class="text-center border p-1">Target Participants</th>
                                                                        <th class="text-center border p-1">Inclusive Dates</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">3.4  Has the organization conducted GAD capacity development sessions for its internal GAD experts? <i>(possible scores are 0, 0.35 and 0.71)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap3(this, 'score-inputpap34', 0)">No GAD capacity development session conducted to develop internal GAD experts</td>
                                                            <td class="border p-1" data-score="0.3571428571428571" onclick="highlightCellpap3(this, 'score-inputpap34', 0.3571428571428571)">Conducted GAD capacity development session but no internal GAD experts developed</td>
                                                            <td class="border p-1" data-score="0.7142857142857143" onclick="highlightCellpap3(this, 'score-inputpap34', 0.7142857142857143)">Conducted GAD capacity development session that resulted in the development of internal GAD experts</td>
                                                            <td class="border"><input type="number" id="score-inputpap34" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Enumerate GAD capacity development sessions conducted, and provide a list of internal experts and their areas of expertise developed through these sessions.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">Title and Date of GAD Capacity Development Activity Conducted</th>
                                                                        <th class="text-center border p-1">Internal GAD Experts Developed</th>
                                                                        <th class="text-center border p-1">Remarks</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1 ">3.5  Has the organization regularly applied Gender Analysis (GA) tools in the development planning cycle (planning, implementation and management, and monitoring and evaluation)? <i>(possible scores are 0, 0.35 and 0.71)</i></td>
                                                            <td class="border p-1 " data-score="0" onclick="highlightCellpap3(this, 'score-inputpap35', 0)">No GA tools applied in development planning cycle</td>
                                                            <td class="border p-1 " data-score="0.3571428571428571" onclick="highlightCellpap3(this, 'score-inputpap35', 0.3571428571428571)">GA tools applied in 1-2 levels of the development planning cycle</td>
                                                            <td class="border p-1 " data-score="0.7142857142857143" onclick="highlightCellpap3(this, 'score-inputpap35', 0.7142857142857143)">GA tools applied in all levels of the development planning cycle</td>
                                                            <td class="border"><input type="number" id="score-inputpap35" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1 " colspan="2">Enumerate GA tools applied in any stage of the development planning cycle and the frequency of application.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">GAD Tools Applied</th>
                                                                        <th class="text-center border p-1">Purpose of Application</th>
                                                                        <th class="text-center border p-1">Result of Application</th>
                                                                        <th class="text-center border p-1">Date of Application</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1 ">3.6 Has the organization regularly updated its GAD section in the website? <i>(possible scores are 0, 0.35 and 0.71)</i></td>
                                                            <td class="border p-1 " data-score="0" onclick="highlightCellpap3(this, 'score-inputpap36', 0)">GAD section has not been updated for more than a year</td>
                                                            <td class="border p-1 " data-score="0.3571428571428571" onclick="highlightCellpap3(this, 'score-inputpap36', 0.3571428571428571)">GAD section updated annually</td>
                                                            <td class="border p-1 " data-score="0.7142857142857143" onclick="highlightCellpap3(this, 'score-inputpap36', 0.7142857142857143)">GAD section updated quarterly or more often</td>
                                                            <td class="border"><input type="number" id="score-inputpap36" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Provide a schedule involving the update of the GAD section in the organization’s website.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">3.7 Has the organization set up a Knowledge Management (KM) system as a mechanism to transfer knowledge on GAD? <i>(possible scores are 0, 0.35 and 0.71)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap3(this, 'score-inputpap37', 0)">No existing plan to set up KM</td>
                                                            <td class="border p-1" data-score="0.3571428571428571" onclick="highlightCellpap3(this, 'score-inputpap37', 0.3571428571428571)">Has initial plan to set up KM</td>
                                                            <td class="border p-1" data-score="0.7142857142857143" onclick="highlightCellpap3(this, 'score-inputpap37', 0.7142857142857143)">Has set up a KM system to transfer knowledge on GAD</td>
                                                            <td class="border"><input type="number" id="score-inputpap37" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach the Knowledge Management (KM) system plan/framework or web link.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 3 PAPs)</strong></td>
                                                            <td class="text-center border"><h5 id="subtotalCellpap3"></h5></td>
                                                            <td class="text-center border"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border" colspan="6"></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="border p-1" colspan="6">4. GAD Commitment and Institutionalization <i>(max score: 5; for each item or question, 1.0)</i></th>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">4.1 Has the organization sustained implementation and monitoring of international, national and local GAD mandates in its PAPs? <i>(possible scores are 0,0.5, and 1)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap4(this, 'score-inputpap41', 0)">GAD mandate not implemented and monitored</td>
                                                            <td class="border p-1" data-score="0.5" onclick="highlightCellpap4(this, 'score-inputpap41', 0.5)">GAD mandates continuously implemented but not regularly monitored by the organization</td>
                                                            <td class="border p-1" data-score="1" onclick="highlightCellpap4(this, 'score-inputpap41', 1)">GAD mandates continuously implemented and regularly monitored by the organization</td>
                                                            <td class="border"><input type="number" id="score-inputpap41" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">List down GAD-related mandates being implemented and monitored by the organization and attach the relevant monitoring reports
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">4.2 Has the organization conducted organizational/sector- specific capacity development sessions on GAD for clients (internal and external)? <i>(possible scores are 0,0.5, and 1)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap4(this, 'score-inputpap42', 0)">No organizational sector-specific capacity development session/s on GAD conducted</td>
                                                            <td class="border p-1" data-score="0.5" onclick="highlightCellpap4(this, 'score-inputpap42', 0.5)">Organizational/ sector-specific GAD capacity development session/s conducted for either internal or external clients</td>
                                                            <td class="border p-1" data-score="1" onclick="highlightCellpap4(this, 'score-inputpap42', 1)">Organizational/ sector-specific GAD capacity development session/s conducted for both internal or external clients</td>
                                                            <td class="border"><input type="number" id="score-inputpap42" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">List down titles of organizational/sector- specific capacity development session/s on GAD conducted or discuss status of the development of sector-specific GAD capacity development session/s for clients being one by the organization <i>(e.g. Women’s Economic Empowerment, Gender and Justice, Gender and Climate Change)</i>.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">Title of Organizational/ Sector-Specific Capacity Development Program on GAD</th>
                                                                        <th class="text-center border p-1">Participants</th>
                                                                        <th class="text-center border p-1">Purpose</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                    <tr> 
                                                                        <th class="" colspan="6">Attach activity reports and/or documentation of the sector-specific capacity development sessions conducted.</th>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">4.3 Does the organization regularly apply gender analysis (GA) tools to assess gender-responsiveness of programs/activities/ projects (PAPs)? <i>(possible scores are 0,0.5, and 1)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap4(this, 'score-inputpap43', 0)">GAD perspective not yet integrated in the Vision, Mission or Goals</td>
                                                            <td class="border p-1" data-score="0.5" onclick="highlightCellpap4(this, 'score-inputpap43', 0.5)">GAD tools used to assess gender- responsiveness of 1-2 PAPs</td>
                                                            <td class="border p-1" data-score="1" onclick="highlightCellpap4(this, 'score-inputpap43', 1)">GAD tools used to assess gender-responsiveness of 3 or more PAPs</td>
                                                            <td class="border"><input type="number" id="score-inputpap43" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">List down Programs/Activities/Projects (PAPs) assessed and list of gender analysis (GA) tools regularly applied by the organization.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">GA Tools Applied</th>
                                                                        <th class="text-center border p-1">PAP Assessed</th>
                                                                        <th class="text-center border p-1">Results of Application</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">4.4 Has the organization developed a sustainability action plan for its GAD PAPs? <i>(possible scores are 0,0.5, and 1)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap4(this, 'score-inputpap44', 0)">No sustainability action plan on GAD PAPs formulated</td>
                                                            <td class="border p-1" data-score="0.5" onclick="highlightCellpap4(this, 'score-inputpap44', 0.5)">Draft sustainability action plan on GAD PAPs formulated</td>
                                                            <td class="border p-1" data-score="1" onclick="highlightCellpap4(this, 'score-inputpap44', 1)">Sustainability action plan on GAD PAPs formulated and approved</td>
                                                            <td class="border"><input type="number" id="score-inputpap44" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach draft or approved sustainability action plan on GAD PAPs of the organization.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">4.5 Has the organization conducted impact evaluation of its GAD PAPs? <i>(possible scores are 0,0.5, and 1)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap4(this, 'score-inputpap45', 0)">Gender impact assessment not yet conducted</td>
                                                            <td class="border p-1" data-score="0.5" onclick="highlightCellpap4(this, 'score-inputpap45', 0.5)">Impact assessment of GAD PAPs on- going</td>
                                                            <td class="border p-1" data-score="1" onclick="highlightCellpap4(this, 'score-inputpap45', 1)">Impact assessment of GAD PAPs completed and reported</td>
                                                            <td class="border"><input type="number" id="score-inputpap45" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach a copy of Gender Impact Assessment Report of the organization’s GAD PAPs.
                                                                <table class="table  table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 4 PAPs)</strong></td>
                                                            <td class="text-center border"><h5 id="subtotalCellpap4"></h5></td>
                                                            <td class="text-center border"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="border p-1" colspan="6">5. Model PAPs <i>(max score: 5; for each item or question: 1.25)</i></th>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">5.1 Has the organization been recognized as a GAD learning hub for its notable GAD PAPs? <i>(possible scores are 0, 0.62 and 1.25)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap5(this, 'score-inputpap51', 0)">Organization is still developing notable GAD PAPs</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap5(this, 'score-inputpap51', 0.625)">Organization has been recognized as a learning hub but GAD PAPs are not yet replicated</td>
                                                            <td class="border p-1" data-score="1.25" onclick="highlightCellpap5(this, 'score-inputpap51', 1.25)">Organization has been recognized as a learning hub and its GAD PAPs are replicated by other organizations</td>
                                                            <td class="border"><input type="number" id="score-inputpap51" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">List down awards/citations/recognitions/ nominations received.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">GAD Program/ Activity/ Project Recognized</th>
                                                                        <th class="text-center border p-1">Award/Citation Received</th>
                                                                        <th class="text-center border p-1">Year</th>
                                                                    </tr >
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                    <tr>
                                                                        <th class="p-1" colspan="3">If nominated/cited/certified, kindly attach photocopy of certificate/ recognition received and include press releases, photos, and documented testimonies, if applicable.</th>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">5.2 Has the organization’s partnership with stakeholders resulted in a convergence model that is recognized and replicated by other organizations? <i>(possible scores are 0, 0.62 and 1.25)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap5(this, 'score-inputpap52', 0)">No convergence model resulting from partnership</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap5(this, 'score-inputpap52', 0.625)">Convergence model recognized but not replicated</td>
                                                            <td class="border p-1" data-score="1.25" onclick="highlightCellpap5(this, 'score-inputpap52', 1.25)">Convergence model recognized and replicated</td>
                                                            <td class="border"><input type="number" id="score-inputpap52" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Describe GAD convergence model that resulted from the partnership and list down organizations that replicated it.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border text-center">
                                                                            <textarea class="form-control" name="file_name"></textarea>
                                                                            <input type="file" style="border: none;" name="enable_one_attachment" multiple>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">5.3 Has the organization’s Knowledge Products (KPs) and Information/ Education/ Communication (IEC) materials on GAD been used by other organizations? <i>(possible scores are 0, 0.62 and 1.25)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap5(this, 'score-inputpap53', 0)">GAD KPs and GAD IEC materials not yet cited as reference by other organizations</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap5(this, 'score-inputpap53', 0.625)">GAD KPs and GAD IEC materials used and cited as reference by at 1-2 organizations</td>
                                                            <td class="border p-1" data-score="1.25" onclick="highlightCellpap5(this, 'score-inputpap53', 1.25)">GAD KPs and GAD IEC materials used and cited as reference by 3 or more organizations</td>
                                                            <td class="border"><input type="number" id="score-inputpap53" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">List down GAD KPs and GAD Information/ Education/Communication (IEC) materials developed and utilized by the organization (e.g. MCW mobile application, videos, brochures, etc.).
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr> 
                                                                        <th class="text-center border p-1">Type of GAD KP/ GAD IEC Material</th>
                                                                        <th class="text-center border p-1">GAD KP/ GAD IEC Material Developed</th>
                                                                        <th class="text-center border p-1">Organiza- tions that Utilized GAD KP/ GAD IEC Material</th>
                                                                        <th class="text-center border p-1">Remarks</th>
                                                                    </tr>
                                                                    <tr> 
                                                                        <!-- <td class="text-center"><input type="text" style="border: none;" name="list_org" class="text-center"></td> -->
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                        <td class="border"></td>
                                                                    </tr >
                                                                    <tr>
                                                                        <th class="p-1" colspan="4">If nominated/cited/certified, kindly attach photocopy of certificate/ recognition received and include press releases, photos, and documented testimonies, if applicable.</th>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border p-1">5.4 Has the organization’s existing award/incentive system been integrated with GAD perspective? <i>(possible scores are 0, 0.62 and 1.25)</i></td>
                                                            <td class="border p-1" data-score="0" onclick="highlightCellpap5(this, 'score-inputpap54', 0)">Award system not yet integrated with GAD perspective</td>
                                                            <td class="border p-1" data-score="0.625" onclick="highlightCellpap5(this, 'score-inputpap54', 0.625)">Award system being reviewed for integration of GAD perspective</td>
                                                            <td class="border p-1" data-score="1.25" onclick="highlightCellpap5(this, 'score-inputpap54', 1.25)">Award/incentive system integrated with GAD perspective</td>
                                                            <td class="border"><input type="number" id="score-inputpap54" style="border: none;" name="enable_one" class="text-center" placeholder="type score here."></td>
                                                            <td class="border p-1" colspan="2">Attach criteria for the existing award/incentive system integrated with GAD perspective and provide list of the awardees.
                                                                <table class="table table-row-bordered gy-6">
                                                                    <tr>
                                                                        <td class="border p-1"><input class="form-control " style="border: none;" name=""></input></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center border" colspan="4"><strong>Sub-total GMEF Score (Level 5 PAPs)</strong></td>
                                                            <td class="text-center border" id="subtotalCellpap5"></td>
                                                            <td class="text-center border"></td>
                                                        </tr>
                                                        <tr>
                                                                <td class="text-center border" colspan="4"><h5><strong>TOTAL GMEF SCORE <i>(PAPs)</i></strong></h5></td>
                                                                <td class="text-center border" colspan="1"><h5 id="grandTotalCellpap1">0</h5></td>
                                                                <td class="text-center border" colspan="1"></td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="tab-pane fade" id="over-all-level" role="tabpanel" aria-labelledby="over-all-level-tab">
                    <div class="card mb-0">
                        <div class="card-body p-0">
                            <div class="row list-persons" id="addcon">
                                <div class="col-xl-8 col-md-8">
                                    <!-- <div class="tab-content" id="v-pills-tabContent"> -->
                                        <!-- <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab"> -->
                                            <div class="card-body align-center">
                                                <div class="dt-ext table-responsive">
                                                <table class="table border gy-6 table-xs">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center border" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="6"><h5><strong>OVER ALL LEVEL</strong></h5></th>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center w-400px border" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="3" ><strong>KEY AREAS</strong></th>
                                                            <th class="text-center w-400px border" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="3" colspan="3" ><strong>SCORE</strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="all_level_policy_body">
                                                        <tr>
                                                            <td class="text-center w-400px border" colspan="3" ><strong>Over All Level Total Score:</strong></td>
                                                            <td class="text-center w-400px border" colspan="3" ><strong id="totalGrandScore">0</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" ><strong>Over-all Level:</strong></td>
                                                            <td class="text-center w-400px border" colspan="3" ><strong>4: Commitment Enhancement and Institutionalization</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="w-400px border" style="color: white; background-color: #b4a7d6; vertical-align: middle;" colspan="6" ><strong>POLICY</strong></th>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >1. Issuance of initial policies on GAD</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCell11"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >2. Issuance of policies to mainstream GAD in the organization</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCell22"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >3. Integration of GAD in the Organization’s Policies</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCell33"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >4. Updating and Continuous Enhancement of GAD Policies</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCell44"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >5. Model GAD Policy</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCell55"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center w-400px border" colspan="3" ><i>Sub-Total:</i></td>
                                                            <td class="text-center w-400px border" colspan="3" id="grandTotalCell2"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" ><i>Level for Policy:</i></td>
                                                            <td class="text-center w-400px border" colspan="3" ><strong>5: Replication and Innovation</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="w-400px border" style="color: white; background-color: #b4a7d6; vertical-align: middle;" colspan="6" ><strong>PEOPLE</strong></th>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >1. For Establishing GFPS & GAD Champions/Advocates</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellp11"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >2. For GAD Initiatives & Capacity Development Activities</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellp22"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >3. For GAD Sponsorship & Related Programs</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellp33"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >4. GAD Champions as Program Implementers</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellp44"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >5. GAD Experts</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellp55"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center w-400px border" colspan="3" ><i>Sub-Total:</i></td>
                                                            <td class="text-center w-400px border" colspan="3" id="grandTotalCellp2"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" ><i>Level for People:</i></td>
                                                            <td class="text-center w-400px border" colspan="3" ><strong>4: Commitment Enhancement and Institutionalization</strong></td>
                                                        </tr>

                                                        <tr>
                                                            <th class="w-400px border" style="color: white; background-color: #b4a7d6; vertical-align: middle;" colspan="6" ><strong>ENABLING MECHANISMS</strong></th>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >1. Setting-up of Essential GAD Mechanisms</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellem11"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >2. Functional GAD Mechanisms</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellem22"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >3. Integration of GAD in the Organization’s Mechanisms</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellem33"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >4. Advanced GAD Structures and Systems</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellem44"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >5. Model GAD Structures and Systems</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellem55"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center w-400px border" colspan="3" ><i>Sub-Total:</i></td>
                                                            <td class="text-center w-400px border" colspan="3" id="grandTotalCellem2"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" ><i>Level for Enabling Mechanisms:</i></td>
                                                            <td class="text-center w-400px border" colspan="3" ><strong>4: Commitment Enhancement and Institutionalization</strong></td>
                                                        </tr>

                                                        <tr>
                                                            <th class="w-400px border" style="color: white; background-color: #b4a7d6; vertical-align: middle;" colspan="6" ><strong>PROGRAMS, ACTIVITIES, AND PROJECT (PAPs)</strong></th>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px" colspan="3" >1. Initial Activities to Facilitate GAD Mainstreaming</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellpap11"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >2. Establishing Commitment towards GAD Mainstreaming</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellpap22"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >3. GAD Application</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellpap33"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >4. GAD Commitment and Institutionalization</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellpap44"></td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" >5. Model PAPs</td>
                                                            <td class="text-center w-400px border" colspan="3" id="subtotalCellpap55"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center w-400px border" colspan="3" ><i>Sub-Total:</i></td>
                                                            <td class="text-center w-400px border" colspan="3" id="grandTotalCellpap2"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-400px border" colspan="3" ><i>Level for PAPs:</i></td>
                                                            <td class="text-center w-400px border" colspan="3" ><strong>4: Commitment Enhancement and Institutionalization</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                    <!-- </div> -->
                                </div>
                                <div class="col-xl-4 col-md-4">
                                    <div class="card-body align-center">
                                        <div class="dt-ext table-responsive">
                                            <table class="table gy-6 table-xs">
                                                <!-- <tbody> -->
                                                    <tr>
                                                        <th class="text-center border p-1" style="color: white; background-color: #674ea7; vertical-align: middle;" rowspan="6" colspan="1">Level Per Entry Point</th>
                                                        <th class="text-center border p-1" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="1">RANGES</th>
                                                        <th class="text-center border p-1" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="1">LEVEL DESCRIPTION</th>
                                                    </tr>
                                                    <tr style="background-color: #f2eff7; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">0-7.99 points</td>
                                                        <td class="text-center border p-1">1: Foundation Formation</td>
                                                    </tr>
                                                    <tr style="background-color: #e8e3f1; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">8-14.99 points</td>
                                                        <td class="text-center border p-1">2: Installation of Strategic Mechanisms</td>
                                                    </tr>
                                                    <tr style="background-color: #dfd7eb; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">15-19.99 points</td>
                                                        <td class="text-center border p-1">3: GAD Application</td>
                                                    </tr>
                                                    <tr style="background-color: #d6cce5; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">20-23.99 points</td>
                                                        <td class="text-center border p-1">4: Commitment Enhancement and Institutionalization</td>
                                                    </tr>
                                                    <tr style="background-color: #cec1df; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">24-25 points</td>
                                                        <td class="text-center border p-1">5: Replication and Innovation</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                <!-- </tbody> -->
                                                <tr>
                                                        <th class="text-center border p-1" style="color: white; background-color: #674ea7; vertical-align: middle;" rowspan="6" colspan="1">Over-all Level</th>
                                                        <th class="text-center border p-1" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="1">RANGES</th>
                                                        <th class="text-center border p-1" style="color: white; background-color: #674ea7; vertical-align: middle;" colspan="1">LEVEL DESCRIPTION</th>
                                                    </tr>
                                                    <tr style="background-color: #f2eff7; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">0-30.99 points</td>
                                                        <td class="text-center border p-1">1: Foundation Formation</td>
                                                    </tr>
                                                    <tr style="background-color: #e8e3f1; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">31-60.99 points</td>
                                                        <td class="text-center border p-1">2: Installation of Strategic Mechanisms</td>
                                                    </tr>
                                                    <tr style="background-color: #dfd7eb; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">61-80.99 points</td>
                                                        <td class="text-center border p-1">3: GAD Application</td>
                                                    </tr>
                                                    <tr style="background-color: #d6cce5; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">81-95.99 points</td>
                                                        <td class="text-center border p-1">4: Commitment Enhancement and Institutionalization</td>
                                                    </tr>
                                                    <tr style="background-color: #cec1df; vertical-align: middle;">
                                                        <!-- <td class="text-center border p-1"></td> -->
                                                        <td class="text-center border p-1">96-100 points</td>
                                                        <td class="text-center border p-1">5: Replication and Innovation</td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
<script>
  function updateDescriptionAndScore(point, scoreDesc, id) {
    console.log("Point:", point);
    console.log("Score Description:", scoreDesc);
    console.log("ID:", id);
    // Your logic here
    const descriptionContainer = document.getElementById(`description-container-${id}`);
    console.log("ID:",descriptionContainer );
// Update the content of the description container
if (descriptionContainer) {
    descriptionContainer.textContent = `Selected Score: ${point}, Description: ${scoreDesc}`;
}
}
    </script>

@endsection