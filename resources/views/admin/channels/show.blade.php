@extends('admin.layouts.master')

@section('container')
<div class="row grid-margin">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Channel Details</h4>
        
                    <nav aria-label="breadcrumb" class="mb-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                        <a href="{{ route('channels.index') }}">Channel</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-3 mb-3">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ Storage::url($channel->image) }}" alt="Admin" class="img" width="100%">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2 class="channel-title mt-1"><b>{{ $channel->name }}</b></h2>
                    </div>
                    <div class="col-md-12">
                        <p class="channel-url mt-1">{{ $channel->url }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 offset-4 text-center">
                        <a href="{{ route('channels.edit', $channel) }}" class="btn btn-light">
                            <span class="fa fa-edit fa-lg text-primary"></span> Edit
                        </a>
                        <button class="btn btn-light" data-toggle="modal" data-target="#delete-channel-{{$channel->id}}"><span class="fa fa-trash fa-lg text-danger"></span> Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="delete-channel-{{$channel->id}}" tabindex="-1" role="dialog" aria-labelledby="Add New" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('channels.destroy', $channel) }}" method="POST" 
        class="d-inline">
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
@endsection