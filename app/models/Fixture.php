<?php

class Fixture extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fixtures';

	public function round()
    {
        return $this->hasOne('Round');
    }

    public function homeTeam()
    {
        return $this->hasOne('Team');
    }

    public function awayTeam()
    {
        return $this->hasOne('Team');
    }

}
