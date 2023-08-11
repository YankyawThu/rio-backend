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
          <h4 class="card-title">Edit Banner</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('banners.index') }}">League</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="{{ route('banners.update',$banner) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')

              <fieldset>
                <input type="hidden" name="type" value={{ $banner->type }}>

                @if($banner->type == "advertisement")
                <div class="row justify-content-md-center">
                  <div class="col col-md-3">
                    <!-- image -->
                    <div class="form-group">
                      <img src="{{ Storage::url($banner->image) }}" class="avatar img img-thumbnail" alt="avatar">
                      <h6>Select Cover Image...</h6>
                      <input type="file" name="image" class="image-upload" accept=".png, .jpg, .jpeg" />
                        @if($errors->has('image'))
                          <label class="error mt-2 text-danger">{{ $errors->first('image') }}</label>
                        @endif
                    </div>
                  </div>
                </div>

                <!-- title -->
                @component('components.textbox')
                  @slot('title', 'Title')  
                  @slot('name', 'title')
                  @slot('placeholder', 'Enter Title')
                  @slot('value', $banner->title)
                  @slot('autofocus', 'autofocus')
                @endcomponent

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" id="summernote" name="description" style="border: none;">{{ $banner->description }}</textarea>
                </div>
                @endif

                @if($banner->type == "match")
                <div class="form-group" id="match">
                  <label for="football_match_id">Select Match</label><br>
                  <select id="football_match_id" name="football_match_id" class="form-control select2" style="width: 100%">
                    
                  </select> 
                </div>
                @endif

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
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
  });
</script>
@endsection