@extends('layout')
	@section('content')	
			<div class="main-content" id="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<h5 class="page-title"><i class="fa fa-user"></i>ADD STUDENT</h5>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-md-12">
                                <form action="/student/add" method="post" enctype="multipart/form-data">
                                    @csrf
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-user"></i>STUDENT INFO</h6>
									<div class="inner-item">
										<div class="dash-form">
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>FIRST NAME*</label>
												<input type="text" id="firstname" value="{{old('firstname')}}" name="firstname" style="{{$errors->has('firstname') ? 'border-color:red':''}}"  />
												
												@if($errors->has('firstname'))
												<span style="color:red">
													field is required
												</span>
												@endif
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>MIDDLE NAME</label>
												<input type="text" placeholder="" value="{{old('middlename')}}" name="middlename" />
											</div>
											<div class="form-group">
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>LAST NAME*</label>
												<input type="text" name="lastname" value="{{old('lastname')}}" id="lastname" style="{{$errors->has('lastname') ? 'border-color:red':''}}"/>
												@if($errors->has('lastname'))
												<span style="color:red">
													This field is required
												</span>
												@endif
											</div>
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-venus"></i>GENDER</label>
												<select name="gender" value=value="{{old('gender')}}">
													<option>Not Set</option>
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-3">
												<label><i class="fa fa-calendar"></i>DATE OF BIRTH</label>
												<input type="text" id="studentDOB" value="{{old('studdate')}}" placeholder="MM/DD/YYYY" name="studdate" />
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-phone"></i>PHONE #</label>
												<input type="text" placeholder="" value="{{old('studphone')}}" name="studphone"/>
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-envelope-o"></i>EMAIL</label>
											<input type="email" placeholder="" name="studemail" value="{{old('studemail')}}" style="{{$errors->has('studemail') ? 'border-color:red':''}}"/>
												@if($errors->has('studemail'))
												<span style="color:red">
													Email already Exist
												</span>
												@endif
											</div>
											
											<div class="col-sm-3">
												<label><i class="fa fa-bell-o"></i>RELIGION</label>
												<select name="religion">
													<option>Not Set</option>
													<option>Christainity</option>
													<option>Islam</option>
													<option>Others</option>
												</select>
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-3">
												<label><i class="fa fa-file-picture-o"></i>UPLOAD PHOTO</label>
												<input type="file" placeholder="90890" name="image" />
                                            </div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="dash-item">
									<h6 class="item-title"><i class="fa fa-user-secret"></i>SPONSOR INFO</h6>
									<div class="inner-item">
										<div class="dash-form">
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>SPONSOR NAME*</label>
												<input type="text" placeholder="" name="fathername" style="{{$errors->has('fathername') ? 'border-color:red':''}}"/>
												@if($errors->has('fathername'))
												<span style="color:red">
													This field is required
												</span>
												@endif
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-briefcase"></i>OCCUPATION</label>
												<input type="text" name="occupation">
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-phone"></i>CONTACT NO*</label>
												<input type="text" placeholder="" name="parentphone" style="{{$errors->has('parentphone') ? 'border-color:red':''}}"/>
												@if($errors->has('parentphone'))
												<span style="color:red">
													This field is required
												</span>
												@endif

											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-phone"></i>ALTERNATE CONTACT NO</label>
												<input type="text" placeholder="" name="parentphone2" />
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-3">
												<label><i class="fa fa-envelope-o"></i>EMAIL*</label>
												<input type="email" placeholder="" name="parentemail" style="{{$errors->has('parentemail') ? 'border-color:red':''}}"/>
												@if($errors->has('parentemail'))
												<span style="color:red">
													This field is required
												</span>
												@endif
											</div>
											
											<div class="col-sm-6">
												<label><i class="fa fa-home"></i>ADDRESS*</label>
												<input type="text" placeholder="" name="parentaddress" style="{{$errors->has('parentaddress') ? 'border-color:red':''}}"/>
												@if($errors->has('parentaddress'))
												<span style="color:red">
													This field is required
												</span>
												@endif
											</div>
										
                                            
											<div class="col-sm-3">
												<label><i class="fa fa-code"></i>ZIP CODE</label>
												<input type="text" placeholder="" name="zip" />
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="dash-item">
									<h6 class="item-title"><i class="fa fa-book"></i>REGISTRATION INFO</h6>
									<div class="inner-item">
										<div class="dash-form">
											<div class="col-sm-3">
												
												<label class="clear-top-margin"><i class="fa fa-book"></i>CLASS*</label>
												<select name="class" style="{{$errors->has('class') ? 'border-color:red':''}}">
													<option value="">Not Set</option>
													@if(!empty($clas))
														@foreach($clas->all() as $clas)
														<option>{{$clas['class']}}</option>
														@endforeach
													@endif
												</select>
												@if($errors->has('class'))
												<span style="color:red">
													This field is required
												</span>
												@endif
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-cogs"></i>SECTION*</label>
												<select name="section" style="{{$errors->has('section') ? 'border-color:red':''}}">
													<option value= "">Not Set</option>
													@if(!empty($clas))
														@foreach($clas->all() as $clas)
														<option>{{$clas['section']}}</option>
														@endforeach
													@endif
												</select>
												@if($errors->has('section'))
												<span style="color:red">
													This field is required
												</span>
												@endif
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-book"></i>ENTRY YEAR*</label>
												<select name="year" style="{{$errors->has('year') ? 'border-color:red':''}}">
													{{$yr=$post->year}}
													{{$low=$yr-20}}
													@for($yr;$yr>=$low;$yr--)
													<option>{{$yr}}</option>
													@endfor
												</select>
												@if($errors->has('year'))
												<span style="color:red">
													This field is required
												</span>
												@endif
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-futbol-o"></i>SCHOOL CLUB</label>
												<select name="club">
													<option>Not Set</option>
													<option>Cricket</option>
													<option>Football</option>
													<option>Tenis</option>
												</select>
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-12">
                                                <br><br>
												<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> SAVE</button>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
                                </div>
                                </form>
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
			</div>
	@endsection