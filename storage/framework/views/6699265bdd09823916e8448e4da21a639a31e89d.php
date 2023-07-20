

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0"><?php echo e(__('Subscription Plans')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('user.tts')); ?>"><i class="fa-solid fa-badge-dollar mr-2 fs-12"></i><?php echo e(__('User')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('user.balance')); ?>"> <?php echo e(__('My Balance')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('Subscription Plans')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>	
	<div class="card border-0 pt-2">
		<div class="card-body">			
			
			<?php if($plan || $prepaid_exists): ?>

				<div class="tab-menu-heading text-center">
					<div class="tabs-menu">								
						<ul class="nav">
							<?php if($plan): ?>
								<?php if(config('payment.payment_option') == 'subscription' || config('payment.payment_option') == 'both'): ?>
									<li><a href="#plans" class="<?php if(($plan && $prepaid_exists) || ($plan && !$prepaid_exists)): ?> active <?php else: ?> '' <?php endif; ?>" data-toggle="tab"> <?php echo e(__('Monthly Plans')); ?></a></li>
								<?php endif; ?>
							<?php endif; ?>
							<?php if($prepaid_exists): ?>
								<?php if(config('payment.payment_option') == 'prepaid' || config('payment.payment_option') == 'both'): ?>
									<li><a href="#prepaid" class="<?php if(!$plan && $prepaid_exists): ?> active <?php else: ?> '' <?php endif; ?>" data-toggle="tab"> <?php echo e(__('Prepaid Plans')); ?></a></li>
								<?php endif; ?>
							<?php endif; ?>
												
						</ul>
					</div>
				</div>

			

				<div class="tabs-menu-body">
					<div class="tab-content">

						<?php if($plan): ?>	
							<?php if(config('payment.payment_option') == 'subscription' || config('payment.payment_option') == 'both'): ?>
								<div class="tab-pane <?php if(($plan && $prepaid_exists) || ($plan && !$prepaid_exists)): ?> active <?php else: ?> '' <?php endif; ?>" id="plans">

									<?php if($subscriptions->count()): ?>		
										
										<h6 class="font-weight-normal fs-12 text-center mb-6"><?php echo e(__('Subscribe to our Monthly Subscription Plans and enjoy ton of benefits')); ?></h6>

										<div class="row justify-content-md-center">

											<?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>																			
												<div class="col-lg-3 col-md-6 col-sm-12">
													<div class="price-card pl-6 pr-6 pt-2 mb-7">
														<div class="card border-0 p-4 pl-5 pr-5">
															<div class="plan">																										
																<span class="plan-currency-sign"><?php echo config('payment.default_system_currency_symbol'); ?></span><span class="plan-cost"><?php echo e(number_format((float)$subscription->cost, 2)); ?></span><span class="plan-currency-sign"><?php echo e($subscription->currency); ?></span>
																<p class="fs-12"><?php echo e($subscription->primary_heading); ?></p>
																<div class="divider"></div>
																<div class="plan-title"><?php echo e($subscription->plan_name); ?></div>
																<p class="fs-12 mb-2"><?php echo e($subscription->secondary_heading); ?></p>
																<ul class="fs-12">														
																	<?php $__currentLoopData = (explode(',', $subscription->plan_features)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																		<?php if($feature): ?>
																			<li><i class="fa fa-check"></i> <?php echo e($feature); ?></li>
																		<?php endif; ?>																
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>															
																</ul>																
															</div>	
															<div class="text-center action-button mt-5 mb-2">
																<?php if(auth()->user()->plan_id == $subscription->id): ?>
																	<button type="button" class="btn btn-cancel"><?php echo e(__('Subscribed')); ?></button> 
																<?php else: ?>
																<a href="<?php echo e(route('user.subscriptions.subscribe', $subscription->id)); ?>" class="btn btn-primary"><?php echo e(__('Subscribe Now')); ?></a>
																<?php endif; ?>															
															</div>						
														</div>	
													</div>							
												</div>										
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

										</div>	
									
									<?php else: ?>
										<div class="row text-center">
											<div class="col-sm-12 mt-6 mb-6">
												<h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Subscriptions plans were set yet')); ?></h6>
											</div>
										</div>
									<?php endif; ?>					
								</div>
							<?php endif; ?>	
						<?php endif; ?>	
						
						<?php if($prepaid_exists): ?>
							<?php if(config('payment.payment_option') == 'prepaid' || config('payment.payment_option') == 'both'): ?>
								<div class="tab-pane <?php if(!$plan && $prepaid_exists): ?> active <?php else: ?> '' <?php endif; ?>" id="prepaid">

									<?php if($prepaids->count()): ?>

										<h6 class="font-weight-normal fs-12 text-center mb-6"><?php echo e(__('Top up your subscription with more credits or start with Prepaid Plans credits only')); ?></h6>
										
										<div class="row justify-content-md-center">
										
											<?php $__currentLoopData = $prepaids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prepaid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>																			
												<div class="col-lg-3 col-md-6 col-sm-12">
													<div class="price-card pl-6 pr-6 pt-2 mb-7">
														<div class="card border-0 p-4 pl-5">
															<div class="plan prepaid-plan">
																<div class="plan-title"><?php echo e($prepaid->plan_name); ?> <span class="prepaid-currency-sign"><?php echo e($prepaid->currency); ?></span><span class="plan-cost"><?php echo e(number_format((float)$prepaid->cost, 2)); ?></span><span class="prepaid-currency-sign"><?php echo config('payment.default_system_currency_symbol'); ?></span></div>
																<p class="fs-12 text-muted"><?php echo e(__('Total Characters')); ?> <?php if($prepaid->bonus > 0): ?> <span class="ml-2 gift text-success">+<?php echo e(number_format($prepaid->bonus)); ?> <?php echo e(__('bonus')); ?>!</span><?php endif; ?></p>
																	
																										
																<div class="text-center action-button mt-2 mb-2">
																	<a href="<?php echo e(route('user.prepaid.checkout', $prepaid->id)); ?>" class="btn btn-cancel"><?php echo e(__('Purchase')); ?></a> 
																</div>
															</div>							
														</div>	
													</div>							
												</div>										
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						

										</div>

									<?php else: ?>
										<div class="row text-center">
											<div class="col-sm-12 mt-6 mb-6">
												<h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Pre-Paid plans were set yet')); ?></h6>
											</div>
										</div>
									<?php endif; ?>

								</div>	
							<?php endif; ?>	
						<?php endif; ?>							
					</div>
				</div>
			
			<?php else: ?>
				<div class="row text-center">
					<div class="col-sm-12 mt-6 mb-6">
						<h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Subscriptions or Pre-Paid plans were set yet')); ?></h6>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/user/balance/subscriptions/index.blade.php ENDPATH**/ ?>