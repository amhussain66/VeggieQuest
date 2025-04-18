<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Airport as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            $model->deleted_by = auth()->user()->id;
            $model->save();
        });

    }

    protected $table = 'stock';
    protected $guarded = [];

    public function category_data()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'categoryid');
    }

    public function subcategory_data()
    {
        return $this->hasOne('App\Models\SubCategories', 'id', 'subcategoryid');
    }

}
