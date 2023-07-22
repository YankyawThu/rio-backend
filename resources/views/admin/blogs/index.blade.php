@extends('admin.layouts.master')

@section('plugin-css')

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
            <div class="col col-md-4">
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
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr class="bg-primary text-white">
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $index => $item)
                  <tr>
                    <td>{{ $index + 1}}</td>
                    <td>
                      <div class="preview-thumbnail">
                        <img src="{{ Storage::url($item->image) }}" alt="image" class="img-sm profile-pic"> 
                      </div>
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                      <a href="{{ route('blogs.show', $item) }}" class="btn btn-light">
                        <span class="fa fa-eye fa-lg text-primary"></span> View</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.col -->

          <!-- pagination -->
          <nav class="col-12 d-flex justify-content-end mt-4">
            {{ $data->appends($_GET)->links() }}
          </nav>
          <!-- /.col -->
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