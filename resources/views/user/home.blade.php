@php
use App\Http\Controllers\Globals as Utils;
@endphp

@extends('layouts.account')

@section('title', __('Overview'))
@section('overview', __('is-active'))

@section('page', __('Account Overview'))

@section('content')
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
				<div>
					{{-- <h4 class="u-h5 u-mb-zero u-text-danger">${{ number_format($investments,2) }}</h4> --}}
					<!--<span class="u-color-success">+{{round($overP) }}%</span>-->
				</div>
			</div>
			<div class="c-graph-card__chart u-flex u-justify-center">
				<canvas id="js-chart-customers" width="150" height="150"></canvas>
			</div>
			<div class="o-line u-ph-medium u-pv-small u-border-top">
				<span class="u-color-primary u-text-xsmall u-mr-xsmall">
				<i class="fa fa-circle-o u-mr-xsmall u-color-info"></i> BUT
				</span>
				<span class="u-color-primary u-text-xsmall u-mr-xsmall">
				<i class="fa fa-circle-o u-mr-xsmall u-color-primary"></i> TFSA
				</span>
				<span class="u-color-primary u-text-xsmall u-mr-xsmall">
				<i class="fa fa-circle-o u-mr-xsmall u-color-warning"></i> OA
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
							<td class="c-table__cell">{{ $plan->name }}</td>
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
				<p class="u-text-small">Accrued Expense</p>
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
				<p class="u-text-small">Unsettled Cash</p>
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
