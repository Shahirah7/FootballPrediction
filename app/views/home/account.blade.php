@extends('layout.master')

@section('content')

    <div class="starter-template clearfix">

 @if(count($errors))
            <div class="alert alert-danger" role="alert">
                <h4>Sorry, there were errors!</h4>
                <ul>
                    <li>{{ $errors }}</li>
                </ul>
            </div>
            @endif

        <div class="row">
        	<div class="col-md-12">
	        	
	        	<div class="well clearfix">
		        	<div class="col-md-8">
		  				<h3>Hello, <strong>{{ $user->name }}</strong></h3>
		  			</div>

		  			<div class="col-md-4" style="text-align:right">		
						@if(!is_null($currentGame))
							<h4><span class="label label-info">Current Game: {{ $currentGame->name }}</span></h4>
							<h4><span class="label label-primary">Current Round: {{ $currentRound->name }}</span></h4>
			    		@else 
			    			{{ Form::open(array('class' => 'form-inline', 'action' => 'GameController@joinGame')) }}
			    				<div class="form-group">
    								<label class="control-label">Available Games:</label>
								    	<select name="game_id" class="form-control">
								    		@foreach($availableGames as $game)
									 		<option value="{{ $game->id }}">{{ $game->name }}</option>
											@endforeach
										</select>
  								</div>
			    				
			    				<button class="btn btn-sm btn-primary">Join Game</button>
			    			{{ Form::close() }}
			    		@endif 
		  			</div>
		  		</div>

  			</div>
  		</div>

  		<div class="row">
  			<div class="col-md-7">

  				@if(!is_null($currentGame))
  				<div class="well">
  					<h3>Choose your prediction for this round</h3>
  					@if($stillInGame)
	  					@if(!$madePrediction)
	  						@if($currentRound->can_predict)
		  					{{ Form::open(array('class' => 'form-inline', 'action' => 'GameController@makePrediction')) }}
					    		<div class="form-group">
		    						<label class="control-label">Make Prediction:</label>
							    	<select name="team_id" class="form-control">
							    		@if(count($availableTeams))
								    		@foreach($availableTeams as $team)
									 		<option value="{{ $team->id }}">{{ $team->name }}</option>
											@endforeach
										@endif
									</select>
								</div>
					    				
					    		<button class="btn btn-sm btn-primary">Select</button>
					    	{{ Form::close() }}
					    	@else
					    		<p>Predictions are closed for this round</p>
					    	@endif
				    	@else
				    		<p> You have already selected a team for this round.</p>
					    @endif
					@else
						<p>Sorry you have been eliminated from this game...</p>
						{{ Form::open(array('action' => 'GameController@leaveGame')) }}
						<input type="hidden" name="game_id" value="{{ $currentGame->id }}"/>
						<button class="btn btn-sm btn-primary">Leave Game</button>
						{{ Form::close() }}
					@endif
  				</div>

  				<div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">Upcoming Fixtures</h3>
 					</div>
  					<div class="panel-body">
    					<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Home Team</th>
									<th></th>
									<th>Away Team</th>
								</tr>
							</thead>
							<tbody>
								@if(count($upcomingFixtures))
									@foreach($upcomingFixtures as $fixture)
									<?php
										$homeTeam = $fixture->homeTeam()->get()->first();
										$awayTeam = $fixture->awayTeam()->get()->first();
									?>
									<tr>
										<td class="col-md-4">{{ $homeTeam->name }}</td>
										<td class="col-md-4">vs.</td>
										<td class="col-md-4">{{ $awayTeam->name }}</td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>
  					</div>
				</div>
				@else
				<div class="jumbotron">
					<h2>Join a game!</h2>
					<p>Blah Blah Blah</p>
					<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
				</div>

				@endif

				<!-- <div>
					<div class="col-md-4 well">
						<h3>Most Picked Team</h3>
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-4 well">
						<h3>Most Predictions (Round)</h3>
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-4 well">
						<h3>Most Correct Predictions</h3>
						<p>Lorem Ipsum</p>
					</div>
				</div>
 -->
  			</div>

  			<div class="col-md-5">
  				
  				<div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">Current Games</h3>
 					</div>
  					<div class="panel-body">
    					<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Game</th>
									<th>No Players</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $usr = Auth::user();?>
								@if(count($games))
									@foreach($games as $game)
									<tr>
										<td>
											<strong>{{ $game->name }}</strong><br/>
											{{ $game->getCurrentRound()->name }}<br/>
											Created: {{ date('d/m/y', strtotime($game->created_at)) }}
										</td>
										<td>{{ $game->getNumberOfPlayers() }}</td>
										<td>
											@if($currentGame)
												<a class="btn btn-sm btn-default" href="{{ action('GameController@viewGame', array('game_id' => $game->id)) }}">View</a>
											@else
												
												<a class="btn btn-sm btn-default" href="{{ action('GameController@viewGame', array('game_id' => $game->id)) }}">View</a>
												
												@if($game->canUserJoin($usr->id))
												{{ Form::open(array('class' => 'form-inline', 'action' => 'GameController@joinGame', 'style' => 'display: inline-block;')) }}
												<button class="btn btn-sm btn-primary">Join</button>
												<input type="hidden" name="game_id" value="{{ $game->id }}"/>
												{{ Form::close() }}
												@endif
											@endif
										</td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>
  					</div>
				</div>

				@if(!is_null($currentGamePlayers))
				<div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">Players in Current Game</h3>
 					</div>
  					<div class="panel-body">
    					<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Player Name</th>
									<th>Predictions</th>
									<th>Last Round</th>
								</tr>
							</thead>
							<tbody>
								@foreach($currentGamePlayers as $player)
								<tr>
									<?php
										if($player->final_round_id) {
											$round = Round::find($player->final_round_id);
										} else {
											$round = 'n/a';
										}
									?>
									<td>{{ $player->name }}</td>
									<td>{{ $player->getNumberOfPredictionsMade() }}</td>
									<td>{{ ($round == 'n/a') ? $round : $round->name }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
  					</div>
				</div>
				@endif
  			
  			</div>
  		</div>
	  		

	  	<div class="row">
	  		<div class="col-md-12">
		  		<div class="panel panel-default">
	  					<div class="panel-heading">
	    					<h3 class="panel-title">Chat</h3>
	 					</div>
	  					<div class="panel-body">
	    					<div id="tlkio" data-channel="lastteamstanding" style="width:100%;height:400px;"></div><script async src="http://tlk.io/embed.js" type="text/javascript"></script>
	  					</div>
					</div>
		  		</div>
		  	</div>
    </div>
@stop