

<?php $__env->startSection('css'); ?>
	<!-- Data Table CSS -->
	<link href="<?php echo e(URL::asset('plugins/awselect/awselect.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="section-title">
                    <!-- SECTION TITLE -->
                    <div class="text-center mb-9 mt-9 pt-5" id="contact-row">

                        <div class="title">
                            <h6><?php echo e(__('Choose')); ?> <span><?php echo e(__('Your Plan')); ?></span></h6>
                            <p><?php echo e(__('Flexible monthly subsciptions with optional top up features')); ?></p>
                        </div>

                    </div> <!-- END SECTION TITLE -->
                </div>
            </div>
        </div>
    </div>

    <section id="prices-wrapper">

        <div class="container pt-8">          
            
            <div class="card-body">			
					
                <div class="tab-menu-heading text-center">
                    <div class="tabs-menu ">								
                        <ul class="nav text-center">	
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
    
                <?php if($plan || $prepaid_exists): ?>
    
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
                                                        <div class="price-card pt-2 mb-7">
                                                            <div class="card border-0 p-4 pl-5 pr-5">
                                                                <div class="plan">																										
                                                                    <span class="plan-currency-sign"><?php echo config('payment.default_system_currency_symbol'); ?></span><span class="plan-cost"><?php echo e($subscription->cost); ?></span><span class="plan-currency-sign"><?php echo e($subscription->currency); ?></span>
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
                                                                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary"><?php echo e(__('Subscribe Now')); ?></a>
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
        
                                            <h6 class="font-weight-normal fs-12 text-center mb-6"><?php echo e(__('Top up your subscription with more credits or start with Prepaid Plan credits only')); ?></h6>
                                            
                                            <div class="row justify-content-md-center">
                                            
                                                <?php $__currentLoopData = $prepaids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prepaid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>																			
                                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                                        <div class="price-card pt-2 mb-7">
                                                            <div class="card border-0 p-4">
                                                                <div class="plan prepaid-plan">
                                                                    <div class="plan-title"><?php echo e($prepaid->plan_name); ?> <span class="prepaid-currency-sign"><?php echo e($prepaid->currency); ?></span><span class="plan-cost"><?php echo e($prepaid->cost); ?></span><span class="prepaid-currency-sign"><?php echo config('payment.default_system_currency_symbol'); ?></span></div>
                                                                    <p class="fs-12 text-muted"><?php echo e(__('Total Characters')); ?> <?php if($prepaid->bonus > 0): ?><span class="ml-2 gift text-success">+<?php echo e(number_format($prepaid->bonus)); ?> <?php echo e(__('bonus')); ?>!</span> <?php endif; ?></p>									
                                                                    <div class="text-center action-button mt-2 mb-2">
                                                                        <a href="<?php echo e(route('register')); ?>" class="btn btn-cancel"><?php echo e(__('Purchase Now')); ?></a> 
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
                                                    <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Prepaid plans were set yet')); ?></h6>
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
                            <h6 class="fs-12 font-weight-bold text-center"><?php echo e(__('No Subscriptions or Prepaid plans were set yet')); ?></h6>
                        </div>
                    </div>
                <?php endif; ?>
    
            </div>
        
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<!-- Awselect JS -->
	<script src="<?php echo e(URL::asset('plugins/awselect/awselect.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/awselect.js')); ?>"></script>  
    <script src="<?php echo e(URL::asset('js/minimize.js')); ?>"></script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/pricing.blade.php ENDPATH**/ ?>