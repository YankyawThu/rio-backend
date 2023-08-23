@extends('admin.layouts.master')

@section('plugin-css')

@endsection

@section ('container')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <h4 class="card-title">Notification</h4>
  
            <nav aria-label="breadcrumb" class="mb-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Notification</li>
              </ol>
            </nav>
          </div>
  
          <form action="{{ route('notification.send') }}" method="POST">
            @csrf
            @component('components.textbox')
                @slot('title', 'Title *')  
                @slot('name', 'title')
                @slot('placeholder', 'Enter title')
                @slot('value', '')
                @slot('autofocus', 'autofocus')
                @slot('required', 'required')
            @endcomponent

            @component('components.textbox')
                @slot('title', 'Body *')  
                @slot('name', 'body')
                @slot('placeholder', 'Enter content')
                @slot('value', '')
                @slot('autofocus', 'autofocus')
                @slot('required', 'required')
            @endcomponent

            <input class="btn btn-success" type="submit" value="Send">
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