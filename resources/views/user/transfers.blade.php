@extends('layouts.account')

@section('title', __('My transfer history'))
@section('transfer-trx', __('is-active'))
@section('page', __('My Transfers'))

@section('content')
<div class="row">
    <div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			<div class="c-card__header c-card__header--transparent o-line">
			    <h5><small>My Transfers</small></h5>
			</div>
			<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small" id="datatable2">
					<thead class="c-table__head">
						<tr class="c-table__row">
						    <th class="c-table__cell c-table__cell--head">SN</th>
                            <th class="c-table__cell c-table__cell--head">From</th>
                            <th class="c-table__cell c-table__cell--head">To</th>
                            <th class="c-table__cell c-table__cell--head">Amount</th>
                            <th class="c-table__cell c-table__cell--head">Status</th>
                            <th class="c-table__cell c-table__cell--head">Date</th>
						</tr>
					</thead>
					<tbody>
					    @php
    					$i = 1;
    					@endphp
    					@foreach($transactions as $transaction)
                            @php
                                $from = \App\Plan::where('slug', $transaction->from)->first();
                                $to = \App\Plan::where('slug', $transaction->to)->first();
                            @endphp
    					<tr class="c-table__row c-table__row--danger">
    						<td class="c-table__cell">{{ $i++ }}</td>
                            <td class="c-table__cell">{{ $transaction->from}}</td>
                            <td class="c-table__cell">{{ $transaction->to }}</td>
                            <td class="c-table__cell">${{ number_format($transaction->amount,2) }}</td>
    						<td class="c-table__cell">
    							@if($transaction->status == 'approved')
    							    <div class="badge badge-success px-2 py-2"> {{ $transaction->status }}</div>
                                @elseif($transaction->status == 'pending')
                                    <div class="badge badge-warning px-2 py-2"> {{ $transaction->status }}</div>
                                @else
    							    <div class="badge badge-danger px-2 py-2"> {{ $transaction->status }}</div>
    							@endif
    						</td>
    						<td class="c-table__cell">{{ date('M d, Y', strtotime($transaction->created_at)) }}</td>
    					</tr>
    					@endforeach
					</tbody>
				</table>
			</div>
		</div>
        <nav class="c-pagination u-mt-small u-justify-between">

            @if($transactions->previousPageUrl() != null)
                <a class="c-pagination__control" href="{{$transactions->previousPageUrl()}}">
                    <i class="fa fa-caret-left"></i>
                </a>
            @else
                <a class="" href="">
                </a>
            @endif

            <p class="c-pagination__counter">Page {{$transactions->currentPage()}} of {{$transactions->lastPage()}}</p>

            @if($transactions->nextPageUrl() != null)
                <a class="c-pagination__control" href="{{$transactions->nextPageUrl()}}">
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
