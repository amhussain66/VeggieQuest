<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Airport as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class LedgerSale extends Model
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

    protected $table = 'ledger_sale';
    protected $guarded = [];

    public function category_data()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'categoryid');
    }

    public function subcategory_data()
    {
        return $this->hasOne('App\Models\SubCategories', 'id', 'subcategoryid');
    }

    public function createdby()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function updatedby()
    {
        return $this->hasOne('App\Models\User', 'id', 'updated_by');
    }

}
