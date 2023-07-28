@extends('admin.layouts.master')

@section('plugin-css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@stop

@section('container')
<div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h4 class="card-title">Edit Game</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('games.index') }}">Game</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="{{ route('games.update',$game) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              
              <fieldset>

                <!-- leagues -->
                @component('components.selectbox-object')
                  @slot('title', 'League *')
                  @slot('name', 'league_id')
                  @slot('objects', $leagues)
                  @slot('selected', $game->league_id)
                @endcomponent

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="team-a">Team A</label>
                      <select name="team_a_id" id="team_a_id" class="form-control select2">
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="team-b">Team B</label>
                      <select name="team_b_id" id="team_b_id" class="form-control select2">
                      </select>
                    </div>
                  </div>
                </div>

                @component('components.textbox')
                  @slot('title', 'Start At')  
                  @slot('name', 'started_at')
                  @slot('placeholder', 'Enter start date and time')
                  @slot('value', $game->started_at)
                  @slot('required', 'required')
                @endcomponent

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" id="summernote" name="description" style="border: none;" required>{{ $game->description }}</textarea>
                </div>

                <div class="form-group">
                  <label>Live Links</label>
                  <textarea class="form-control" id="live-link" name="live_links" placeholder="Link 1,Link 2,Link 3,..." required>{{ $game->live_links }}</textarea>
                </div>

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
<script src="{{ asset('assets/vendors/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
  $(function(){
    
    $('#started_at').datetimepicker({
      "allowInputToggle": true,
      "showClose": true,
      "showClear": true,
      "showTodayButton": true,
      "format": "YYYY-MM-DD HH:mm:ss",
    });

    getTeams($('#league_id').val());

    $('#league_id').on('change',function(){
      $('select[name="team_a_id"]').empty();
      $('select[name="team_b_id"]').empty();
      getTeams(this.value);
    });

    $('#summernote').summernote({
        placeholder: 'Enter Content Details',
        tabsize: 2,
        height: 300,
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

  function getTeams(league_id) {

    var old_team_a_id = {!! $game->team_a_id !!};
    var old_team_b_id = {!! $game->team_b_id !!};

    $.ajax({
        url: "{!! route('leagues.teams') !!}",
        type: "GET",
        data: {"league_id" : league_id},
          success:function(data){
            $.each(data, function(key, value){
              var selectedTeamA = value.id == old_team_a_id ? "selected" : '';
              var selectedTeamB = value.id == old_team_b_id ? "selected" : '';
              $('select[name="team_a_id"]').append('<option value="'+value.id+'" '+selectedTeamA+'>'+value.name+'</option>');
              $('select[name="team_b_id"]').append('<option value="'+value.id+'" '+selectedTeamB+'>'+value.name+'</option>');
            });
          }
    });
  }
</script>
@endsection