<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	use HasFactory;

	protected $table = 'files';

	protected $fillable = [ 
		'billing_address',
		'total',
		'date_placed',
		'payment_type',
		'user_id',
	];
}
