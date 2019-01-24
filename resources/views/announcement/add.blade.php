		@extends('layout')
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
							<h5 class="page-title"><i class="fa fa-bullhorn"></i>ALL ANNOUNCEMENTS</h5>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-sm-4">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-plus-circle"></i>ADD ANNOUNCEMENT</h6>
                                    <form action="/announcement" method="POST">
                                        @csrf
									<div class="inner-item">
										<div class="dash-form">
											<label class="clear-top-margin"><i class="fa fa-cogs"></i>TYPE</label>
											<select name ="type">
												<option>Not Set</option>
												<option>Academic</option>
												<option>Administrative</option>
                                                <option>Sports</option>
                                                <option>others</option>
											</select>
											<label><i class="fa fa-user-secret"></i>FOR</label>
											<select name="for">
												<option>Not Set</option>
												<option>All</option>
												<option>Teacher</option>
												<option>Student</option>
											</select>
											<label ><i class="fa fa-code"></i>SUBJECT</label>
											<input type="text" name="subject" placeholder="Subject" />
											<label ><i class="fa fa-info-circle"></i>DESCRIPTION</label>
											<textarea placeholder="Enter Description Here" name="description"></textarea>
											<div>
                                                <br><br>
												<button type="submit" class="btn btn-primary" class="fa fa-paper-plane"> CREATE</button>
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
									<h6 class="item-title"><i class="fa fa-bullhorn"></i>ALL ANNOUNCEMENTS</h6>
									<div class="inner-item">
										<table id="attendenceDetailedTable" class="display responsive nowrap" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th><i class="fa fa-cogs"></i>TYPE</th>
													<th><i class="fa fa-user-secret"></i>FOR</th>
													<th><i class="fa fa-user-info"></i>SUBJECT</th>
													<th><i class="fa fa-info-circle"></i>DESCRIPTION</th>
													<th><i class="fa fa-user"></i>CREATED BY</th>
													<th><i class="fa fa-sliders"></i>ACTION</th>
												</tr>
											</thead>
											<tbody>
                                            @if(!empty($post)>0)
                                            @foreach($post->all() as $post)
												<tr>
                                                    <td>{{$post->type}}</td>
													<td>{{$post->for}}</td>
													<td>{{$post->subject}}</td>
													<td>{{$post->description}}.</td>
													<td>John Doe</td>
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
                        <form action="/announcement/delete" method="post">
                            @csrf
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-trash"></i>DELETE CLASS</h4>
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
                            <form action="/announcement/edit" method="post">
                                @csrf
                                {{method_field('patch')}}
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-edit"></i>EDIT CLASS DETAILS</h4>
							</div>
							<div class="modal-body dash-form">
                                <input type="hidden" name="catID" id="catID">
								<div class="col-sm-4">
									<label class="clear-top-margin"><i class="fa fa-book"></i>TYPE</label>
									<select name ="type" id="type">
                                        <option>Not Set</option>
                                        <option>Academic</option>
                                        <option>Administrative</option>
                                        <option>Sports</option>
                                        <option>others</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label><i class="fa fa-user-secret"></i>FOR</label>
                                    <select name="for" id="for">
                                        <option>Not Set</option>
                                        <option>All</option>
                                        <option>Teacher</option>
                                        <option>Student</option>
                                    </select>
                                </div>
								<div class="col-sm-4">
									<label class="clear-top-margin"><i class="fa fa-code"></i>SUBJECT</label>
									<input type="text" placeholder="CLASS CODE" name="subject" id="subject" value="" />
								</div>
								<div class="clearfix"></div>
								<div class="col-sm-12">
									<label><i class="fa fa-info-circle"></i>DESCRIPTION</label>
									<textarea placeholder="" name="description" id="description"></textarea>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="modal-footer">
								<div class="table-action-box">
									<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>SAVE</button>
									<button type="button" class="btn btn default" data-dismiss="modal"><i class="fa fa-ban"></i>CLOSE</button>
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
                  modal.find('.modal-body #for').val(details['for'])
                  modal.find('.modal-body #type').val(details['type'])
                  modal.find('.modal-body #description').val(details['description'])
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