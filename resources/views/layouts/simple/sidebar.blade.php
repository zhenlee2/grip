<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			
			<a href="{{route('dashboard')}}" ><h3 class="icofont icofont-unity-hand"><stroke> GRIP</stroke></h3></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/DSWD-logo.png')}}" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<!-- {{-- <a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a> --}} -->
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					
					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="{{route('dashboard')}}"><i data-feather="home"></i><span class="lan-3">{{ trans('lang.Dashboards') }}</span>
							<!-- {{-- <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div> --}} -->
						</a>
						<!-- {{-- <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="{{route('index')}}">{{ trans('lang.Default') }}</a></li>
                     		<li><a class="lan-5 {{ Route::currentRouteName()=='dashboard-02' ? 'active' : '' }}" href="{{route('dashboard-02')}}">{{ trans('lang.Ecommerce') }}</a></li>
						</ul> --}} -->
					</li>

					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='profile' ? 'active' : '' }}" href="{{route('profile')}}"><i data-feather="file-text"> </i><span>Profile</span></a></li>
					<!-- <li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="edit"></i><span class="lan-3">{{ trans('Performance Contract') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="{{route('createpc')}}">Office Performance <br> Contract</a></li>
                     		<li><a class="lan-5 {{ Route::currentRouteName()=='dashboard-02' ? 'active' : '' }}" href="{{route('office')}}">Office Performance <br> Contract Review</a></li>
						</ul>
					</li> -->
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">{{ trans('Organizational Assessment') }}  </h6>
						</div>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gmef' ? 'active' : '' }}" href="{{route('gmef')}}"><i data-feather="file-text"> </i><span>GMEF Tool</span></a></li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gmef' ? 'active' : '' }}" href="#"><i data-feather="file-text"> </i><span>GMEF Action Plan</span></a></li> -->
					
					
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">{{ trans('Applications') }}  </h6>
                     		<!-- {{-- <p class="lan-2">{{ trans('lang.Dashboards,widgets & layout.') }}</p> --}} -->
						</div>
					</li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gmef' ? 'active' : '' }}" href="{{route('gmef')}}"><i data-feather="file-text"> </i><span>GMEF</span></a></li> -->
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gadgpb' ? 'active' : '' }}" href="{{route('gadgpb.year', ['year' => date('Y')])}}"><i data-feather="edit"> </i><span>GAD GPB</span></a></li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gadar' ? 'active' : '' }}" href="{{route('gadar.year.quarter', ['year' => date('Y'), 'quarter' => '2'])}}"><i data-feather="check-square"> </i><span>GAD AR</span></a></li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gmef' ? 'active' : '' }}" href=""><i data-feather="file-text"> </i><span>GMEF Action Plan</span></a></li> -->
					
					<!-- <li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">{{ trans('Gender and Development') }}  </h6>
						</div>
					</li>
					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="check-square"></i><span class="lan-3">Gender and Development</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
                     		<li><a class="lan-5 {{ Route::currentRouteName()=='dashboard-02' ? 'active' : '' }}" href="{{route('divisionreview')}}">Division</a></li>
                     		<li><a class="lan-5 {{ Route::currentRouteName()=='dashboard-02' ? 'active' : '' }}" href="{{route('divisionreview')}}"> OPC</a></li>
						</ul>
					</li> -->

					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">{{ trans('Others') }}  </h6>
                     		<!-- {{-- <p class="lan-2">{{ trans('lang.Dashboards,widgets & layout.') }}</p> --}} -->
						</div>
					</li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gadar' ? 'active' : '' }}" href="{{route('users')}}"><i data-feather="users"> </i><span>GAD-TWG Member</span></a></li>
					<!-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gadar' ? 'active' : '' }}" href="#}"><i data-feather="check-square"> </i><span>GAD Materials</span></a></li> -->
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/forms' ? 'active' : '' }}" href="#">
							<i data-feather="layers"></i><span>{{ trans('Library') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/forms' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/forms' ? 'block;' : 'none;' }}">
							<!-- <li>
								<a class="submenu-title {{ in_array(Route::currentRouteName(), ['form-validation', 'base-input', 'radio-checkbox-control', 'input-group', 'megaoptions']) ? 'active' : '' }}" href="#">Activity Library
									<div class="according-menu"><i class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['form-validation', 'base-input', 'radio-checkbox-control', 'input-group', 'megaoptions']) ? 'down' : 'right' }}"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: {{ in_array(Route::currentRouteName(), ['activity']) ? 'block' : 'none;' }};">
									<li><a href="{{route('activity')}}" class="{{ Route::currentRouteName()=='activity' ? 'active' : '' }}">View Activities</a></li>
									{{-- <li><a href="{{route('form-validation')}}" class="{{ Route::currentRouteName()=='form-validation' ? 'active' : '' }}">Form Validation</a></li>
		                            <li><a href="{{route('base-input')}}" class="{{ Route::currentRouteName()=='base-input' ? 'active' : '' }}">Base Inputs</a></li>
		                            <li><a href="{{route('radio-checkbox-control')}}" class="{{ Route::currentRouteName()=='radio-checkbox-control' ? 'active' : '' }}">Checkbox & Radio</a></li>
		                            <li><a href="{{route('input-group')}}" class="{{ Route::currentRouteName()=='input-group' ? 'active' : '' }}">Input Groups</a></li>
		                            <li><a href="{{route('megaoptions')}}" class="{{ Route::currentRouteName()=='megaoptions' ? 'active' : '' }}">Mega Options</a></li> --}}
								</ul>
							</li> -->
							
							<!-- <li>
								<a class="submenu-title {{ in_array(Route::currentRouteName(), ['indicator']) ? 'active' : '' }}" href="#">Indicator Library
									<div class="according-menu"><i class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['indicator']) ? 'down' : 'right' }}"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: {{ in_array(Route::currentRouteName(), ['default-form', 'form-wizard', 'form-wizard-two', 'form-wizard-three']) ? 'block' : 'none;' }};">
									<li><a href="{{route('indicator')}}" class="{{ Route::currentRouteName()=='indicator' ? 'active' : '' }}">View Indicators</a></li>
									{{-- <li><a href="{{route('default-form')}}" class="{{ Route::currentRouteName()=='default-form' ? 'active' : '' }}">Default Forms</a></li>
	                              	<li><a href="{{route('form-wizard')}}" class="{{ Route::currentRouteName()=='form-wizard' ? 'active' : '' }}">Form Wizard 1</a></li>
	                              	<li><a href="{{route('form-wizard-two')}}" class="{{ Route::currentRouteName()=='form-wizard-two' ? 'active' : '' }}">Form Wizard 2</a></li>
	                              	<li><a href="{{route('form-wizard-three')}}" class="{{ Route::currentRouteName()=='form-wizard-three' ? 'active' : '' }}">Form Wizard 3</a></li> --}}
	                        	</ul>
							</li> -->
							<li>
								<a class="submenu-title {{ in_array(Route::currentRouteName(), ['offices']) ? 'active' : '' }}" href="#">Section Library
									<div class="according-menu"><i class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'down' : 'right' }}"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: {{ in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'block' : 'none;' }};">
									<li><a href="{{route('section')}}" class="{{ Route::currentRouteName()=='offices' ? 'active' : '' }}">View Section</a></li>
								</ul>
							</li>
							<li>
								<a class="submenu-title {{ in_array(Route::currentRouteName(), ['offices']) ? 'active' : '' }}" href="#">Division Library
									<div class="according-menu"><i class="fa fa-angle-{{ in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'down' : 'right' }}"></i></div>
								</a>
								<ul class="nav-sub-childmenu submenu-content" style="display: {{ in_array(Route::currentRouteName(), ['datepicker', 'time-picker', 'datetimepicker','daterangepicker' ,'touchspin', 'select2', 'switch', 'typeahead', 'clipboard']) ? 'block' : 'none;' }};">
									<li><a href="{{route('division')}}" class="{{ Route::currentRouteName()=='offices' ? 'active' : '' }}">View Division</a></li>
								</ul>
							</li>

							
									<!-- {{-- <li><a href="{{route('datepicker')}}" class="{{ Route::currentRouteName()=='datepicker' ? 'active' : '' }}">Datepicker</a></li>
		                              	<li><a href="{{route('time-picker')}}" class="{{ Route::currentRouteName()=='time-picker' ? 'active' : '' }}">Timepicker</a></li>
		                              	<li><a href="{{route('datetimepicker')}}" class="{{ Route::currentRouteName()=='datetimepicker' ? 'active' : '' }}">Datetimepicker</a></li>
		                              	<li><a href="{{route('daterangepicker')}}" class="{{ Route::currentRouteName()=='daterangepicker' ? 'active' : '' }}">Daterangepicker</a></li>
		                              	<li><a href="{{route('touchspin')}}" class="{{ Route::currentRouteName()=='touchspin' ? 'active' : '' }}">Touchspin</a></li>
		                              	<li><a href="{{route('select2')}}" class="{{ Route::currentRouteName()=='select2' ? 'active' : '' }}">Select2</a></li>
		                              	<li><a href="{{route('switch')}}" class="{{ Route::currentRouteName()=='switch' ? 'active' : '' }}">Switch</a></li>
		                              	<li><a href="{{route('typeahead')}}" class="{{ Route::currentRouteName()=='typeahead' ? 'active' : '' }}">Typeahead</a></li>
		                              	<li><a href="{{route('clipboard')}}" class="{{ Route::currentRouteName()=='clipboard' ? 'active' : '' }}">Clipboard</a></li> --}}
								</ul>
							</li>
						</ul>
					</li>

					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="users"></i><span class="lan-3">Users</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="{{route('users')}}">User List</a></li>
						</ul>
					</li>
					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="users"></i><span class="lan-3">Admin</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="{{route('users')}}">Import CSV File</a></li>
						</ul>
					</li>
					 {{-- <li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="book"></i><span class="lan-3">Office Library</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="{{route('offices')}}">View Offices</a></li>
						</ul>
					</li>
					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/dashboard' ? 'active' : '' }}" href="#"><i data-feather="book"></i><span class="lan-3">Target Indicator Library</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='index' ? 'active' : '' }}" href="{{route('indicator')}}">View Target Indicator</a></li>
						</ul>
					</li> --}} -->
					<!-- {{-- <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/page-layouts' ? 'active' : '' }}" href="#"><i data-feather="layout"></i>
							<span class="lan-7">{{ trans('lang.Page layout') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->getPrefix() == '/page-layouts' ? 'down' : 'right' }}"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/page-layouts' ? 'block;' : 'none;' }}"> --}}
                	          {{-- <li><a href="{{ route('box-layout') }}" class="{{ Route::currentRouteName() == 'box-layout' ? 'active' : '' }}">Boxed</a></li>
                          <li><a href="{{ route('layout-rtl') }}" class="{{ Route::currentRouteName() == 'layout-rtl' ? 'active' : '' }}">RTL</a></li>
                          <li><a href="{{ route('layout-dark') }}" class="{{ Route::currentRouteName() == 'layout-dark' ? 'active fw-bold' : '' }}">Dark Layout</a></li>
                          <li><a href="{{ route('hide-on-scroll') }}" class="{{ Route::currentRouteName() == 'hide-on-scroll' ? 'active' : '' }}">Hide Nav Scroll</a></li>
                          <li><a href="{{ route('footer-light') }}" class="{{ Route::currentRouteName() == 'footer-light' ? 'active' : '' }}">Footer Light</a></li>
                          <li><a href="{{ route('footer-dark') }}" class="{{ Route::currentRouteName() == 'footer-dark' ? 'active' : '' }}">Footer Dark</a></li>
                          <li><a href="{{ route('footer-fixed') }}" class="{{ Route::currentRouteName() == 'footer-fixed' ? 'active' : '' }}">Footer Fixed</a></li>
                      </ul>
                  	</li> --}} -->
					<!-- {{-- <li class="sidebar-main-title">
						<div>
							<h6>{{ trans('lang.Pages') }}</h6>
                     		<p>{{ trans('lang.All neccesory pages added') }}</p>
						</div>
					</li> --}} -->
					<!-- {{-- <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='sample-page' ? 'active' : '' }}" href="{{route('sample-page')}}"><i data-feather="file-text"> </i><span>{{ trans('lang.Sample page') }}</span></a></li><li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='landing-page' ? 'active' : '' }}" href="{{route('landing-page')}}"><i data-feather="file-text"> </i><span>{{ trans('lang.Landing Page') }}</span></a></li> --}} -->
				</ul>
				@if(auth()->user()->role_id == 1)
				<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName()=='gadar' ? 'active' : '' }}" href="{{route('users')}}"><i data-feather="users"> </i><span>Users</span></a></li>
				@endif
			</div>
			<!-- {{-- <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div> --}} -->
		</nav>
	</div>
</div>