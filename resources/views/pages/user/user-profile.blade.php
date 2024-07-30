@extends('layouts.simple.master')
@section('title', 'Edit Profile')

@section('css')
@endsection

@section('style')
<style>
        .page-wrapper .page-body-wrapper .page-title {
            padding-top: 25px;
            padding-bottom: 5px;
        }
            .card .card-header {
            background-color: #fff;
            padding: 30px;
            border-bottom: 1px solid #ecf3fa;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            position: relative;
        }
</style>
@endsection

@section('breadcrumb-title')
<h3>Edit Profile</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">User Profile</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="edit-profile">
		<div class="row">
			<div class="col-xl-4">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Profile</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
							<div class="row mb-2">
								<div class="profile-title">
									<div class="media">
										<img class="img-70 rounded-circle" alt="" src="{{ asset('assets/images/user/7.jpg')}}">
										<div class="media-body">
											<h3 class="mb-1">{{$user->fname}}</h3>
											@if($user->role_id == 1)
												<p>ADMIN</p>
											@else
												<p>USER</p>
											@endif
										</div>
									</div>
								</div>
							</div>
							<form method="POST" action="{{ route('profile.update') }}">
								@csrf
								@method('PUT')

								<div class="mb-3">
									<h6 class="form-label">Bio</h6>
									<textarea class="form-control" rows="3" name="bio">{{ old('bio', $user->bio) }}</textarea>
								</div>
								<div class="mb-3">
									<label class="form-label">Username</label>
									<input class="form-control" name="username" value="{{ old('username', $user->username) }}" placeholder="Username">
								</div>
								<div class="mb-3">
									<h6 class="form-label">Change Password</h6>
									<label class="form-label">Current Password</label>
									<input class="form-control" type="password" name="current_password">
								</div>
								<div class="mb-3">
									<label class="form-label">New Password</label>
									<input class="form-control" type="password" name="new_password">
								</div>
								<div class="mb-3">
									<label class="form-label">Confirm Password</label>
									<input class="form-control" type="password" name="new_password_confirmation">
								</div>
								<div class="form-footer">
									<button class="btn btn-primary btn-block">Save</button>
								</div>
							</form>
					</div>
				</div>
			</div>
			<div class="col-xl-8">
				<form class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">User Information</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-4 col-md-3">
								<div class="mb-3">
									<label class="form-label">First Name</label>
									<input class="form-control" type="text" placeholder="First Name">
								</div>
							</div>
							<div class="col-sm-4 col-md-3">
								<div class="mb-3">
									<label class="form-label">Middle Name</label>
									<input class="form-control" type="text" placeholder="Middle Name">
								</div>
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="mb-3">
									<label class="form-label">Last Name</label>
									<input class="form-control" type="text" placeholder="Last Name">
								</div>
							</div>
							<div class="col-sm-4 col-md-2">
								<div class="mb-3">
									<label class="form-label">Extension</label>
									<input class="form-control" type="text" placeholder="(Jr., Sr.)" required="">
									<!-- <input class="form-control" type="text" placeholder="Last Name"> -->
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Sex</label>
									<input class="form-control" type="text" placeholder="Sex">
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Contact Number</label>
									<input class="form-control" type="text" placeholder="Number">
								</div>
							</div>
							<div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">Email Address</label>
									<input class="form-control" type="text" placeholder="Email">
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="mb-3">
									<label class="form-label">Position</label>
									<input class="form-control" type="text" placeholder="Position">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Division</label>
									<input class="form-control" type="text" placeholder="Division">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Section</label>
									<input class="form-control" type="text" placeholder="Section">
								</div>
							</div>

							<div class="col-md-12">
							<h6 class="form-label">Additional Information</h6>
								<div class="mb-3">
									<label class="form-label">Address</label>
									<input class="form-control" type="text" placeholder="Home Address">
								</div>
							</div>
							
							<div class="col-sm-6 col-md-4">
								<div class="mb-3">
									<label class="form-label">City</label>
									<input class="form-control" type="text" placeholder="City">
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="mb-3">
									<label class="form-label">Postal Code</label>
									<input class="form-control" type="number" placeholder="ZIP Code">
								</div>
							</div>
							<div class="col-md-5">
								<div class="mb-3">
									<label class="form-label">Country</label>
									<select class="form-control btn-square">
										<option value="0">--Select--</option>
										<option value="1">Germany</option>
										<option value="2">Canada</option>
										<option value="3">Usa</option>
										<option value="4">Aus</option>
									</select>
								</div>
							</div>
							
							<!-- <div class="col-md-12">
								<div>
									<label class="form-label">About Me</label>
									<textarea class="form-control" rows="5" placeholder="Enter About your description"></textarea>
								</div>
							</div> -->
						</div>
					</div>
					<div class="card-footer text-end">
						<button class="btn btn-primary" type="submit">Update Profile</button>
					</div>
				</form>
			</div>
			<!-- <div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title mb-0">Add projects And Upload</h4>
						<div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
					</div>
					<div class="table-responsive add-project">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Project Name</th>
									<th>Date</th>
									<th>Status</th>
									<th>Price</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a class="text-inherit" href="#">Untrammelled prevents </a></td>
									<td>28 May 2018</td>
									<td><span class="status-icon bg-success"></span> Completed</td>
									<td>$56,908</td>
									<td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
								</tr>
								<tr>
									<td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
									<td>12 June 2018</td>
									<td><span class="status-icon bg-danger"></span> On going</td>
									<td>$45,087</td>
									<td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
								</tr>
								<tr>
									<td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
									<td>12 July 2018</td>
									<td><span class="status-icon bg-warning"></span> Pending</td>
									<td>$60,123</td>
									<td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
								</tr>
								<tr>
									<td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
									<td>14 June 2018</td>
									<td><span class="status-icon bg-warning"></span> Pending</td>
									<td>$70,435</td>
									<td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
								</tr>
								<tr>
									<td><a class="text-inherit" href="#">Untrammelled prevents</a></td>
									<td>25 June 2018</td>
									<td><span class="status-icon bg-success"></span> Completed</td>
									<td>$15,987</td>
									<td class="text-end"><a class="icon" href="javascript:void(0)"></a><a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-transparent btn-sm" href="javascript:void(0)"><i class="fa fa-link"></i> Update</a><a class="icon" href="javascript:void(0)"></a><a class="btn btn-danger btn-sm" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection