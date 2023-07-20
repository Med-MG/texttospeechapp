

<?php $__env->startSection('css'); ?>
	<!-- Data Table CSS -->
	<link href="<?php echo e(URL::asset('plugins/awselect/awselect.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0"><?php echo e(__('TTS Configuration')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-wand-sparkles mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.tts.dashboard')); ?>"> <?php echo e(__('TTS Management')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> <?php echo e(__('TTS Configuration')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
	<!-- ALL CSP CONFIGURATIONS -->					
	<div class="row">
		<div class="col-lg-8 col-md-12 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title"><?php echo e(__('Setup TTS Configuration')); ?></h3>
				</div>
				<div class="card-body">

					<!-- TTS SETTINGS FORM -->					
					<form action="<?php echo e(route('admin.tts.configs.store')); ?>" method="POST" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>
						
						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12">
								<!-- LANGUAGE -->
								<div class="input-box">	
									<h6><?php echo e(__('Default Language')); ?></h6>
			  						<select id="languages" name="language" data-placeholder="Select Default Language:" data-callback="language_select">			
										<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($language->language_code); ?>" data-img="<?php echo e(URL::asset($language->language_flag)); ?>" <?php if(config('tts.default_language') == $language->language_code): ?> selected <?php endif; ?>> <?php echo e($language->language); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div> <!-- END LANGUAGE -->							
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<!-- VOICE -->
								<div class="input-box">	
									<h6><?php echo e(__('Default Voice')); ?></h6>
			  						<select id="voices" name="voice" data-placeholder="Select Default Voice:" data-callback="default_voice">			
										<?php $__currentLoopData = $voices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($voice->voice_id); ?>" 	
												data-img="<?php echo e(URL::asset($voice->avatar_url)); ?>"										
												data-id="<?php echo e($voice->voice_id); ?>" 
												data-lang="<?php echo e($voice->language_code); ?>" 
												data-type="<?php echo e($voice->voice_type); ?>"
												data-gender="<?php echo e($voice->gender); ?>"
												<?php if(config('tts.default_voice') == $voice->voice_id): ?> selected <?php endif; ?>
												data-class="<?php if(config('tts.default_language') !== $voice->language_code): ?> remove-voice <?php endif; ?>"> 
												<?php echo e($voice->voice); ?>  														
											</option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div> <!-- END VOICE -->							
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<!-- VOICE TYPES -->
								<div class="input-box">	
									<h6><?php echo e(__('Voice Types')); ?></h6>
			  						<select id="set-voice-types" name="set-voice-types" data-placeholder="<?php echo e(__('Select Available Voice Types')); ?>:">			
										<option value="standard" <?php if( config('tts.voice_type')  == 'standard'): ?> selected <?php endif; ?>><?php echo e(__('Only Standard Voices')); ?></option>
										<option value="neural" <?php if( config('tts.voice_type')  == 'neural'): ?> selected <?php endif; ?>><?php echo e(__('Only Neural Voices')); ?></option>
										<option value="both" <?php if( config('tts.voice_type')  == 'both'): ?> selected <?php endif; ?>><?php echo e(__('Both (Standard and Neural)')); ?></option>
									</select>
								</div> <!-- END VOICE TYPES -->							
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<!-- EFFECTS -->
								<div class="input-box">	
									<h6><?php echo e(__('SSML Effects')); ?></h6>
			  						<select id="set-ssml-effects" name="set-ssml-effects" data-placeholder="<?php echo e(__('Configure SSML Effects')); ?>:">			
										<option value="enable" <?php if( config('tts.ssml_effect')  == 'enable'): ?> selected <?php endif; ?>><?php echo e(__('Enable All')); ?></option>
										<option value="disable" <?php if( config('tts.ssml_effect')  == 'disable'): ?> selected <?php endif; ?>><?php echo e(__('Disable All')); ?></option>
									</select>
								</div> <!-- END EFFECTS -->							
							</div>
						
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<!-- STORAGE OPTION -->
								<div class="input-box">	
									<h6><?php echo e(__('Default Storage Option')); ?></h6>
			  						<select id="set-storage-option" name="set-storage-option" data-placeholder="<?php echo e(__('Select Default Main Storage')); ?>:">			
										<option value="local" <?php if( config('tts.default_storage')  == 'local'): ?> selected <?php endif; ?>><?php echo e(__('Local Server Storage')); ?></option>
										<option value="s3" <?php if( config('tts.default_storage')  == 's3'): ?> selected <?php endif; ?>>Amazon S3 Bucket</option>
										<option value="wasabi" <?php if( config('tts.default_storage')  == 'wasabi'): ?> selected <?php endif; ?>>Wasabi Bucket</option>
									</select>
								</div> <!-- END STORAGE OPTION -->							
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<!-- STORAGE OPTION -->
								<div class="input-box">	
									<h6><?php echo e(__('Auto Clean Local Stored Files')); ?></h6>
			  						<select id="set-storage-clean" name="set-storage-clean" data-placeholder="<?php echo e(__('Set Default Local Storage Clean Up Duration')); ?>:">	
										<option value="never" <?php if( config('tts.clean_storage')  == 'never'): ?> selected <?php endif; ?>><?php echo e(__('Never Delete')); ?></option>		
										<option value="1" <?php if( config('tts.clean_storage')  == '1'): ?> selected <?php endif; ?>><?php echo e(__('Delete Files 1 Day Old')); ?></option>
										<option value="7" <?php if( config('tts.clean_storage')  == '7'): ?> selected <?php endif; ?>><?php echo e(__('Delete Files 1 Week Old')); ?></option>
										<option value="14" <?php if( config('tts.clean_storage')  == '14'): ?> selected <?php endif; ?>><?php echo e(__('Delete Files 2 Weeks Old')); ?></option>
										<option value="21" <?php if( config('tts.clean_storage')  == '21'): ?> selected <?php endif; ?>><?php echo e(__('Delete Files 3 Weeks Old')); ?></option>
										<option value="30" <?php if( config('tts.clean_storage')  == '30'): ?> selected <?php endif; ?>><?php echo e(__('Delete Files 1 Month Old')); ?></option>
										<option value="180" <?php if( config('tts.clean_storage')  == '180'): ?> selected <?php endif; ?>><?php echo e(__('Delete Files 6 Months Old')); ?></option>
										<option value="365" <?php if( config('tts.clean_storage')  == '365'): ?> selected <?php endif; ?>><?php echo e(__('Delete Files 1 Year Old')); ?></option>										
									</select>
								</div> <!-- END STORAGE OPTION -->							
							</div>
						</div>

						<div class="row">							
							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">	
									<h6><?php echo e(__('Cloud Vendor Logos')); ?> <span class="text-muted">(<?php echo e(__('Only for User Panel and Voice Samples')); ?>)</span></h6>
			  						<select id="vendor-logo" name="vendor-logo" data-placeholder="<?php echo e(__('Show or Hide Vendor Logos on User side')); ?>:">			
										<option value="show" <?php if( config('tts.vendor_logos')  == 'show'): ?> selected <?php endif; ?>><?php echo e(__('Show')); ?></option>
										<option value="hide" <?php if( config('tts.vendor_logos')  == 'hide'): ?> selected <?php endif; ?>><?php echo e(__('Hide')); ?></option>
									</select>
								</div> 						
							</div>	
							
							<div class="col-lg-6 col-md-6 col-sm-12">							
								<div class="input-box">	
									<h6><?php echo e(__('Allow Listen Mode Results Download')); ?> <span class="text-muted">(<?php echo e(__('Only for Registered Users')); ?>)</span></h6>
			  						<select id="listen-download" name="listen-download" data-placeholder="<?php echo e(__('Enable/Disable Listen Mode Results Download')); ?>:">			
										<option value="enable" <?php if( config('tts.listen_download')  == 'enable'): ?> selected <?php endif; ?>><?php echo e(__('Enable')); ?></option>
										<option value="disable" <?php if( config('tts.listen_download')  == 'disable'): ?> selected <?php endif; ?>><?php echo e(__('Disable')); ?></option>
									</select>
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<!-- MAX CHARACTERS -->
								<div class="input-box">								
									<h6><?php echo e(__('Maximum Characters Synthesize Limit')); ?> <span class="text-muted">(<?php echo e(__('For Admin & Subscriber Groups')); ?>)</span><i class="ml-2 fa fa-info info-notification" data-tippy-content="<?php echo e(__('Maximum supported characters per single synthesize task is up to 60000 characters. Each voice (textarea) has a limitation of up to 3000 characters, and you can combine up to 20 voices in a single task (20 voices x 3000 textarea limit = 60000)')); ?>."></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control <?php $__errorArgs = ['set-max-chars'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="set-max-chars" name="set-max-chars" placeholder="Ex: 3000" value="<?php echo e(config('tts.max_chars_limit')); ?>" required>
										<?php $__errorArgs = ['set-max-chars'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<p class="text-danger"><?php echo e($errors->first('set-max-chars')); ?></p>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div> 
								</div> <!-- END MAX CHARACTERS -->							
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="input-box">								
									<h6><?php echo e(__('Maximum Voice Limit')); ?> <span class="text-muted">(<?php echo e(__('For Admin & Subscriber Groups')); ?>)</span><i class="ml-2 fa fa-info info-notification" data-tippy-content="<?php echo e(__('You can mix up to 20 different voices in a single synthesize task. Each voice can synthesize up to 3K characters, total characters can not exceed the limit set by Maximum Characters Synthesize Limit field.')); ?>"></i></h6>
									<div class="form-group">							    
										<input type="text" class="form-control <?php $__errorArgs = ['set-max-voices'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="set-max-voices" name="set-max-voices" placeholder="Ex: 5" value="<?php echo e(config('tts.max_voice_limit')); ?>" required>
										<?php $__errorArgs = ['set-max-voices'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<p class="text-danger"><?php echo e($errors->first('set-max-voices')); ?></p>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
									</div> 
								</div>							
							</div>
						</div>


						<div class="card border-0 special-shadow mb-7">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa fa-gift text-info fs-14 mr-2"></i><?php echo e(__('Free Tier Options')); ?> <span class="text-muted">(<?php echo e(__('User Group')); ?>)</span></h6>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">	
										<!-- FREE TIER DEMO LIMIT -->
										<div class="input-box">								
											<h6><?php echo e(__('Free Welcome Characters')); ?> <span class="text-muted">(<?php echo e(__('Per New Registered User')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-free-chars'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="set-free-chars" name="set-free-chars" placeholder="Ex: 2000" value="<?php echo e(config('tts.free_chars')); ?>" required>
												<?php $__errorArgs = ['set-free-chars'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-free-chars')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END FREE TIER DEMO LIMIT -->							
									</div>	
									
									<div class="col-lg-6 col-md-6 col-sm-12">	
										<!-- FREE TIER CHAR LIMIT -->
										<div class="input-box">								
											<h6><?php echo e(__('Maximum Characters Synthesize Limit')); ?> <span class="text-muted">(<?php echo e(__('For User Group')); ?>)</span><i class="ml-2 fa fa-info info-notification" data-tippy-content="Maximum supported characters per single synthesize task is up to 60000 characters. Each voice (textarea) has a limitation of up to 3000 characters, and you can combine up to 20 voices in a single task (20 voices x 3000 textarea limit = 60000)."></i></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['free-tier-limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="free-tier-limit" name="free-tier-limit" placeholder="Ex: 2000" value="<?php echo e(config('tts.free_chars_limit')); ?>" required>
												<?php $__errorArgs = ['free-tier-limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('free-tier-limit')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END FREE TIER CHAR LIMIT -->							
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- FREE TIER USER NEURAL VOICE -->
										<div class="input-box">								
											<h6><?php echo e(__('Neural Voices')); ?> <span class="text-muted">(<?php echo e(__('For User Group')); ?>)</span></h6>
											<div class="form-group">							    
												<select id="free-tier-neural" name="free-tier-neural" data-placeholder="<?php echo e(__('Allow Neural Voices for Free Tier Users')); ?>">			
													<option value="enable" <?php if( config('tts.user_neural')  == 'enable'): ?> selected <?php endif; ?>><?php echo e(__('Enable')); ?></option>
													<option value="disable" <?php if( config('tts.user_neural')  == 'disable'): ?> selected <?php endif; ?>><?php echo e(__('Disable')); ?></option>
												</select>
											</div> 
										</div> <!-- END FREE TIER USER NEURAL VOICE -->							
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">								
											<h6><?php echo e(__('Maximum Voice Limit')); ?> <span class="text-muted">(<?php echo e(__('For User Groups')); ?>)</span><i class="ml-2 fa fa-info info-notification" data-tippy-content="<?php echo e(__('You can mix up to 20 different voices in a single synthesize task. Each voice can synthesize up to 3K characters, total characters can not exceed the limit set by Maximum Characters Synthesize Limit field.')); ?>"></i></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-max-voices-user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="set-max-voices-user" name="set-max-voices-user" placeholder="Ex: 5" value="<?php echo e(config('tts.max_voice_limit_user')); ?>" required>
												<?php $__errorArgs = ['set-max-voices-user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-max-voices-user')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div>							
									</div>
								</div>	
							</div>
						</div>


						<div class="card border-0 special-shadow mb-7">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa fa-music text-info fs-14 mr-2"></i><?php echo e(__('Frontend Live Synthesize Feature')); ?></h6>

								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="enable-listen" class="custom-switch-input" <?php if( config('tts.frontend.status')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
									</label>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">													
										<div class="input-box">								
											<h6><?php echo e(__('Maximum Character Limit')); ?> <span class="text-muted">(<?php echo e(__('Admin characters used')); ?>)</span></h6>
											<div class="form-group">							    
												<input type="number" class="form-control <?php $__errorArgs = ['limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="limit" name="limit" value="<?php echo e(config('tts.frontend.max_chars')); ?>" autocomplete="off">
												<?php $__errorArgs = ['limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('limit')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<div class="input-box">	
											<h6><?php echo e(__('Allow Neural Voices')); ?></h6>
											  <select id="set-neurals" name="neural" data-placeholder="<?php echo e(__('Allow Neural Voices')); ?>:">			
												<option value="enable" <?php if( config('tts.frontend.neural')  == 'enable'): ?> selected <?php endif; ?>><?php echo e(__('Enable')); ?></option>
												<option value="disable" <?php if( config('tts.frontend.neural')  == 'disable'): ?> selected <?php endif; ?>><?php echo e(__('Disable')); ?></option>
											</select>
										</div> 						
									</div>								
								</div>
	
							</div>
						</div>


						<div class="card border-0 special-shadow">							
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-4"><img src="<?php echo e(URL::asset('img/csp/wasabi-sm.png')); ?>" class="fw-2 mr-2" alt=""><?php echo e(__('Wasabi Storage Settings')); ?></h6>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Wasabi Access Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-wasabi-access-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="wasabi-access-key" name="set-wasabi-access-key" value="<?php echo e(config('services.wasabi.key')); ?>" autocomplete="off">
												<?php $__errorArgs = ['set-wasabi-access-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-wasabi-access-key')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- SECRET ACCESS KEY -->
										<div class="input-box">								
											<h6>Wasabi Secret Access Key</h6> 
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-wasabi-secret-access-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="wasabi-secret-access-key" name="set-wasabi-secret-access-key" value="<?php echo e(config('services.wasabi.secret')); ?>" autocomplete="off">
												<?php $__errorArgs = ['set-wasabi-secret-access-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-wasabi-secret-access-key')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END SECRET ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Wasabi Bucket Name</small></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-wasabi-bucket'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="wasabi-bucket" name="set-wasabi-bucket" value="<?php echo e(config('services.wasabi.bucket')); ?>" autocomplete="off">
												<?php $__errorArgs = ['set-wasabi-bucket'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-wasabi-bucket')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- WASABI REGION -->
										<div class="input-box">	
											<h6>Set Wasabi Region</h6>
											  <select id="set-wasabi-region" name="set-wasabi-region" data-placeholder="Select Default Wasabi Region:">			
												<option value="us-east-1" <?php if(config('services.wasabi.region') == 'us-east-1'): ?> selected <?php endif; ?>>Wasabi US East 1 (N. Virginia) us-east-1</option>
												<option value="us-east-2" <?php if(config('services.wasabi.region') == 'us-east-2'): ?> selected <?php endif; ?>>Wasabi US East 2 (N. Virginia) us-east-2</option>
												<option value="us-central-1" <?php if(config('services.wasabi.region') == 'us-central-1'): ?> selected <?php endif; ?>>Wasabi Central 1 (Texas) us-central-1</option>
												<option value="us-west-1" <?php if(config('services.wasabi.region') == 'us-west-1'): ?> selected <?php endif; ?>>Wasabi US West 1 (Oregon) us-west-1</option>
												<option value="eu-central-1" <?php if(config('services.wasabi.region') == 'eu-central-1'): ?> selected <?php endif; ?>>Wasabi EU Central 1 (Amsterdam) eu-central-1</option>
												<option value="ap-northeast-1" <?php if(config('services.wasabi.region') == 'ap-northeast-1'): ?> selected <?php endif; ?>>Wasabi AP Northeast 1 (Tokyo) ap-northeast-1 (Only for Japan)</option>
											</select>
										</div> <!-- END WASABI REGION -->									
									</div>									
		
								</div>
	
							</div>
						</div>	
						

						<div class="card border-0 special-shadow">							
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-4"><img src="<?php echo e(URL::asset('img/csp/aws-sm.png')); ?>" class="fw-2 mr-2" alt="">Amazon Web Services</h6>
								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="enable-aws" class="custom-switch-input" <?php if( config('tts.enable.aws')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Use AWS')); ?></span>
									</label>
								</div>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-aws-standard" class="custom-switch-input" <?php if(config('tts.enable.aws_standard')  == 'on'): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable Standard Voices')); ?></span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-aws-neural" class="custom-switch-input" <?php if(config('tts.enable.aws_neural')  == 'on'): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable Neural Voices')); ?></span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>AWS Access Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-aws-access-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="aws-access-key" name="set-aws-access-key" value="<?php echo e(config('services.aws.key')); ?>" autocomplete="off">
												<?php $__errorArgs = ['set-aws-access-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-aws-access-key')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- SECRET ACCESS KEY -->
										<div class="input-box">								
											<h6>AWS Secret Access Key</h6> 
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-aws-secret-access-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="aws-secret-access-key" name="set-aws-secret-access-key" value="<?php echo e(config('services.aws.secret')); ?>" autocomplete="off">
												<?php $__errorArgs = ['set-aws-secret-access-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-aws-secret-access-key')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END SECRET ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Amazon S3 Bucket Name</small></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-aws-bucket'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="aws-bucket" name="set-aws-bucket" value="<?php echo e(config('services.aws.bucket')); ?>" autocomplete="off">
												<?php $__errorArgs = ['set-aws-bucket'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-aws-bucket')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- AWS REGION -->
										<div class="input-box">	
											<h6>Set AWS Region</h6>
											  <select id="set-aws-region" name="set-aws-region" data-placeholder="Select Default AWS Region:">			
												<option value="us-east-1" <?php if( config('services.aws.region')  == 'us-east-1'): ?> selected <?php endif; ?>>US East (N. Virginia) us-east-1</option>
												<option value="us-east-2" <?php if( config('services.aws.region')  == 'us-east-2'): ?> selected <?php endif; ?>>US East (Ohio) us-east-2</option>
												<option value="us-west-1" <?php if( config('services.aws.region')  == 'us-west-1'): ?> selected <?php endif; ?>>US West (N. California) us-west-1</option>
												<option value="us-west-2" <?php if( config('services.aws.region')  == 'us-west-2'): ?> selected <?php endif; ?>>US West (Oregon) us-west-2</option>
												<option value="ap-east-1" <?php if( config('services.aws.region')  == 'ap-east-1'): ?> selected <?php endif; ?>>Asia Pacific (Hong Kong) ap-east-1</option>
												<option value="ap-south-1" <?php if( config('services.aws.region')  == 'ap-south-1'): ?> selected <?php endif; ?>>Asia Pacific (Mumbai) ap-south-1</option>
												<option value="ap-northeast-3" <?php if( config('services.aws.region')  == 'ap-northeast-3'): ?> selected <?php endif; ?>>Asia Pacific (Osaka-Local) ap-northeast-3</option>
												<option value="ap-northeast-2" <?php if( config('services.aws.region')  == 'ap-northeast-2'): ?> selected <?php endif; ?>>Asia Pacific (Seoul) ap-northeast-2</option>
												<option value="ap-southeast-1" <?php if( config('services.aws.region')  == 'ap-southeast-1'): ?> selected <?php endif; ?>>Asia Pacific (Singapore) ap-southeast-1</option>
												<option value="ap-southeast-2" <?php if( config('services.aws.region')  == 'ap-southeast-2'): ?> selected <?php endif; ?>>Asia Pacific (Sydney) ap-southeast-2</option>
												<option value="ap-northeast-1" <?php if( config('services.aws.region')  == 'ap-northeast-1'): ?> selected <?php endif; ?>>Asia Pacific (Tokyo) ap-northeast-1</option>
												<option value="eu-central-1" <?php if( config('services.aws.region')  == 'eu-central-1'): ?> selected <?php endif; ?>>Europe (Frankfurt) eu-central-1</option>
												<option value="eu-west-1" <?php if( config('services.aws.region')  == 'eu-west-1'): ?> selected <?php endif; ?>>Europe (Ireland) eu-west-1</option>
												<option value="eu-west-2" <?php if( config('services.aws.region')  == 'eu-west-2'): ?> selected <?php endif; ?>>Europe (London) eu-west-2</option>
												<option value="eu-south-1" <?php if( config('services.aws.region')  == 'eu-south-1'): ?> selected <?php endif; ?>>Europe (Milan) eu-south-1</option>
												<option value="eu-west-3" <?php if( config('services.aws.region')  == 'eu-west-3'): ?> selected <?php endif; ?>>Europe (Paris) eu-west-3</option>
												<option value="eu-north-1" <?php if( config('services.aws.region')  == 'eu-north-1'): ?> selected <?php endif; ?>>Europe (Stockholm) eu-north-1</option>
												<option value="me-south-1" <?php if( config('services.aws.region')  == 'me-south-1'): ?> selected <?php endif; ?>>Middle East (Bahrain) me-south-1</option>
												<option value="sa-east-1" <?php if( config('services.aws.region')  == 'sa-east-1'): ?> selected <?php endif; ?>>South America (São Paulo) sa-east-1</option>
												<option value="ca-central-1" <?php if( config('services.aws.region')  == 'ca-central-1'): ?> selected <?php endif; ?>>Canada (Central) ca-central-1</option>
												<option value="af-south-1" <?php if( config('services.aws.region')  == 'af-south-1'): ?> selected <?php endif; ?>>Africa (Cape Town) af-south-1</option>
											</select>
										</div> <!-- END AWS REGION -->									
									</div>									
		
								</div>
	
							</div>
						</div>	


						<div class="card border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><img src="<?php echo e(URL::asset('img/csp/azure-sm.png')); ?>" class="fw-2 mr-2" alt="">Azure Settings</h6>

								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="enable-azure" class="custom-switch-input" <?php if( config('tts.enable.azure')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Use Azure')); ?></span>
									</label>
								</div>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-azure-standard" class="custom-switch-input" <?php if(config('tts.enable.azure_standard')  == 'on'): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable Standard Voices')); ?></span><i class="ml-2 fa fa-info info-notification" data-tippy-content="<?php echo e(__('If you were not using Azure Text to Speech before 31st of August 2021, you can go ahead and disable it as Azure will not allow you to use any of the Standard Voices anymore. If you have been using it before, then all Standard Voices are available for your Azure Account until 31st of August 2024')); ?>."></i>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-azure-neural" class="custom-switch-input" <?php if(config('tts.enable.azure_neural')  == 'on'): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable Neural Voices')); ?></span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>Azure Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['set-azure-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="set-azure-key" name="set-azure-key" value="<?php echo e(config('services.azure.key')); ?>" autocomplete="off">
												<?php $__errorArgs = ['set-azure-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('set-azure-key')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- AZURE REGION -->
										<div class="input-box">	
											<h6>Azure Region</h6>
											  <select id="set-azure-region" name="set-azure-region" data-placeholder="Select Azure Region:">			
												<option value="australiaeast" <?php if( config('services.azure.region')  == 'australiaeast'): ?> selected <?php endif; ?>>Australia East (australiaeast)</option>
												<option value="brazilsouth" <?php if( config('services.azure.region')  == 'brazilsouth'): ?> selected <?php endif; ?>>Brazil South (brazilsouth)</option>
												<option value="canadacentral" <?php if( config('services.azure.region')  == 'canadacentral'): ?> selected <?php endif; ?>>Canada Central (canadacentral)</option>
												<option value="centralus" <?php if( config('services.azure.region')  == 'centralus'): ?> selected <?php endif; ?>>Central US (centralus)</option>
												<option value="eastasia" <?php if( config('services.azure.region')  == 'eastasia'): ?> selected <?php endif; ?>>East Asia (eastasia)</option>
												<option value="eastus" <?php if( config('services.azure.region')  == 'eastus'): ?> selected <?php endif; ?>>East US (eastus)</option>
												<option value="eastus2" <?php if( config('services.azure.region')  == 'eastus2'): ?> selected <?php endif; ?>>East US 2 (eastus2)</option>
												<option value="francecentral" <?php if( config('services.azure.region')  == 'francecentral'): ?> selected <?php endif; ?>>France Central (francecentral)</option>
												<option value="centralindia" <?php if( config('services.azure.region')  == 'centralindia'): ?> selected <?php endif; ?>>India Central (centralindia)</option>
												<option value="japaneast" <?php if( config('services.azure.region')  == 'japaneast'): ?> selected <?php endif; ?>>Japan East (japaneast)</option>
												<option value="japanwest" <?php if( config('services.azure.region')  == 'japanwest'): ?> selected <?php endif; ?>>Japan West (japanwest)</option>
												<option value="koreacentral" <?php if( config('services.azure.region')  == 'koreacentral'): ?> selected <?php endif; ?>>Korea Central (koreacentral)</option>
												<option value="northcentralus" <?php if( config('services.azure.region')  == 'northcentralus'): ?> selected <?php endif; ?>>North Central US (northcentralus)</option>
												<option value="northeurope" <?php if( config('services.azure.region')  == 'northeurope'): ?> selected <?php endif; ?>>North Europe (northeurope)</option>
												<option value="southcentralus" <?php if( config('services.azure.region')  == 'southcentralus'): ?> selected <?php endif; ?>>South Central US (southcentralus)</option>
												<option value="southeastasia" <?php if( config('services.azure.region')  == 'southeastasia'): ?> selected <?php endif; ?>>Southeast Asia (southeastasia)</option>
												<option value="uksouth" <?php if( config('services.azure.region')  == 'uksouth'): ?> selected <?php endif; ?>>UK South (uksouth)</option>
												<option value="westcentralus" <?php if( config('services.azure.region')  == 'westcentralus'): ?> selected <?php endif; ?>>West Central US (westcentralus)</option>
												<option value="westeurope" <?php if( config('services.azure.region')  == 'westeurope'): ?> selected <?php endif; ?>>West Europe (westeurope)</option>
												<option value="westus" <?php if( config('services.azure.region')  == 'westus'): ?> selected <?php endif; ?>>West US (westus)</option>
												<option value="westus2" <?php if( config('services.azure.region')  == 'westus2'): ?> selected <?php endif; ?>>West US 2 (westus2)</option>
											</select>
										</div> <!-- END AZURE REGION -->									
									</div>

								</div>
	
							</div>
						</div>


						<div class="card overflow-hidden border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><img src="<?php echo e(URL::asset('img/csp/gcp-sm.png')); ?>" class="fw-2 mr-2" alt="">GCP Settings</h6>

								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="enable-gcp" class="custom-switch-input" <?php if( config('tts.enable.gcp')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Use GCP')); ?></span>
									</label>
								</div>

								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-gcp-standard" class="custom-switch-input" <?php if(config('tts.enable.gcp_standard')  == 'on'): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable Standard Voices')); ?></span>
											</label>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<label class="custom-switch">
												<input type="checkbox" name="enable-gcp-neural" class="custom-switch-input" <?php if(config('tts.enable.gcp_neural')  == 'on'): ?> checked <?php endif; ?>>
												<span class="custom-switch-indicator"></span>
												<span class="custom-switch-description"><?php echo e(__('Enable Neural Voices')); ?></span>
											</label>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>GCP Configuration File Path<i class="ml-2 fa fa-info info-notification" data-tippy-content="<?php echo e(__('Absolute path of your GCP Json file in your hosting. Make sure there are no spaces in the path name')); ?>."></i></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['gcp-configuration-path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gcp-configuration-path" name="gcp-configuration-path" value="<?php echo e(config('services.gcp.key_path')); ?>" autocomplete="off">
												<?php $__errorArgs = ['gcp-configuration-path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('gcp-configuration-path')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>								
								</div>
	
							</div>
						</div>						


						<div class="card overflow-hidden border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><img src="<?php echo e(URL::asset('img/csp/ibm-sm.png')); ?>" class="fw-2 mr-2" alt="">IBM Settings</h6>

								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="enable-ibm" class="custom-switch-input" <?php if( config('tts.enable.ibm')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Use IBM')); ?></span>
									</label>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">								
										<!-- ACCESS KEY -->
										<div class="input-box">								
											<h6>IBM API Key</h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['ibm-api-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ibm-api-key" name="ibm-api-key" value="<?php echo e(config('services.ibm.api_key')); ?>" autocomplete="off">
												<?php $__errorArgs = ['ibm-api-key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('ibm-api-key')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END ACCESS KEY -->
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12">
										<!-- SECRET ACCESS KEY -->
										<div class="input-box">								
											<h6>IBM Endpoint URL</h6> 
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['ibm-endpoint-url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ibm-endpoint-url" name="ibm-endpoint-url" value="<?php echo e(config('services.ibm.endpoint_url')); ?>" autocomplete="off">
												<?php $__errorArgs = ['ibm-endpoint-url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('ibm-endpoint-url')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> <!-- END SECRET ACCESS KEY -->
									</div>								
								</div>
	
							</div>
						</div>

						<!-- SAVE CHANGES ACTION BUTTON -->
						<div class="border-0 text-right mb-2 mt-1">
							<a href="<?php echo e(route('admin.tts.dashboard')); ?>" class="btn btn-cancel mr-2"><?php echo e(__('Cancel')); ?></a>
							<button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>							
						</div>				

					</form>
					<!-- END TTS SETTINGS FORM -->
				</div>
			</div>
		</div>
	</div>
	<!-- END ALL CSP CONFIGURATIONS -->	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<!-- Awselect JS -->
	<script src="<?php echo e(URL::asset('plugins/awselect/awselect-custom.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/admin-config.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/awselect.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/admin/tts-management/configuration/index.blade.php ENDPATH**/ ?>