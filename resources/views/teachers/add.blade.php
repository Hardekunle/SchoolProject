	@extends('layout')
		@section('content')
			<div class="main-content" id="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<h4 class="page-title"><i class="fa fa-user-secret"></i>ADD TEACHER</h4>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-md-12">

							
							<form action="/teacher/add" method="post">
								@csrf
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-user"></i>TEACHER INFO</h6>
									<div class="inner-item">
										@if(count($errors)>0)
										 @foreach($errors->all() as $error)
										 	{{$error}}
										 @endforeach
										@endif
										<div class="dash-form">
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>TITLE*</label>
												<select name="title">
													<option>Not Set</option>
													<option>Mr</option>
													<option>Mrs</option>
													<option>Miss</option>
													<option>Dr</option>
													<option>Prof</option>
													<option>Sir</option>
												</select>
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>FIRST NAME*</label>
												<input type="text" placeholder="" name="firstname" />
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>MIDDLE NAME</label>
												<input type="text" placeholder="" name="middlename"/>
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>LAST NAME*</label>
												<input type="text" placeholder="" name="lastname" />
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-3">
												<label><i class="fa fa-venus"></i>GENDER</label>
												<select name="gender">
													<option>Not Set</option>
													<option>Male</option>
													<option>Female</option>
												</select>
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-phone"></i>MARITAL STATUS</label>
												<select name="marital">
													<option>Not Set</option>
													<option>Single</option>
													<option>Married</option>
												</select>
											</div>
											
											<div class="col-sm-3">
												<label><i class="fa fa-calendar"></i>DATE OF BIRTH</label>
												<input type="text" id="studentDOB" placeholder="MM/DD/YYYY" name="date" />
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-bell-o"></i>RELIGION</label>
												<select name="religion">
													<option>Not Set</option>
													<option>Christianity</option>
													<option>Islam</option>
													<option>Other</option>
												</select>
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-3">
												<label><i class="fa fa-file-picture-o"></i>UPLOAD PHOTO</label>
												<input type="file" placeholder="90890" />
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="dash-item">
									<h6 class="item-title"><i class="fa fa-home"></i>CONTACT INFO</h6>
									<div class="inner-item">
										<div class="dash-form">
											<div class="col-sm-6">
												<label class="clear-top-margin"><i class="fa fa-home"></i>CONTACT ADDRESS*</label>
												<input type="text" placeholder="" name="address" />
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-phone"></i>PHONE NO</label>
												<input type="tel" placeholder="" name="phone" />
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-phone"></i>ALTERNATE PHONE NO</label>
												<input type="tel" placeholder="" name="phone2" />
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-3">
												<label><i class="fa fa-envelope-o"></i>EMAIL</label>
												<input type="email" placeholder="" name="email" />
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-id-card"></i>STATE OF ORIGIN</label>
												<select name="state">
													<option>Not Set</option>
													<option>Abia</option>
													<option>Adamawa</option>
													<option>Akwa-Ibom</option>
													<option>Anambra</option>
													<option>Bauchi</option>
													<option>Bayelsa</option>
													<option>Benue</option>
													<option>Borno</option>
													<option>Cross-Rivers</option>
													<option>Delta</option>
													<option>Ebonyi</option>
													<option>Edo</option>
													<option>Ekiti</option>
													<option>Enugu</option>
													<option>Gombe</option>
													<option>Imo</option>
													<option>Jigawa</option>
													<option>Kaduna</option>
													<option>Kano</option>
													<option>Katsina</option>
													<option>Kebbi</option>
													<option>Kogi</option>
													<option>Kwara</option>
													<option>Niger</option>
													<option>Ogun</option>
													<option>Ondo</option>
													<option>Osun</option>
													<option>Oyo</option>
													<option>Plateau</option>
													<option>Rivers</option>
													<option>Sokoto</option>
													<option>Taraba</option>
													<option>Yobe</option>
													<option>Zamfara</option>
													<option>Abuja</option>	
												</select>
											</div>
											<div class="col-sm-3">
												<label><i class="fa fa-code"></i>ZIP</label>
												<input type="text" placeholder="" name="zip"/>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="dash-item">
									<h6 class="item-title"><i class="fa fa-book"></i>ACADEMIC INFO</h6>
									<div class="inner-item">
										<div class="dash-form">
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-graduation-cap"></i>HIGHEST DEGREE</label>
												<input type="text" placeholder="" name="degree" />
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-building"></i>UNIVERSITY/COLLEGE</label>
												<input type="text" name="university">
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-calaendar"></i>COURSE OF STUDY/DEPARTMENT</label>
												<input type="text" name="course">
											</div>
											<div class="col-sm-3">
												<label class="clear-top-margin"><i class="fa fa-puzzle-piece"></i>GRADE</label>
												<input type="text" placeholder="" name="grade"/>
											</div>
											<div class="clearfix"></div>
											<br><br>
											<div class="col-sm-12">
												<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i>  SAVE</button>
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
					<p>Copyright Pathshala</p>
				</div>
			</div>
		@endsection

