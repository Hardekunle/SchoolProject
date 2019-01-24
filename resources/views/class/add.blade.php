@extends('layout')
	@section('error')
		@if(($errors->has('class'))||($errors->has('teacher')))
			<div class="alert alert-danger">
				<h3 style="display:inline"><i class="fa fa-times"></i></h3>{{"	Fill the required field(s)"}}
			</div>
		@else
			@foreach($errors->all() as $error)
				<div class="alert alert-danger">
					<h3 style="display:inline"><i class="fa fa-times"></h3></i>{{"    ".$error}}
				</div>
			@endforeach
		@endif
	@endSection
	
	@section('style')
		<link href="/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
		<link href="/css/responsive.dataTables.min.css" rel="stylesheet" media="screen">
	@endsection
	@section('content')	
			<!-- MAIN CONTENT -->
			<div class="main-content" id="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<h5 class="page-title"><i class="fa fa-sliders"></i>ALL CALSSES</h5>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-sm-4">
								<div class="dash-item first-dash-item">
                                    <h6 class="item-title"><i class="fa fa-plus-circle"></i>ADD CLASS</h6>
                                    <form action="/class/view" method="post">
                                        @csrf
									<div class="inner-item">
										<div class="dash-form">
											<label class="clear-top-margin"><i class="fa fa-book"></i>CLASS*</label>
											<input type="text" name="class" placeholder="" style="{{$errors->has('class') ? 'border-color:red':''}}" value="{{ old('class') }}"/>
											@if($errors->has('class'))
												<span style="color:red">
													Required
												</span>
											@endif
											<label><i class="fa fa-code"></i>SECTION</label>
											<input type="text" name="section" placeholder="" value="{{ old('section') }}"/>
											<label><i class="fa fa-user-secret"></i>CLASS TEACHER*</label>
											<select name="teacher" style="{{$errors->has('teacher') ? 'border-color:red':''}}" value="{{ old('teacher') }}">
												<option>Not Set</option>
											</select>
											@if($errors->has('teacher'))
												<span style="color:red">
													Required
												</span>
											@endif
											<div>
                                                <br><br>
												<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> CREATE</button>
											</div>
										</div>
										<div class="clearfix"></div>
                                    </div>
                                    </form>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-sliders"></i>ALL CLASSES</h6>
									<div class="inner-item">
										<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th><i class="fa fa-book"></i>CLASS</th>
													<th><i class="fa fa-code"></i>SECTION</th>
													<th><i class="fa fa-user-secret"></i>CLASS TEACHER</th>
													<th><i class="fa fa-sliders"></i>ACTION</th>
												</tr>
											</thead>
											<tbody>
                                                @if(count($classInfo)>0)
                                                @foreach($classInfo->all() as $class)
												<tr>
													<td>{{$class->class}}</td>
													<td>{{$class->section}}</td>
													<td>{{$class->teacher}}</td>
													<td class="action-link">
														<button type="button" class="btn btn-success" title="Edit" data-title="{{$class}}" data-toggle="modal" data-target="#editDetailModal"><i class="fa fa-edit"></i></a>
														<button type="button" class="btn btn-danger" title="Delete" data-title="{{$class}}" data-toggle="modal" data-target="#deleteDetailModal"><i class="fa fa-remove"></i></a>
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
                            <form action="/class/delete" method="post">
                                @csrf
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-trash"></i>DELETE CLASS</h4>
                            </div>
                          
							<div class="modal-body">
								<h5>Are you sure you want to <span style="color:red">permanently delete</span> this Class?</h5>
								<br>
                                <input type="hidden" id="catID" name="catID" value="">
								<div class="table-action-box">
									<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>YES</a>
									<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
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
								<h4 class="modal-title"><i class="fa fa-edit"></i>EDIT CLASS DETAILS</h4>
                            </div>
                            <form action="/class/edit" method="post">
                                {{method_field('patch')}}
                                @csrf
							<div class="modal-body dash-form">
                                <input type="hidden" id="catID" name="catID" value="">
								<div class="col-sm-4">
									<label class="clear-top-margin"><i class="fa fa-book"></i>CLASS</label>
									<input type="text" id="class" name="class"  value="" />
								</div>
								<div class="col-sm-4">
									<label class="clear-top-margin"><i class="fa fa-code"></i>SECTION</label>
									<input type="text" id="section" name="section"  value="" />
								</div>
								<div class="col-sm-4">
									<label class="clear-top-margin"><i class="fa fa-user-secret"></i>CLASS TEACHER</label>
									<select id="teacher" name="teacher">
										<option>Not Set</option>
									</select>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="modal-footer">
								<div class="table-action-box">
									<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>SAVE</a>
									<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</a>
								</div>
                            </div>
                            </form>
						</div>
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
                  modal.find('.modal-body #section').val(details['section'])
                  modal.find('.modal-body #class').val(details['class'])
                  modal.find('.modal-body #teacher').val(details['teacher'])
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
                  modal.find('.modal-body #teacher').val(details['teacher'])
                  modal.find('.modal-body #catID').val(details['id'])
                })
                
                </script>
	@endsection
