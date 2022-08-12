<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    protected function image(): Attribute{
        return Attribute::make(
            get: fn($value) => asset('/storage/posts/' . $value),
        );
    }

    protected function createdAt(): Attribute{
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }
}
