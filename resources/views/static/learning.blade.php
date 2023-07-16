@extends('layouts.static')

@section('title', __('Learning Centre'))

@section('content')

<style>
    .custom-pagination {
        display: flex;
        margin-top: 50px;
        justify-content: center;
    }
    .page-link {
        color: #0aadb3;
    }
    .editor-wrapper {
        max-height: 5.2em; /* Three lines with line height */
        overflow: hidden;
    }

    .editor-content {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Number of lines to display */
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<div id="page_wrapper" class="bg-light">

        @include('components.header')

       <!--============== Page title Start ==============-->
        <div class="full-row py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-secondary">Blog List</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 bg-transparent p-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="blog-grid-v1.html">Blog</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Blog List View</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Page title End ==============-->

        <!--============== Blog Area Start ==============-->
        <div class="full-row pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 order-xl-1 sm-mb-30">
                        <div class="row row-cols-md-2 row-cols-1 g-4">
                            @foreach($blogs as $key => $blog)
                                <div class="col">
                                    <div class="thumb-blog-overlay bg-white hover-text-PushUpBottom">
                                        <div class="post-image position-relative overlay-secondary">
                                            <img src="{{$blog->blog_img}}" alt="Image not found!">
                                            <div class="position-absolute xy-center">
                                                <div class="overflow-hidden text-center">
                                                    <a class="text-white first-push-up transation font-large" href="#">+</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-content p-4">
                                            <h5 class="d-block font-400 mb-3">
                                                <a href="{{ route('blogShow', $blog->id) }}" class="transation text-dark hover-text-primary">{{$blog->title}}</a>
                                            </h5>
                                            <div class="editor-wrapper">
                                                <div class="editor-content">
                                                    {!! $blog->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if($blogs->count() == 0)
                                <p class="text-center">No Blog found</P>
                            @endif
                                
                            </div>
                            
                            <div class="custom-pagination">
                                <ul class="pagination">
                                    @if ($blogs->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $blogs->previousPageUrl() }}">Previous</a></li>
                                    @endif

                                    @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                        @if ($page == $blogs->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    @if ($blogs->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $blogs->nextPageUrl() }}">Next</a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                                    @endif
                                </ul>
                            </div>

                            
                        </div>
                        
                </div>
            </div>
        </div>
        <!--============== Blog Area End ==============-->


    </div>

@endsection