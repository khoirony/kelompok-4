<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
	use HasFactory;

	protected $guarded = ['id'];
	public function masyarakat()
	{
		return $this->belongsTo('App\Models\User', 'id_masyarakat');
	}
	public function pegawai()
	{
		return $this->belongsTo('App\Models\User', 'id_pegawai');
	}
}
