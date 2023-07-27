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
          <h4 class="card-title">Edit Team</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('teams.index') }}">Team</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="{{ route('teams.update',$team) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')

              <fieldset>

                <div class="row justify-content-md-center">
                  <div class="col col-md-3">
                    <!-- image -->
                    <div class="form-group">
                      <img src="{{ Storage::url($team->image) }}" class="avatar img img-thumbnail" alt="avatar">
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
                  @slot('title', 'Name *')  
                  @slot('name', 'name')
                  @slot('placeholder', 'Enter Team Name')
                  @slot('value', $team->name)
                  @slot('autofocus', 'autofocus')
                  @slot('required', 'required')
                @endcomponent

                <!-- league -->
                @component('components.selectbox-object')
                  @slot('title', 'League *')
                  @slot('name', 'league_id')
                  @slot('objects', $leagues)
                  @slot('selected', $team->league_id)
                @endcomponent

                <input class="btn btn-primary" type="submit" value="Save"> 
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

    $('#published_date').datepicker({
      format: 'yyyy-mm-dd'
    });
  });
</script>
@endsection