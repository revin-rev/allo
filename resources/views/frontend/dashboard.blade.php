@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="cont">
			<div class="col-md-12 col-sm-12 col-xs-12 page-main-heading">
				<div class="col-md-6 col-sm-6 col-xs-12 heading">
					<h1>USBridge Information<h1>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 info">
					<div class="date"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php echo $current_date ; ?></div>
					<!-- <div class="time"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php echo $current_time; ?></div> -->
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
				<div class=" ">
					  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  	<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero system-settings">
						    <div class="panel panel-default">
						      <div class="panel-heading" role="tab" id="headingOne">
						        <h4 class="panel-title">
						        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          System settings
						        </a>
						      </h4>
						      </div>
						      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						        <div class="panel-body">
						          	<ul id="content">
						          		<li><label>IP</label><span><?php echo $ipaddress; ?></span></li>
						          		<li><label>Hostname</label><span><?php echo strtoupper($hostName); ?></span></li>
						          		<li><label>Soundcard</label><span><?php echo strtoupper($soundCard); ?></span></li>
						          	</ul>
						        </div>
						        <div class="edit-option">
						        	<a href="{{url('/user/system_settings')}}">edit</a>
						        </div>
						      </div>
						    </div>
						</div>	    
					    <div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero two-boxes">
					    	<div class="col-md-6 col-sm-6 col-xs-12 left">
							    <div class="panel panel-default">
							      <div class="panel-heading" role="tab" id="headingTwo">
							        <h4 class="panel-title">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							          MPD
							        </a>
							      </h4>
							      </div>
							      <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
							        <div class="panel-body">
							         <ul id="content2">
						          		<li><label>IP</label><span class="red-text"><?php echo $ipAddress; ?></span></li>
						          		<li><label>Hostname</label><span><?php echo strtoupper($hostName); ?></span></li>
						          		<li><label>Soundcard</label><span class="green-text"><?php echo strtoupper($soundCard); ?></span></li>
						          	</ul>
							        </div>
							        <div class="edit-option">
						        		<a href="{{url('/user/mpd_settings')}}">edit</a>
						        	</div>
							      </div>
							    </div>
						    </div>
						    <div class="col-md-6 col-sm-6 col-xs-12 right">
							    <div class="panel panel-default">
								      <div class="panel-heading" role="tab" id="headingThree">
								        <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
								          roon
								        </a>
								      </h4>
								      </div>
								      <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
								        <div class="panel-body">
								         <ul id="content3">
							          		<li><label>IP</label><span><?php echo $ipAddress; ?></span></li>
							          		<li><label>Hostname</label><span class="green-text"><?php echo strtoupper($hostName); ?></span></li>
							          		<li><label>Soundcard</label><span class="red-text"><?php echo strtoupper($soundCard); ?></span></li>
							          	</ul>
								        </div>
								        <div class="edit-option">
								        	<a href="#">edit</a>
								        </div>
								      </div>
								</div>
							</div>	
					    </div>

					     <div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero two-boxes">
					    	<div class="col-md-6 col-sm-6 col-xs-12 left">
							    <div class="panel panel-default">
							      <div class="panel-heading" role="tab" id="headingFour">
							        <h4 class="panel-title">
							        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
							        Daemon Settings
							        </a>
							      </h4>
							      </div>
							      <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
							        <div class="panel-body">
							         <ul id="content2">
						          		<li><label>IP</label><span class="red-text"><?php echo $ipAddress; ?></span></li>
						          		<li><label>Hostname</label><span><?php echo strtoupper($hostName); ?></span></li>
						          		<li><label>Soundcard</label><span class="green-text"><?php echo strtoupper($soundCard); ?></span></li>
						          	</ul>
							        </div>
							        <div class="edit-option">
						        	
						        	<a href="">edit</a>
						        </div>
							      </div>
							    </div>
						    </div>
						    <div class="col-md-6 col-sm-6 col-xs-12 right">
							    <div class="panel panel-default">
								      <div class="panel-heading" role="tab" id="headingFive">
								        <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
								         WiFi Hotspot Settings
								        </a>
								      </h4>
								      </div>
								      <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
								        <div class="panel-body">
								         <ul id="content3">
							          		<li><label>IP</label><span><?php echo $ipAddress; ?></span></li>
							          		<li><label>Hostname</label><span class="green-text"><?php echo strtoupper($hostName); ?></span></li>
							          		<li><label>Soundcard</label><span class="red-text"><?php echo strtoupper($soundCard); ?></span></li>
							          	</ul>
								        </div>
								        <div class="edit-option">
								        	<a href="#">edit</a>
								        </div>
								      </div>
								</div>
							</div>	
					    </div>
					  </div>
					</div>
			</div>
		</div>

@endsection