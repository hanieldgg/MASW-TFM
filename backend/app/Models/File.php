<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model {
	use HasFactory;

	protected $table = 'files';

	protected $fillable = [ 
		'file_name',
		'file_url',
		'file_type',
		'entry_id',
	];
}
