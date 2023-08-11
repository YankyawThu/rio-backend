@extends('admin.layouts.master')

@section('container')
<div class="row grid-margin">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Game Details</h4>
        
                    <nav aria-label="breadcrumb" class="mb-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                        <a href="{{ route('games.index') }}">Game</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" role="tablist">  
                          <li class="nav-item">  
                            <a class="nav-link active" data-toggle="tab" href="#game-details" role="tab"> Game Details</a>  
                          </li>  
                          <li class="nav-item">  
                            <a class="nav-link" data-toggle="tab" href="#live-links" role="tab"> Live Links </a>  
                          </li>  
                        </ul>
                        <div class="tab-content">  
                          <div class="tab-pane active" id="game-details" role="tabpanel">  
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="card radius-15">
                                        <div class="card-body text-center">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="{{ Storage::url($game->teamA->image) }}" alt="Admin" class="rounded-circle" width="200" height="200">
                                                <div class="mt-3">
                                                  <h4>{{ $game->teamA->name }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card radius-15">
                                        <div class="card-body text-center">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="{{ Storage::url($game->teamB->image) }}" alt="Admin" width="200" height="200">
                                                <div class="mt-3">
                                                  <h4>{{ $game->teamB->name }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <div class="card radius-15">
                                        <div class="card-body text-center">
                                            <div class="p-2 radius-15">
                                                <h3 class="mb-0 mt-2">{{ $game->league->name }}</h3>
                                                <h4 class="mb-0 mt-2">Date - {{ $game->started_at }}</h4>
                                            </div>
                                            <h5 class="mb-0 mt-2">Desctiption</h5>
                                            <div class="description">
                                                {!! $game->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
            
                          <div class="tab-pane" id="live-links" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('game-links.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <fieldset>
                                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                                            @component('components.textbox')
                                                @slot('title', 'Name')  
                                                @slot('name', 'name')
                                                @slot('placeholder', 'Enter Name')
                                                @slot('value','')
                                                @slot('required', 'required')
                                            @endcomponent

                                            @component('components.textbox')
                                                @slot('title', 'Link URL')  
                                                @slot('name', 'url')
                                                @slot('placeholder', 'Enter Link URL')
                                                @slot('value','')
                                                @slot('required', 'required')
                                            @endcomponent

                                            <input class="btn btn-success" type="submit" value="Save"> 
                                        </fieldset>
                                    </form>
                                </div>
                            </div>  
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($game->links as $link)
                                                <tr>
                                                    <td>
                                                        <p>Name - {{ $link->name }}</p>
                                                        <p>URL - {{ $link->url }}</p>
                                                    </td>
                                                    <td class="text-right">
                                                        <button class="btn btn-light" data-toggle="modal" data-target="#delete-link-{{ $link->id }}"><span class="fa fa-trash fa-lg text-danger"></span></button>
                                                    </td>
                                                </tr>
                                                <!-- Delete Link Modal -->
                                                <div class="modal fade" id="delete-link-{{$link->id}}" tabindex="-1" role="dialog" aria-labelledby="Add New" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Confirmation!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <form action="{{ route('game-links.destroy', $link) }}" method="POST" 
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 offset-4 text-center">
                        <a href="{{ route('games.edit', $game) }}" class="btn btn-light">
                            <span class="fa fa-edit fa-lg text-primary"></span> Edit
                        </a>
                        <button class="btn btn-light" data-toggle="modal" data-target="#delete-game-{{$game->id}}"><span class="fa fa-trash fa-lg text-danger"></span> Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Game Modal -->
<div class="modal fade" id="delete-game-{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="Add New" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('games.destroy', $game) }}" method="POST" 
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