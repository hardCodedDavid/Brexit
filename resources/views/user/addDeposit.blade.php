@extends('layouts.account')

@section('title', __('Create Deposit'))
@section('deposits', __('is-active'))
@section('page', __('Deposits'))

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			<div class="c-card__header c-card__header--transparent o-line">
				<h5 class="c-card__title">AVAILABLE INVESTMENT TYPES</h5>
				<div class="c-card__meta">
				</div>
			</div>
			<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small" id="datatable2">
					<thead class="c-table__head">
						<tr class="c-table__row">
							<th class="c-table__cell c-table__cell--head">PLAN NAME</th>
							<th class="c-table__cell c-table__cell--head">ACTION</th>
						</tr>
					</thead>
					<tbody>
						@foreach($plans as $plan)
						<tr class="c-table__row">
							<td class="c-table__cell">{{ $plan->name }}</td>
							<td class="c-table__cell">
								<a href="/deposit-noww/deposit/{{ $plan->slug }}" class="c-btn c-btn--secondary" aria-haspopup="true" aria-expanded="false">Deposit Now</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection