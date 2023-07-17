@extends('layouts.app')

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">{{ __('Subscription Plans') }}</h4>
			<ol class="breadcrumb mb-2">
				<li class="breadcrumb-item"><a href="{{ route('user.tts') }}"><i class="fa-solid fa-badge-dollar mr-2 fs-12"></i>{{ __('User') }}</a></li>
				<li class="breadcrumb-item" aria-current="page"><a href="{{ route('user.balance') }}"> {{ __('My Balance') }}</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="{{url('#')}}"> {{ __('Subscription Plans') }}</a></li>
			</ol>
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')	
	<div class="card border-0 pt-2">
		<div class="card-body">			
			
			@if ($plan || $prepaid_exists)

				<div class="tab-menu-heading text-center">
					<div class="tabs-menu">								
						<ul class="nav">
							@if ($plan)
								@if (config('payment.payment_option') == 'subscription' || config('payment.payment_option') == 'both')
									<li><a href="#plans" class="@if (($plan && $prepaid_exists) || ($plan && !$prepaid_exists)) active @else '' @endif" data-toggle="tab"> {{ __('Monthly Plans') }}</a></li>
								@endif
							@endif
							@if ($prepaid_exists)
								@if (config('payment.payment_option') == 'prepaid' || config('payment.payment_option') == 'both')
									<li><a href="#prepaid" class="@if (!$plan && $prepaid_exists) active @else '' @endif" data-toggle="tab"> {{ __('Prepaid Plans') }}</a></li>
								@endif
							@endif
												
						</ul>
					</div>
				</div>

			

				<div class="tabs-menu-body">
					<div class="tab-content">

						@if ($plan)	
							@if (config('payment.payment_option') == 'subscription' || config('payment.payment_option') == 'both')
								<div class="tab-pane @if (($plan && $prepaid_exists) || ($plan && !$prepaid_exists)) active @else '' @endif" id="plans">

									@if ($subscriptions->count())		
										
										<h6 class="font-weight-normal fs-12 text-center mb-6">{{ __('Subscribe to our Monthly Subscription Plans and enjoy ton of benefits') }}</h6>

										<div class="row justify-content-md-center">

											@foreach ( $subscriptions as $subscription )																			
												<div class="col-lg-3 col-md-6 col-sm-12">
													<div class="price-card pl-6 pr-6 pt-2 mb-7">
														<div class="card border-0 p-4 pl-5 pr-5">
															<div class="plan">																										
																<span class="plan-currency-sign">{!! config('payment.default_system_currency_symbol') !!}</span><span class="plan-cost">{{ number_format((float)$subscription->cost, 2) }}</span><span class="plan-currency-sign">{{ $subscription->currency }}</span>
																<p class="fs-12">{{ $subscription->primary_heading }}</p>
																<div class="divider"></div>
																<div class="plan-title">{{ $subscription->plan_name }}</div>
																<p class="fs-12 mb-2">{{ $subscription->secondary_heading }}</p>
																<ul class="fs-12">														
																	@foreach ( (explode(',', $subscription->plan_features)) as $feature )
																		@if ($feature)
																			<li><i class="fa fa-check"></i> {{ $feature }}</li>
																		@endif																
																	@endforeach															
																</ul>																
															</div>	
															<div class="text-center action-button mt-5 mb-2">
																@if (auth()->user()->plan_id == $subscription->id)
																	<button type="button" class="btn btn-cancel">{{ __('Subscribed') }}</button> 
																@else
																<a href="{{ route('user.subscriptions.subscribe', $subscription->id) }}" class="btn btn-primary">{{ __('Subscribe Now') }}</a>
																@endif															
															</div>						
														</div>	
													</div>							
												</div>										
											@endforeach

										</div>	
									
									@else
										<div class="row text-center">
											<div class="col-sm-12 mt-6 mb-6">
												<h6 class="fs-12 font-weight-bold text-center">{{ __('No Subscriptions plans were set yet') }}</h6>
											</div>
										</div>
									@endif					
								</div>
							@endif	
						@endif	
						
						@if ($prepaid_exists)
							@if (config('payment.payment_option') == 'prepaid' || config('payment.payment_option') == 'both')
								<div class="tab-pane @if (!$plan && $prepaid_exists) active @else '' @endif" id="prepaid">

									@if ($prepaids->count())

										<h6 class="font-weight-normal fs-12 text-center mb-6">{{ __('Top up your subscription with more credits or start with Prepaid Plans credits only') }}</h6>
										
										<div class="row justify-content-md-center">
										
											@foreach ( $prepaids as $prepaid )																			
												<div class="col-lg-3 col-md-6 col-sm-12">
													<div class="price-card pl-6 pr-6 pt-2 mb-7">
														<div class="card border-0 p-4 pl-5">
															<div class="plan prepaid-plan">
																<div class="plan-title">{{ $prepaid->plan_name }} <span class="prepaid-currency-sign">{{ $prepaid->currency }}</span><span class="plan-cost">{{ number_format((float)$prepaid->cost, 2) }}</span><span class="prepaid-currency-sign">{!! config('payment.default_system_currency_symbol') !!}</span></div>
																<p class="fs-12 text-muted">{{ __('Total Characters') }} @if ($prepaid->bonus > 0) <span class="ml-2 gift text-success">+{{ number_format($prepaid->bonus) }} {{ __('bonus') }}!</span>@endif</p>
																	
																										
																<div class="text-center action-button mt-2 mb-2">
																	<a href="{{ route('user.prepaid.checkout', $prepaid->id) }}" class="btn btn-cancel">{{ __('Purchase') }}</a> 
																</div>
															</div>							
														</div>	
													</div>							
												</div>										
											@endforeach						

										</div>

									@else
										<div class="row text-center">
											<div class="col-sm-12 mt-6 mb-6">
												<h6 class="fs-12 font-weight-bold text-center">{{ __('No Pre-Paid plans were set yet') }}</h6>
											</div>
										</div>
									@endif

								</div>	
							@endif	
						@endif							
					</div>
				</div>
			
			@else
				<div class="row text-center">
					<div class="col-sm-12 mt-6 mb-6">
						<h6 class="fs-12 font-weight-bold text-center">{{ __('No Subscriptions or Pre-Paid plans were set yet') }}</h6>
					</div>
				</div>
			@endif

		</div>
	</div>
@endsection


