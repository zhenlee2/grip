
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
                     <!-- <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="info"></i>Role</a></li> -->
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
                                        
                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                     <div class="row">
                     <div class="col-xl-4 hidden" >
                     </div>
                     <div class="col-xl-4">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h4 class="card-title mb-0">Profile</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div> -->
                            <div class="card-body">
                                <form>
                                    <!-- <div class="row mb-2">
                                        <div class="profile-title">
                                            <div class="media">
                                                <img class="img-70 rounded-circle" alt="" src="<?php echo e(asset('assets/images/user/7.jpg')); ?>">
                                                <div class="media-body">
                                                    <h3 class="mb-1"><?php echo e($user->fname); ?></h3>
                                                    <?php if($user->role_id == 1): ?>
                                                        <p>ADMIN</p>
                                                    <?php else: ?>
                                                        <p>USER</p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="form-label">Bio</h6>
                                        <textarea class="form-control" rows="3">On the other hand, we denounce with righteous indignation</textarea>
                                    </div> -->
                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <select class="form-select rounded-0" data-control="select2" data-placeholder="Role" id="role_id">
                                            <option></option>
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input class="form-control" placeholder="First Name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input class="form-control" placeholder="Last Name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input class="form-control" placeholder="Username">
                                    </div>
                                    <!-- <div class="mb-3">
                                        <h6 class="form-label">Change Password</h6>
                                        <label class="form-label">Current Password</label>
                                        <input class="form-control" type="password" value="password">
                                    </div> -->
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control" type="password" value="password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input class="form-control" type="password" value="password">
                                    </div>
                                    <div class="form-footer">
                                        <button class="btn btn-primary btn-block">Save</button>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\grip.dswd.gov.ph\resources\views/pages/userlist.blade.php ENDPATH**/ ?>