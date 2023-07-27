@extends('admin.layouts.master')

@section('plugin-css')
 
@stop

@section('container')
<div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
          <h4 class="card-title">Add New Game</h4>

          <nav aria-label="breadcrumb" class="mb-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('games.index') }}">Game</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
              @csrf

              <fieldset>

                <!-- leagues -->
                @component('components.selectbox-object')
                  @slot('title', 'League *')
                  @slot('name', 'league_id')
                  @slot('objects', $leagues)
                  @slot('selected', '')
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
                  @slot('value','')
                  @slot('autofocus', 'autofocus')
                  @slot('required', 'required')
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
<script>
  $(function(){
    
    $('#started_at').datepicker({
      format: 'yyyy-mm-dd'
    });

    getTeams($('#league_id').val());

    $('#league_id').on('change',function(){
      $('select[name="team_a_id"]').empty();
      $('select[name="team_b_id"]').empty();
      getTeams(this.value);
    });
  });

  function getTeams(league_id) {
    $.ajax({
        url: "{!! route('leagues.teams') !!}",
        type: "GET",
        data: {"league_id" : league_id},
          success:function(data){
            $.each(data, function(key, value){
              $('select[name="team_a_id"]').append('<option value="'+value.id+'">'+value.name+'</option>');
              $('select[name="team_b_id"]').append('<option value="'+value.id+'">'+value.name+'</option>');
            });
          }
    });
  }
</script>
@endsection