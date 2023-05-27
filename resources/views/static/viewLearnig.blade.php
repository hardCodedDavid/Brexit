@extends('layouts.static')

@section('title', __('Learning Centre'))

@section('content')

@php
    $blogs = App\Blog::latest()->paginate(12);
@endphp

<div id="page_wrapper" class="bg-light">

@include('components.header')

<!--============== Page title Start ==============-->
        <div class="full-row py-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-secondary">Blog Details</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 bg-transparent p-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="blog-grid-v1.html">Blog</a></li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Single Blog</li>
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
                        <div class="single-post border summary bg-white p-30 mb-30">
                            <div class="single-post-title">
                                {{-- <span class="d-inline-block text-primary">By Admin</span> --}}
                                <h4 class="mb-3 text-secondary">{{ $blog->title }}</h4>
                                <div class="post-meta list-color-general mb-4">
                                    <a href="#"><i class="flaticon-user-silhouette flat-mini"></i> <span>By Admin</span></a>
                                    <a href="#"><i class="flaticon-calendar flat-mini"></i> <span>{{ date('d M, Y', strtotime($blog->created_at)) }}</span></a>
                                    {{-- <a href="#"><i class="flaticon-comments flat-mini"></i> <span>02</span></a> --}}
                                    {{-- <a href="#"><i class="flaticon-like flat-mini"></i> <span>30</span></a> --}}
                                    {{-- <a href="#"><i class="flaticon-eye-1 flat-mini"></i> <span>731</span></a> --}}
                                    {{-- <span><i class="flaticon-document flat-mini"></i> <a href="#"><span>General</span></a>,<a href="#"><span>Media</span></a></span> --}}
                                </div>
                            </div>
                            <div class="post-image">
                                <img src="/{{$blog->blog_img}}" alt="Image not found!">
                            </div>
                            <div class="post-content pt-4 mb-5">
                                <p>{{$blog->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--============== Blog Area End ==============-->

</div>

@endsection