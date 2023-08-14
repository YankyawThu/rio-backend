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
          <h4 class="card-title">Add New Channel</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('channels.index') }}">Channel</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="{{ route('channels.store') }}" enctype="multipart/form-data">
              @csrf

              <fieldset>

                <div class="row justify-content-md-center">
                  <div class="col col-md-3">
                    <!-- image -->
                    <div class="form-group">
                      <img src="{{ asset('assets/images/no-image.png') }}" class="avatar img img-thumbnail" alt="avatar">
                      <h6>Select Cover Image...</h6>
                      <input type="file" name="image" class="image-upload" accept=".png, .jpg, .jpeg" />
                        @if($errors->has('image'))
                          <label class="error mt-2 text-danger">{{ $errors->first('image') }}</label>
                        @endif
                    </div>
                  </div>
                </div>

                <!-- name -->
                @component('components.textbox')
                  @slot('title', 'Name *')  
                  @slot('name', 'name')
                  @slot('placeholder', 'Enter content name')
                  @slot('value','')
                  @slot('autofocus', 'autofocus')
                  @slot('required', 'required')
                @endcomponent

                @component('components.textbox')
                  @slot('title', 'Link URL')  
                  @slot('name', 'url')
                  @slot('placeholder', 'Enter Link URL')
                  @slot('value','')
                  @slot('required', 'required')
                @endcomponent

                

                {{-- @component('components.textbox')
                  @slot('title', 'Published Date *')  
                  @slot('name', 'published_date')
                  @slot('placeholder', 'Enter Published Date')
                  @slot('value','')
                  @slot('autofocus', 'autofocus')
                  @slot('required', 'required')
                @endcomponent --}}

                {{-- @component('components.textbox')
                  @slot('title', 'Author Name *')  
                  @slot('name', 'author_name')
                  @slot('placeholder', 'Enter author name')
                  @slot('value','')
                  @slot('autofocus', 'autofocus')
                  @slot('required', 'required')
                @endcomponent --}}

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