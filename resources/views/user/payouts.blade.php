@extends('layouts.account')

@section('title', __('Withdrawals'))
@section('withdrawals', __('is-active'))
@section('page', __('Withdrawals'))

@section('content')
<div class="row">
	<div class="col-lg-2">
		<a class="c-btn c-btn--danger c-btn--fullwidth" href="{{ route('addWithdrawal') }}" role="button" aria-haspopup="true" aria-expanded="false">Request Withdrawals</a>
		<br><br>
	</div>
	<div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			<div class="c-card__header c-card__header--transparent o-line">
			    <small>My Withdrawals</small></h5>
			</div>
			<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small" id="datatable2">
					<thead class="c-table__head">
						<tr class="c-table__row">
						    <th class="c-table__cell c-table__cell--head">SN</th>
							<th class="c-table__cell c-table__cell--head">Amount</th>
							<th class="c-table__cell c-table__cell--head">Status</th>
							<th class="c-table__cell c-table__cell--head">Date Requested</th>
							<th class="c-table__cell c-table__cell--head">Date Reviewed</th>
						</tr>
					</thead>
					<tbody>
					    @php
						$i = 1;
						@endphp
						@foreach($payouts as $payout)
						<tr class="c-table__row c-table__row--danger">
							<td class="c-table__cell">{{ $i++ }}</td>
							<td class="c-table__cell">${{ number_format($payout->amount,2) }}</td>
							<td class="c-table__cell">{{ $payout->status }}</td>
							<td class="c-table__cell">{{ date('Y-F-d', strtotime($payout->created_at)) }}</td>
							<td class="c-table__cell"> @if($payout->status == 'pending') Pending Approval @else {{ date('Y-F-d', strtotime($payout->updated_at)) }} @endif </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
        <nav class="c-pagination u-mt-small u-justify-between">

            @if($payouts->previousPageUrl() != null)
                <a class="c-pagination__control" href="{{$payouts->previousPageUrl()}}">
                    <i class="fa fa-caret-left"></i>
                </a>
            @else
                <a class="" href="">
                </a>
            @endif

            <p class="c-pagination__counter">Page {{$payouts->currentPage()}} of {{$payouts->lastPage()}}</p>

            @if($payouts->nextPageUrl() != null)
                <a class="c-pagination__control" href="{{$payouts->nextPageUrl()}}">
                    <i class="fa fa-caret-right"></i>
                </a>
            @else
                <a class="" href="">
                </a>
            @endif
        </nav>

    </div>
</div>
@endsection
