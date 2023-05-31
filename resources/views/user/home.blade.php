@php
use App\Http\Controllers\Globals as Utils;

@endphp

@extends('layouts.account')

@section('title', __('Overview'))
@section('overview', __('is-active'))

@section('page', __('Account Overview'))

@section('content')
@php
	$plans = \App\Plan::where('featured', 1)->orderBy('id', 'desc')->get();

	$user = Utils::getUser();
    $transactions = $user->staticInvestments()->where('status', 'open')->latest()->paginate(12);
@endphp
<div class="row">
	<div class="col-xl-12 u-text-danger u-text-center">
		<h4>Your investment portfolio summary</h4>
		<span>Account Number: {{ auth()->user()->bx_account_number }}</span><br><br>
		{{-- <span>Account Number: BX657489-352467</span><br><br> --}}
	</div>
	<div class="col-xl-4">
		<div class="c-graph-card" data-mh="secondary-graphs">
			<div class="c-graph-card__content">
				<h3 class="c-graph-card__title u-h5">Portfolio Value: 
				<h4 class="u-h5 u-mb-zero u-text-danger" style="padding-top: 10px;">${{ number_format($investments,2) }}</h4>
				
				</h3>
			</div>
			<div class="c-graph-card__content">
				<h3 class="c-graph-card__title u-h5">Available Funds: 
				<h4 class="u-h5 u-mb-zero u-text-danger" style="padding-top: 10px;">${{ number_format(Utils::getAssetFunds(),2) }}</h4>
				
				</h3>
			</div>
			<div class="c-graph-card__chart u-flex u-justify-center">
				<canvas id="js-chart-customers" width="150" height="150"></canvas>
			</div>
			<div class="o-line u-ph-medium u-pv-small u-border-top">
				<span class="u-color-primary u-text-xsmall u-mr-xsmall">
				<i class="fa fa-circle-o u-mr-xsmall u-color-info"></i> Individual
				</span>
				<span class="u-color-primary u-text-xsmall u-mr-xsmall">
				<i class="fa fa-circle-o u-mr-xsmall u-color-primary"></i> Entity
				</span>
				<span class="u-color-primary u-text-xsmall u-mr-xsmall">
				<i class="fa fa-circle-o u-mr-xsmall u-color-warning"></i> Retirement
				</span>
			</div>
		</div>
		<div class="u-flex u-justify-between u-align-items-baseline">
			<h6>Third Party Signal: </h6>
			@if($user->portfolio_manager == 2)
				<button class="c-btn c-btn--success" type="button">Active</button>
			@else
				<button class="c-btn c-btn--danger" type="button">Inactive</button>
			@endif
		</div>
	</div>
	<div class="col-lg-8">
		<div class="c-card c-card--responsive u-mb-medium">
			<div class="c-card__header c-card__header--transparent o-line">
			    <small>MOVEMENT ON CURRENT HOLDINGS: PROFIT & LOSS VALUE</small>
				<div class="c-card__meta">
				    <h5 class="c-card__title u-text-danger">${{ number_format($investments,2) }}</h5>
				</div>
			</div>
			<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small" id="datatable2">
					<thead class="c-table__head">
						<tr class="c-table__row">
							<th class="c-table__cell c-table__cell--head">INVESTMENT TYPES</th>
							<th class="c-table__cell c-table__cell--head">DISTRIBUTION</th>
							<th class="c-table__cell c-table__cell--head">CURRENT VALUE</th>
						</tr>
					</thead>
					<tbody>
						@foreach($investmentt as $investment)
							@php
							$plan = Utils::getPlan($investment->plan);
                            if($investment->plan == 'brexist-trust-funds'){
                                $progressbar_color = 'c-progress--blue';
                            }elseif($investment->plan == 'tax-free-savings-account'){
                                $progressbar_color = 'c-progress--dark';
                            }else{
                                $progressbar_color = 'c-progress--warning';
                            }
							if($investment->amount > 0)
								$dist = ($investment->amount/$investments)*100;
							else
								$dist = 0;
							@endphp
						<tr class="c-table__row c-table__row--danger">
							<td class="c-table__cell">{{ $investment->plan }}</td>
							<td class="c-table__cell">
								<div class="c-progress c-progress--medium {{$progressbar_color}}">
									<div class="c-progress__bar" style="width:{{round($dist,1)}}%;"></div>
								</div>
							</td>
							<td class="c-table__cell">
								${{ number_format($investment->amount,2) }}
								<!--@if($investment->locked) <span style="color:red; font-size: 9px;">(in locked funds) </span> @endif-->
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small" id="datatable2">
					<thead class="c-table__head">
						<tr class="c-table__row">
						    <th class="c-table__cell c-table__cell--head">Property Image</th>
						    <th class="c-table__cell c-table__cell--head">Property Name</th>
    						<th class="c-table__cell c-table__cell--head">Invested Amount</th>
    						<th class="c-table__cell c-table__cell--head">Assets</th>
                            <th class="c-table__cell c-table__cell--head">Roi</th>
                            <th class="c-table__cell c-table__cell--head">Status</th>
						</tr>
					</thead>
					<tbody>
					    @php
    					$i = 1;
    					@endphp
    					@foreach($transactions as $transaction)
                            @php
                                $plan = \App\Plan::where('slug', $transaction->plan)->first();
                                $property_img = \App\PropertyImage::where('plan_id', $plan->id)->first();
                            @endphp
    					<tr class="c-table__row c-table__row--danger">

    						<td class="c-table__cell">
                            @if($property_img->img_url)
                                <img class="c-avatar__img" style="width: 60px; height: 60px;" src="{{ $property_img->img_url }}" alt="...">
                            @endif
                                
                            </td>

    						<td class="c-table__cell">{{ $plan->name }}</td>

                            {{-- <td class="c-table__cell">{{ date('Y-F-d', strtotime($transaction->created_at)) }}</td> --}}
                            
                            <td class="c-table__cell">${{ number_format($transaction->amount_invested,2) }}</td>

    						<td class="c-table__cell">{{ ucwords($transaction->asset) }}</td>
    						<td class="c-table__cell">${{ number_format($transaction->roi) }}</td>
    						<td class="c-table__cell">
                                @if( $transaction->status == 'open')
                                    <div class="c-btn--small c-btn c-btn--success">
                                        Owned
                                    </div>
                                @elseif($transaction->status == 'close')
                                    <div class="c-btn--small c-btn c-btn--danger">
                                        Closed
                                    </div>
                                @endif
                            </td>
    					</tr>
    					@endforeach
					</tbody>
				</table>
			</div>
	</div>
	@if(isset($static) && $static->id != null)
	<div class="col-xl-6">
		<div class="c-card u-p-medium u-mb-small">
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Statutory costs</p>
				<span class="u-text-small u-text-mute">${{ number_format($static->statutory,2) }}</span>
			</div>

			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Brokerage Costs</p>
				<span class="u-text-small u-text-mute">${{ number_format($static->brokerage,2) }}</span>
			</div>
			<div class="c-divider u-mt-xsmall u-mb-xsmall"></div>
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Income Tax</p>
				<span class="u-text-small u-text-mute">${{ number_format($static->accrued_expense,2) }}</span>
			</div>
{{--			<div class="o-line u-mb-xsmall">--}}
{{--				<p class="u-text-small">Accrued Income</p>--}}
{{--				<span class="u-text-small u-text-mute">${{ number_format($static->accrued_income,2) }}</span>--}}
{{--			</div>--}}
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Accrued Income</p>
                @php
                    $deposits = App\Deposit::where('user', $user->email)->sum('amount');
                    //$withdrawals = App\Payout::where('user', $user->email)->sum('amount');
                    $result = $investments - $deposits;
                @endphp
				<span class="u-text-small u-text-mute">${{ number_format($result > 0 ? $result : 0, 2) }}</span>
			</div>
		</div>
	</div>
	<div class="col-xl-6">
	    <div class="c-card u-p-medium u-mb-small">
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Withdrawable Funds</p>
				<span class="u-text-small u-text-mute">${{ number_format(Utils::getWithdrawableFunds(),2) }}</span>
			</div>
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Bonus</p>
				<span class="u-text-small u-text-mute">${{ number_format($static->unsettled,2) }}</span>
			</div>
            <div class="o-line u-mb-xsmall">
                <p class="u-text-small">Locked Funds</p>
                <span class="u-text-small u-text-mute">${{ number_format(Utils::getLockedFunds(),2) }}</span>
            </div>

			<div class="c-divider u-mt-xsmall u-mb-xsmall"></div>
			<div class="o-line u-mb-xsmall">
				<a href="/deposit" class="u-text-danger">Fund this account</a>
			</div>
			<div class="o-line u-mb-xsmall">
				<a href="/transfer" class="u-text-danger">Inter-account Transfer</a>
			</div>
		</div>
	</div>
	@else
	<div class="col-xl-6">
		<div class="c-card u-p-medium u-mb-small">
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Statutory costs</p>
				<span class="u-text-small u-text-mute">$0.00</span>
			</div>

			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Brokerage Costs</p>
				<span class="u-text-small u-text-mute">$0.00</span>
			</div>
			<div class="c-divider u-mt-xsmall u-mb-xsmall"></div>
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Income Tax</p>
				<span class="u-text-small u-text-mute">$0.00</span>
			</div>
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Acrued Income</p>
				<span class="u-text-small u-text-mute">$0.00</span>
			</div>
		</div>
	</div>
	<div class="col-xl-6">
	    <div class="c-card u-p-medium u-mb-small">
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Withdrawable Funds</p>
				<span class="u-text-small u-text-mute">$0.00</span>
			</div>
			<div class="o-line u-mb-xsmall">
				<p class="u-text-small">Bonus</p>
				<span class="u-text-small u-text-mute">$0.00</span>
			</div>
            <div class="o-line u-mb-xsmall">
                <p class="u-text-small">Locked Funds</p>
                <span class="u-text-small u-text-mute">$0.00</span>
            </div>
			<div class="c-divider u-mt-xsmall u-mb-xsmall"></div>
			<div class="o-line u-mb-xsmall">
				<a href="/deposit" class="u-text-danger">Fund this account</a>
			</div>
			<div class="o-line u-mb-xsmall">
				<a href="/transfer" class="u-text-danger">Inter-account Transfer</a>
			</div>
		</div>
	</div>
	@endif

	<div class="row">
	<h4 class="mt-2 pb-4"> Featured Properties</h4>
		@foreach($plans as $property)
		@push('styles')
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		@endpush
			<div class="col-md-4" style="margin-bottom: 10px;">
				<div class="card" style="border-radius: 10px;background: white;">
					@php
						$property_img = App\PropertyImage::where('plan_id', $property->id)->get();
					@endphp

					<div id="carouselExampleIndicators{{ $property->id }}" class="carousel slide" data-ride="carousel">
						<div class="carousel-indicators">
							@foreach($property_img as $key => $image)
								<button type="button" data-bs-target="#carouselExampleIndicators{{ $property->id }}" data-bs-slide-to="{{$key}}" class="@if($key==0) active @endif"  aria-current="@if($key==0) true @endif" aria-label="Slide {{$key}}"></button>
							@endforeach
						</div>
						<div class="carousel-inner">
							@foreach($property_img as $key => $image)
							<div class="carousel-item @if($key==0) active @endif">
								<img src="{{ $image->img_url }}" alt="{{ $image->title }}" class="d-block w-100" alt="...">
							</div>
						@endforeach
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{ $property->id }}" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{ $property->id }}" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
					{{-- <img style="border-radius: 10px; padding: 5px" src="{{ $property->property_img }}" class="card-img-top" alt="..."> --}}
					<div class="card-body" style="padding: 10px;">
							<h5 class="card-title pb-1">{{ $property->name }}</h5>
							<p class="card-text pb-2">{{ $property->body }}</p>
							<div class="row">
								<div class="col-6">
									<div class="row" style="margin-top: 5px;">
										<div class="col-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q.825 0 1.413-.588T14 10q0-.825-.588-1.413T12 8q-.825 0-1.413.588T10 10q0 .825.588 1.413T12 12Zm0 7.35q3.05-2.8 4.525-5.088T18 10.2q0-2.725-1.738-4.462T12 4Q9.475 4 7.737 5.738T6 10.2q0 1.775 1.475 4.063T12 19.35ZM12 22q-4.025-3.425-6.012-6.362T4 10.2q0-3.75 2.413-5.975T12 2q3.175 0 5.588 2.225T20 10.2q0 2.5-1.988 5.438T12 22Zm0-11.8Z"/></svg>
										</div>
										<div class="col">
											<p>{{ $property->location }}</p>
										</div>
									</div>

									<div class="row" style="margin-top: 5px;">
										<div class="col-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11 20H6q-.425 0-.713-.288T5 19v-7H3.3q-.35 0-.475-.325t.15-.55l8.35-7.525q.275-.275.675-.275t.675.275L16 6.6V5q0-.425.288-.713T17 4h1q.425 0 .713.288T19 5v4.3l2.025 1.825q.275.225.15.55T20.7 12H19v7q0 .425-.288.713T18 20h-5v-6h-2v6Zm-4-2h2v-5q0-.425.288-.713T10 12h4q.425 0 .713.288T15 13v5h2v-7.8l-5-4.5l-5 4.5V18Zm3-7.975h4q0-.8-.6-1.313T12 8.2q-.8 0-1.4.513t-.6 1.312ZM10 12h4h-4Z"/></svg>
										</div>
										<div class="col">
											<p>{{ $property->type }}</p>
										</div>
									</div>

									<div class="row" style="margin-top: 5px;">
										<div class="col-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 17h2v-1h1q.425 0 .713-.288T12 15v-3q0-.425-.288-.713T11 11H8v-1h4V8h-2V7H8v1H7q-.425 0-.713.288T6 9v3q0 .425.288.713T7 13h3v1H6v2h2v1Zm8-.75l2-2h-4l2 2ZM14 10h4l-2-2l-2 2ZM4 20q-.825 0-1.413-.588T2 18V6q0-.825.588-1.413T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.588 1.413T20 20H4Zm0-2h16V6H4v12Zm0 0V6v12Z"/></svg>
										</div>
										<div class="col">
											<p>${{ $property->price }}</p>
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="row" style="margin-top: 5px;">
										<div class="col-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15"><path fill="currentColor" d="M4.5 8.5H4a.5.5 0 0 0 .5.5v-.5Zm4 0V9a.5.5 0 0 0 .5-.5h-.5Zm0-2.5H9a.5.5 0 0 0-.146-.354L8.5 6Zm-2-2l.354-.354a.5.5 0 0 0-.708 0L6.5 4Zm-2 2l-.354-.354A.5.5 0 0 0 4 6h.5Zm10.354 8.146l-4-4l-.708.708l4 4l.708-.708ZM6.5 12A5.5 5.5 0 0 1 1 6.5H0A6.5 6.5 0 0 0 6.5 13v-1ZM12 6.5A5.5 5.5 0 0 1 6.5 12v1A6.5 6.5 0 0 0 13 6.5h-1ZM6.5 1A5.5 5.5 0 0 1 12 6.5h1A6.5 6.5 0 0 0 6.5 0v1Zm0-1A6.5 6.5 0 0 0 0 6.5h1A5.5 5.5 0 0 1 6.5 1V0Zm-2 9h4V8h-4v1ZM9 8.5V6H8v2.5h1Zm-.146-2.854l-2-2l-.708.708l2 2l.708-.708Zm-2.708-2l-2 2l.708.708l2-2l-.708-.708ZM4 6v2.5h1V6H4Z"/></svg>
										</div>
										<div class="col">
											<p>{{ $property->leverage }}</p>
										</div>
									</div>

									<div class="row" style="margin-top: 5px;">
										<div class="col-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M2.5 5.5a5 5 0 0 1 10 0m-11 0h12m-13 3H4A2.5 2.5 0 0 1 6.5 11h0m-3 0h5a2 2 0 0 1 2 2h0a.5.5 0 0 1-.5.5H.5"/></svg>
										</div>
										<div class="col">
											<p>{{ $property->rental }}</p>
										</div>
									</div>

									<div class="row" style="margin-top: 5px;">
										<div class="col-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><path fill="currentColor" d="M244.8 150.4a8 8 0 0 1-11.2-1.6A51.6 51.6 0 0 0 192 128a8 8 0 0 1-7.37-4.89a8 8 0 0 1 0-6.22A8 8 0 0 1 192 112a24 24 0 1 0-23.24-30a8 8 0 1 1-15.5-4A40 40 0 1 1 219 117.51a67.94 67.94 0 0 1 27.43 21.68a8 8 0 0 1-1.63 11.21ZM190.92 212a8 8 0 1 1-13.84 8a57 57 0 0 0-98.16 0a8 8 0 1 1-13.84-8a72.06 72.06 0 0 1 33.74-29.92a48 48 0 1 1 58.36 0A72.06 72.06 0 0 1 190.92 212ZM128 176a32 32 0 1 0-32-32a32 32 0 0 0 32 32Zm-56-56a8 8 0 0 0-8-8a24 24 0 1 1 23.24-30a8 8 0 1 0 15.5-4A40 40 0 1 0 37 117.51a67.94 67.94 0 0 0-27.4 21.68a8 8 0 1 0 12.8 9.61A51.6 51.6 0 0 1 64 128a8 8 0 0 0 8-8Z"/></svg>
										</div>
										<div class="col">
											<p>${{ $property->investors }}</p>
										</div>
									</div>
								</div>
							</div>

							<a href="/invest-noww/invest/{{ $property->slug }}" style="margin-top: 10px;" class="c-btn c-btn--danger c-btn--fullwidth">Invest Now</a>
							{{-- <a href="#" style="margin-top: 10px;" class="c-btn c-btn--primary c-btn--fullwidth">Owned</a> --}}
						</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endsection

@section('foot')
<script type="text/javascript">
	var m = document.getElementById("js-chart-customers");
	if (m) new Chart(m, {
            type: "doughnut",
            data: {
            	@if($invB == 0 && $invT == 0 & $invO == 0)
                datasets: [{
                    data: [0, 0, 100],
                    backgroundColor: ["#289DF5", "#40557D", "#888888"]
                }],
                labels: ["Blue", "Dark", "Gray"]
                @else
                datasets: [{
                    data: [{{$invB}}, {{$invT}}, {{$invO}}],
                    backgroundColor: ["#289DF5", "#40557D", "#FFD400"]
                }],
                labels: ["Blue", "Dark", "Yellow"]
                @endif
            },
            options: {
                cutoutPercentage: 70,
                responsive: !1,
                maintainAspectRatio: !1,
                legend: {
                    display: !1
                },
                tooltips: {
                    enabled: !1
                }
            }
        });
</script>

<style>

    .c-progress--dark .c-progress__bar {
        background: #40557D;
        background: linear-gradient(180deg, #40557D, #2b3e7d);
    }

    .c-progress--blue .c-progress__bar {
        background: #289DF5;
        background: linear-gradient(180deg, #289DF5, #126df5);
    }
</style>
@endsection
