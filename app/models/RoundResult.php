<?php

class RoundResult extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'round_results';

	public function round()
    {
        return $this->belongsTo('Round');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }


}
