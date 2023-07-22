@extends('admin.layouts.master')

@section('container')
<div class="row grid-margin">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Blog Details</h4>
        
                    <nav aria-label="breadcrumb" class="mb-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                        <a href="{{ route('blogs.index') }}">Blog</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                    </nav>
                </div>
                <div class="row gutters-sm">
                    <div class="row">
                        <div class="col-md-4 offset-4 mb-3">
                            <img src="{{ Storage::url($blog->image) }}" alt="Admin" class="img" width="100%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <p class="blog-date m-1">Date - {{ $blog->date }}</p>
                            <h4 class="blog-title mt-1">{{ $blog->title }}</h4>
                            <div class="blog-body mt-3">{!! $blog->body !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection