<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Airport as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
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

    protected $table = 'categories';
    protected $guarded = [];

    public function sub_categories()
    {
        return $this->hasMany('App\Models\SubCategories', 'categoryid', 'id');
    }

    public function createdby()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

}
