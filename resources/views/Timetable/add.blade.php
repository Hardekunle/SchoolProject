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
							<h5 class="page-title"><i class="fa fa-clock-o"></i>TIME SLOTS</h5>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-sm-12">
								<div class="dash-item first-dash-item">
								<form action="" method="post">
									@csrf
									<h6 class="item-title"><i class="fa fa-plus-circle"></i>ADD SLOT</h6>
									<div class="inner-item">
										<div class="dash-form">
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-calendar"></i>DAY</label>
												<select name="day">
													<option>Not Set</option>
													<option>Monday</option>
                                                    <option>Tuesday</option>
                                                    <option>Wednesday</option>
                                                    <option>Thursday</option>
                                                    <option>Friday</option>
												</select>
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-clock-o"></i>SLOT</label>
												<select name="slot">
													<option>Not Set</option>
													<option>09-10 AM</option>
                                                    <option>10-11 AM</option>
                                                    <option>11-12 AM</option>
                                                    <option>12-1 PM</option>
                                                    <option>1-2 PM</option>
                                                    <option>2-3 PM</option>
                                                    <option>3-4 PM</option>
												</select>
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-book"></i>CLASS</label>
												<select name="class">
                                                    <option>Not Set</option>
                                                    
                                                    <option>JSS 1</option>
                                                    <option>JSS 2</option>
                                                    <option>JSS 3</option>
                                                    <option>SSS 1</option>
                                                    <option>SSS 2</option>
                                                    <option>SSS 3</option>
													
												</select>
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-users"></i>SECTION</label>
												<select name="section">
													<option>Not Set</option>
													<option>Gold</option>
                                                    <option>Silver</option>
                                                    <option>Diamond</option>
                                                    <option>Science</option>
                                                    <option>Commercial</option>
                                                    <option>Arts<option>
												</select>
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-code"></i>SUBJECT</label>
												<select name="subject">
													<option>Not Set</option>
													<option>PHY101</option>
													<option>MTH101</option>
												</select>
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-user"></i>TEACHER</label>
												<select name="teacher">
                                                    <option>Not Set</option>
                                                </select>
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-home"></i>CLASS ROOM</label>
												<select name="room">
													<option>Not Set</option>
													<option>101</option>
													<option>103</option>
												</select>
                                            </div>
                                            
											
                                            <div class="col-sm-12">
													<br><br>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>  CREATE</button>
                                            </div>

											
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</form>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="dash-item">
									<h6 class="item-title"><i class="fa fa-sliders"></i>ALL SLOTS</h6>
									<div class="inner-item">
										<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th><i class="fa fa-calendar"></i>DAY</th>
													<th><i class="fa fa-clock-o"></i>SLOT</th>
													<th><i class="fa fa-book"></i>CLASS</th>
													<th><i class="fa fa-cogs"></i>SECTION</th>
													<th><i class="fa fa-code"></i>SUBJECT</th>
													<th><i class="fa fa-user"></i>TEACHER</th>
													<th><i class="fa fa-home"></i>ROOM</th>
													<th><i class="fa fa-sliders"></i>ACTION</th>
												</tr>
											</thead>
											<tbody>
                                                @if(count($post)>0)
                                                @foreach($post as $post)
												<tr>
													<td>{{$post->day}}</td>
													<td>{{$post->slot}}</td>
													<td>{{$post->class}}</td>
													<td>{{$post->section}}</td>
													<td>{{$post->subject}}</td>
													<td>{{$post->teacher}}</td>
													<td>{{$post->room}}</td>
													<td class="action-link">
													<button type="button" class="btn btn-success" title="Edit" data-title="{{$post}}" data-toggle="modal" data-target="#editDetailModal"><i class="fa fa-edit"></i></button>
													<button type="button" class="btn btn-danger" title="Delete" data-title="{{$post}}" data-toggle="modal" data-target="#deleteDetailModal"><i class="fa fa-remove"></i></button>
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
					<p>Copyright Victoriak</p>
				</div>
				
				<!-- Delete Modal -->
				<div id="deleteDetailModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-trash"></i>DELETE SECTION</h4>
							</div>
							<form action="/timetable/delete" method="post">
								@csrf
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
						<form action="/timetable/Update" method="post">
								{{method_field('patch')}}
								@csrf
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-edit"></i>EDIT SECTION DETAILS</h4>
							</div>
						
							<div class="modal-body dash-form">
								<input type="hidden" id="catID" name="catID" value=""/>
								<div class="col-sm-4">
									<label class="clear-top-margin"><i class="fa fa-book"></i>CLASS</label>
									<select name="class" id="class">
										<option>JSS 1</option>
										<option>JSS 2</option>
										<option>JSS 3</option>
										<option>SSS 1</option>
										<option>SSS 2</option>
										<option>SSS 3</option>
									</select>
								</div>
								<div class="col-sm-4">
									<label class="clear-top-margin"><i class="fa fa-code"></i>SECTION</label>
									<select id="section" name="section">
										<option>Gold</option>
										<option>Silver</option>
										<option>Diamond</option>
										<option>Science</option>
										<option>Commercial</option>
										<option>Art</option>
									</select>
								</div>
								<div class="col-sm-4">
									<label class="clear-top-margin"><i class="fa fa-user-secret"></i>SLOT</label>
									<select id='slot' name="slot">
										<option>9-10 AM</option>
										<option>10-11 AM</option>
										<option>11-12 AM</option>
										<option>12-1 PM</option>
										<option>1-2 PM</option>
										<option>2-3 PM</option>
										<option>3-4 PM</option>
									</select>
								</div>
								<div class="clearfix"></div>
								<div class="col-sm-4">
									<label><i class="fa fa-info-circle"></i>DAY</label>
									<select name="day" id="day">
										<option>Monday</option>
										<option>Tuesday</option>
										<option>Wednesday</option>
										<option>Thursday</option>
										<option>Friday</option>
									</select>
								</div>

								<div class="col-sm-4">
									<label><i class="fa fa-info-circle"></i>SUBJECT</label>
									<select name="subject" id="subject">
										<option>PHY101</option>
										<option>MTH101</option>
									</select>
								</div>

								<div class="col-sm-4">
									<label><i class="fa fa-user"></i>TEACHER</label>
									<select name="teacher" id="teacher">
										<option>Not Set</option>
										<option>Tuesday</option>
										<option>Wednesday</option>
										<option>Thursday</option>
										<option>Friday</option>
									</select>
								</div>
								<div class="clearfix"></div>

								<div class="col-sm-4">
										<label><i class="fa fa-user"></i>ROOM</label>
										<select name="room" id="room">
												<option>Not Set</option>
												<option>101</option>
												<option>103</option>											
										</select>
								</div>
								<div class="clearfix"></div>
							</div>
							
							<div class="modal-footer">
								<div class="table-action-box">
									<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>SAVE</button>
									<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
	@endsection
	@section('script')	
		<script>
		$('#editDetailModal').on('show.bs.modal', function (event) {
  		var button = $(event.relatedTarget) // Button that triggered the modal
  		var details = button.data('title') // Extract info from data-* attributes
  		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  		var modal = $(this)
		modal.find('.modal-body #catID').val(details['id'])
		})

		$('#deleteDetailModal').on('show.bs.modal', function (event) {
  		var button = $(event.relatedTarget) // Button that triggered the modal
  		var details = button.data('title') // Extract info from data-* attributes
  		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  		var modal = $(this)
  		modal.find('.modal-body #section').val(details['section'])
		modal.find('.modal-body #class').val(details['class'])
		modal.find('.modal-body #slot').val(details['slot'])
		modal.find('.modal-body #subject').val(details['subject'])
		modal.find('.modal-body #teacher').val(details['teacher'])
		modal.find('.modal-body #day').val(details['day'])
		modal.find('.modal-body #catID').val(details['id'])
		})
		
		</script>
	@endsection