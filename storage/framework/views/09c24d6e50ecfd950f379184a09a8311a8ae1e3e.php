

<?php $__env->startSection('css'); ?>
	<!-- Data Table CSS -->
	<link href="<?php echo e(URL::asset('plugins/datatable/datatables.min.css')); ?>" rel="stylesheet" />
	<!-- Sweet Alert CSS -->
	<link href="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.min.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0"><?php echo e(__('Synchesized Results Data')); ?></h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fa-solid fa-wand-sparkles mr-2 fs-12"></i><?php echo e(__('Admin')); ?></a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(route('admin.tts.dashboard')); ?>"> <?php echo e(__('TTS Management')); ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> <?php echo e(__('Synthesized Results Data')); ?></a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>	
	<!-- ALL USERS PROCESSED TEXT RESULTS -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title"><?php echo e(__('All Processed Text')); ?></h3>
				</div>
				<div class="card-body pt-2">
					<!-- BOX CONTENT -->
					<div class="box-content">
							<!-- SET DATATABLE -->
							<table id='allResultsTable' class='table' width='100%'>
									<thead>
										<tr>
											<th width="3%"></th>
											<th width="7%"><?php echo e(__('Plan Type')); ?></th>
											<th width="10%"><?php echo e(__('Created On')); ?></th> 
											<th width="8%"><?php echo e(__('User')); ?></th>
											<th width="5%"><?php echo e(__('Vendor')); ?></th>
											<th width="8%"><?php echo e(__('Language')); ?></th>
											<th width="7%"><?php echo e(__('Voice')); ?></th>
											<th width="7%"><?php echo e(__('Gender')); ?></th>
											<th width="9%"><?php echo e(__('Voice Engine')); ?></th>
											<th width="4%"><i class="fa fa-music fs-14"></i></th>							
											<th width="4%"><i class="fa fa-cloud-download fs-14"></i></th>								
											<th width="5%"><?php echo e(__('Format')); ?></th>
											<th width="5%"><?php echo e(__('Chars')); ?></th>	    										 						           	
											<th width="5%"><?php echo e(__('Actions')); ?></th>
										</tr>
									</thead>
							</table> <!-- END SET DATATABLE -->
					</div> <!-- END BOX CONTENT -->
				</div>
			</div>
		</div>
	</div>
	<!-- END ALL USERS PROCESSED TEXT RESULTS -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<!-- Data Tables JS -->
	<script src="<?php echo e(URL::asset('plugins/datatable/datatables.min.js')); ?>"></script>
	<!-- Green Audio Players JS -->
	<script src="<?php echo e(URL::asset('plugins/audio-player/green-audio-player.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('plugins/sweetalert/sweetalert2.all.min.js')); ?>"></script>
	<script src="<?php echo e(URL::asset('js/audio-player.js')); ?>"></script>
	<script type="text/javascript">
		$(function () {

			"use strict";
			
			function format(d) {
				// `d` is the original data object for the row
				return '<div class="slider">'+
							'<table class="details-table">'+
								'<tr>'+
									'<td class="details-title" width="10%">Project Name:</td>'+
									'<td>'+ ((d.project == null) ? '' : d.project) +'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="details-title" width="10%">Title:</td>'+
									'<td>'+ ((d.title == null) ? '' : d.title) +'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="details-title" width="10%">Text Clean:</td>'+
									'<td>'+ d.text +'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="details-title" width="10%">Text Raw:</td>'+
									'<td>'+ d.text_raw +'</td>'+
								'</tr>'+
								'<tr>'+
									'<td class="details-result" width="10%">Synthesized Result:</td>'+
									'<td><audio controls preload="none">' +
										'<source src="'+ d.result +'" type="audio/mpeg">' +
									'</audio></td>'+
								'</tr>'+
							'</table>'+
						'</div>';
			}

			// INITILIZE DATATABLE
			var table = $('#allResultsTable').DataTable({
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
				responsive: {
					details: {type: 'column'}
				},
				colReorder: true,
				language: {
					"emptyTable": "<div><img id='no-results-img' src='<?php echo e(URL::asset('img/files/no-result.png')); ?>'><br>No synthesized text results yet</div>",
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
				ajax: "<?php echo e(route('admin.tts.results')); ?>",
				columns: [{
						"className":      'details-control',
						"orderable":      false,
						"searchable":     false,
						"data":           null,
						"defaultContent": ''
					},{
						data: 'custom-plan-type',
						name: 'custom-plan-type',
						orderable: true,
						searchable: true
					},
					{
						data: 'created-on',
						name: 'created-on',
						orderable: true,
						searchable: true
					},
					{
						data: 'username',
						name: 'username',
						orderable: true,
						searchable: true
					},	
					{
						data: 'vendor',
						name: 'vendor',
						orderable: true,
						searchable: true
					},				
					{
						data: 'language',
						name: 'language',
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
						data: 'result_ext',
						name: 'result_ext',
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

			$('#allResultsTable tbody').on('click', 'td.details-control', function () {
				var tr = $(this).closest('tr');
				var row = table.row( tr );
		
				if ( row.child.isShown() ) {
					// This row is already open - close it
					$('div.slider', row.child()).slideUp( function () {
						row.child.hide();
						tr.removeClass('shown');
					} );
				}
				else {
					// Open this row
					row.child( format(row.data()), 'no-padding' ).show();
					tr.addClass('shown');
		
					$('div.slider', row.child()).slideDown();
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
						var formData = new FormData();
						formData.append("id", $(this).attr('id'));
						$.ajax({
							headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
							method: 'post',
							url: 'result/delete',
							data: formData,
							processData: false,
							contentType: false,
							success: function (data) {
								if (data == 'success') {
									Swal.fire('Result Deleted', 'Synthesize result has been successfully deleted', 'success');	
									$("#allResultsTable").DataTable().ajax.reload();								
								} else {
									Swal.fire('Delete Failed', 'There was an error while deleting this result', 'error');
								}      
							},
							error: function(data) {
								Swal.fire('Oops...','Something went wrong!', 'error')
							}
						})
					} 
				})
			});

		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\textovoice\resources\views/admin/tts-management/results/index.blade.php ENDPATH**/ ?>