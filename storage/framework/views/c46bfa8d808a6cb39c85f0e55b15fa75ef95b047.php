
<?php $__env->startSection('css'); ?>
	<!-- Green Audio Player CSS -->
	<link href="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.css')); ?>" rel="stylesheet" />
	<!-- Awselect CSS -->
	<link href="<?php echo e(URL::asset('plugins/awselect/awselect.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
	<div class="page-leftheader">
		<h4 class="page-title mb-0"><?php echo e(__('All Voices')); ?></h4>
		<ol class="breadcrumb mb-2">
			<li class="breadcrumb-item"><a href="<?php echo e(route('user.tts')); ?>"><i class="fa-solid fa-cloud-music mr-2 fs-12"></i><?php echo e(__('User')); ?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('#')); ?>"> <?php echo e(__('All Voices')); ?></a></li>
		</ol>
	</div>
</div>
<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xm-12">
			<div class="card border-0">
				<div class="card-body pt-5" id="card-body-minify">

					<div class="row justify-content-md-center">
						<div class="col-md-12 mt-7 mb-5 text-center">
							<div class="voices-header">
								<h3 class="card-title"><?php echo e(__('Explore our Voices')); ?></h3>
								<p><?php echo e(__('Discover our natural, fluent and realistic voices in +139 languages and dialects')); ?></p>
							</div>
						</div>
						
						<div class="col-md-10 col-sm-12">
							<div class="card border-0 pl-5 pr-5 pt-6 pb-2" id="card-minify">
								<div class="col-md-12 mb-5">
									<div class="form-group" id="voices-languages">									
										<select id="languages" name="language" data-placeholder="<?php echo e(__('Select Language')); ?>:" data-callback="language_change">	
											<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($language->language_code); ?>" data-img="<?php echo e(URL::asset($language->language_flag)); ?>" <?php if('en-US' == $language->language_code): ?> selected <?php endif; ?>> <?php echo e($language->language); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>											
										</select>
									</div>
								</div>
								
								<div class="col-md-12">
									<div class="row" id="voices-box"></div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

		</div>
	</div>
	<!-- END APP CONTENT-->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
	<!-- Green Audio Player JS -->
	<script src="<?php echo e(URL::asset('plugins/awselect/awselect-custom.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/audio-player.js')); ?>"></script>	
	<script src="<?php echo e(URL::asset('js/awselect.js')); ?>"></script>
	<script type="text/javascript">
		$(function () {

			let data = JSON.parse(`<?php echo $data['data']; ?>`);

			data.forEach(createViewBox);

			GreenAudioPlayer.init({
				selector: '.player', // inits Green Audio Player on each audio container that has class "player"
				stopOthersOnPlay: true,
			});

		});	

		function createViewBox(value, index, array) {

			let voiceBox = '';

			if (value['voice_type'] == 'standard') {
				voiceBox = '<div class="col-md-6 col-sm-12 mb-6">' + 
							'<div class="voices-container pb-2 pt-2">' +
								'<div class="voice-player d-flex pt-2 pb-2">' +		
									'<div class="voice-avatar overflow-hidden">' +
										'<img alt="Voice Avatar" class="rounded-circle" src="'+ value['avatar_url'] +'">'+
									'</div>'+
									'<div class="w-100">'+
										'<span class="voice-name pl-5">'+ value['voice'] +' <span class="text-muted font-weight-normal">('+ value['gender'] +')</span></span>'+
										'<p class="text-muted fs-12 mb-0 pl-5">'+ value['language_code'] +'</span>' +																		
										'<div class="text-center player">'+
											'<audio class="voice-audio" preload="none">'+
												'<source src="'+ value['sample_url'] +'" type="audio/mpeg">'+
											'</audio>' +	
										'</div>' +		
									'</div>' +				
								'</div>' +
							'</div>' +
						'</div>';
			} else {
				voiceBox = '<div class="col-md-6 col-sm-12 mb-6">' + 
							'<div class="voices-container pb-2 pt-2">' +
								'<div class="voice-player d-flex pt-2 pb-2">' +		
									'<div class="voice-avatar overflow-hidden">' +
										'<img alt="Voice Avatar" class="rounded-circle" src="'+ value['avatar_url'] +'">'+
									'</div>'+
									'<div class="w-100">'+
										'<span class="voice-name pl-5">'+ value['voice'] +' <span class="text-muted font-weight-normal">('+ value['gender'] +')</span></span>'+
										'<p class="text-muted fs-12 mb-0 pl-5">'+ value['language_code'] +' <span class="neural-voice">'+ value['voice_type'][0].toUpperCase() + value['voice_type'].substring(1) +'</span></p>' +																		
										'<div class="text-center player">'+
											'<audio class="voice-audio" preload="none">'+
												'<source src="'+ value['sample_url'] +'" type="audio/mpeg">'+
											'</audio>' +	
										'</div>' +		
									'</div>' +				
								'</div>' +
							'</div>' +
						'</div>';
			}
			
		
			$("#voices-box").append(voiceBox);
			
		}
	

		function language_change(value) {
			let formData = new FormData();
			formData.append("code", value);
			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'post',
				url: 'voices/change',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {   

					$('#voices-box').html("");

					data.forEach(createViewBox);

					GreenAudioPlayer.init({
						selector: '.player', // inits Green Audio Player on each audio container that has class "player"
						stopOthersOnPlay: true,
					});
				},
				error: function(data) {
					
				}
			});
		}	
		
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/user/tts-voices/index.blade.php ENDPATH**/ ?>