@extends('layouts.account')

@section('title', __('Invetment Plans'))
@section('investnow', __('is-active'))
@section('page', __('Properties'))

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-6">
			<div class="row">
				<div style="padding: 20px 0px 40px 0px">
					<div class="c-state-card__content">
						<h6 class="c-state-card__number u-h3">All Properties</h6>
						<p>Our team selectively purchases the top 1% of properties we source, making each hand-picked
							property an inspired opportunity</p>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
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
							<h5 class="card-title pb-1"><a href="{{ route('showProperty', $property->id) }}" style="color: inherit; text-decoration: none;">{{ $property->name }}</a></h5>
							<!-- <p class="card-text pb-2">{{ $property->body }}</p> -->
							<style>
								.editor-wrapper {
									max-height: 5.2em; /* Three lines with line height */
									overflow: hidden;
									margin-bottom: 20px;
								}

								.editor-content {
									display: -webkit-box;
									-webkit-line-clamp: 3; /* Number of lines to display */
									-webkit-box-orient: vertical;
									overflow: hidden;
								}
							</style>
							<div class="editor-wrapper">
								<div class="editor-content">
								{{ $property->body }}
								</div>
							</div>
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
											<p>{{ $property->investors }}</p>
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
</div>

@endsection