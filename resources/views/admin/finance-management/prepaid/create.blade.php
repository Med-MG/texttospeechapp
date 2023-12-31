@extends('layouts.app')

@section('css')
	<!-- Data Table CSS -->
	<link href="{{URL::asset('plugins/awselect/awselect.min.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7"> 
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('New Prepaid Plan') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-sack-dollar mr-2 fs-12"></i>{{ __('Admin') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.finance.dashboard') }}"> {{ __('Finance Management') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.finance.subscriptions') }}"> {{ __('Prepaid Plan Types') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="#"> {{ __('New Plan') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')						
	<div class="row">
		<div class="col-lg-6 col-md-6 col-xm-12">
			<div class="card border-0">
				<div class="card-header">
					<h3 class="card-title">{{ __('Create New Prepaid Plan') }}</h3>
				</div>
				<div class="card-body pt-5">									
					<form action="{{ route('admin.finance.prepaid.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12">				
								<div class="input-box">	
									<h6>{{ __('Plan Type') }}<span class="text-muted">({{ __('Required') }})</span></h6>
									<select id="plan-type" name="plan-type" data-placeholder="{{ __('Select Plan Type') }}:" data-callback="hide_headings">			
										<option value="prepaid" selected>{{ __('Prepaid') }}</option>
									</select>
									@error('plan-type')
										<p class="text-danger">{{ $errors->first('plan-type') }}</p>
									@enderror
								</div> 							
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">						
								<div class="input-box">	
									<h6>{{ __('Plan Status') }} <span class="text-muted">({{ __('Required') }})</span></h6>
									<select id="plan-status" name="plan-status" data-placeholder="{{ __('Select Plan Status') }}:">			
										<option value="active" selected>{{ __('Active') }}</option>
										<option value="closed">{{ __('Closed') }}</option>
									</select>
									@error('plan-status')
										<p class="text-danger">{{ $errors->first('plan-status') }}</p>
									@enderror	
								</div>						
							</div>
						
						</div>

						<div class="row mt-2">							
							<div class="col-lg-6 col-md-6col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Plan Name') }} <span class="text-muted">({{ __('Required') }})</span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="plan-name" name="plan-name" value="{{ old('plan-name') }}" required>
									</div> 
									@error('plan-name')
										<p class="text-danger">{{ $errors->first('plan-name') }}</p>
									@enderror
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Price') }} <span class="text-muted">({{ __('Required') }})</span></h6>
									<div class="form-group">							    
										<input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" required>
									</div> 
									@error('cost')
										<p class="text-danger">{{ $errors->first('cost') }}</p>
									@enderror
								</div> 						
							</div>

							<div class="col-lg-6 col-md-6col-sm-12">							
								<div class="input-box">								
									<h6>{{ __('Currency') }} <span class="text-muted">({{ __('Required') }})</span></h6>
									<select id="currency" name="currency" data-placeholder="{{ __('Select Currency') }}:">		
										@foreach(config('currencies.all') as $key => $value)
											<option value="{{ $key }}" @if(config('payment.default_system_currency') == $key) selected @endif>{{ $value['name'] }} - {{ $key }} ({{ $value['symbol'] }})</option>
										@endforeach
									</select>
									@error('currency')
										<p class="text-danger">{{ $errors->first('currency') }}</p>
									@enderror
								</div> 						
							</div>
						</div>

						<div class="card mt-3 mb-5 special-shadow border-0">
							<div class="card-body">
								<h6 class="fs-12 font-weight-bold mb-5"><i class="fa fa-cubes text-info fs-14 mr-1 fw-2"></i>{{ __('Included Characters') }}</h6>

								<div class="row">
									<div class="col-lg-6 col-md-6col-sm-12">							
										<div class="input-box">								
											<h6>{{ __('Included Characters') }} <span class="text-muted">({{ __('Required') }})</span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="characters" name="characters" value="{{ old('characters') }}" required>
											</div> 
											@error('characters')
												<p class="text-danger">{{ $errors->first('characters') }}</p>
											@enderror
										</div> 						
									</div>
		
									<div class="col-lg-6 col-md-6col-sm-12">							
										<div class="input-box">								
											<h6>{{ __('Bonus Characters') }} <span class="text-muted">({{ __('Optional') }})</span></h6>
											<div class="form-group">							    
												<input type="text" class="form-control" id="bonus" name="bonus" value="{{ old('bonus') }}" value="0">
											</div> 
											@error('bonus')
												<p class="text-danger">{{ $errors->first('bonus') }}</p>
											@enderror
										</div> 						
									</div>
								</div>
							</div>
						</div>

						<!-- ACTION BUTTON -->
						<div class="border-0 text-right mb-2 mt-1">
							<a href="{{ route('admin.finance.prepaid') }}" class="btn btn-cancel mr-2">{{ __('Cancel') }}</a>
							<button type="submit" class="btn btn-primary">{{ __('Create') }}</button>							
						</div>				

					</form>					
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<!-- Awselect JS -->
	<script src="{{URL::asset('plugins/awselect/awselect.min.js')}}"></script>
	<script src="{{URL::asset('js/awselect.js')}}"></script>
@endsection
