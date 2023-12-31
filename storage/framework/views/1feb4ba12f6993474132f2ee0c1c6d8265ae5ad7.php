
<?php $__env->startSection('css'); ?>
	<!-- Data Table CSS -->
	<link href="<?php echo e(URL::asset('plugins/datatable/datatables.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/datatable/dataTables.checkboxes.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(URL::asset('plugins/datatable/rowReorder.dataTables.min.css')); ?>" rel="stylesheet" />
	<!-- Awselect CSS -->
	<link href="<?php echo e(URL::asset('plugins/awselect/awselect.min.css')); ?>" rel="stylesheet" />
	<!-- Green Audio Player CSS -->
	<link href="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.css')); ?>" rel="stylesheet" />
	<!-- FilePond CSS -->
	<link href="<?php echo e(URL::asset('plugins/filepond/filepond.css')); ?>" rel="stylesheet" />	
	<!-- Sweet Alert CSS -->
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- PAGE HEADER -->
<div class="page-header mt-5-7">
	<div class="page-leftheader">
		<h4 class="page-title mb-0"><?php echo e(__('My Sound Studio')); ?></h4>
		<ol class="breadcrumb mb-2">
			<li class="breadcrumb-item"><a href="<?php echo e(url('/' . $page='#')); ?>"><i class="fa-solid fa-photo-film-music mr-2 fs-12"></i><?php echo e(__('User')); ?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo e(url('/' . $page='#')); ?>"> <?php echo e(__('Sound Studio')); ?></a></li>
		</ol>
	</div>
</div>
<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">	
				<div class="card-header">
					<h3 class="card-title"><i class="fa-solid fa-photo-film-music mr-2 text-primary"></i> <?php echo e(__('Sound Studio')); ?></h3>
				</div>			
				<div class="card-body pt-5">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<!-- CONTAINER FOR AUDIO FILE UPLOADS-->
									<div id="upload-container">							
										
										<!-- DRAG & DROP MEDIA FILES -->
										<div class="select-file">
											<input type="file" name="filepond" id="filepond" class="filepond"/>	
										</div>
										<?php $__errorArgs = ['filepond'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<p class="text-danger"><?php echo e($errors->first('filepond')); ?></p>
										<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>	

									</div> <!-- END CONTAINER FOR AUDIO FILE UPLOADS-->
								</div>
								<div class="col-md-12 col-sm-12 text-center">
									<div class="dropdown">
										<span id="processing"><img src="<?php echo e(URL::asset('/img/svgs/upload.svg')); ?>" alt=""></span>		
										<button class="btn btn-special create-project file-buttons pl-5 pr-5 mr-4" type="button" id="upload-music" data-tippy-content="<?php echo e(__('Upload Background Music Audio File')); ?>"><?php echo e(__('Upload Music File')); ?></button>
										<a class="btn btn-special create-project file-buttons pl-5 pr-5" href="<?php echo e(route('user.music.list')); ?>" id="list-music" data-tippy-content="<?php echo e(__('View All Your Uploaded Background Music Audio Files')); ?>"><?php echo e(__('View Music Files')); ?></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-12 pr-5 pr-minify">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="row">
										<div class="col-md-10 pr-0 pr-minify">
											<div class="input-box">	
												<h6 class="task-heading"><?php echo e(__('Select Backround Music')); ?></h6>
												<select id="bg-music" name="background-music" data-placeholder="<?php echo e(__('Background Music')); ?>" data-callback="music_select">	
													<option value="none" id="none" data-url="none"><?php echo e(__('None')); ?></option>		
													<?php $__currentLoopData = $musics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $music): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($music->id); ?>" id="<?php echo e($music->id); ?>" data-url="<?php echo e(URL::asset($music->url)); ?>"> <?php echo e(ucfirst($music->name)); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
										<div class="col-md-2 pt-align" id="listen-minify">
											<div class="dropdown">
												<button class="btn btn-special create-project" type="button" onclick="previewMusic(this)" src="" id="listen-music" data-tippy-content="<?php echo e(__('Play Selected Background Music')); ?>"><i class="fa fa-play"></i></button>
											</div>
										</div>
									</div>											
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="input-box">	
										<h6 class="task-heading"><?php echo e(__('Set Background Music Volume')); ?></h6>
										<select id="bg-volume" name="background-volume" data-placeholder="<?php echo e(__('Set Background Music Volume')); ?>:">	
											<option value="0.25"><?php echo e(__('x-Quiet')); ?></option>											
											<option value="0.5"><?php echo e(__('Quiet')); ?></option>																						
											<option value="1.0" selected><?php echo e(__('Default')); ?></option>											
											<option value="1.5"><?php echo e(__('Loud')); ?></option>											
											<option value="2"><?php echo e(__('x-Loud')); ?></option>											
										</select>
									</div>												
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-12 pl-5 pl-minify">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="input-box">	
										<h6 class="task-heading"><?php echo e(__('Set Final Result Volume')); ?></h6>
										<select id="audio-volume" name="audio-volume" data-placeholder="<?php echo e(__('Set Final Result Volume')); ?>:">			
											<option value="0.25"><?php echo e(__('x-Quiet')); ?></option>											
											<option value="0.5"><?php echo e(__('Quiet')); ?></option>																						
											<option value="1.0" selected><?php echo e(__('Default')); ?></option>											
											<option value="1.5"><?php echo e(__('Loud')); ?></option>											
											<option value="2"><?php echo e(__('x-Loud')); ?></option>
										</select>
									</div>												
								</div>
								<div class="col-md-12 col-sm-12">
									<div class="input-box">	
										<h6 class="task-heading"><?php echo e(__('Set Result Title')); ?></h6>
										<div class="form-group">
											<input type="text" id="title" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title">
											<?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($errors->first('title')); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>
									</div>												
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-12 pl-5 pl-minify">
							<div class="row">			
								<div class="col-md-12 col-sm-12 mt-8 text-center" id="audio-format-minify">
									<div class="input-box">	
										<h6 class="task-heading"><?php echo e(__('Audio File Format')); ?></h6>
										<div id="audio-format" role="radiogroup">
											<div class="radio-control">
												<input type="radio" name="format" class="input-control" id="mp3" value="mp3" checked>
												<label for="mp3" class="label-control">MP3</label>
											</div>	
											<div class="radio-control">
												<input type="radio" name="format" class="input-control" id="wav" value="wav">
												<label for="wav" class="label-control">WAV</label>
											</div>																
											<div class="radio-control">
												<input type="radio" name="format" class="input-control" id="ogg" value="ogg">
												<label for="ogg" class="label-control">OGG</label>
											</div>								
										</div>
									</div>											
								</div>								
							</div>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-md-12 col-sm-12 text-center">
							<div class="input-box mb-4">	
								<span id="processing"><img src="<?php echo e(URL::asset('/img/svgs/processing.svg')); ?>" alt=""></span>
								<button class="btn btn-special create-project file-buttons pl-6 pr-6" type="button" id="merge-button"><?php echo e(__('Merge Audio Files')); ?></button>
							</div>												
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card border-0">
				
				<div class="card-body pt-2">
					<span class="text-muted fs-11"><?php echo e(__('Maximum rows to process is')); ?> <?php echo e($row_limit); ?> <i class="ml-2 fa fa-info fs-8 info-notification" data-tippy-content="Select rows that you want to merge together. Click on checkboxes to change the order of rows."></i></span>
					<!-- SET DATATABLE -->
					<table id='resultsTable' class='table' width='100%'>
							<thead>
								<tr>
									<th width="1%"></th>
									<th width="9%"><?php echo e(__('Created On')); ?></th> 
									<th width="9%"><?php echo e(__('Project')); ?></th> 
									<th width="9%"><?php echo e(__('Title')); ?></th> 
									<th width="9%"><?php echo e(__('Language')); ?></th>
									<th width="5%"><?php echo e(__('Voice')); ?></th>
									<th width="5%"><?php echo e(__('Gender')); ?></th>
									<th width="7%"><?php echo e(__('Voice Engine')); ?></th>
									<th width="4%"><i class="fa fa-music fs-14"></i></th>							
									<th width="4%"><i class="fa fa-cloud-download fs-14"></i></th>								
									<th width="4%"><?php echo e(__('Format')); ?></th>	
									<th width="4%"><?php echo e(__('Chars')); ?></th>								           								    						           	
									<th width="5%"><?php echo e(__('Actions')); ?></th>
								</tr>
							</thead>							
					</table> <!-- END SET DATATABLE -->					
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 mt-4">
			<div class="card border-0">
				<div class="card-header" id="sound-studio-header">
					<h3 class="card-title"><?php echo e(__('Sound Studio Results')); ?></h3>
				</div>
				<div class="card-body pt-2">
					<!-- SET DATATABLE -->
					<table id='studioResultsTable' class='table' width='100%'>
							<thead>
								<tr>
									<th width="6%"><?php echo e(__('Created On')); ?></th> 
									<th width="10%"><?php echo e(__('Result Title')); ?></th> 
									<th width="4%"><i class="fa fa-music fs-14"></i></th>							
									<th width="4%"><i class="fa fa-cloud-download fs-14"></i></th>								
									<th width="4%"><?php echo e(__('Format')); ?></th>	
									<th width="4%"><?php echo e(__('Total Characters')); ?></th>								           								    						           	
									<th width="5%"><?php echo e(__('# Merged Files')); ?></th>								           								    						           	
									<th width="3%"><?php echo e(__('Actions')); ?></th>
								</tr>
							</thead>
					</table> <!-- END SET DATATABLE -->
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<!-- Green Audio Player JS -->
	<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/audio-player.js')); ?>"></script>
	<!-- Data Tables JS -->
	<script src="<?php echo e(URL::asset('plugins/datatable/datatables.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/datatable/dataTables.checkboxes.min.js')); ?>"></script>
	<script src='<?php echo e(URL::asset('plugins/datatable/dataTables.rowReorder.min.js')); ?>'></script>
	<!-- FilePond JS -->
	<script src=<?php echo e(URL::asset('plugins/filepond/filepond.min.js')); ?>></script>
	<script src=<?php echo e(URL::asset('plugins/filepond/filepond-plugin-file-validate-size.min.js')); ?>></script>
	<script src=<?php echo e(URL::asset('plugins/filepond/filepond-plugin-file-validate-type.min.js')); ?>></script>	
	<script src=<?php echo e(URL::asset('plugins/filepond/filepond.jquery.js')); ?>></script>
	<script src="<?php echo e(URL::asset('js/project-manager.js')); ?>"></script>
	<!-- Awselect JS -->
	<script src="<?php echo e(URL::asset('plugins/awselect/awselect.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/awselect.js')); ?>"></script>
	<script type="text/javascript">
		$(function () {

			"use strict";

			let table = $('#resultsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: true,
				rowReorder: true,
				"order": [[ 1, "desc" ]],
				rowReorder: {
					update: false
				},	
				'columnDefs': [
					{
						'targets': 0,
						'checkboxes': {
							'selectRow': true
						}
					},
				],
				select: {
					style: 'multi'
				},
				language: {
					"emptyTable": "<div><img id='no-results-img' src='<?php echo e(URL::asset('img/files/no-result.png')); ?>'><br>Studio does not have any synthesized results yet</div>",
					search: "<i class='fa fa-search search-icon'></i>",
					lengthMenu: '_MENU_ ',
					paginate : {
						first    : '<i class="fa fa-angle-double-left"></i>',
						last     : '<i class="fa fa-angle-double-right"></i>',
						previous : '<i class="fa fa-angle-left"></i>',
						next     : '<i class="fa fa-angle-right"></i>'
					}
				},
				pagingType : 'full_numbers',
				processing: true,
				serverSide: true,
				ajax: "<?php echo e(route('user.studio')); ?>",
				columns: [
					{
						data: 'id',
						name: 'id',
						orderable: false,
						searchable: false
					},
					{
						data: 'created-on',
						name: 'created-on',
						orderable: true,
						searchable: true
					},		
					{
						data: 'project',
						name: 'project',
						orderable: true,
						searchable: true
					},
					{
						data: 'title',
						name: 'title',
						orderable: true,
						searchable: true
					},			
					{
						data: 'custom-language',
						name: 'custom-language',
						orderable: true,
						searchable: true
					},
					{
						data: 'voice',
						name: 'voice',
						orderable: true,
						searchable: true
					},
					{
						data: 'gender',
						name: 'gender',
						orderable: true,
						searchable: true
					},
					{
						data: 'custom-voice-type',
						name: 'custom-voice-type',
						orderable: true,
						searchable: true
					},
					{
						data: 'single',
						name: 'single',
						orderable: true,
						searchable: true
					},				
					{
						data: 'download',
						name: 'download',
						orderable: true,
						searchable: true
					},
					{
						data: 'custom-extension',
						name: 'custom-extension',
						orderable: true,
						searchable: true
					},
					{
						data: 'characters',
						name: 'characters',
						orderable: true,
						searchable: true
					},										
					{
						data: 'actions',
						name: 'actions',
						orderable: false,
						searchable: false
					},
				]
			});


			let studio = $('#studioResultsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: true,
				"order": [[ 0, "desc" ]],
				language: {
					"emptyTable": "<div><img id='no-results-img' src='<?php echo e(URL::asset('img/files/no-result.png')); ?>'><br>Studio does not have any synthesized results yet</div>",
					search: "<i class='fa fa-search search-icon'></i>",
					lengthMenu: '_MENU_ ',
					paginate : {
						first    : '<i class="fa fa-angle-double-left"></i>',
						last     : '<i class="fa fa-angle-double-right"></i>',
						previous : '<i class="fa fa-angle-left"></i>',
						next     : '<i class="fa fa-angle-right"></i>'
					}
				},
				pagingType : 'full_numbers',
				processing: true,
				serverSide: true,
				ajax: "<?php echo e(route('user.studio.results')); ?>",
				columns: [
					{
						data: 'created-on',
						name: 'created-on',
						orderable: true,
						searchable: true
					},		
					{
						data: 'title',
						name: 'title',
						orderable: true,
						searchable: true
					},		
					{
						data: 'single',
						name: 'single',
						orderable: true,
						searchable: true
					},				
					{
						data: 'download',
						name: 'download',
						orderable: true,
						searchable: true
					},
					{
						data: 'custom-extension',
						name: 'custom-extension',
						orderable: true,
						searchable: true
					},
					{
						data: 'characters',
						name: 'characters',
						orderable: true,
						searchable: true
					},	
					{
						data: 'files',
						name: 'files',
						orderable: true,
						searchable: true
					},									
					{
						data: 'actions',
						name: 'actions',
						orderable: false,
						searchable: false
					},
				]
			});

			let row_limit = JSON.parse(`<?php echo $js['row_limit']; ?>`);

			$('#merge-button').on('click', function() {

				let checkedRows = [];
				let bg_audio = $("#bg-music").val();
				let bg_volume = $("#bg-volume").val();
				let audio_volume = $("#audio-volume").val();
				let title = $("#title").val();
				let format = $("input[type='radio'][name='format']:checked").val();
				let process = true;

				$.each($("input:checked"), function(){
				
					let row = $(this).closest( 'tr' );
					let data = table.row(row).data();
					if (data !== undefined) {
						let user = Object.values(data);
	
						if (user[10] == format) {
							checkedRows.push(user[0]);							
						} else {
							Swal.fire('Incorrect Format Included', 'Mixing audio file formats is not allowed, select exact audio formats as checked under <b>Audio File Format</b> section above.', 'warning');	
							process = false;
							return false;
						}
					}
	
				});

				if (process) {

					if (checkedRows.length == 0) {
					
						Swal.fire('Select Synthesize Result', 'Please select at least 1 text synthesize result to merge it with a background music or select 2 or more text synthesize results to merge them together', 'warning');	
					
					} else if (checkedRows.length > row_limit) {

						Swal.fire('Too Many Files Selected', 'You can merge up to ' + row_limit + ' audio files with same format in a single merge task. You have selected ' + checkedRows.length + ' audio files.', 'warning');	
					
					} else {

						let data = new FormData();
						data.append("rows", checkedRows);
						data.append("format", format);
						data.append("title", title);
						data.append("background_audio", bg_audio);
						data.append("background_volume", bg_volume);
						data.append("audio_volume", audio_volume);

						$.ajax({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
							type: "POST",
							url: 'studio/music/merge',
							data: data,
							processData: false,
							contentType: false,
							beforeSend: function() {
								$('#merge-button').html('');
								$('#merge-button').addClass('merge-processing');
								$('#merge-button').prop('disabled', true);
								$('#processing').show().clone().appendTo('#merge-button'); 
								$('#processing').hide();           
							},
							complete: function() {
								$('#merge-button').prop('disabled', false);
								$('#merge-button').removeClass('merge-processing');
								$('#processing', '#merge-button').empty().remove();
								$('#processing').hide();
								$('#merge-button').html('Merge Audio Files');   
							},
							success: function(data) {
								$("html, body").animate({scrollTop: $("#sound-studio-header").offset().top}, 200);
								$("#studioResultsTable").DataTable().ajax.reload();
							},
							error: function(data) {
								if (data.responseJSON['error']) {
									Swal.fire('Text to Speech Notification', data.responseJSON['error'], 'warning');
								}

								$('#merge-button').prop('disabled', false);
								$('#merge-button').removeClass('merge-processing');
								$('#merge-button').html('Merge Audio Files');     
			
							}
						}).done(function(data) {
						})

					}
				}
				
			});


			// DELETE SYNTHESIZE RESULT
			$(document).on('click', '.deleteResultButton', function(e) {

				e.preventDefault();

				Swal.fire({
					title: 'Confirm Result Deletion',
					text: 'It will permanently delete this synthesize result',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Delete',
					reverseButtons: true,
				}).then((result) => {
					if (result.isConfirmed) {
						let formData = new FormData();
						formData.append("id", $(this).attr('id'));
						$.ajax({
							headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							method: 'post',
							url: 'studio/result/delete',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									Swal.fire('Result Deleted', 'Synthesize result has been successfully deleted', 'success');	
									$("#resultsTable").DataTable().ajax.reload();								
								} else {
									Swal.fire('Delete Failed', 'There was an error while deleting this result', 'error');
								}      
							},
							error: function(data) {
								Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
							}
						})
					} 
				})
			});


			// DELETE STUDIO RESULT
			$(document).on('click', '.deleteStudioResultButton', function(e) {

				e.preventDefault();

				Swal.fire({
					title: 'Confirm Studio Result Deletion',
					text: 'It will permanently delete this merged audio files result',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Delete',
					reverseButtons: true,
				}).then((result) => {
					if (result.isConfirmed) {
						let formData = new FormData();
						formData.append("id", $(this).attr('id'));
						$.ajax({
							headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							method: 'post',
							url: 'studio/final/result/delete',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									Swal.fire('Result Deleted', 'Sound Studio result has been successfully deleted', 'success');	
									$("#studioResultsTable").DataTable().ajax.reload();								
								} else {
									Swal.fire('Delete Failed', 'There was an error while deleting this sound studio result', 'error');
								}      
							},
							error: function(data) {
								Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong!' })
							}
						})
					} 
				})
			});

		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/user/studio/index.blade.php ENDPATH**/ ?>