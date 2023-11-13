<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['_token', 'title', 'slug', 'thumb', 'description', 'project_link', 'github_link'];

    protected function thumb(): Attribute
    {
        return Attribute::make(

            get: function ($value) {
                if (strstr($value, 'http') !== false) {
                    return $value;
                } else {
                    return asset('storage/' . $value);
                }
            }
        );
    }
}
