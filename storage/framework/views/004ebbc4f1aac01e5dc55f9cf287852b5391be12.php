
<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('script'); ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-5"><img class="bg-img-cover bg-center" src="<?php echo e(asset('assets/images/login/pdps1.jpg')); ?>" alt="looginpage"></div>
      <div class="col-xl-7 p-0">
         <div class="login-card">
            <div>
               <div ><a class="logo text-start" href="<?php echo e(route('login')); ?>"><h3>Login</h3></a></div>
               <div class="login-main">
                  <form class="theme-form" method="POST" action="<?php echo e(route('auth.login')); ?>">
                     <?php echo csrf_field(); ?>
                     <h4>Sign in to account</h4>
                     <p>Enter your Username & password to login</p>
                     <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input class="form-control" type="username" name= "username" required="" placeholder="Username">
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                     </div>
                     <div class="g-recaptcha" data-sitekey="<?php echo e(config('services.nocaptcha.sitekey')); ?>"></div>
                        <?php if($errors->has('g-recaptcha-response')): ?>
                              <span class="text-danger"><?php echo e($errors->first('g-recaptcha-response')); ?></span>
                        <?php endif; ?>
                        <div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\grip.dswd.gov.ph\resources\views/pages/login.blade.php ENDPATH**/ ?>