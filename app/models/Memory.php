<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Memory extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'memory';

	protected $softDelete = true;

    protected $dates = ['deleted_at'];

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

}
