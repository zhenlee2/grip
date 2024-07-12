@extends('layouts.simple.master')
@section('title', 'Select2')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Select2</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Form Widgets</li>
<li class="breadcrumb-item active">Select2</li>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
              
               <div class="dt-ext table-responsive">
                  <table class="table border table-xs" style="padding: 1px 1px; ">
                     <thead>
                        <th class="border " style="text-align: center; vertical-align: middle; padding: 4px">ID</th>
                        <th class="border col-6" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Gender Issue or GAD Mandate</th>
                        <th class="border col-3" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Results Indicator</th>
                        <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px">Male</th>
                        <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px">Female</th>
                        <th class="border" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle; padding: 4px">Total</th>
                        <th class="border col-2" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">PAP Description</th>
                        <th class="border col-2" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">GAD Activities</th>
                        <th class="border " rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Lead Division/Office</th>
                        <th class="border " rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Responsible Unit/Office</th>
                        <th class="border " rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;">Raw Responsible Unit/Office</th>
                        <th class="border col-1" rowspan="1" colspan="1" style="text-align: center; vertical-align: middle;"></th>
                     </thead>
                     <tbody>
                        <tr>
                           <th class="border p-1" colspan="11" style="background-color:darkgrey;">A. Client-Focused</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 1)
                                <tr>
                                    <td class="border p-0" style="text-align: center; padding: 4px">{{ $g->indicator_code }}</td>
                                    <td class="border p-1">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1">{{ $g->result_indicator }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1">{{ $g->pap_desc }}</td>
                                    <td class="border p-1">{{ $g->gad_activity }}</td>
                                    <td class="border p-1">{{ $g->responsible_unit}}</td>
                                    <td class="border p-1">{{ $g->unit}}</td>
                                    <td class="border p-1">{{ $g->rawresponsible_unit}}</td>
                                    <td class="border p-1">
                                        <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                        <!-- <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button> -->
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                           <th class="border p-1" colspan="11" style="background-color:darkgrey; margin: 0;">B. Organization-Focused</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 2)
                                <tr>
                                    <td class="border p-0" style="text-align: center; padding: 4px">{{ $g->indicator_code }}</td>
                                    <td class="border p-1">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1">{{ $g->result_indicator }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1">{{ $g->pap_desc }}</td>
                                    <td class="border p-1">{{ $g->gad_activity }}</td>
                                    <td class="border p-1">{{ $g->responsible_unit}}</td>
                                    <td class="border p-1">{{ $g->unit}}</td>
                                    <td class="border p-1">{{ $g->rawresponsible_unit}}</td>
                                    <td class="border p-1">
                                        <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <tr>
                           <th class="border p-1 m-0;" colspan="11" style="background-color:darkgrey; ">C. GAD-Attributed Programs or Projects</th>
                        </tr>
                        @foreach ($gadar as $g)
                            @if ($g->gadcategory_id == 3)
                                <tr>
                                    <td class="border p-0" style="text-align: center; padding: 4px">{{ $g->indicator_code }}</td>
                                    <td class="border p-1">{{ $g->gad_mandate }}</td>
                                    <td class="border p-1">{{ $g->result_indicator }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_male }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_female }}</td>
                                    <td class="border p-1" style="text-align: center; padding: 4px">{{ $g->target_totalsex }}</td>
                                    <td class="border p-1">{{ $g->pap_desc }}</td>
                                    <td class="border p-1">{{ $g->gad_activity }}</td>
                                    <td class="border p-1">{{ $g->responsible_unit}}</td>
                                    <td class="border p-1">{{ $g->unit}}</td>
                                    <td class="border p-1">{{ $g->rawresponsible_unit}}</td>
                                    <td class="border p-1">
                                        <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                        <!-- <button class="btn btn-success btn-sm form-control" type="submit" id="view" onclick="get_indicators()" data-bs-original-title="MOVs" data-bs-toggle="modal" data-bs-target="#movModal"><span class="icon-save-alt"></span></button> -->
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

<div class="modal hide fade" id="editModal" role="dialog" aria-labelledby="updatePCModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePCModalLabel">Add Gender and Development Plan and Budget</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="" id="editform" name="editform" method="POST">
                    <div class="card-body o-hidden">
						<div class="mb-2">
							<div class="col-form-label">Select2 multi select</div>
							<select id="js-example-basic-multiple col-sm-12" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming1</option>
                            <option value="WY">Wyoming2</option>
                            <option value="WY">Wyoming3</option>
                            </select>
						</div>
					</div>
                </form>
        </div>
        </div>
</div>

<div class="container-fluid">
	<div class="select2-drpdwn">
		<div class="row">
			Default Textbox start
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Select-2</h5>
					</div>
					<div class="card-body o-hidden">
						<div class="mb-2">
							<div class="col-form-label">Select2 multi select</div>
							<select class="js-example-basic-multiple col-sm-12" multiple="multiple">
								<option value="AL">Alabama</option>
								<option value="WY">Wyoming</option>
								<option value="WY">Coming</option>
								<option value="WY">Hanry Die</option>
								<option value="WY">John Doe</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script>
    // $('#multiple-select2').select2({
    //     dropdownParent: $('#editModal'),
    //     multiple: true
    // });
</script>
@endsection