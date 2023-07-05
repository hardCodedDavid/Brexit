@extends('layouts.account')

@section('title', __('My statement history'))
@section('statements', __('is-active'))
@section('page', __('Investment History'))

@section('content')
<div class="row">
    <div class="col-lg-12">
		<div class="c-card c-card--responsive u-mb-medium">
			<div class="c-card__header c-card__header--transparent o-line">
			    <h5><small>Investment History</small></h5>
			</div>
			<div class="c-table-responsive@desktop">
				<table class="c-table c-table--zebra u-mb-small" id="datatable2">
					<thead class="c-table__head">
						<tr class="c-table__row">
						    <th class="c-table__cell c-table__cell--head">Property Image</th>
						    <th class="c-table__cell c-table__cell--head">Property Name</th>
						    <th class="c-table__cell c-table__cell--head">Date</th>
    						<th class="c-table__cell c-table__cell--head">Invested Amount</th>
    						<th class="c-table__cell c-table__cell--head">Investment Type</th>
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

                            <td class="c-table__cell">{{ date('Y-F-d', strtotime($transaction->created_at)) }}</td>
                            
                            <td class="c-table__cell">${{ number_format($transaction->amount_invested,2) }}</td>

    						<td class="c-table__cell">{{ ucwords($transaction->asset) }}</td>
    						<td class="c-table__cell">${{ number_format($transaction->roi) }}</td>
    						<td class="c-table__cell">
                                @if( $transaction->status == 'open')
                                    <div class="c-btn--small c-btn c-btn--success">
                                        Opened
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
