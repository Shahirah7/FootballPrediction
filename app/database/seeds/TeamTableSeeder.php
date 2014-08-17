<?php


class TeamTableSeeder extends Seeder {

    public function run()
    {
        DB::table('teams')->delete();

        $team = new Team();
		$team->name = "Arsenal";
		$team->save();

        $team = new Team();
		$team->name = "Aston Villa";
		$team->save();

		$team = new Team();
		$team->name = "Burnley";
		$team->save();

		$team = new Team();
		$team->name = "Chelsea";
		$team->save();

		$team = new Team();
		$team->name = "Crystal Palace";
		$team->save();

		$team = new Team();
		$team->name = "Everton";
		$team->save();

        $team = new Team();
		$team->name = "Hull City";
		$team->save();

		$team = new Team();
		$team->name = "Leicester City";
		$team->save();

		$team = new Team();
		$team->name = "Liverpool";
		$team->save();

		$team = new Team();
		$team->name = "Manchester City";
		$team->save();

		$team = new Team();
		$team->name = "Manchester United";
		$team->save();

        $team = new Team();
		$team->name = "Newcastle United";
		$team->save();

		$team = new Team();
		$team->name = "Queens Park Rangers";
		$team->save();

		$team = new Team();
		$team->name = "Southampton";
		$team->save();

		$team = new Team();
		$team->name = "Stoke City";
		$team->save();

		$team = new Team();
		$team->name = "Sunderland";
		$team->save();

        $team = new Team();
		$team->name = "Swansea City";
		$team->save();

		$team = new Team();
		$team->name = "Tottenham Hotspur";
		$team->save();

		$team = new Team();
		$team->name = "West Bromwich Albion";
		$team->save();

		$team = new Team();
		$team->name = "West Ham United";
		$team->save();
    }

}