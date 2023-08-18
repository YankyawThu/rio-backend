@extends('admin.layouts.master')

@section('plugin-css')

@endsection

@section ('container')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h4 class="card-title">Channel</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Channel</li>
            </ol>
          </nav>
        </div>

        <form action="{{ route('channels.index') }}" method="GET">
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
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr class="bg-success text-white">
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $index => $item)
                  <tr>
                    <td>{{ $index + 1}}</td>
                    <td>
                      <div class="preview-thumbnail">
                        <img src="{{ asset(Storage::url($item->image)) }}" alt="image" class="img-sm profile-pic"> 
                      </div>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>
                      <a href="{{ route('channels.show', $item) }}" class="btn btn-icons btn-light">
                        <span class="fa fa-eye fa-lg text-primary"></span>
                      </a>
                      <button class="btn btn-light" data-toggle="modal" data-target="#delete-channel-{{$item->id}}">
                        <span class="fa fa-trash fa-lg text-danger"></span>
                      </button>
                      <!-- Delete Modal -->
                      <div class="modal fade" id="delete-channel-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="Add New" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Confirmation!</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ route('channels.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                                
                              <div class="modal-body text-center">
                                    <span>Are you sure want to delete?</span>       
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-success">Yes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
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