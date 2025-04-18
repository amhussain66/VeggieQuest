<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';
    protected $guarded = [];

    public function userdata()
    {
        return $this->hasOne('App\Models\User', 'id', 'userid');
    }

    public function productdata()
    {
        return $this->hasOne('App\Models\Products', 'id', 'productid');
    }

}
