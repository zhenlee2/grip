
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/prism.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/sweetalert2.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h5>OFFICE PERFORMANCE CONTRACT</h5>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active"> Office Performance Contract</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="col-sm-12">
			<div class="card">
					<ul class="nav nav-tabs" id="icon-tab" role="tablist">
						<li class="nav-item"><a class="nav-link active" id="icon-home-tab" data-bs-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-list"></i>Performance Contract</a></li>
						<!-- <li class="nav-item"><a class="nav-link" id="profile-icon-tab" data-bs-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false"><i class="icofont icofont-ui-add"></i>Create Performance Contract</a></li> -->
						<!-- <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-bs-toggle="tab" href="#contact-icon" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-ui-rating"></i>Performance Contract Ratings</a></li> -->
					</ul>
					<div class="tab-content" id="icon-tabContent">
						<div class="tab-pane fade show active" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
                        <div class="card mb-0">
                              <div class="card-body p-0">
                                 <div class="row list-persons" id="addcon">
                                    <div class="col-xl-12 col-md-12">
                                       <div class="tab-content" id="v-pills-tabContent">
                                          <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                                <div class="card-body">
                                                    <div class="dt-ext table-responsive">
                                                    <div class="table-responsive">
                                                        <a href="<?php echo e(route('createpc')); ?>" class="btn btn-primary btn-sm update-contact btn-sm" data-bs-original-title="Cancel" type="button"><span class="icon-arrow-left"></span></a>
                                                        <button href="#" onclick="history(0)" class="btn btn-primary btn-sm" data-bs-original-title="History" data-bs-dismiss="modal" type="button"><span class="fa fa-history"></span></button>
                                                        <!-- <a href="<?php echo e(route('print', ['year' => $year, 'semester' => $semester])); ?>" class="btn btn-primary btn-sm" data-bs-original-title="Print" data-bs-dismiss="modal" type="button"><span class="icon-printer"></span></a> -->
                                                        <a onclick="print_opc()" class="btn btn-primary btn-sm" data-bs-original-title="Print" data-bs-dismiss="modal" type="button"><span class="icon-printer"></span></a>
                                                        <!-- <button class="btn btn-success btn-sm saveOfficepc pull-right" data-bs-original-title="Update" type="button"><span class="icon-save-alt"></span></button> -->
                                                        <button class="btn btn-danger btn-sm deleteOfficepc pull-right" data-bs-original-title="Delete this OPC" onclick="delete_opc()" id="delete-opc" type="button"><span class="icon-trash"></span></button>
                                                       
                                                        <table id="datatable" class="table table-bordered table-xs">                
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" class="text-center"><strong>KEY RESULTS AREA</strong></th>
                                                                        <th rowspan="2" class="col-sm-4 col-form-label text-center p-0"><strong>PERFORMANCE INDICATOR </br>(<i class="icofont icofont-ui-cart"></i> Quantity, <i class="icofont icofont-speech-comments"></i> Quality, <i class="icofont icofont-ui-calendar"></i> Timeliness)</strong></th>
                                                                        <th rowspan="2" scope="col" class="col-sm-1 col-form-label text-center p-0"><strong>ALLOTTED BUDGET (in Php <i class="icofont icofont-cur-peso"></i>)</strong></th>
                                                                        <th rowspan="2" scope="col" class="col-sm-2 col-form-label text-center p-0"><strong>ACCOUNTABILITY CENTER </br> (<i class="icofont icofont-company"></i> Division, <i class="icofont icofont-unity-hand"></i> Units, <i class="icofont icofont-user-alt-4"></i> Individuals)</strong></th>
                                                                        <!-- <th rowspan="2" class="col-sm-1 text-center p-0"><button class="btn btn-primary btn-sm" type="button" data-bs-original-title="Add Performance Contract" data-bs-toggle="modal" data-bs-target="#createPCModal"><span class="fa fa-plus-square-o"></span></button></th> -->
                                                                        <th rowspan="2" class="col-sm-1 text-center p-0"></th>
                                                                    </tr>
                                                                    <tr> 
                                                                        <th scope="col" class="col-sm-2 col-form-label text-center p-0"><strong><i class="icofont icofont-trophy"></i> Objectives, Program, Project, Activity</strong></th>
                                                                        <th scope="col" class="col-sm-1 col-form-label text-center p-0"><strong><i class="icofont icofont-chart-pie"></i> Weight<br>Allocation</strong></th>                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)" class="text-center"><strong>STRATEGIC PRIORITIES</strong></td>
                                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)" class="text-center"><strong>50%</strong></td>
                                                                        <td colspan="6" style="background-color: rgb(128, 128, 128)" ></td>
                                                                    </tr>
                                                                </tbody>
                                                                <tbody id="strategic2">
                                                                    
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($d->indicator_id == 1): ?>
                                                        <tr>
                                                            <td class="p-0" >
                                                            <div class="text-center m-1 hidden" data-category="Strategic Priorities"></div>
                                                                <div class="text-center m-1 hidden" data-id="<?php echo e($d->id); ?>"></div>
                                                                <div class="text-center m-1 hidden" data-year="<?php echo e($d->year); ?>"></div>
                                                                <div class="text-center m-1 hidden" data-semester="<?php echo e($d->semester); ?>"></div>
                                                                <div class="text-center m-1" data-name="<?php echo e($d->name); ?>"><?php echo e($d->name); ?></div>
                                                            </td>
                                                            <td class="p-0" >
                                                                <div class="row p-0 m-1">
                                                                        <div class="text-center sub-weight" data-sub="<?php echo e($d->sub_weight_allocation); ?>"><?php echo e($d->sub_weight_allocation); ?></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-0"><div class="row">
                                                                <div class="col-1 text-center p-0 m-1" data-sort="<?php echo e($d->sort); ?>"><?php echo e($d->sort); ?></div>
                                                                <div class="col-10 p-0">
                                                                    <div class="m-1" data-target="<?php echo e($d->target_indicator_desc); ?>"><strong><?php echo e($d->target_indicator_desc); ?></strong></div>
                                                                    <div class="m-1" data-quantity="<?php echo e($d->quantity); ?>"><strong>Ql:</strong> <?php echo e($d->quantity); ?></div>
                                                                    <div class="m-1" data-quality="<?php echo e($d->quality); ?>"><strong>Qn:</strong> <?php echo e($d->quality); ?></div>
                                                                    <div class="m-1" data-timeliness="<?php echo e($d->timeliness); ?>"><strong>T:</strong> <?php echo e($d->timeliness); ?></div>
                                                                </div>
                                                            </div></td>
                                                            <td class="p-0">
                                                                <div class="row m-1 p-0">
                                                                        <div class="text-center alloted-budget" data-alloted="<?php echo e($d->alloted_budget); ?>"> <?php echo e($d->alloted_budget); ?></div>
                                                                </div>
                                                            </td>

                                                            <td class="p-0"><div class="row m-1">
                                                                    <div class="text-center" data-center="<?php echo e($d->accountability_center); ?>"><?php echo e($d->accountability_center); ?></div>
                                                            </div></td>
                                                            <td  scope="col" class="col-sm p-0" align="center">
                                                                <button class="btn btn-success btn-sm" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td  colspan="1" style="background-color: rgb(128, 128, 128)" class="text-center"><strong>CORE FUNCTIONS</strong></td>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)" class="text-center"><strong>35%</strong></td>
                                                        <td colspan="4" style="background-color: rgb(128, 128, 128)"></td>                       
                                                    </tr>
                                                </tbody>
                                                <tbody id="core2">
                                                    
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($d->indicator_id == 2): ?>
                                                    <tr>
                                                            <td class="p-0" >
                                                                <div class="text-center m-1 hidden" data-category="CORE FUNCTIONS"></div>
                                                                <div class="text-center m-1 hidden" data-id="<?php echo e($d->id); ?>"></div>
                                                                <div class="text-center m-1 hidden" data-year="<?php echo e($d->year); ?>"></div>
                                                                <div class="text-center m-1 hidden" data-semester="<?php echo e($d->semester); ?>"></div>
                                                                <div class="text-center m-1" data-name="<?php echo e($d->name); ?>"><?php echo e($d->name); ?></div>
                                                            </td>
                                                            <td class="p-0" >
                                                                <div class="row p-0 m-1">
                                                                        <div class="text-center sub-weight" data-sub="<?php echo e($d->sub_weight_allocation); ?>"><?php echo e($d->sub_weight_allocation); ?></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-0"><div class="row">
                                                                <div class="col-1 text-center p-0 m-1" data-sort="<?php echo e($d->sort); ?>"><?php echo e($d->sort); ?></div>
                                                                <div class="col-10 p-0">
                                                                    <div class="m-1" data-target="<?php echo e($d->target_indicator_desc); ?>"><strong><?php echo e($d->target_indicator_desc); ?></strong></div>
                                                                    <div class="m-1" data-quantity="<?php echo e($d->quantity); ?>"><strong>Ql:</strong> <?php echo e($d->quantity); ?></div>
                                                                    <div class="m-1" data-quality="<?php echo e($d->quality); ?>"><strong>Qn:</strong> <?php echo e($d->quality); ?></div>
                                                                    <div class="m-1" data-timeliness="<?php echo e($d->timeliness); ?>"><strong>T:</strong> <?php echo e($d->timeliness); ?></div>
                                                                </div>
                                                            </div></td>
                                                            <td class="p-0">
                                                                <div class="row m-1 p-0">
                                                                        <div class="text-center alloted-budget" data-alloted="<?php echo e($d->alloted_budget); ?>"> <?php echo e($d->alloted_budget); ?></div>
                                                                </div>
                                                            </td>

                                                            <td class="p-0"><div class="row m-1">
                                                                    <div class="text-center" data-center="<?php echo e($d->accountability_center); ?>"><?php echo e($d->accountability_center); ?></div>
                                                            </div></td>
                                                            <td  scope="col" class="col-sm p-0" align="center">
                                                                <button class="btn btn-success btn-sm" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128)" class="text-center"><strong>SUPPORT FUNCTIONS</strong></td>
                                                        <td colspan="1" style="background-color: rgb(128, 128, 128) " class="text-center"><strong>15%</strong></td>
                                                        <td colspan="4" style="background-color: rgb(128, 128, 128)"></td>    
                                                    </tr>
                                                </tbody>
                                                <tbody id="support2">
                                                    
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($d->indicator_id == 3): ?>
                                                    <tr>
                                                            <td class="p-0" >
                                                            <div class="text-center m-1 hidden" data-category="SUPPORT FUNCTION"></div>
                                                                <div class="text-center m-1 hidden" data-id="<?php echo e($d->id); ?>"></div>
                                                                <div class="text-center m-1 hidden" data-year="<?php echo e($d->year); ?>"></div>
                                                                <div class="text-center m-1 hidden" data-semester="<?php echo e($d->semester); ?>"></div>
                                                                <div class="text-center m-1" data-name="<?php echo e($d->name); ?>"><?php echo e($d->name); ?></div>
                                                            </td>
                                                            <td class="p-0" >
                                                                <div class="row p-0 m-1">
                                                                        <div class="text-center sub-weight" data-sub="<?php echo e($d->sub_weight_allocation); ?>"><?php echo e($d->sub_weight_allocation); ?></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-0"><div class="row">
                                                                <div class="col-1 text-center p-0 m-1" data-sort="<?php echo e($d->sort); ?>"><?php echo e($d->sort); ?></div>
                                                                <div class="col-10 p-0">
                                                                    <div class="m-1" data-target="<?php echo e($d->target_indicator_desc); ?>"><strong><?php echo e($d->target_indicator_desc); ?></strong></div>
                                                                    <div class="m-1" data-quantity="<?php echo e($d->quantity); ?>"><strong>Ql:</strong> <?php echo e($d->quantity); ?></div>
                                                                    <div class="m-1" data-quality="<?php echo e($d->quality); ?>"><strong>Qn:</strong> <?php echo e($d->quality); ?></div>
                                                                    <div class="m-1" data-timeliness="<?php echo e($d->timeliness); ?>"><strong>T:</strong> <?php echo e($d->timeliness); ?></div>
                                                                </div>
                                                            </div></td>
                                                            <td class="p-0">
                                                                <div class="row m-1 p-0">
                                                                        <div class="text-center alloted-budget" data-alloted="<?php echo e($d->alloted_budget); ?>"> <?php echo e($d->alloted_budget); ?></div>
                                                                </div>
                                                            </td>

                                                            <td class="p-0"><div class="row m-1">
                                                                    <div class="text-center" data-center="<?php echo e($d->accountability_center); ?>"><?php echo e($d->accountability_center); ?></div>
                                                            </div></td>
                                                            <td  scope="col" class="col-sm p-0" align="center">
                                                                <button class="btn btn-success btn-sm" type="submit" id="view" onclick="get_indicator()" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </tbody>
                                                <tbody>
                                                    <tr id="total_weight" class="p-0">
                                                        <!-- <td colspan="1"></td> -->
                                                        <td name="" class="text-center p-0"><h6>Total Weight: </h6></td>
                                                        <td name="total_weight_value" id="total_weight_value" class="text-center p-0"></td>
                                                        <td colspan="1"></td>
                                                        <td name="alloted_weight_value" id="alloted_weight_value" class="text-center p-0"></td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </tbody>
                                                            </table>
                                                            <!-- <button class="btn btn-success btn-sm saveOfficepc pull-right editview" data-bs-original-title="Update" type="button"><span class="icon-save-alt"></span></button> -->
                                                            <button class="btn btn-danger btn-sm pull-right" data-bs-original-title="Delete this OPC" onclick="delete_opc()" id="delete-opc" type="button"><span class="icon-trash"></span></button>
                                                            
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
			</div>
		</div>

          
        <!-- Update Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="updatePCModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePCModalLabel">Update Performance Contract</h5>
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
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Select KRA Category</label>
                                            <input class="form-control" name="category-name" id="category-name" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Select Objectives, Program, Project and Activity</label>
                                            <input name="activity-name" id="activity-name" type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <div class="mb-2">
                                                <label>Indicator Code #</label>
                                                <input class="form-control" name="indicator-code" id="indicator-code" type="text" >
                                                </div>
                                            </div>
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Sub Weight Allocation</label>
                                            <input class="form-control" name="subWa" id="subWa" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                        <label>Target Indicator Description</label>
                                        <textarea  name="targetIndicator" id="targetIndicator" type="text" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                        <label>Quantity</label>
                                        <textarea class="form-control" name="quantity" id="quantity" type="text" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                        <label>Quality</label>
                                        <textarea class="form-control" name="quality" id="quality" type="text" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                        <label>Timeliness</label>
                                        <textarea class="form-control" name="timeliness" id="timeliness" type="text" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Alloted Budget (in Php)</label>
                                                <input class="form-control" name="alloted" id="alloted" type="text" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Accountability Center</label>
                                            <input class="form-control" name="center" id="center" type="text" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <!-- End of Update Modal -->

        <!-- History Modal -->
        <div id="right-history">
                    <div class="modal-header p-l-20 p-r-20">
                        <h6 class="modal-title w-100">Perfomance Contract History<span class="pull-right"><a class="closehistory" href="#"><i class="icofont icofont-close"></i></a></span></h6>
                            </div>
                                <div class="history-details">
                                    <div class="text-center">
                                        <i class="icofont icofont-ui-edit"></i>
                                        <p>Perfomance Contract has not been modified yet.</p>
                                    </div>
                                <div class="media">
                                    <i class="icofont icofont-star me-3"></i>
                                <a type="button">
                                    <div class="media-body mt-0">
                                        <h6 class="mt-0">Performance Contract Created</h6>
                                            <!-- <p class="mb-0">Contact is created via mail</p> -->
                                        <span class="f-12">Updated by: Joshua Quistadio</span>
                                        <span class="f-12">Date Updated: January 10, 20 8:00 AM</span>
                                    </div>
                                </a>    
                        </div>
                    </div>
                </div>
        <!-- End of History Modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweet-alert/sweetalert.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bookmark/jquery.validate.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/contacts/custom.js')); ?>"></script>
<script>

    function get_indicator() {
        var row = $(event.target).closest('tr');

        var category = row.find('[data-category]').data('category');
        var id = row.find('[data-id]').data('id');
        var year = row.find('[data-year]').data('year');
        var name = row.find('[data-name]').data('name');
        var sub = row.find('[data-sub]').data('sub');
        var sort = row.find('[data-sort]').data('sort');
        var target = row.find('[data-target]').data('target');
        var quantity = row.find('[data-quantity]').data('quantity');
        var quality = row.find('[data-quality]').data('quality');
        var timeliness = row.find('[data-timeliness]').data('timeliness');
        var alloted = row.find('[data-alloted]').data('alloted');
        var center = row.find('[data-center]').data('center');

        $('#category-name').val(category);
        $('#activity-name').val(name);
        $('#subWa').val(sub);
        $('#indicator-code').val(sort);
        $('#targetIndicator').val(target);
        $('#quantity').val(quantity);
        $('#quality').val(quality);
        $('#timeliness').val(timeliness);
        $('#alloted').val(alloted);
        $('#center').val(center);

    $("#editButton").click(function(event) {
        event.preventDefault();
        var dataToSend = {
            id: id,
            category: $('#category-name').val(),
            name: $('#activity-name').val(),
            sub: $('#subWa').val(),
            sort: $('#indicator-code').val(),
            target: $('#targetIndicator').val(),
            quantity: $('#quantity').val(),
            quality: $('#quality').val(),
            timeliness: $('#timeliness').val(),
            alloted: $('#alloted').val(),
            center: $('#center').val()
        };
        console.log(dataToSend );
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
                        url: BASE_URL + 'performance_contract/update_indicator',
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
        } else {
            console.log('Data to send is empty');
        }
    });
}
   
    // Assuming data_arr and indicator_code are defined somewhere in your code

    // Function to delete an item
    function delete_opc() {

            var numericIds = [];

            $('table tbody tr').each(function () {
                var rowData = {
                    id: $(this).find('[data-id]').data('id'),
                    // year: $(this).find('[data-year]').data('year'),
                    // Add other data properties as needed
                };

                // Check if the 'id' attribute is present and not undefined
                if (rowData.id !== undefined) {
                    // Extract only the numeric part from id
                    var numericId = rowData.id ? rowData.id.toString().replace(/\D/g, '') : null;

                    // Check if numericId is not empty and is a number
                    if (numericId !== null && !isNaN(numericId)) {
                        numericIds.push(numericId);
                    } else {
                        console.log('ID does not contain a valid number:', rowData.id);
                    }
                } else {
                    console.log(rowData.id);
                }
            });

            // Convert the array of numeric IDs to JSON
            // var jsonResult = JSON.stringify(numericIds);
            var data = {
            id: numericIds,
        }
        console.log(data);

            if (Object.keys(data).length > 0) {
            Swal.fire({
                title: 'Are you sure you want to Update?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                // console.log(dataToSend);
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: BASE_URL + 'performance_contract/delete_indicator',
                        type: 'POST',
                        data: data,
                        success: function(response) {
                            Swal.fire(
                                'Confirm!',
                                'Your file has been saved.',
                                'success'
                            )
                            setTimeout(() => {
                                window.location.href = '/performance_contract/office';
                            }, 1000);
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

                
    }

    $(document).ready(function () {
        // Function to calculate total weight for a specific category
        function calculateTotalWeight(categoryId) {
            var totalWeight = 0;

            $('#' + categoryId + ' .sub-weight').each(function () {
                var subWeight = parseFloat($(this).data('sub'));

                if (!isNaN(subWeight)) {
                    totalWeight += subWeight;
                }
            });

            return totalWeight;
        }

        // Calculate and update total weights
        var totalStrategicWeight = calculateTotalWeight('strategic2');
        var totalCoreWeight = calculateTotalWeight('core2');
        var totalSupportWeight = calculateTotalWeight('support2');

        // console.log(totalStrategicWeight ,"hello");
        // console.log(totalCoreWeight ,"hello");
        // console.log(totalSupportWeight ,"hello");
        // Update the total weight in the HTML
       
        $('#total_weight_value').text(totalStrategicWeight + totalCoreWeight + totalSupportWeight + '%');
    });

    function print_opc(){
        console.log("Hello");
        $(".demo").printThis();
    }

    $(document).ready(function () {
        // Function to calculate total weight for a specific category
        function calculateBudgetAllocation(categoryId) {
            var totalBudget = 0;

            $('#' + categoryId + ' .alloted-budget').each(function () {
                var subBudget = parseFloat($(this).data('alloted'));

                if (!isNaN(subBudget)) {
                    totalBudget += subBudget;
                }
            });

            return totalBudget;
        }

        // Calculate and update total weights
        var totalStrategicBudget= calculateBudgetAllocation('strategic2');
        var totalCoreBudget = calculateBudgetAllocation('core2');
        var totalSupportBudget = calculateBudgetAllocation('support2');

        // console.log(totalStrategicBudget ,"hello");
        // console.log(totalCoreBudget ,"hello");
        // console.log(totalSupportBudget ,"hello");

        var totalBudget = totalStrategicBudget + totalCoreBudget + totalSupportBudget;

        var formattedTotaltotalBudget = totalBudget.toLocaleString('en-US', {
         style: 'currency',
         currency: 'PHP', // Change this to your desired currency code
         minimumFractionDigits: 2, // Adjust the precision as needed
      });

      $('#alloted_weight_value').text(formattedTotaltotalBudget);

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\caraga-pdps.dswd.gov.ph\resources\views/pages/opcpage/showopc.blade.php ENDPATH**/ ?>