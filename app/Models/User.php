<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'image',
        'address',
        'status',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function wishlistProducts()
    {
        return $this->hasMany(wishlist::class, 'userid', 'id')->pluck('productid')->toArray();
    }

    public function level()
    {
        $wishListCount = wishlist::where('userid',$this->id)->count();
        $quizQuestionCount = QuizAnswers::where('userid', $this->id)->distinct('questionid')->count('questionid');

        $response = 0;

        //Level 1 (3 Wishlist 3 Unique Question)
        if(($wishListCount>=3 && $wishListCount<10) && ($quizQuestionCount>=3 && $wishListCount<10))
        {
            $response = 1;
        }

        //Level 2 (10 Wishlist 10 Unique Question)
        if(($wishListCount>=10 && $wishListCount<30) && ($quizQuestionCount>=10 && $wishListCount<30))
        {
            $response = 2;
        }

        //Level 3 (30 Wishlist 30 Unique Question)
        if(($wishListCount>=30) && ($quizQuestionCount>30))
        {
            $response = 3;
        }

        return $response;

    }

}
