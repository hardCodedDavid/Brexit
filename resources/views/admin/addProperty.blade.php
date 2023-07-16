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

<script src="/path/or/uri/to/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
    selector: '#mytextarea'
    });
</script>

<ul class="navbar-nav flex-row">
	<li>
		<div class="page-header">
			<nav class="breadcrumb-one" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/admin/home">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/admin/investments">Properties</a></li>
					<li class="breadcrumb-item active" aria-current="page"><span>{{ (isset($edit))?'Edit':'Add' }} Properties</span></li>
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
                @php
                    $property_img = App\PropertyImage::where('plan_id', $plan->id)->get();
                @endphp
                <form method="post" action="{{ route('updateProperty', $plan->id) }}" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Property Name</label>
                            <input type="text" name="name" class="form-control" step="any" value="{{ $plan->name }}" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Type</label>
                            <select class="form-control" name="type" required>
                                <option value="{{ $plan->type }}">{{ $plan->type }}</option>
                                @foreach(['Vacation rental','Web3 properties', 'Single family residential'] as $type)
                                    <option value="{{ $type }}">{{ ucwords($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Location</label>
                            <input type="text" name="location" class="form-control" value="{{ $plan->location }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $plan->price }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Leverage</label>
                            <input type="text" name="leverage" class="form-control" value="{{ $plan->leverage }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Monthly rental value</label>
                            <input type="text" name="rental" class="form-control" value="{{ $plan->rental }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Amount per Shares</label>
                            <input type="number" name="shares" class="form-control" value="{{ $plan->shares }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Number of investors</label>
                            <input type="number" name="investors" class="form-control" value="{{ $plan->investors }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Funding (%)*</label>
                            <input type="number" name="funding" class="form-control" value="{{ $plan->funding }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Amount Invested*</label>
                            <input type="number" name="invested" class="form-control" value="{{ $plan->invested }}" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Body</label>
                            <textarea id="myTextarea" name="body" class="form-control">{{ $plan->body }}</textarea>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Image</label>
                            <div class="row">
                                <div id="imagePreview">
                                    <div class="col-4">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach($property_img as $key => $image)
                                    <div class="col-6">
                                        <img src="/{{ $image->img_url }}" style="width: 200px; padding: 10px; border-radius: 10px;">
                                    </div>
                                @endforeach
                            </div>
                            <input type="file" name="img[]" id="imageInput" class="form-control" value="{{ $plan->property_img }}" step="any" multiple>
                            {{-- <input type="hidden" name="property_img" value="{{ $plan->property_img }}" /> --}}
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">Edit</button>
                </form>
			@else
			    <form method="post" action="{{ route('createProperty') }}" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="form-group col-12">
                            <label>Property Name</label>
                            <input type="text" name="name" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Type</label>
                            <select class="form-control" name="type" required>
                                <option value="">Please select...</option>
                                @foreach(['Vacation rental','Web3 properties', 'Single family residential'] as $type)
                                    <option value="{{ $type }}">{{ ucwords($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Location</label>
                            <input type="text" name="location" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Leverage</label>
                            <input type="text" name="leverage" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Monthly rental value</label>
                            <input type="text" name="rental" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Amount per Shares</label>
                            <input type="number" name="shares" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Number of investors</label>
                            <input type="number" name="investors" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Funding (%)*</label>
                            <input type="number" name="funding" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Amount Invested*</label>
                            <input type="number" name="invested" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Body</label>
                            <textarea id="myTextarea" name="body" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <label>Property Image</label>
                            <div class="row">
                                <div id="imagePreview">
                                    <div class="col-4">
                                    </div>
                                </div>
                            </div>
                            <input type="file" id="imageInput" name="img[]" class="form-control" required step="any" multiple>
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">ADD</button>
                </form>
			@endif
		</div>
	</div>
</div>
<script>
    const imageInput = document.getElementById('imageInput');
    imageInput.addEventListener('change', previewImages);
    function previewImages() {
        const previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = '';
        const files = imageInput.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const image = document.createElement('img');
            image.src = URL.createObjectURL(file);
            image.style = "width: 200px; padding: 10px; border-radius: 10px;"
            previewContainer.appendChild(image);
        }
    }

</script>
@endsection
