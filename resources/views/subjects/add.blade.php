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
							<h5 class="page-title"><i class="fa fa-cogs"></i>ALL SUBJECTS</h5>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-sm-4">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-plus-circle"></i>ADD SUBJECT</h6>
									<div class="inner-item">
                                        <form action="/subject" method="post">
                                            @csrf
										<div class="dash-form">
											<label class="clear-top-margin"><i class="fa fa-book"></i>NAME</label>
											<input type="text" name="subject" placeholder="" />
											<label><i class="fa fa-code"></i>SUBJECT CODE</label>
											<input type="text" name="code" placeholder="" />
											<label><i class="fa fa-code"></i>CLASS</label>
											<select name="class">
												<option value="">Not Set</option>
												@if(!empty($class))
														@foreach($class->all() as $class)
														<option>{{$class->class}}</option>
														@endforeach
												@endif
                                            </select>
                                            <label><i class="fa fa-code"></i>SECTION</label>
											<select name="section">
												<option value="">Not Set</option>
												@if(!empty($class))
														@foreach($class->all() as $class)
														<option>{{$class->section}}</option>
														@endforeach
												@endif
											</select>
											<label><i class="fa fa-code"></i>TEACHER</label>
											<select name="teacher">
												@if(!empty($teacher))
														@foreach($teacher->all() as $teacher)
														<option>{{$teacher->firstname." ".$teacher->lastname}}</option>
														@endforeach
												@endif
											</select>
											<div>
                                                <br><br>
												<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> CREATE</a>
											</div>
										</div>
                                        <div class="clearfix"></div>
                                        </form>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-sliders"></i>ALL SUBJECTS</h6>
									<div class="inner-item">
										<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th><i class="fa fa-book"></i>NAME</th>
													<th><i class="fa fa-code"></i>CODE</th>
                                                    <th><i class="fa fa-cogs"></i>CLASS</th>
                                                    <th><i class="fa fa-cogs"></i>SECTION</th>
                                                    <th><i class="fa fa-user-secret"></i>TEACHER</th>
													<th><i class="fa fa-sliders"></i>ACTION</th>
												</tr>
											</thead>
											<tbody>
                                            @if(count($post)>0)
                                                @foreach($post as $post)
												<tr>
													<td>{{$post->subject}}</td>
													<td>{{$post->code}}</td>
													<td>{{$post->class}}</td>
                                                    <td>{{$post->section}}</td>
                                                    <td>{{$post->teacher}}</td>
													<td class="action-link">
                                                    <button type="button" class="btn btn-success" data-title="{{$post}}" title="Edit" data-toggle="modal" data-target="#editDetailModal"><i class="fa fa-edit"></i></button>
													<button type="button" class="btn btn-danger" data-title="{{$post}}" title="Delete" data-toggle="modal" data-target="#deleteDetailModal"><i class="fa fa-remove"></i></button>
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
					<p>Copyright Pathshala</p>
				</div>
				
				<!-- Delete Modal -->
				<div id="deleteDetailModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
                            <form action="/subject/delete" method="post">
                                @csrf
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-trash"></i>DELETE SUBJECT</h4>
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
                            <form action="/subject/edit" method="post">
                                @csrf
                                {{method_field('patch')}}
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-edit"></i>EDIT SUBJECT DETAILS</h4>
							</div>
							<div class="modal-body dash-form">
                                <input type="hidden" name="catID" id="catID">
								<div class="col-sm-3">
									<label class="clear-top-margin"><i class="fa fa-book"></i>NAME</label>
									<input type="text" name="subject" id="subject" value="" />
								</div>
								<div class="col-sm-3">
									<label class="clear-top-margin"><i class="fa fa-code"></i>CODE</label>
									<input type="text" name="code" id="code" value="" />
								</div>
								<div class="col-sm-3">
									<label class="clear-top-margin"><i class="fa fa-book"></i>CLASS</label>
									<select name="class" id="class" value="">
											<option value="">Not Set</option>
											@if(!empty($class))
													@foreach($class->all() as $class)
													<option>{{$class->class}}</option>
													@endforeach
											@endif
									</select>
								</div>
								<div class="col-sm-3">
									<label class="clear-top-margin"><i class="fa fa-user-secret"></i>SECTION</label>
									<select name="section" id="section">
										<option>Not Set</option>
										<option>STD 5</option>
										<option>STD 6</option>
									</select>
								</div>
                                <div class="clearfix"></div>
                                <div class="col-sm-3">
                                    <label class=""><i class="fa fa-user-secret"></i>TEACHER</label>
                                    <select name="teacher" id="teacher">
                                        <option>Not Set</option>
                                        <option>Lennore Doe</option>
                                        <option>John Doe</option>
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
                  var button = $(event.relatedTarget)
                  var details = button.data('title')
                  var modal = $(this)
                  modal.find('.modal-body #subject').val(details['subject'])
                  modal.find('.modal-body #code').val(details['code'])
                  modal.find('.modal-body #class').val(details['class'])
                  modal.find('.modal-body #section').val(details['section'])
                  modal.find('.modal-body #teacher').val(details['teacher'])
                  modal.find('.modal-body #catID').val(details['id'])
                })
        
                $('#deleteDetailModal').on('show.bs.modal', function (event) {
                  var button = $(event.relatedTarget)
                  var details = button.data('title') 
                  var modal = $(this)
                  modal.find('.modal-body #catID').val(details['id'])
                })
                
			</script>
		@endsection