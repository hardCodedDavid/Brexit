@extends('layouts.account')

@section('title', __('My transaction history'))
@section('transactions', __('is-active'))
@section('page', __('My Transactions'))

@section('content')
<div class="row">
    <div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			<div class="c-card__header c-card__header--transparent o-line">
			    <h5><small>My Transactions</small></h5>
			</div>
			<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small" id="datatable2">
					<thead class="c-table__head">
						<tr class="c-table__row">
						    {{-- <th class="c-table__cell c-table__cell--head">SN</th> --}}
    						<th class="c-table__cell c-table__cell--head">Date</th>
    						<th class="c-table__cell c-table__cell--head">Account Type</th>
    						<th class="c-table__cell c-table__cell--head">Type</th>
    						<th class="c-table__cell c-table__cell--head">Amount</th>
    						<th class="c-table__cell c-table__cell--head">Status</th>
						</tr>
					</thead>
					<tbody>
					    @php
    					$i = 1;
    					@endphp
    					@foreach($transactions as $transaction)
    					<tr class="c-table__row c-table__row--danger">
    						{{-- <td class="c-table__cell">{{ $i++ }}</td> --}}
    						<td class="c-table__cell">{{ date('Y-F-d', strtotime($transaction->created_at)) }}</td>
    					    <td class="c-table__cell">{{ $transaction->account_type }}</td>
    					    <td class="c-table__cell">{{ $transaction->type }}</td>
    						<td class="c-table__cell">${{ number_format($transaction->amount,2) }}</td>
							<td class="c-table__cell">
    							@if($transaction->status == 'approved')
    							<div class="badge badge-success px-2 py-2"> {{ $transaction->status }}</div>
    							@else
    							<div class="badge badge-danger px-2 py-2"> {{ $transaction->status }}</div>
    							@endif
    						</td>
    						
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
