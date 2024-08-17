
<?php $__env->startSection('title', 'Project List'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>USERS</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Page</li>
<li class="breadcrumb-item active">Users</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row project-cards">
      <div class="col-md-12 project-list">
         <div class="card">
            <div class="row">
               <div class="col-md-6">
                  <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                     <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="true"><i data-feather="user"></i>User List</a></li>
                     <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false"><i data-feather="user-plus"></i>Add User</a></li>
                     <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="info"></i>Role</a></li>
                  </ul>
               </div>
               
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
               <div class="tab-content" id="top-tabContent">
                  <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                     <div class="row">
                        <div class=" col-lg-12">
                            <div class="dt-ext table-responsive">
                                <table class="display table-xs" id="export-button">
                                    <thead>
                                        <tr>
                                            <th>Role</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Username</th>
                                            <!-- <th>Password</th> -->
                                            <th>Created Date</th>
                                            <!-- <th>Start date</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                             <?php if($d->role_id == 1): ?>
                                                 <td>Admin</td>
                                                 <?php else: ?>
                                                 <td>User</td>
                                             <?php endif; ?>
                                             <td><?php echo e($d->fname); ?></td>
                                             <td><?php echo e($d->lname); ?></td>
                                             <td><?php echo e($d->username); ?></td>
                                             <!-- <td><?php echo e($d->password); ?></td> -->
                                             <td><?php echo e($d->created_at); ?></td>
                                             <td>
                                                <!-- <th rowspan="2" class="col-sm-1 text-center p-0"><button class="btn btn-primary btn-sm" type="button" data-bs-original-title="Add Performance Contract" data-bs-toggle="modal" data-bs-target="#createPCModal"><span class="fa fa-plus-square-o"></span></button></th> -->
                                             <a class="btn btn-light btn-sm example-popover form-control"  data-bs-original-title="View" data-bs-toggle="modal" data-bs-target="#createPCModal"> <span class="fa fa-ellipsis-v" ></span></a>
                                             </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!-- <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>
                                            <a class="btn btn-light btn-sm example-popover form-control" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View"> <span class="fa fa-ellipsis-v" ></span></a>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                     <div class="row">
                        <div class="card-body">
                            <form class="needs-validation" novalidate="">
                                <div class="row">
                                  <h5><label>Personal Information</label></h5>
                                    <div class="col-md-3 mb-4">
                                        <!-- <label for="validationCustom01">First name</label> -->
                                        <input class="form-control" id="validationCustom01" type="text" placeholder="First name" required="">
                                        <div class="invalid-feedback">Please provide a valid First name.</div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <!-- <label for="validationCustom02">Middle name</label> -->
                                        <input class="form-control" id="validationCustom02" type="text" placeholder="Middle name" required="">
                                        <div class="invalid-feedback">Please provide a valid Middle name.</div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <!-- <label for="validationCustom02">Last name</label> -->
                                        <input class="form-control" id="validationCustom02" type="text" placeholder="Last name" required="">
                                        <div class="invalid-feedback">Please provide a valid Last name.</div>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <!-- <label for="validationCustom04">Division</label> -->
                                        <input class="form-control" id="validationCustom04" type="text" placeholder="Name Ext. (JR., SR)" required="">
                                        <div class="invalid-feedback">Please provide a valid Division.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 mb-4">
                                        <!-- <label for="validationCustom04">Gender</label> -->
                                        <input class="form-control" id="validationCustom04" type="text" placeholder="Sex" required="">
                                        <div class="invalid-feedback">Please provide a valid Sex.</div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <!-- <label for="validationCustom04">Gender</label> -->
                                        <input class="datepicker-here form-control" data-language="en" id="validationCustom04" placeholder="Date of Birth" required="">
                                        <div class="invalid-feedback">Please provide a valid Date of Birth.</div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <!-- <label for="validationCustom03">City</label> -->
                                        <input class="form-control" id="validationCustom03" type="text" placeholder="Purok/lot No." required="">
                                        <div class="invalid-feedback">Please provide a valid Purok/lot No.</div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <!-- <label for="validationCustom03">City</label> -->
                                        <input class="form-control" id="validationCustom03" type="text" placeholder="Street" required="">
                                        <div class="invalid-feedback">Please provide a valid Subdivision.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                            <!-- <label for="validationCustom03">City</label> -->
                                            <input class="form-control" id="validationCustom03" type="text" placeholder="Subdivision" required="">
                                            <div class="invalid-feedback">Please provide a valid Subdivision.</div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <!-- <label for="validationCustom03">City</label> -->
                                            <!-- <input class="form-control" id="validationCustom03" type="text" placeholder="Barangay" required=""> -->
                                            <input class="form-control" id="validationCustom03" type="text" placeholder="City/Municipality" required="">
                                            <div class="invalid-feedback">Please provide a valid Barangay.</div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <!-- <label for="validationCustom03">City</label> -->
                                            <input class="form-control" id="validationCustom03" type="text" placeholder="City/Municipality" required="">
                                            <div class="invalid-feedback">Please provide a valid City/Municipality.</div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <!-- <label for="validationCustom03">City</label> -->
                                            <input class="form-control" id="validationCustom03" type="text" placeholder="Province" required="">
                                            <div class="invalid-feedback">Please provide a valid Province.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5><label>Employee Information</label></h5>
                                            <div class="col-md-3 mb-3">
                                                <!-- <label for="validationCustom04">Position</label> -->
                                                <input class="form-control" id="validationCustom04" type="text" placeholder="ID Number" required="">
                                                <div class="invalid-feedback">Please provide a valid ID Number.</div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <!-- <label for="validationCustom04">Position</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Position" required="">
                                            <div class="invalid-feedback">Please provide a valid Position.</div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <!-- <label for="validationCustom04">Division</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Employment Status" required="">
                                            <div class="invalid-feedback">Please provide a Employment Status.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <!-- <label for="validationCustom04">Section</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Section" required="">
                                            <div class="invalid-feedback">Please provide a valid Section.</div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <!-- <label for="validationCustom04">Division</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Division" required="">
                                            <div class="invalid-feedback">Please provide a valid Division.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <!-- <label for="validationCustom04">Position</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Username" required="">
                                            <div class="invalid-feedback">Please provide a valid Username.</div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <!-- <label for="validationCustom04">Division</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Password" required="">
                                            <div class="invalid-feedback">Please provide a Password.</div>
                                        </div>
                                    </div>
                                
                                <div class="mb-3">
                                    <div class="form-check">
                                        <div class="checkbox p-0">
                                            <input class="form-check-input" id="invalidCheck" type="checkbox" required="">
                                            <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
                                        </div>
                                        <div class="invalid-feedback">You must agree before submitting.</div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                     <div class="row">
                        <h2>Role</h2>
                                <form method="POST" action="/register">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                        <label for="name">Search User ID:</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                    <label for="email">First name:</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    <label for="email">Middle name:</label>
                                        <input type="email" class="form-control" id="email" name="email">    
                                    <label for="email">Last name:</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="password">Gender:</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                
                                    <div class="form-group">
                                        <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    
                                </form>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="createPCModal" tabindex="-1" role="dialog" aria-labelledby="createPCModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 60%">
            <div class="modal-content">
                <div class="modal-header" >
                    <h5 class="modal-title" id="createPCModalLabel">Personal Information</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="" id="frm" name="frm" method="POST">
                        <div class="modal-body">
                            <table class="table table-bordered table-xs" style="font-size:13px; font-weight: bold; text-align: center; border-color:black;">
                                <thead>
                                <div class="row ">
                                    <div class="col-md-3 mb-3">
                                            <!-- <label for="validationCustom04">Position</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="ID Number" required="" readonly>
                                            <div class="invalid-feedback">Please provide a valid Position.</div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                    <div class="col-md-3 mb-3">
                                            <!-- <label for="validationCustom04">Position</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="First Name" required="">
                                            <div class="invalid-feedback">Please provide a valid First Name.</div>
                                        </div>
                                        
                                        <div class="col-md-3 mb-3">
                                            <!-- <label for="validationCustom04">Division</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Middle Name" required="">
                                            <div class="invalid-feedback">Please provide a valid Middle Name.</div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <!-- <label for="validationCustom04">Section</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Last Name" required="">
                                            <div class="invalid-feedback">Please provide a valid Last Name.</div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <!-- <label for="validationCustom04">Division</label> -->
                                            <input class="form-control" id="validationCustom04" type="text" placeholder="Name Ext. (JR., SR)" required="">
                                            <!-- <div class="invalid-feedback">Please provide a valid Division.</div> -->
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-4 mb-4">
                                                <!-- <label for="validationCustom04">Position</label> -->
                                                <input class="datepicker-here form-control" data-language="en" id="validationCustom04" placeholder="Date of Birth" required="">
                                                <div class="invalid-feedback">Please provide a Date of Birth.</div>
                                            </div>
                                            
                                            <div class="col-md-4 mb-4">
                                                <!-- <label for="validationCustom04">Division</label> -->
                                                <input class="form-control" id="validationCustom04" type="text" placeholder="Sex" required="">
                                                <div class="invalid-feedback">Please provide a Sex.</div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <!-- <label for="validationCustom04">Division</label> -->
                                                <input class="form-control" id="validationCustom04" type="text" placeholder="Purok/Lot No." required="">
                                                <div class="invalid-feedback">Please provide a Purok/Lot No.</div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <!-- <label for="validationCustom04">Division</label> -->
                                                <input class="form-control" id="validationCustom04" type="text" placeholder="Barangay" required="">
                                                <div class="invalid-feedback">Please provide a Purok/Lot No.</div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <!-- <label for="validationCustom04">Division</label> -->
                                                <input class="form-control" id="validationCustom04" type="text" placeholder="Municipality/City" required="">
                                                <div class="invalid-feedback">Please provide a Purok/Lot No.</div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <!-- <label for="validationCustom04">Division</label> -->
                                                <input class="form-control" id="validationCustom04" type="text" placeholder="Province" required="">
                                                <div class="invalid-feedback">Please provide a Purok/Lot No.</div>
                                            </div>
                                        </div>
                                    </div>
                                </thead>
                                </table>
                            </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-secondary btn-sm" type="submit" id="add-button">Add</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cubastarterkit\resources\views/pages/userlist.blade.php ENDPATH**/ ?>