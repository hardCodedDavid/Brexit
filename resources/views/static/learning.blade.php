@extends('layouts.static')

@section('title', __('Learning Centre'))

@section('content')

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
                                            <style>
                                                .text-truncate-container {
                                                    width: 100%;
                                                }
                                                .text-truncate-container p {
                                                    -webkit-line-clamp: 3;
                                                    display: -webkit-box;
                                                    -webkit-box-orient: vertical;
                                                    overflow: hidden;
                                                }
                                            </style>
                                            <div class="text-truncate-container">
                                                <p>{!! $blog->description !!}</p>
                                            </div>
                                            
                                            {{-- <div class="post-meta text-uppercase">
                                                <a href="#"><span>By Admin</span></a>
                                                <a href="#"><span>{{ date('d M, Y', strtotime($blog->created_at)) }}</span></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if($blogs->count() == 0)
                                <p class="text-center">No Blog found</P>
                            @endif
                                
                            </div>
                            <div class="row">
                                <div class="col mt-5">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-dotted-active justify-content-center">
                                            {{ $blogs }}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
        <!--============== Blog Area End ==============-->


    </div>

@endsection