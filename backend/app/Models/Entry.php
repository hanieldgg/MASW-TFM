<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model {
	use HasFactory;

	protected $table = 'entries';

	protected $fillable = [ 
		'title',
		'payment_status',
		'judgement_status',
		'date_created',
		'score',
		'winner_status',
		'description',
		'user_id',
		'order_id',
		'entry_category_id',
	];
}
