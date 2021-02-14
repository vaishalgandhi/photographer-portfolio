<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'date', 'featured', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that are date formated.
     *
     * @var array
     */
    protected $dates = ["date"];

    /**
     * The attributes validation rules.
     *
     * @var array
     */
    public static $rules = [
        "title" => "required",
        "description" => "required",
        "image" => "required"
        "date" => "required|date",
    ];

    /**
     * BelongsTo relation with Photographer.
     *
     * @return Eloquent Object
     */
    public function photographer()
    {
        return $this->belongsTo("App\Models\Photographer");
    }
}
