<?php

class Game extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'games';

	public function users()
    {
        return $this->hasMany('User');
    }

    public function rounds()
    {
        return $this->hasMany('Round');
    }
}
