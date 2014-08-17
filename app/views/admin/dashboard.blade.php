@extends('layout.master')

@section('content')
    <div class="starter-template">
        
		<div class="row">
			<div class="col-md-12">
		        <h1>Admin Dashboard 
		        	<a href="{{ action('AdminController@createGame') }}" class="btn btn-lg btn-primary pull-right">Create Game</a>
		    	</h1>
		    	<hr/>
		        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in leo leo. Integer ac semper justo.
		        Aenean dapibus in lorem a ullamcorper. Nam id ultrices erat.</p>
		    </div>
    	</div>

    	<div class="row">
    		<div class="col-md-12">
    			<div class="well clearfix">
    					{{ Form::open(array('class' => 'form-inline', 'action' => 'AdminController@dashboard', 'method' => 'GET')) }}
        				<div class="form-group">
							<label class="control-label">Game:</label>
							@if(count($games))
    						<select id="game-selector" name="gameId" class="form-control ">
    							<option value="">Select a Game</option>
    							@foreach($games as $game)
    								<?php
    									$selected = '';
    									if(!is_null($gameId)) {
    										if($gameId == $game->id) {
    											$selected = "selected='selected'";
    										}
    									}
    								?>
				 				<option value="{{ $game->id }}"{{ $selected }}>{{ $game->name }}</option>
				 				@endforeach
							</select>
							@endif
						</div>

        				<div class="form-group">
							<label class="control-label">Round:</label>
    						<select id="round-selector" name="roundId" class="form-control ">
							</select>
						</div>

						<button class="btn btn-primary">Filter</button>
        			
						{{ Form::close() }}
        		</div>
    		</div>
    	</div>	

    	@if(!is_null($round))
    	<div class="row">
        	<div class="col-md-9">
        		<div class="panel panel-default">
  					<div class="panel-heading">
   						<h3 class="panel-title">Update Fixtures Results</h3>
 					</div>
  					<div class="panel-body">
    					
						{{ Form::open(array('action' => 'AdminController@saveRoundFixtures')) }}
						<input type="hidden" name="game_id" value="{{ $gameId }}"/>
						<input type="hidden" name="round_id" value="{{ $roundId }}"/>
  						<table class="table table-striped table-hover">
							 <thead>
							  		<tr>
							  			<th>Home</th>
							  			<th style="text-align: center;">Score</th>
							  			<th></th>
							  			<th style="text-align: center;">Score</th>
							  			<th style="text-align: right;">Away</th>
							  		</tr>
							 </thead>

							 <tbody>
							 		@if(count($fixtures))
							 			@foreach($fixtures as $fixture)
							 				<?php
							 					$homeTeam = $fixture->homeTeam()->get()->first();
												$awayTeam = $fixture->awayTeam()->get()->first();
							 				?>
									 		<tr>
									 			<td>{{ $homeTeam->name }}</td>
									 			<td style="text-align: center;" class="col-md-1"><input name="fixture-{{ $fixture->id }}-home_team_id" type="text" class="form-control" value="{{ $fixture->home_team_score }}" placeholder=""></td>
									 			<td style="text-align:center">vs.</td>
									 			<td style="text-align: center;" class="col-md-1"><input name="fixture-{{ $fixture->id }}-away_team_id" type="text" class="form-control" value="{{ $fixture->away_team_score }}" placeholder=""></td>
									 			<td style="text-align: right;">{{ $awayTeam->name }}</td>
									 		</tr>
							 			@endforeach
							 		@endif
							 </tbody>
						</table>
						<hr/>
						<button class="btn btn-primary">Save Round Results</button>
						{{ Form::close() }}

  					</div>
				</div>

        	</div>

			<div class="col-md-3">
				<div class="panel panel-default">
  					<div class="panel-heading">
   						<h3 class="panel-title">Admin Control for Round</h3>
 					</div>
  					<div class="panel-body">
  						{{ Form::open(array('action' => 'AdminController@completeRound')) }}
  						<input type="hidden" name="game_id" value="{{ $gameId }}"/>
  						<input type="hidden" name="round_id" value="{{ $roundId }}"/>
  						@if(!$round->completed)
    					<button class="btn btn-success">Complete Round</button>
    					@else
    					<button class="btn btn-success" disabled>Complete Round</button>
    					@endif
    					{{ Form::close() }}
    					</br>
    					{{ Form::open(array('action' => 'AdminController@togglePredictions')) }}
    					<input type="hidden" name="game_id" value="{{ $gameId }}"/>
  						<input type="hidden" name="round_id" value="{{ $roundId }}"/>
  						@if($round->can_predict)
  						<input type="hidden" name="can_predict" value="0"/>
    					<button class="btn btn-primary">Close Predictions</button>
    					@else
    					<input type="hidden" name="can_predict" value="1"/>
    					<button class="btn btn-primary">Open Predictions</button>
    					@endif
    					{{ Form::close() }}
  					</div>
				</div>
        	</div>

        </div>
        @endif

    </div>
@stop

@section('javascript')
<script>
	$(document).ready(function() {
		
		var getRoundUrl = '{{ action('AdminController@getRoundsForGame', array(null)); }}';
		var selectedGameId = {{ (!is_null($gameId)) ? $gameId : 'null' }};
		var selectedRoundId = {{ (!is_null($roundId)) ? $roundId : 'null' }};

		$('#game-selector').on('change', function() {
			var selectedGameId = $(this).val();
			$.ajax({
				url: getRoundUrl + '/' + selectedGameId,
				success: function(data) {
					$('#round-selector').html('');
					$('#round-selector').append('<option value="">Select a Round</option>');
					for(i in data) {
						if(data[i].id == selectedRoundId) {
							$('#round-selector').append('<option value="'+data[i].id+'" selectd="selected">'+data[i].name+'</option>');
						} else {
							$('#round-selector').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
						}
					}
				}
			});
		});

		if(selectedGameId !== null) {
			$.ajax({
				url: getRoundUrl + '/' + selectedGameId,
				success: function(data) {
					$('#round-selector').html('');
					$('#round-selector').append('<option value="">Select a Round</option>');
					for(i in data) {
						if(data[i].id == selectedRoundId) {
							$('#round-selector').append('<option value="'+data[i].id+'" selected="selected">'+data[i].name+'</option>');
						} else {
							$('#round-selector').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
						}
					}
				}
			});
		}

	});
</script>
@stop
   