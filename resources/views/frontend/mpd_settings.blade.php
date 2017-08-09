@extends('layouts.app')

@section('title', 'MPD SETTINGS')

@section('content')

<?php if($soxr_status == 1) {
	$soxr_status = "Active";
} else {
	$soxr_status = "Inactive";
} ?>

<div class="outr-cont">
	<div class="container">
		<div class="cont">
			<div class="col-md-12 col-sm-12 col-xs-12 page-main-heading">
				<div class="col-md-6 col-sm-6 col-xs-12 heading">
					<h1>MPD Settings<h1>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 info">
					<div class="date"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php echo $current_date ; ?></div>
					<!-- <div class="time"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php //echo $current_time; ?></div> -->
				</div>
			</div>
			<form id = "mpd_settings" method="post" action="{{ url('user/changeMpdSettings') }}">
				{{ csrf_field() }}
				<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
					<a href="{{url('/')}}" class="back_link">
						<span class="fa fa-long-arrow-left" aria-hidden="true"></span>Back
					</a>
					<div class=" ">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">
							
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Servicestatus">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseServicestatus" aria-expanded="true" aria-controls="collapseServicestatus">
												Service status/control
											</a>
										</h4>
									</div>
									
									<div id="collapseServicestatus" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Servicestatus">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Status</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<div class="switch">
														<label class="switch-light" onclick="">
															<input type="checkbox" id = "chk" name = "mpdStatus">
																<span>
																	<span>Active</span>
																	<span>Inactive</span>
																</span>
															<a class="btn btn-primary"></a>
														</label>
														<!-- <input type="checkbox" name="my-checkbox" checked> -->
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>MPD Enable / Disable</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<div class="switch">
														<label class="switch-light" onclick="">
															<input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
															<input type="checkbox" id = "mpd" name = "mpd">
															<span>
																<span id = "mpd_enable" value ="Active">Enable</span>
																<span id = "mpd_disable" value ="Inactive">Disable</span>
															</span>
															<a class="btn btn-primary"></a>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="WebInterface">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseWebInterface" aria-expanded="true" aria-controls="collapseWebInterface">
												Access MPD web interface
											</a>
										</h4>
									</div>
									<div id="collapseWebInterface" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="WebInterface">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>URL Link</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<a href='#' class="input_link" '_blank'>
														<?php echo "http://$ipaddress/ompd"; ?>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Outputoption">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOutputoption" aria-expanded="true" aria-controls="collapseOutputoption">
												Output options ( Soxr resampling )
											</a>
										</h4>
									</div>
									<div id="collapseOutputoption" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Outputoption">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>SOXR</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<div class="switch">
														<label class="switch-light" onclick="">
															<input type="checkbox" id = "soxr_status" name = "soxrStatus">
															<span>
																<span>Enable</span>
																<span>Disable</span>
															</span>
															<a class="btn btn-primary"></a>
														</label>
													</div>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>SOXR Quality</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<?php 
														if(strstr($soxrQuality, "very high")) {
															$soxrQuality = "1";
														} elseif(strstr($soxrQuality, "high")) {
															$soxrQuality = "2";
														} elseif(strstr($soxrQuality, "low")) {
															$soxrQuality = "3";
														} else {
															$soxrQuality = "0";
														}
														//print_r($soxrQuality);die;
													?>
													<select class="form-control" name = "soxrQuality">
														<option value ="">Select</option>
														<option value = "<?php if($soxrQuality == 1) { ?>" selected = "selected" "<?php } ?>">Very High</option>
														<option value = "<?php if($soxrQuality == 2) { ?>" selected = "selected" "<?php } ?>">High</option>
														<option value = "<?php if($soxrQuality == 3) { ?>" selected = "selected" "<?php } ?>">Low</option>
													</select>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Restart Service<small>( To apply setting )</small></label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control" name ="soxrRestart">
														<option value ="">Select</option>
														<option>Restart</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="OutputFrequency">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOutputFrequency" aria-expanded="true" aria-controls="collapseOutputFrequency">
												Output Frequency / Bit Depth
											</a>
										</h4>
									</div>
									<div id="collapseOutputFrequency" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="OutputFrequency">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Frequency</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control" name = "frequency">
														<option value = "">Select</option>
														<option value = "<?php if($outputFrequencies == 384000) { ?>" selected = "selected" "<?php } ?>">384000</option>
														<option value = "<?php if($outputFrequencies == 352800) { ?>" selected = "selected" "<?php } ?>">352800</option>
														<option value = "<?php if($outputFrequencies == 192000) { ?>" selected = "selected" "<?php } ?>">192000</option>
														<option value = "<?php if($outputFrequencies == 96000) { ?>" selected = "selected" "<?php } ?>">96000</option>
														<option value = "<?php if($outputFrequencies == 88200) { ?>" selected = "selected" "<?php } ?>">88200</option>
														<option value = "<?php if($outputFrequencies == 64000) { ?>" selected = "selected" "<?php } ?>">64000</option>
														<option value = "<?php if($outputFrequencies == 48000) { ?>" selected = "selected" "<?php } ?>">48000</option>
														<option value = "<?php if($outputFrequencies == 44100) { ?>" selected = "selected" "<?php } ?>">44100</option>
													</select>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Output Bit Depth</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control" name = "bitDepth">
														<option value = "">Select</option>
														<option value = "<?php if($bitDepth == 32) { ?>" selected = "selected" "<?php } ?>">32</option>
														<option value = "<?php if($bitDepth == 24) { ?>" selected = "selected" "<?php } ?>">24</option>
														<option value = "<?php if($bitDepth == 16) { ?>" selected = "selected" "<?php } ?>">16</option>
													</select>
												</div>
											</div>
											
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Restart Service<small>( To apply setting )</small></label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control" name = "frequencyRestart">
														<option value = "">Select</option>
														<option>Restart</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	    
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 bottom_btn">
					<button class="btn white_btn" id = "sve-chngs">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		
		var mpd_status = "<?php echo $mpd_status ?>";
		var _token = $('.token').val();
		var soxrStatus = "<?php echo $soxr_status ?>";
		if((mpd_status)=='Inactive') { 
			$('#chk').prop('checked',true);
			$('#mpd').prop('checked',true);
		}

		if(soxrStatus=='Inactive'){
			$('#soxr_status').prop('checked',true);
		}

		$("#mpd").click(function () {
		    if ($("#mpd").is(':checked')) {
		        $("#chk").each(function () {
		            $(this).prop("checked", true);
		        });

		    } else {
	            $("#chk").prop("checked", false);
		    }
		});
	});

	$('#sve-chngs').on('click',function() {
		$("#mpd_settings").validate({
	        rules: {
	            soxrRestart: "required",
	            frequencyRestart: "required",
	        },

	        messages: {
	            soxrRestart: "Please select restart to apply the changes!",
	            frequencyRestart: "Please select restart to apply the changes!",
	        },
	         
	        submitHandler: function(form){
	        	form.submit();
	        }
	    });
	});
			
</script>
@endsection