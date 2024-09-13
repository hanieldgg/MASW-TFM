<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryCategory extends Model {
	use HasFactory;

	protected $table = 'entry_categories';

	protected $fillable = [ 
		'title',
		'price',
		'parent_id',
	];
}
