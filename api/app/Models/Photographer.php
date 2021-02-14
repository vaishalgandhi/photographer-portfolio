<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'bio', 'profile_picture', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes validation rules.
     *
     * @var array
     */
    public static $rules = [
        "name" => "required",
        "email" => "required|email|unique:photographers,email",
        "phone" => "required",
        "bio" => "required",
        "profile_picture" => "required"
    ];

    /**
     * HasMany relation with Album.
     *
     * @return Eloquent Object
     */
    public function album()
    {
        return $this->hasMany("App\Models\Album");
    }
}
