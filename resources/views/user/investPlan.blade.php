@extends('layouts.account')

@section('title', __('Invetment Plans'))
@section('investnow', __('is-active'))
@section('page', __('Properties'))

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="row">
		@foreach($plans as $property)
			<div class="col-md-4" style="margin-bottom: 10px;">
				<div class="card" style="border-radius: 10px;background: white;">
					<img style="border-radius: 10px; padding: 10px" src="{{ $property->property_img }}" class="card-img-top" alt="...">
					<div class="card-body" style="padding: 20px; margin-top: 20px;">
						<h5 class="card-title" style="font-weight: 800;">{{ $property->name }}</h5>
						<div class="row" style="margin-top: 10px;">
							<div class="col-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q.825 0 1.413-.588T14 10q0-.825-.588-1.413T12 8q-.825 0-1.413.588T10 10q0 .825.588 1.413T12 12Zm0 7.35q3.05-2.8 4.525-5.088T18 10.2q0-2.725-1.738-4.462T12 4Q9.475 4 7.737 5.738T6 10.2q0 1.775 1.475 4.063T12 19.35ZM12 22q-4.025-3.425-6.012-6.362T4 10.2q0-3.75 2.413-5.975T12 2q3.175 0 5.588 2.225T20 10.2q0 2.5-1.988 5.438T12 22Zm0-11.8Z"/></svg>
							</div>
							<div class="col">
								<p style="font-weight: 600;">{{ $property->location }}</p>
							</div>
						</div>

						<div class="row" style="margin-top: 10px;">
							<div class="col-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11 20H6q-.425 0-.713-.288T5 19v-7H3.3q-.35 0-.475-.325t.15-.55l8.35-7.525q.275-.275.675-.275t.675.275L16 6.6V5q0-.425.288-.713T17 4h1q.425 0 .713.288T19 5v4.3l2.025 1.825q.275.225.15.55T20.7 12H19v7q0 .425-.288.713T18 20h-5v-6h-2v6Zm-4-2h2v-5q0-.425.288-.713T10 12h4q.425 0 .713.288T15 13v5h2v-7.8l-5-4.5l-5 4.5V18Zm3-7.975h4q0-.8-.6-1.313T12 8.2q-.8 0-1.4.513t-.6 1.312ZM10 12h4h-4Z"/></svg>
							</div>
							<div class="col">
								<p style="font-weight: 600;">{{ $property->type }}</p>
							</div>
						</div>

						<div class="row" style="margin-top: 10px;">
							<div class="col-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 17h2v-1h1q.425 0 .713-.288T12 15v-3q0-.425-.288-.713T11 11H8v-1h4V8h-2V7H8v1H7q-.425 0-.713.288T6 9v3q0 .425.288.713T7 13h3v1H6v2h2v1Zm8-.75l2-2h-4l2 2ZM14 10h4l-2-2l-2 2ZM4 20q-.825 0-1.413-.588T2 18V6q0-.825.588-1.413T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.588 1.413T20 20H4Zm0-2h16V6H4v12Zm0 0V6v12Z"/></svg>
							</div>
							<div class="col">
								<p style="font-weight: 600;">${{ $property->price }}</p>
							</div>
						</div>
						
						{{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
						<a href="/invest-noww/invest/{{ $property->slug }}" style="margin-top: 10px;" class="c-btn c-btn--danger c-btn--fullwidth">Invest Now</a>
						{{-- <a href="#" style="margin-top: 10px;" class="c-btn c-btn--primary c-btn--fullwidth">Owned</a> --}}
					</div>
				</div>
			</div>
		@endforeach
		</div>
		{{-- <div class="c-card c-card--responsive u-mb-medium">
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
								<a href="/invest-noww/invest/{{ $plan->slug }}" class="c-btn c-btn--secondary" aria-haspopup="true" aria-expanded="false">Invest Now</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div> --}}
	</div>
</div>

@endsection