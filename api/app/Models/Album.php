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
        'photographer_id', 'title', 'description', 'img', 'date', 'featured', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes validation rules.
     *
     * @var array
     */
    public static $rules = [
        "title" => "required",
        "description" => "required",
        "img" => "required",
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
