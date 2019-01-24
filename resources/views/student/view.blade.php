		@extends('layout')
		@section('style')		
		<link href="/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
		<link href="/css/responsive.dataTables.min.css" rel="stylesheet" media="screen">
		@endsection
		@section('content')
			<div class="main-content" id="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<h5 class="page-title"><i class="fa fa-users"></i>VIEW STUDENT(S)</h5>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-lg-12">
									<div class="dash-item first-dash-item">
											<h6 class="item-title"><i class="fa fa-search"></i>MAKE SELECTION</h6>
											<div class="inner-item dash-search-form">
											<form action="/student/view" method="post">
												@csrf
												<div class="col-sm-4">
													<label>CLASS</label>
													<select name="class">
														<option value="">All</option>
														@if(!empty($class))
														@foreach($class->all() as $class)
														<option>{{$class->class}}</option>
														@endforeach
														@endif
													</select>
												</div>
												<div class="col-sm-4">
													<label>SECTION</label>
													<select name="section">
														<option value="">All</option>
														@if(!empty($class))
														@foreach($class->all() as $class)
														<option>{{$class->section}}</option>
														@endforeach
														@endif
													</select>
												</div>
												<div class="col-sm-4">
													<button type="submit" class="submit-btn"><i class="fa fa-search"></i>view</button>
												</div>
											</form>
												<div class="clearfix"></div>
											</div>
									</div>
							</div>
							<div class="col-lg-12">
								<div class="dash-item">
									<h6 class="item-title"><i class="fa fa-user"></i>STUDENTS</h6>
									<div class="inner-item">
										<dive class="row">
											<a href="users/export"><button class="btn btn-success">Download Excel xlsx</button></a>
										<div>
										<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th><i class="fa fa-user"></i>NAME</th>
													<th><i class="fa fa-id-card"></i>REG #</th>
													<th><i class="fa fa-book"></i>CLASS</th>
													<th><i class="fa fa-cogs"></i>SECTION</th>-
													<th><i class="fa fa-phone"></i>CONTACT #</th>
													<th><i class="fa fa-envelope-o"></i>EMAIL</th>
													<th><i class="fa fa-tasks"></i>ACTION</th>
												</tr>
											</thead>
											<tbody>
                                                @if(count($post)>0)
                                                @foreach($post as $post)
												<tr>
													<td>{{$post->firstname." ".$post->lastname}}</td>
													<td>{{$post->registration}}</td>
													<td>{{$post->class}}</td>
													<td>{{$post->section}}</td>
                                                    <td>{{$post->club}}</td>
													<td>{{$post->studemail}}</td>
													
													<td class="action-link">
														<a class="edit" href="#" title="Edit" data-toggle="modal" data-target="#editDetailModal"><i class="fa fa-edit"></i></a>
														<a class="delete" href="#" data-title="{{$post}}" title="Delete" data-toggle="modal" data-target="#deleteDetailModal"><i class="fa fa-remove"></i></a>
														<a class="edit" href="/student/{{$post->id}}/more" title="view more"><i class="fa fa-remove"></i></a>
													</td>
                                                </tr>
                                                @endforeach
                                                @endif
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="menu-togggle-btn">
					<a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
				</div>
				<div class="dash-footer col-lg-12">
					<p>Copyright victoRIAK</p>
				</div>
				
				
				<!-- Delete Modal -->
				<div id="deleteDetailModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<form action="/student/delete" method="post">
								@csrf
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-trash"></i>DELETE STUDENT</h4>
							</div>
							<div class="modal-body">
								<input type="hidden" name="catID" id="catID">
								<div class="table-action-box">
									<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>YES</button>
									<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</button>
								</div>
								<div class="clearfix"></div>
							</div>
							</form>
						</div>
					</div>
				</div>
				
				
				<!--Edit details modal-->
				<div id="editDetailModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-edit"></i>EDIT STUDENT DETAILS</h4>
							</div>
							<div class="modal-body dash-form">
								<div class="col-sm-3">
									<label class="clear-top-margin"><i class="fa fa-user"></i>FIRST NAME</label>
									<input type="text" placeholder="First Name" value="John" />
								</div>
								<div class="col-sm-3">
									<label class="clear-top-margin"><i class="fa fa-user"></i>MIDDLE NAME</label>
									<input type="text" placeholder="Middle Name" value="Fidler" />
								</div>
								<div class="col-sm-3">
									<label class="clear-top-margin"><i class="fa fa-user"></i>LAST NAME</label>
									<input type="text" placeholder="Last Name" value="Doe" />
								</div>
								<div class="col-sm-3">
									<label class="clear-top-margin"><i class="fa fa-book"></i>CLASS</label>
									<input type="text" placeholder="Standard" value="5 STD" />
								</div>
								<div class="clearfix"></div>
								<div class="col-sm-3">
									<label><i class="fa fa-cogs"></i>SECTION</label>
									<input type="text" placeholder="Section" value="PTH05A" />
								</div>
								<div class="col-sm-3">
									<label><i class="fa fa-puzzle-piece"></i>ROLL #</label>
									<input type="text" placeholder="Roll Number" value="Fidler" />
								</div>
								<div class="col-sm-3">
									<label><i class="fa fa-phone"></i>CONTACT #</label>
									<input type="text" placeholder="Contact Number" value="1234567890" />
								</div>
								<div class="col-sm-3">
									<label><i class="fa fa-envelope-o"></i>EMAIL</label>
									<input type="text" placeholder="Email" value="john@gmail.com" />
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="modal-footer">
								<div class="table-action-box">
									<a href="#" class="save"><i class="fa fa-check"></i>SAVE</a>
									<a href="#" class="cancel" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endsection
		@section('script')
			<script>
			$('#deleteDetailModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var details = button.data('title') 
			var modal = $(this)
			modal.find('.modal-body #catID').val(details['id'])
		 	 })
			<script>
		@endsection
