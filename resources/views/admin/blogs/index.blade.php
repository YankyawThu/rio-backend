@extends('admin.layouts.master')

@section('plugin-css')
<style>
p {
    font-size: 14px;
    color: #777;
}
.blog .image {
    height: 250px;
    overflow: hidden;
    border-radius: 3px 0 0 3px;
}

.blog .image img {
    width: 100%;
    height: auto;
}

.blog .blog-details {
    padding: 0 20px 0 0;
}

.blog {
    padding: 0;
}

.well {
    border: 0;
    padding: 20px;
    min-height: 63px;
    background: #fff;
    box-shadow: none;
    border-radius: 3px;
    position: relative;
    max-height: 100000px;
    border-bottom: 2px solid #ccc;
}

.blog .blog-details h3 {
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.blog .date .blog-date {
    color: #000000;
}

.blog .text-decoration-none{
    text-decoration: none;
}

</style>
@endsection

@section ('container')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h4 class="card-title">Blog</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
          </nav>
        </div>

        <form action="{{ route('blogs.index') }}" method="GET">
          <div class="row">
            <div class="col col-md-5">
              <div class="form-group">
                <input type="text" class="form-control" name="keyword" value="{{ request('keyword') }}" placeholder="Keyword">
              </div>
            </div>
            <div class="col col-md-3">
              <input class="btn btn-success" type="submit" value="Search"> 
            </div>
          </div>
        </form>
        <!-- /.d-flex -->

        <div class="row">
          @foreach ($data as $item)
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well blog">
                    <a href="{{ route('blogs.show',$item) }}" class="text-decoration-none">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="image">
                                    <img src="{{ Storage::url($item->image) }}" alt="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="blog-details">
                                    <h3 class="blog-title">{{ $item->title }}</h3>
                                </div>
                                <div class="date">
                                  <span class="blog-date">{{ $item->updated_at->format('d-M-Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
          @endforeach
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
@endsection

@section('plugin-js')

@endsection

@section('custom-js')

<script>
  $(function () {
   

  });
</script>
@endsection