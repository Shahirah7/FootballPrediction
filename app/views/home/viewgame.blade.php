@extends('layout.master')

@section('content')
    <div class="starter-template">
        <h1>{{ $game->name }}</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum in leo leo. Integer ac semper justo.
        Aenean dapibus in lorem a ullamcorper. Quisque accumsan erat diam, eu posuere turpis fringilla nec. Etiam dapibus blandit 
        sagittis. Quisque sollicitudin, augue at tempor lobortis, ipsum neque pulvinar orci, id auctor sapien nisi quis ligula. 
        Nam id ultrices erat.</p>

        <div class="panel panel-default">
  					<div class="panel-heading">
    					<h3 class="panel-title">Players in Current Game</h3>
 					</div>
  					<div class="panel-body">
    					<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>Player Name</th>
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
									<td>{{ ($round == 'n/a') ? $round : $round->name }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
  					</div>
				</div>
    </div>
@stop