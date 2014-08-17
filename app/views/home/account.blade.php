@extends('layout.master')

<?php $madePrediction = false ?>

@section('content')

    <div class="starter-template clearfix">
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
			    			{{ Form::open(array('class' => 'form-inline', 'action' => 'UserController@doRegister')) }}
			    				<div class="form-group">
    								<label class="control-label">Available Games:</label>
								    	<select class="form-control">
								    		@foreach($games as $game)
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
  					@if(!$madePrediction)
	  					{{ Form::open(array('class' => 'form-inline', 'action' => 'UserController@doRegister')) }}
				    		<div class="form-group">
	    						<label class="control-label">Make Prediction:</label>
						    	<select class="form-control">
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
			    		<p> You have already selected a team for this round.</p>
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
					<h1>Join a game!</h1>
					<p>Blah Blah Blah</p>
					<p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
				</div>

				@endif

				<div>
					<div class="col-md-4 well">
						<h2>Most Picked Team</h2>
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-4 well">
						<h2>Most Predictions Per Round</h2>
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-4 well">
						<h2>Most Correct Predictions</h2>
						<p>Lorem Ipsum</p>
					</div>
				</div>

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
								@if(count($games))
									@foreach($games as $game)
									<tr>
										<td>
											<strong>{{ $game->name }}</strong><br/>
											Created: {{ date('d/m/y', strtotime($game->created_at)) }}
										</td>
										<td>{{ $game->getNumberOfPlayers() }}</td>
										<td>
											<a class="btn btn-sm btn-default" href="">View</a>
											<a class="btn btn-sm btn-primary" href="">Join</a>
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
									<th>Round</th>
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
	    					Chat script goes here.
	  					</div>
					</div>
		  		</div>
		  	</div>
    </div>
@stop
   