<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			
			<a href="<?php echo e(route('dashboard')); ?>" ><h3 class="icofont icofont-unity-hand"><stroke> GRIP</stroke></h3></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/DSWD-logo.png')); ?>" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<!--  -->
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					
					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>"><i data-feather="home"></i><span class="lan-3"><?php echo e(trans('lang.Dashboards')); ?></span>
							<!--  -->
						</a>
						<!--  -->
					</li>

					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='profile' ? 'active' : ''); ?>" href="<?php echo e(route('profile')); ?>"><i data-feather="file-text"> </i><span>Profile</span></a></li>
					<!-- <li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'active' : ''); ?>" href="#"><i data-feather="edit"></i><span class="lan-3"><?php echo e(trans('Performance Contract')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;'); ?>">
							<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='index' ? 'active' : ''); ?>" href="<?php echo e(route('createpc')); ?>">Office Performance <br> Contract</a></li>
                     		<li><a class="lan-5 <?php echo e(Route::currentRouteName()=='dashboard-02' ? 'active' : ''); ?>" href="<?php echo e(route('office')); ?>">Office Performance <br> Contract Review</a></li>
						</ul>
					</li> -->
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><?php echo e(trans('Organizational Assessment')); ?>  </h6>
						</div>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gmef' ? 'active' : ''); ?>" href="<?php echo e(route('gmef')); ?>"><i data-feather="file-text"> </i><span>GMEF Tool</span></a></li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gmef' ? 'active' : ''); ?>" href="#"><i data-feather="file-text"> </i><span>GMEF Action Plan</span></a></li> -->
					
					
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><?php echo e(trans('Applications')); ?>  </h6>
                     		<!--  -->
						</div>
					</li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gmef' ? 'active' : ''); ?>" href="<?php echo e(route('gmef')); ?>"><i data-feather="file-text"> </i><span>GMEF</span></a></li> -->
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gadgpb' ? 'active' : ''); ?>" href="<?php echo e(route('gadgpb')); ?>"><i data-feather="edit"> </i><span>GAD GPB</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gadar' ? 'active' : ''); ?>" href="<?php echo e(route('gadar.year.quarter', ['year' => date('Y'), 'quarter' => '2'])); ?>"><i data-feather="check-square"> </i><span>GAD AR</span></a></li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gmef' ? 'active' : ''); ?>" href=""><i data-feather="file-text"> </i><span>GMEF Action Plan</span></a></li> -->
					
					<!-- <li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><?php echo e(trans('Gender and Development')); ?>  </h6>
						</div>
					</li>
					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'active' : ''); ?>" href="#"><i data-feather="check-square"></i><span class="lan-3">Gender and Development</span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;'); ?>">
                     		<li><a class="lan-5 <?php echo e(Route::currentRouteName()=='dashboard-02' ? 'active' : ''); ?>" href="<?php echo e(route('divisionreview')); ?>">Division</a></li>
                     		<li><a class="lan-5 <?php echo e(Route::currentRouteName()=='dashboard-02' ? 'active' : ''); ?>" href="<?php echo e(route('divisionreview')); ?>"> OPC</a></li>
						</ul>
					</li> -->

					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><?php echo e(trans('Others')); ?>  </h6>
                     		<!--  -->
						</div>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gadar' ? 'active' : ''); ?>" href="<?php echo e(route('users')); ?>"><i data-feather="users"> </i><span>GAD-TWG Member</span></a></li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gadar' ? 'active' : ''); ?>" href="#}"><i data-feather="check-square"> </i><span>GAD Materials</span></a></li> -->
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/forms' ? 'active' : ''); ?>" href="#">
							<i data-feather="layers"></i><span><?php echo e(trans('Library')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/forms' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/forms' ? 'block;' : 'none;'); ?>">
							<!-- <li>
								<a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['form-validation', 'base-input', 'radio-checkbox-control', 'input-group', 'megaoptions']) ? 'active' : ''); ?>" href="#">Activity Library
									<div class="according-menu"><i class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['form-validation', 'base-input', 'radio-checkbox-control', 'input-group', 'megaoptions']) ? 'down' : 'right'); ?>"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: <?php echo e(in_array(Route::currentRouteName(), ['activity']) ? 'block' : 'none;'); ?>;">
									<li><a href="<?php echo e(route('activity')); ?>" class="<?php echo e(Route::currentRouteName()=='activity' ? 'active' : ''); ?>">View Activities</a></li>
									
								</ul>
							</li> -->
							
							<!-- <li>
								<a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['indicator']) ? 'active' : ''); ?>" href="#">Indicator Library
									<div class="according-menu"><i class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['indicator']) ? 'down' : 'right'); ?>"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: <?php echo e(in_array(Route::currentRouteName(), ['default-form', 'form-wizard', 'form-wizard-two', 'form-wizard-three']) ? 'block' : 'none;'); ?>;">
									<li><a href="<?php echo e(route('indicator')); ?>" class="<?php echo e(Route::currentRouteName()=='indicator' ? 'active' : ''); ?>">View Indicators</a></li>
									
	                        	</ul>
							</li> -->
							<li>
								<a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['offices']) ? 'active' : ''); ?>" href="#">Section Library
									<div class="according-menu"><i class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'down' : 'right'); ?>"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: <?php echo e(in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'block' : 'none;'); ?>;">
									<li><a href="<?php echo e(route('section')); ?>" class="<?php echo e(Route::currentRouteName()=='offices' ? 'active' : ''); ?>">View Section</a></li>
								</ul>
							</li>
							<li>
								<a class="submenu-title <?php echo e(in_array(Route::currentRouteName(), ['offices']) ? 'active' : ''); ?>" href="#">Division Library
									<div class="according-menu"><i class="fa fa-angle-<?php echo e(in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'down' : 'right'); ?>"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: <?php echo e(in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'block' : 'none;'); ?>;">
									<li><a href="<?php echo e(route('division')); ?>" class="<?php echo e(Route::currentRouteName()=='offices' ? 'active' : ''); ?>">View Division</a></li>
								</ul>
							</li>

							
									<!-- 
								</ul>
							</li>
						</ul>
					</li>

					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'active' : ''); ?>" href="#"><i data-feather="users"></i><span class="lan-3">Users</span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;'); ?>">
							<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='index' ? 'active' : ''); ?>" href="<?php echo e(route('users')); ?>">User List</a></li>
						</ul>
					</li>
					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'active' : ''); ?>" href="#"><i data-feather="users"></i><span class="lan-3">Admin</span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;'); ?>">
							<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='index' ? 'active' : ''); ?>" href="<?php echo e(route('users')); ?>">Import CSV File</a></li>
						</ul>
					</li>
					  -->
					<!-- 
                	           -->
					<!--  -->
					<!--  -->
				</ul>
				<?php if(auth()->user()->role_id == 1): ?>
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav <?php echo e(Route::currentRouteName()=='gadar' ? 'active' : ''); ?>" href="<?php echo e(route('users')); ?>"><i data-feather="users"> </i><span>Users</span></a></li>
				<?php endif; ?>
			</div>
			<!--  -->
		</nav>
	</div>
</div><?php /**PATH C:\laragon\www\grip.dswd.gov.ph\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>