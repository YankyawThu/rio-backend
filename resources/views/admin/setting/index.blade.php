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

        <div class="row">
          <div class="col-md-12">
              <ul class="nav nav-tabs" role="tablist">  
                <li class="nav-item">  
                  <a class="nav-link active" data-toggle="tab" href="#ios-setting" role="tab">IOS Setting</a>  
                </li>  
                <li class="nav-item">  
                  <a class="nav-link" data-toggle="tab" href="#android-setting" role="tab">Android Setting</a>  
                </li>  
              </ul>

              <div class="tab-content">  
                <div class="tab-pane active pt-3" id="ios-setting" role="tabpanel">
                  <form method="POST" action="{{ route('setting.update', $data->id) }}">
                    @csrf
                    @method('PATCH')
        
                    <fieldset>
                        <div class="row">
                            <div class="col-12">
                              <div class="row review">
                                  <div class="col-2">
                                      Version
                                  </div>
                                  <div class="col-10 setting-radio-layout">
                                      <input type="text" class="form-control setting-input" name="ios_version_name" value="{{ $data->ios_version_name }}" required>
                                  </div>
                              </div>
                            </div>

                            <div class="col-12">
                              <div class="row review">
                                  <div class="col-2">
                                      Under Review
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
                            </div>

                            <div class="col-12">
                              <div class="row review">
                                  <div class="col-2">
                                      Force Update
                                  </div>
                                  <div class="col-10 setting-radio-layout">
                                      <div class="form-check">
                                          <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="ios_force_update" id="iosUpdate1" value="1" @if($data->ios_force_update) checked @endif>
                                              On
                                          </label>
                                      </div>
                                      <div class="form-check ml-3">
                                          <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="ios_force_update" id="iosUpdate2" value="0" @if(!$data->ios_force_update) checked @endif>
                                              Off
                                          </label>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </fieldset>
        
                    <input class="btn btn-success mt-3" type="submit" value="Save"> 
                  </form>
                </div>
                <div class="tab-pane pt-3" id="android-setting" role="tabpanel">
                  <form method="POST" action="{{ route('setting.update', $data->id) }}">
                    @csrf
                    @method('PATCH')
        
                    <fieldset>
                        <div class="row">
                            <div class="col-12">
                              <div class="row review">
                                  <div class="col-2">
                                      Version
                                  </div>
                                  <div class="col-10 setting-radio-layout">
                                      <input type="text" class="form-control setting-input" name="android_version_name" value="{{ $data->android_version_name }}" required>
                                  </div>
                              </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="row review">
                                  <div class="col-2">
                                      Under Review
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

                            <div class="col-12">
                              <div class="row review">
                                  <div class="col-2">
                                      Force Update
                                  </div>
                                  <div class="col-10 setting-radio-layout">
                                      <div class="form-check">
                                          <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="android_force_update" id="androidUpdate1" value="1" @if($data->android_force_update) checked @endif>
                                              On
                                          </label>
                                      </div>
                                      <div class="form-check ml-3">
                                          <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="android_force_update" id="androidUpdate2" value="0" @if(!$data->android_force_update) checked @endif>
                                              Off
                                          </label>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </fieldset>
        
                    <input class="btn btn-success mt-3" type="submit" value="Save"> 
                  </form>
                </div>
              </div>
          </div>
        </div>
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