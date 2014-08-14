<?php

class Round extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'rounds';

	public function fixtures()
    {
        return $this->hasMany('Fixture');
    }

    public function result()
    {
        return $this->belongsTo('RoundResult');
    }
}
