@extends('admin.layouts.master')

@section('plugin-css')
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
@stop

@section('container')
<div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h4 class="card-title">Add New Ads Video</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('ads.index') }}">Advertisement</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="{{ route('ads.store') }}" enctype="multipart/form-data">
              @csrf

              <fieldset>
                <input type="hidden" name="type" value="video">
                <div class="row justify-content-md-center">
                  <div class="col col-md-3">
                    <!-- video -->
                    <div class="form-group">
                      <img src="{{ asset('assets/images/no-video.jpeg') }}" class="video img img-thumbnail" alt="avatar">
                      <h6>Select Ads Video...</h6>
                      <input type="file" name="video_url" class="image-upload" />
                        @if($errors->has('video_url'))
                          <label class="error mt-2 text-danger">{{ $errors->first('video_url') }}</label>
                        @endif
                    </div>
                  </div>
                </div>

                <!-- title -->
                @component('components.textbox')
                  @slot('title', 'Video Duration (seconds)')  
                  @slot('name', 'video_duration')
                  @slot('placeholder', '')
                  @slot('value', '')
                  @slot('type', 'number')
                  @slot('autofocus', 'autofocus')
                  @slot('required', 'required')
                @endcomponent

                <input class="btn btn-success" type="submit" value="Save"> 
              </fieldset>
            </form>
          </div>
        </div>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
<script>
  $(function(){
    $('#summernote').summernote({
        placeholder: 'Enter Content Details',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });

    // $('#published_date').datepicker({
    //   format: 'yyyy-mm-dd'
    // });
  });
</script>
@endsection