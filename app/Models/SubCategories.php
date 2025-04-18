<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Airport as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategories extends Model
{

    use HasFactory, SoftDeletes;

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = auth()->user()->id;
        });
        static::deleting(function ($model) {
            $model->deleted_by = auth()->user()->id;
            $model->save();
        });

    }


    protected $table = 'sub_categories';
    protected $guarded = [];

    public function inventory_data()
    {
        return $this->hasMany('App\Models\Inventory', 'subcategoryid', 'id');
    }

    public function sale_data()
    {
        return $this->hasMany('App\Models\Sale', 'subcategoryid', 'id');
    }

    public function category_data()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'categoryid');
    }

    public function createdby()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function latest_purchase_price()
    {
        return $this->hasMany('App\Models\Inventory', 'subcategoryid', 'id')->orderBy('id','desc');
    }

}
