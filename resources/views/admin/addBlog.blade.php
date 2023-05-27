@extends('layouts.admin')
@if(isset($edit))
@section('title', __('Edit Blog'))
@else
@section('title', __('Add Blog'))
@endif
@section('blog', __('true'))

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
					<li class="breadcrumb-item active" aria-current="page"><span>{{ (isset($edit))?'Edit':'Add' }} Blog</span></li>
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
                <form method="post" action="{{ route('blogUpdate', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" step="any" value="{{ $blog->title }}" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Description</label>
                            <textarea id="myTextarea" name="description" class="form-control">{{ $blog->description }}</textarea>
                        </div>
                        <div class="form-group col-12">
                            <label>Blog Image</label>
                            <div class="row">
                                <div id="imagePreview">
                                    <div class="col-4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="/{{ $blog->blog_img }}" style="width: 200px; padding: 10px; border-radius: 10px;">
                            </div>
                        </div>
                            <input type="file" name="img[]" id="imageInput" class="form-control" value="{{ $blog->blog_img }}" step="any" multiple>
                        </div>
                    </div>
                    <button class="btn btn-success btn-lg btn-block" type="submit">Edit</button>
                </form>
			@else
			    <form method="post" action="{{ route('blogAdd') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" step="any" required>
                        </div>
                        <div class="form-group col-12">
                            <label>Description</label>
                            <textarea id="myTextarea" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-12">
                            <label>Blog Image</label>
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
