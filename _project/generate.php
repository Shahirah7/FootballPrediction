<?php

$teams = array(
	1 => 'Arsenal',
	2 => 'Aston Villa',
	3 => 'Burnley',
	4 => 'Chelsea',
	5 => 'Crystal Palace',
	6 => 'Everton',
	7 => 'Hull City',
	8 => 'Leicester City',
	9 => 'Liverpool',
	10 => 'Manchester City',
	11 => 'Manchester United',
	12 => 'Newcastle United',
	13 => 'Queens Park Rangers',
	14 => 'Southampton',
	15 => 'Stoke City',
	16 => 'Sunderland',
	17 => 'Swansea City',
	18 => 'Tottenham Hotspur',
	19 => 'West Bromwich Albion',
	20 => 'West Ham United'
);

$rounds = array();
$roundCounter = 0;
$handle = fopen("input.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
    	$line = trim($line);
    	if($line == '>Round') {
    		$roundCounter++;
    		continue;
    	}
    	$fixturePieces = explode(" v ", $line);
    	$fixture = array(
    		'home_team' => $fixturePieces[0],
    		'away_team' => $fixturePieces[1]
    	);
    	$rounds[$roundCounter][] = $fixture;

    }
}
fclose($handle);

$db = new PDO('mysql:host=localhost;dbname=lms;charset=utf8', 'root', 'root');
foreach($rounds as $roundId => $round) {
	foreach($round as $fixture) {
		$homeTeamId = array_search($fixture['home_team'], $teams);
		$awayTeamId = array_search($fixture['away_team'], $teams);
		$stmt = $db->prepare("INSERT INTO fixtures_original values (?, ?, ?, ?)");
		$stmt->execute(array(null, $roundId, $homeTeamId, $awayTeamId));
	}
}

?>