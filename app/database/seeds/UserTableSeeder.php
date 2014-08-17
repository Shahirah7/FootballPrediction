<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
		$user->name = "Ali Fazel";
		$user->email = "alifazel@email.com";
		$user->username = "alifazel";
		$user->password = Hash::make('password');
		$user->game_id = 4;
		$user->final_round_id = null;
		$user->save();

        $user = new User();
		$user->name = "Sandy Todd";
		$user->email = "SandyTodd@email.com";
		$user->username = "SandyTodd";
		$user->password = Hash::make('password');
		$user->game_id = 4;
		$user->final_round_id = null;
		$user->save();

        $user = new User();
		$user->name = "Stewart Wells";
		$user->email = "StewartWells@email.com";
		$user->username = "StewartWells";
		$user->password = Hash::make('password');
		$user->game_id = 3;
		$user->final_round_id = null;
		$user->save();

		$user = new User();
		$user->name = "Becky Padilla";
		$user->email = "BeckyPadilla@email.com";
		$user->username = "BeckyPadilla";
		$user->password = Hash::make('password');
		$user->game_id = 3;
		$user->final_round_id = null;
		$user->save();

		$user = new User();
		$user->name = "Robyn Warner";
		$user->email = "RobynWarner@email.com";
		$user->username = "RobynWarner ";
		$user->password = Hash::make('password');
		$user->game_id = 5;
		$user->final_round_id = null;
		$user->save();

		$user = new User();
		$user->name = "Clara Baldwin";
		$user->email = "ClaraBaldwin@email.com";
		$user->username = "ClaraBaldwin";
		$user->password = Hash::make('password');
		$user->game_id = 4;
		$user->final_round_id = null;
		$user->save();
       	
       	$user = new User();
		$user->name = "Christina Mendez";
		$user->email = "ChristinaMendez@email.com";
		$user->username = "ChristinaMendez";
		$user->password = Hash::make('password');
		$user->game_id = 2;
		$user->final_round_id = null;
		$user->save();

		$user = new User();
		$user->name = "Kara Clark";
		$user->email = "KaraClark@email.com";
		$user->username = "KaraClark";
		$user->password = Hash::make('password');
		$user->game_id = 3;
		$user->final_round_id = null;
		$user->save();

		$user = new User();
		$user->name = "Rosemary Gomez";
		$user->email = "RosemaryGomez@email.com";
		$user->username = "RosemaryGomez";
		$user->password = Hash::make('password');
		$user->game_id = 1;
		$user->final_round_id = null;
		$user->save();

		$user = new User();
		$user->name = "Eula Lyons";
		$user->email = "EulaLyons@email.com";
		$user->username = "EulaLyons";
		$user->password = Hash::make('password');
		$user->game_id = 2;
		$user->final_round_id = null;
		$user->save();

		$user = new User();
		$user->name = "Roxanne Gill";
		$user->email = "RoxanneGill@email.com";
		$user->username = "RoxanneGill";
		$user->password = Hash::make('password');
		$user->game_id = 4;
		$user->final_round_id = null;
		$user->save();

    }

}