
<?php $__env->startSection('title', 'GRIP'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>GRIP</h3>
   <div class="card-toolbar">
      <div class="input-group flex-nowrap">
            <span class="input-group-text"><i class="bi bi-calendar fs-4"></i></span>
               <div class="overflow-hidden flex-grow-1">
                     <select class="form-select rounded-0" data-control="select2" data-placeholder="Filter Year" id="filter_year">
                        <option></option>
                        <option value="2021">Year 2021</option>
                        <option value="2022">Year 2022</option>
                        <option value="2023">Year 2023</option>
                     </select>
               </div>
            <span class="input-group-text bg-dark text-white" id="btn-filter-year" style="cursor: pointer;">Filter Year</span>
            <button class="btn btn-sm btn-primary mx-4" id="save_changes_policy">Save Changes</button>
      </div>
   </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">GRIP</li>
                  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card shadow-sm">
               <div class="card-header">
                  <h3 class="card-title">GENDER AND DEVELOPMENT PLAN AND BUDGET</h3>
                  
                  <div class="card-toolbar">
                     <div class="input-group flex-nowrap">
                           <button class="btn btn-sm btn-primary mx-4" id="save_changes_policy">Save Changes</button>
                     </div>
                  </div>
            </div>
            <div class="card-body">
               <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\grip.dswd.gov.ph\resources\views/pages/grip/grip.blade.php ENDPATH**/ ?>