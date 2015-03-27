<?php

class Memory extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'memory';

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

}
