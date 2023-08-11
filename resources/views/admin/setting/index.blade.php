@extends('admin.layouts.master')

@section('plugin-css')

@endsection

@section ('container')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h4 class="card-title">Setting</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Setting</li>
            </ol>
          </nav>
        </div>

        <form method="POST" action="{{ route('setting.update', $data->id) }}">
            @csrf
            @method('PATCH')

            <fieldset>
                <div class="row">
                    <div class="col-12 my-3">
                        <div class="row review">
                            <div class="col-2">
                                IOS Under Review
                            </div>
                            <div class="col-10 setting-radio-layout">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="ios_under_review" id="iosReview1" value="1" @if($data->ios_under_review) checked @endif>
                                        On
                                    </label>
                                </div>
                                <div class="form-check ml-3">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="ios_under_review" id="iosReview2" value="0" @if(!$data->ios_under_review) checked @endif>
                                        Off
                                    </label>
                                </div>
                            </div>
                        </div>
                
                        <div class="row review">
                            <div class="col-2">
                                Android Under Review
                            </div>
                            <div class="col-10 setting-radio-layout">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="android_under_review" id="androidReview1" value="1" @if($data->android_under_review) checked @endif>
                                        On
                                    </label>
                                </div>
                                <div class="form-check ml-3">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="android_under_review" id="androidReview2" value="0" @if(!$data->android_under_review) checked @endif>
                                        Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>

            <input class="btn btn-success" type="submit" value="Save"> 
        </form>
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