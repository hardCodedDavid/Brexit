@extends('layouts.admin')
@if(isset($edit))
@section('title', __('Edit Property'))
@else
@section('title', __('Add Property'))
@endif
@section('property', __('true'))

@section('head')
@endsection

@section('foot')
@endsection

@section('breadcrumb')
<ul class="navbar-nav flex-row">
	<li>
		<div class="page-header">
			<nav class="breadcrumb-one" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/investments">Investments</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>{{ (isset($edit))?'Edit':'Add' }} Investment</span></li>
				</ol>
			</nav>
		</div>
	</li>
</ul>
@endsection

@section('content')
<div class="col-xl-6 col-lg-6 col-sm-12  layout-spacing">
	<div class="widget-content widget-content-area br-6">
		<div class=" mb-4 mt-4">
			@if(isset($edit))
                <form method="post" action="{{ route('updateProperty', $plan->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $plan->name }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" value="{{ $plan->location }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" value="{{ $plan->type }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="{{ $plan->price }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Image</label>
                            <input type="file" name="img" class="c-input" value="{{ $plan->property_img }}">
                        </div>
                        <input type="hidden" name="property_img" value="{{ $plan->property_img }}" />
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">Edit</button>
                </form>
                
			@else
			    <form method="post" action="{{ route('createProperty') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Type</label>
                            <input type="text" name="type" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Image</label>
                            <input type="file" name="img" class="c-input" required step="any">
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">ADD</button>
                </form>
			@endif
		</div>
	</div>
</div>
@endsection
