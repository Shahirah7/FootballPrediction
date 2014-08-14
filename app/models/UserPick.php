<?php

class UserPick extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_picks';


    public function round()
    {
        return $this->belongsTo('Round');
    }


    public function team()
    {
        return $this->belongsTo('Team');
    }

}
