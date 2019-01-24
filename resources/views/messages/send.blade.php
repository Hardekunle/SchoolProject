
			
	@extends('layout')
		@section('content')
			<div class="main-content" id="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<h5 class="page-title"><i class="fa fa-envelope-o"></i>MESSAGES</h5>
							<div class="section-divider"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 clear-padding-xs">
							<div class="col-md-6">
								<div class="my-msg dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-envelope-o"></i>MY MESSAGES</h6>
									<div class="inner-item">
										@if(count($post)>0)
										@foreach($post as $post)
										<div class="msg-item">
											<div class="col-xs-2 clear-padding">
												<img src="/img/parent/parent1.jpg" alt="user" />
											</div>
											<?php $then = new Carbon\Carbon($post->created_at) ?>
											<?php $difference=($then->diff($nowDate)->days<1)?'today': $then->diffForHumans($nowDate)?>
											<div class="col-xs-10">
												<p class="title">{{$post->subject}}</p>
												<p class="sent-by">{{$post->from}}</p>
												<p class="msg-desc">{{$post->message}}</p>
												<p class="timestamp"><i class="fa fa-clock-o"></i> <i>{{$difference}}</i></p>
											</div>
											<div class="clearfix"></div>
										</div>
										@endforeach
										@endif
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="dash-item first-dash-item">
									<h6 class="item-title"><i class="fa fa-paper-plane"></i>CREATE NEW MESSAGE</h6>
									<div class="inner-item">
										<form action="/message/send" method="post">
											@csrf
										<div class="dash-form">
											<div class="col-xs-6">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>TO</label>
												<input type="text" placeholder="TO" name="to"/>
											</div>
											<div class="col-xs-6">
												<label class="clear-top-margin"><i class="fa fa-user-circle-o"></i>FROM</label>
												<input type="text" placeholder="FROM" name="from"/>
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-12">
												<label><i class="fa fa-bullhorn"></i>SUBJECT</label>
												<input type="text" placeholder="SUBJECT" name="subject"/>
											</div>
											<div class="col-sm-12">
												<label><i class="fa fa-info-circle"></i>MESSAGE</label>
												<textarea placeholder="MESSAGE" name="message"></textarea>
											</div>
											<div class="col-sm-12">
												<br><br>
												<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> SEND</button>
											</div>
										</div>
										</form>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
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
			</div>
		@endsection
