

<?php $__env->startSection('css'); ?>
	<!-- Data Table CSS -->
	<link href="<?php echo e(URL::asset('plugins/awselect/awselect.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0"> <?php echo e(__('Frontend Settings')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa fa-globe mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Frontend Management')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Frontend Settings')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>					
	<div class="row">
		<div class="col-lg-6 col-md-12 col-xm-12">
			<div class="card overflow-hidden border-0">
				<div class="card-header">
					<h3 class="card-title"><?php echo e(__('Setup Frontend Settings')); ?></h3>
				</div>
				<div class="card-body">
				
					<form action="<?php echo e(route('admin.settings.frontend.store')); ?>" method="POST" enctype="multipart/form-data">
						<?php echo csrf_field(); ?>

						<div class="row">
							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Maintenance Mode')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="maintenance" class="custom-switch-input" <?php if( config('frontend.maintenance')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
									</label>
								</div> 
							</div>
						</div>
						
						<div class="row">

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Frontend Page')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="frontend" class="custom-switch-input" <?php if( config('frontend.frontend_page')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Pricing Page')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="pricing" class="custom-switch-input" <?php if( config('frontend.pricing_page')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Voices Page')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="voices" class="custom-switch-input" <?php if( config('frontend.voices_section')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Contact Us Page')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="contact" class="custom-switch-input" <?php if( config('frontend.contact_page')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Features Section')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="features" class="custom-switch-input" <?php if( config('frontend.features_section')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Blogs Section')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="blogs" class="custom-switch-input" <?php if( config('frontend.blogs_section')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Reviews Section')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="reviews" class="custom-switch-input" <?php if( config('frontend.reviews_section')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('Cases Section')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="cases" class="custom-switch-input" <?php if( config('frontend.cases_section')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>

							<div class="col-md-4 col-sm-12">									
								<h6 class="fs-12 font-weight-bold mb-4"><?php echo e(__('FAQ Section')); ?></h6>								
								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="faq" class="custom-switch-input" <?php if( config('frontend.faq_section')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Show')); ?></span>
									</label>
								</div> 
							</div>
						</div>

						<div class="card border-0 special-shadow mb-7">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa fa-link text-info fs-14 mr-2"></i><?php echo e(__('Custom Landing Page URL')); ?></h6>

								<div class="form-group">
									<label class="custom-switch">
										<input type="checkbox" name="enable-redirection" class="custom-switch-input" <?php if( config('frontend.custom_url.status')  == 'on'): ?> checked <?php endif; ?>>
										<span class="custom-switch-indicator"></span>
										<span class="custom-switch-description"><?php echo e(__('Enable')); ?></span>
									</label>
								</div>

								<div class="row">
									<div class="col-md-12 col-sm-12">													
										<div class="input-box">								
											<h6><?php echo e(__('Landing Page URL')); ?> <i class="ml-2 fa fa-info info-notification" data-tippy-content="Set custom index url for all frontend pages. Ex: https://aws.amazon.com (Note: https:// - is required)"></i></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="url" name="url" value="<?php echo e(config('frontend.custom_url.link')); ?>" autocomplete="off">
												<?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('url')); ?></p>
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

						<div class="card border-0 special-shadow mt-6 mb-6">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa-brands fa-html5 mr-2"></i><?php echo e(__('Custom Frontend CSS and JS Files')); ?></h6>

								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">													
										<div class="input-box">								
											<h6><?php echo e(__('CSS File Path')); ?></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['css'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="css" name="css" value="<?php echo e($files['css']); ?>" autocomplete="off">
												<?php $__errorArgs = ['css'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('css')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="input-box">	
											<h6><?php echo e(__('JS File Path')); ?></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['js'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="js" name="js" value="<?php echo e($files['js']); ?>" autocomplete="off">
												<?php $__errorArgs = ['js'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('js')); ?></p>
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
						
						<div class="card border-0 special-shadow">							
							<div class="card-body">

								<h6 class="fs-12 font-weight-bold mb-4"><i class="fa fa-user-secret mr-2"></i><?php echo e(__('Footer Social Media Information')); ?></h6>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-twitter mr-2"></i>Twitter <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="twitter" name="twitter" value="<?php echo e(config('frontend.social_twitter')); ?>" autocomplete="off">
												<?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('twitter')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-facebook-f mr-2"></i>Facebook <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="facebook" name="facebook" value="<?php echo e(config('frontend.social_facebook')); ?>" autocomplete="off">
												<?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('facebook')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-linkedin-in mr-2"></i>LinkedIn <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['linkedin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="linkedin" name="linkedin" value="<?php echo e(config('frontend.social_linkedin')); ?>" autocomplete="off">
												<?php $__errorArgs = ['linkedin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('linkedin')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-instagram mr-2"></i>Instagram <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="instagram" name="instagram" value="<?php echo e(config('frontend.social_instagram')); ?>" autocomplete="off">
												<?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('instagram')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-google mr-2"></i>Google <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['google'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="google" name="google" value="<?php echo e(config('frontend.social_google')); ?>" autocomplete="off">
												<?php $__errorArgs = ['google'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('google')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-youtube mr-2"></i>Youtube <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="youtube" name="youtube" value="<?php echo e(config('frontend.social_youtube')); ?>" autocomplete="off">
												<?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('youtube')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>	
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-vimeo mr-2"></i>Vimeo <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['vimeo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="vimeo" name="vimeo" value="<?php echo e(config('frontend.social_vimeo')); ?>" autocomplete="off">
												<?php $__errorArgs = ['vimeo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('vimeo')); ?></p>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div> 
										</div> 
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12">					
										<div class="input-box">								
											<h6><i class="fa-brands fa-flickr mr-2"></i>Flickr <span class="text-muted"></span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control <?php $__errorArgs = ['flickr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="flickr" name="flickr" value="<?php echo e(config('frontend.social_flickr')); ?>" autocomplete="off">
												<?php $__errorArgs = ['flickr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<p class="text-danger"><?php echo e($errors->first('flickr')); ?></p>
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
						
						<!-- SAVE CHANGES ACTION BUTTON -->
						<div class="border-0 text-right mb-2 mt-1">
							<a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-cancel mr-2"><?php echo e(__('Cancel')); ?></a>
							<button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>							
						</div>				

					</form>

				</div>
			</div>
		</div>
	</div>	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<!-- Awselect JS -->
	<script src="<?php echo e(URL::asset('plugins/awselect/awselect.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/awselect.js')); ?>"></script>
	<!-- File Uploader -->
	<script src="<?php echo e(URL::asset('js/file-upload.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/admin/frontend-management/frontend/index.blade.php ENDPATH**/ ?>