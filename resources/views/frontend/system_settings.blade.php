@extends('layouts.app')

@section('title', 'SYSTEM SETTINGS')

@section('content')

<div class="outr-cont">
	<div class="container">
		<div class="cont">
			<div class="col-md-12 col-sm-12 col-xs-12 page-main-heading">
				<div class="col-md-6 col-sm-6 col-xs-12 heading">
					<h1>System Settings<h1>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 info">
						<div class="date"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php echo $current_date ; ?></div>
						<div class="time"><span class="glyphicon glyphicon-time" aria-hidden="true"></span><?php echo $current_time; ?></div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12 dashbaord">
					<a href="{{url('/')}}" class="back_link">
						<span class="fa fa-long-arrow-left" aria-hidden="true"></span>Back
					</a>
					<div class=" ">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="col-md-12 col-sm-12 col-xs-12 padding-all-zero edit-settings">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="host">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseHost" aria-expanded="true" aria-controls="collapseHost">
												Host name
											</a>
										</h4>
									</div>
									<div id="collapseHost" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="host">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Host Name</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<input type="text" name="" class="form-control" value="<?php echo strtoupper($hostName); ?>">
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="network">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNetwork" aria-expanded="true" aria-controls="collapseNetwork">
												Networking options
											</a>
										</h4>
									</div>
									<div id="collapseNetwork" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="network">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Ip Address</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input faded">
													<input type="text" name="" class="form-control" value="<?php echo($ipAddress); ?>">
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>DHCP / Static IP</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control">
														<option>Select</option>
													</select>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>IP Gateway</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<input type="text" name="" class="form-control" value="<?php echo($ipGateway); ?>">
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>IP Mask</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<input type="text" name="" class="form-control" value="<?php echo($ipMask); ?>">
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>IP DNS</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<input type="text" name="" class="form-control" value="<?php echo($ipDns); ?>">
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Available STATIC IP Options</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control">
														<option>Select</option>
														<option>IP Gateway</option>
													</select>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Enable/Set STATIC IP Mode</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control">
														<option>Select</option>
														<option>Dummy text</option>
													</select>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Restart Service<small>(To apply setting)</small></label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<select class="form-control">
														<option>Select</option>
														<option>Restart</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Soundcard">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSoundcard" aria-expanded="true" aria-controls="collapseSoundcard">
												Soundcard selection
											</a>
										</h4>
									</div>
									<div id="collapseSoundcard" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Soundcard">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>SoundCard</label>
												</div>

												<div class="col-md-8 col-sm-6 col-xs-12 right-input appearance">
													<?php $str1 = 'snd-soc-allo-piano-dac';
													$str2 = 'snd-soc-allo-piano-dac-plus';
													$str3 = 'allo-cheapo-analogue';
													$str4 = 'allo-cheapo-optical';
													$str5 = 'usb-dac';
													?>
													<select class="form-control">
														<option>Select</option>
														<option value = "<?php if($soundCard == $str1) { ?>" selected ="selected" "<?php } ?>">snd-soc-allo-piano-dac</option>
														<option value = "<?php if($soundCard == $str2) { ?>" selected ="selected" "<?php } ?>">snd-soc-allo-piano-dac-plus</option>
														<option value = "<?php if($soundCard == $str3) { ?>" selected ="selected" "<?php } ?>">allo-cheapo-analogue</option>
														<option value = "<?php if($soundCard == $str4) { ?>" selected ="selected" "<?php } ?>">allo-cheapo-optical</option>
														<option value = "<?php if($soundCard == $str5) { ?>" selected ="selected" "<?php } ?>">usb-dac</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Update">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseUpdate" aria-expanded="true" aria-controls="collapseUpdate">
												Update DietPI
											</a>
										</h4>
									</div>
									<div id="collapseUpdate" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Update">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-12 col-sm-12 col-xs-12 left-label">
													<label>Updates Required</label>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 block_btns">
													<button class="btn green_btn">
														<span class="fa fa-undo" aria-hidden="true"></span>Update
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Power">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsePower" aria-expanded="true" aria-controls="collapsePower">
												Power Control
											</a>
										</h4>
									</div>
									<div id="collapsePower" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Power">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Power Off System</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<button class="btn red_btn">
														<span class="fa fa-power-off" aria-hidden="true"></span>Poweroff
													</button>
												</div>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-4 col-sm-6 col-xs-12 left-label">
													<label>Reboot System</label>
												</div>
												<div class="col-md-8 col-sm-6 col-xs-12 right-input">
													<button class="btn green_btn">
														<span class="fa fa-spinner" aria-hidden="true"></span>Reboot
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="Power">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseWeb" aria-expanded="true" aria-controls="collapseWeb">
												Web interface refresh rate
											</a>
										</h4>
									</div>
									<div id="collapseWeb" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="Web">
										<div class="panel-body">
											<div class="col-md-12 col-sm-12 col-xs-12 edit-input-row padding-all-zero">
												<div class="col-md-12 col-sm-12 col-xs-12 left-label">
													<label>Click the bar from left to right to change the refresh rate</label>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 range_bar">
													<img src="{{ asset('public/img/range.png') }}" class="img-responsive">
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
					<button class="btn white_btn">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	@endsection