
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
                                                        <a href="<?php echo e(route('print', ['year' => $year, 'semester' => $semester])); ?>" class="btn btn-primary btn-sm" data-bs-original-title="Print" data-bs-dismiss="modal" type="button"><span class="icon-printer"></span></a>
                                                        <button class="btn btn-success btn-sm saveOfficepc pull-right" data-bs-original-title="Update" type="button"><span class="icon-save-alt"></span></button>
                                                        <button class="btn btn-danger btn-sm deleteOfficepc pull-right" data-bs-original-title="Delete this OPC" type="button"><span class="icon-trash"></span></button>
                                                        <div>
                                                            <!-- <table class="table table-bordered table-sm"> 
                                                                <tr>
                                                              
                                                                    <th class="col-sm-1 col-form-label p-2">Created by :</th>
                                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if(!empty($d)==1): ?>
                                                                    <th class="col-sm-2 col-form-label p-2"><?php echo e($d->fname); ?> <?php echo e($d->lname); ?></th>
                                                                    <?php break; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <th class="col-sm-1 col-form-label p-2">ID No.:</th>
                                                                    <th class="col-sm-2 col-form-label p-2"></th>
                                                                    
                                                                    <th class="col-sm-1 col-form-label p-2">Date Created:</th>
                                                                    <th class="col-sm-2 col-form-label p-2"></th>
                                                                    
                                                            </tr>
                                                                <tr>
                                                                    <th class="col-sm-1 col-form-label p-2">Division :</th>
                                                                    <th class="col-sm-2 col-form-label p-2"></th>
                                                                    
                                                                    <th class="col-sm-1 col-form-label p-2">Section:</th>
                                                                    <th class="col-sm-2 col-form-label p-2"></th>
                                                                    
                                                                    <th class="col-sm-1 col-form-label p-2">Semester:</th>
                                                                    <th class="col-sm-2 col-form-label p-2"></th>
                                                                </tr>                  
                                                            </table> -->
                                                        </div>
                                                            <table id="datatable" class="table table-bordered table-xs">                
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" class="text-center"><strong>KEY RESULTS AREA</strong></th>
                                                                        <th rowspan="2" class="col-sm-4 col-form-label text-center p-0"><strong>PERFORMANCE INDICATOR </br>(<i class="icofont icofont-ui-cart"></i> Quantity, <i class="icofont icofont-speech-comments"></i> Quality, <i class="icofont icofont-ui-calendar"></i> Timeliness)</strong></th>
                                                                        <th rowspan="2" scope="col" class="col-sm-1 col-form-label text-center p-0"><strong>ALLOTTED BUDGET (in Php <i class="icofont icofont-cur-peso"></i>)</strong></th>
                                                                        <th rowspan="2" scope="col" class="col-sm-2 col-form-label text-center p-0"><strong>ACCOUNTABILITY CENTER </br> (<i class="icofont icofont-company"></i> Division, <i class="icofont icofont-unity-hand"></i> Units, <i class="icofont icofont-user-alt-4"></i> Individuals)</strong></th>
                                                                        <th rowspan="2" class="col-sm-1 text-center p-0"><button class="btn btn-primary btn-sm" type="button" data-bs-original-title="Add Performance Contract" data-bs-toggle="modal" data-bs-target="#createPCModal"><span class="fa fa-plus-square-o"></span></button></th>
                                                                        
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
                                                                <div class="text-center m-1"><?php echo e($d->name); ?></div>
                                                            </td>
                                                            <td class="p-0" >
                                                                <div class="row p-0 m-1">
                                                                        <div class="text-center"><?php echo e($d->sub_weight_allocation); ?></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-0"><div class="row">
                                                                <div class="col-1 text-center p-0 m-1"><?php echo e($d->sort); ?></div>
                                                                <div class="col-10 p-0">
                                                                    <div class="m-1"><strong><?php echo e($d->target_indicator_desc); ?></strong></div>
                                                                    <div class="m-1"><strong>Ql:</strong> <?php echo e($d->quantity); ?></div>
                                                                    <div class="m-1"><strong>Qn:</strong> <?php echo e($d->quality); ?></div>
                                                                    <div class="m-1"><strong>T:</strong> <?php echo e($d->timeliness); ?></div>
                                                                </div>
                                                            </div></td>
                                                            <td class="p-0">
                                                                <div class="row m-1 p-0">
                                                                        <div class="text-center"> <?php echo e($d->alloted_budget); ?></div>
                                                                </div>
                                                            </td>

                                                            <td class="p-0"><div class="row m-1">
                                                                    <div class="text-center"><?php echo e($d->accountability_center); ?></div>
                                                            </div></td>
                                                            <td  scope="col" class="col-sm p-0" align="center">
                                                                <button class="btn btn-success btn-sm" type="button" data-bs-original-title="Update" data-bs-toggle="modal" data-idUpdate="'.$d->id.'"data-bs-target="#editModal"><span class="icon-save-alt"></span></button>
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
                                                                <div class="text-center m-1"><?php echo e($d->name); ?></div>
                                                            </td>
                                                            <td class="p-0" >
                                                                <div class="row p-0 m-1">
                                                                        <div class="text-center"><?php echo e($d->sub_weight_allocation); ?></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-0"><div class="row">
                                                                <div class="col-1 text-center p-0 m-1"><?php echo e($d->sort); ?></div>
                                                                <div class="col-10 p-0">
                                                                    <div class="m-1"><strong><?php echo e($d->target_indicator_desc); ?></strong></div>
                                                                    <div class="m-1"><strong>Ql:</strong> <?php echo e($d->quantity); ?></div>
                                                                    <div class="m-1"><strong>Qn:</strong> <?php echo e($d->quality); ?></div>
                                                                    <div class="m-1"><strong>T:</strong> <?php echo e($d->timeliness); ?></div>
                                                                </div>
                                                            </div></td>
                                                            <td class="p-0">
                                                                <div class="row m-1 p-0">
                                                                        <div class="text-center"> <?php echo e($d->alloted_budget); ?></div>
                                                                </div>
                                                            </td>

                                                            <td class="p-0"><div class="row m-1">
                                                                    <div class="text-center"><?php echo e($d->accountability_center); ?></div>
                                                            </div></td>
                                                            <td  scope="col" class="col-sm p-0" align="center">
                                                                <button class="btn btn-success btn-sm" type="button" data-bs-original-title="Update" data-bs-toggle="modal" data-bs-target="#createPCModal"><span class="icon-save-alt"></span></button>
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
                                                                <div class="text-center m-1"><?php echo e($d->name); ?></div>
                                                            </td>
                                                            <td class="p-0" >
                                                                <div class="row p-0 m-1">
                                                                        <div class="text-center"><?php echo e($d->sub_weight_allocation); ?></div>
                                                                </div>
                                                            </td>
                                                            <td class="p-0"><div class="row">
                                                                <div class="col-1 text-center p-0 m-1"><?php echo e($d->sort); ?></div>
                                                                <div class="col-10 p-0 ">
                                                                    <div class="m-1 indicator"><strong><?php echo e($d->target_indicator_desc); ?></strong></div>
                                                                    <div class="m-1"><strong>Ql:</strong> <?php echo e($d->quantity); ?></div>
                                                                    <div class="m-1"><strong>Qn:</strong> <?php echo e($d->quality); ?></div>
                                                                    <div class="m-1"><strong>T:</strong> <?php echo e($d->timeliness); ?></div>
                                                                </div>
                                                            </div></td>
                                                            <td class="p-0">
                                                                <div class="row m-1 p-0">
                                                                        <div class="text-center"> <?php echo e($d->alloted_budget); ?></div>
                                                                </div>
                                                            </td>

                                                            <td class="p-0"><div class="row m-1">
                                                                    <div class="text-center"><?php echo e($d->accountability_center); ?></div>
                                                            </div></td>
                                                            <td  scope="col" class="col-sm p-0" align="center">
                                                                <button class="btn btn-success btn-sm" type="button" data-bs-original-title="Update" data-bs-toggle="modal" data-bs-target="#createPCModal"><span class="icon-save-alt"></span></button>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </tbody>
                                                <tbody>
                                                    <tr id="total_weight" class="p-0">
                                                        <!-- <td colspan="1"></td> -->
                                                        <td name="total_weight" class="text-center p-0">Total Weight:</td>
                                                        <td colspan="5"></td>
                                                    </tr>
                                                </tbody>
                                                            </table>
                                                            <button class="btn btn-success btn-sm saveOfficepc pull-right editview" data-bs-original-title="Update" type="button"><span class="icon-save-alt"></span></button>
                                                            
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

            <!-- MOV Modal -->
        <!-- <div class="modal fade" id="uploadMOVModal" tabindex="-1" role="dialog" aria-labelledby="uploadMOVModal" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 30%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="createPCModalLabel" >Upload MOVs</h5> -->
                    <!-- <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button> -->
                <!-- </div>
                    <form action="" id="frm" name="frm" method="POST">
                        <div class="modal-body">
                        <form method="POST" action="/upload" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="file" name="files[]" multiple>
                            <button type="submit">Upload MOVs</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-secondary btn-sm" type="submit" id="add-button">Add</button>
                        </div>   
                    </form>
            </div>
            </div>
        </div> -->
        <!-- Een MOV Modal -->

        <!-- Create Modal -->
        <!-- <div class="modal fade" id="createPCModal" tabindex="-1" role="dialog" aria-labelledby="createPCModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 60%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPCModalLabel">Add Performance Contract</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="" id="frm" name="frm" method="POST">
                        <div class="modal-body"> -->
                            <!-- <div class="mb-2"> -->
                                <!-- <div class="col-form-label">Select KRA Category</div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <select id="category-id" class="form-select">
                                            <optgroup label="Categories">
                                                <?php if(!empty($category)): ?>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                                <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                                <!-- <select id="category-id" class="form-select">
                                    <optgroup label="Categories">
                                        <?php if(!empty($category)): ?>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                        <?php endif; ?>
                                </select> -->
                                
                            <!-- </div> -->
                            <!-- <div class="mb-2">
                                <div class="col-form-label">Select Objectives, Program, Project and Activity</div>
                                <select id="activity-id" class="form-control">
                                    <optgroup label="Activity Library">
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-2">
                                <div class="col-form-label">Select Indicator Code #</div>
                                <select id="indicator-id" class="form-control">
                                    <optgroup label="Code #">
                                        <option selected></option>
                                        <?php if(!empty($indicator)): ?>
                                        <?php $__currentLoopData = $indicator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->sort); ?>"><?php echo e($item->sort); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div id="indicator" class="mb-2">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">                
                                    <thead>
                                        <tr align="center">
                                            
                                            <th rowspan="2" class="col-sm-4 col-form-label">Sub Weight Allocation</th>
                                            <th rowspan="2" class="col-sm-4 col-form-label">Target Indicator Description</th>
                                            <th rowspan="2" class="col-sm-4 col-form-label">Quantity</th>
                                            <th rowspan="2" class="col-sm-4 col-form-label">Quality</th>
                                            <th rowspan="2" class="col-sm-4 col-form-label">Timeliness</th>
                                            <th rowspan="2" scope="col" class="col-sm-1 col-form-label">ALLOTTED BUDGET (in Php)</th>
                                            <th rowspan="2" scope="col" class="col-sm-3 col-form-label">ACCOUNTABILITY CENTER (Division, Units, Individuals)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="strategic1"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-secondary btn-sm" type="submit" id="add-button">Add</button>
                        </div>   
                    </form>
            </div>
            </div>
        </div> -->
        <!-- End of Create Modal -->
        
        <!-- Update Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="updatePCModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePCModalLabel">Update Performance Contract</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="" id="editform" name="editform" method="POST">
                        <?php echo e(csrf_field()); ?>

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
                                            <select id="category-id" class="form-select">
                                            <optgroup label="Categories">
                                                <?php if(!empty($category)): ?>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                                <?php endif; ?>
                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Select Objectives, Program, Project and Activity</label>
                                            <select id="category-id" class="form-select">
                                            <optgroup label="Categories">
                                                <?php if(!empty($category)): ?>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                                <?php endif; ?>
                                        </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <div class="mb-2">
                                                <label>Select Indicator Code #</label>
                                                <select id="category-id" class="form-select">
                                            <optgroup label="Categories">
                                                <?php if(!empty($category)): ?>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                                <?php endif; ?>
                                        </select>
                                                </div>
                                            </div>
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Sub Weight Allocation</label>
                                            <input class="form-control" name="subWA" id="subWA" type="text">
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
                                        <textarea class="form-control" name="qnty" id="qnty" type="text" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                        <label>Quality</label>
                                        <textarea class="form-control" name="qlty" id="qlty" type="text" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                        <label>Timeliness</label>
                                        <textarea class="form-control" name="time" id="time" type="text" rows="3"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Alloted Budget (in Php)</label>
                                                <input class="form-control" name="allBud" id="allBud" type="text" placeholder="Enter project Rate">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-2">
                                            <label>Accountability Center</label>
                                                <select class="form-select">
                                                    <option>Small</option>
                                                    <option>Medium</option>
                                                    <option>Big</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-secondary btn-sm editButton" type="submit" id="editButton">Update</button>
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
    get_activity(1);

    $('#category-id').change(function() {
        let cat_id = $(this).val();
        console.log(cat_id);
        get_activity(cat_id);
    });

    $('#indicator-id').change(function() {
        let indi_id = $(this).val();
        console.log(indi_id);
        get_indicator(indi_id);
    });

    function get_activity(cat_id) {
        let act_opt_id = $('#activity-id optgroup');
        $.get( BASE_URL + "ajax/get_activity/" + cat_id, function(res) {
            act_opt_id.empty();
            res.forEach(e => {
                act_opt_id.append('<option value="'+e.id+'">'+e.name+'</option>');
            });
        });
    }
    
    function get_indicator(indi_id) {
        let data = $('#strategic1')
        data.empty();
        $.get(BASE_URL + "ajax/get_indicator/" + indi_id, function(res){
            res.forEach(e => {
                data.append('<tr>' +
                                '<input type="hidden" name="indicator[]" value="'+e.id+'" />'+
                                '<td><input type="hidden" name="weight[]" value="'+e.sub_weight_allocation+'"/>'+e.sub_weight_allocation+'</td>'+
                                '<td><input type="hidden" name="target[]" value="'+e.target_indicator_desc+'"/>'+e.target_indicator_desc+'</td>'+
                                '<td><input type="hidden" name="qual[]" value="'+e.quantity+'"/>'+e.quantity+'</td>'+
                                '<td><input type="hidden" name="quan[]" value="'+e.quality+'"/>'+e.quality+'</td>'+
                                '<td><input type="hidden" name="time[]" value="'+e.timeliness+'"/>'+e.timeliness+'</td>'+
                                '<td><input type="text" class="form-control" name="budget[]" /></td>'+
                                '<td><input type="hidden" name="office[]" value="'+e.name+'"/>'+e.name+'</td>'+
                            '</tr>')
            })
        });
    }

    $("#frm").submit(function(event){
        event.preventDefault();

        if($("#indicator-id").val() == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please select indicator code!',
            })
        } else {
            let data = {
                'category_id': $('#category-id').val(),
                'activity_id': $('#activity-id').val(),
                'category_name': $('#category-id option:selected').attr('data-name'),
                'activity_name': $('#activity-id option:selected').attr('data-name'),
                'indicator_code': $('#indicator-id').val(),
                'indicator': $("input[name='indicator[]']").map(function(){return $(this).val();}).get(),
                'weight': $("input[name='weight[]']").map(function(){return $(this).val();}).get(),
                'target': $("input[name='target[]']").map(function(){return $(this).val();}).get(),
                'qual': $("input[name='qual[]']").map(function(){return $(this).val();}).get(),
                'quan': $("input[name='quan[]']").map(function(){return $(this).val();}).get(),
                'time': $("input[name='time[]']").map(function(){return $(this).val();}).get(),
                'budget_alloted': $("input[name='budget[]']").map(function(){return $(this).val();}).get(),
                'office': $("input[name='office[]']").map(function(){return $(this).val();}).get(),
            };
            data_arr.push(data);
            console.log(data_arr);
            let strategic_elem = $('#strategic2');
            let core_elem = $('#core2');
            let support_elem = $('#support2');

            strategic_elem.empty();
            core_elem.empty();
            support_elem.empty();

            data_arr.forEach(e => {
                for (let i = 0; i < e.indicator.length; i++) {
                    let activityNameElement = '';
                    if (i == 0) {
                        activityNameElement =  '<td class="p-0" rowspan='+e.indicator.length+'>' +
                        '<div class="text-center m-1">'+e.activity_name+'</div>' +
                        '</td>';    
                    }

                    let strategicElement = '<tr>' + activityNameElement+
                    '<td class="p-0" >' +
                    '<div class="row p-0 m-1">' +
                    '<div class="text-center">'+e.weight[i]+'</div>' +
                    '</div>' +
                    '</td>' +
                    '<td class="p-0"><div class="row">' +
                    '<div class="col-1 text-center p-0 m-1">'+e.indicator_code+'</div>' +
                    '<div class="col-10 p-0 m-1">' +
                    '<div ><strong>'+e.target[i]+'</strong></div>' +
                    '<div class="m-1"><strong>Ql:</strong>'+e.quan[i]+'</div>' +
                    '<div class="m-1"><strong>Qn:</strong>'+e.qual[i]+'</div>' +
                    '<div class="m-1"><strong>T:</strong>'+e.time[i]+'</div>' +
                    '</div>' +
                    '</div></td>' +
                    '<td class="p-0">' +
                    '<div class="row m-1 p-0">' +
                    '<div class="text-center"> '+e.budget_alloted[i]+'</div>' +
                    '</div>' +
                    '</td>' + '<td class="p-0"><div class="row m-1">' +
                    '<div class="text-center">'+e.office[i]+'</div>' +
                    '</div></td>' +
                    '<td></td>' +
                    '</tr>';

                    switch (e.category_id) {
                        case '1':
                            strategic_elem.append(strategicElement);
                            break;
                        case '2':
                            core_elem.append(strategicElement);
                            break;
                        case '3':
                            support_elem.append(strategicElement);
                            break;
                        default:
                            console.log('error');
                            break;
                    }
                    
                }
                
            });
            $('#createPCModal').modal('toggle');
           
            
        }
    });
</script>
<script>

    $("#editform").submit(function(event){
        event.preventDefault();
        console.log("Hello");
        // var _this = $(this).parents('tr');
        $subWeight = $('#subWA').val(),
        $indi = $('#targetIndicator').val(),
        $quantity = $('#qnty').val(),
        $quality = $('#qlty').val(),
        $timeliness = $('#time').val(),
        $allotedBudget = $('#allBud').val(),
       
        console.log($subWeight);
        console.log($indi);
        console.log($quantity);
        console.log($quality);
        console.log($timeliness);
        console.log($allotedBudget);

    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cubastarterkit\resources\views/pages/opcpage/showopc.blade.php ENDPATH**/ ?>