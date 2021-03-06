<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;
	protected $table = 'tbl_fs_productlines';
	protected $primaryKey = 'prodline_id';
	protected $guarded = [];

	public function parent()
	{
		return $this->belongsTo('App\Models\Category', 'parent');
	}

	public function getParentsNames($parent_id) {
		$cate = $this->find($parent_id);
		return $cate;
	}
}
