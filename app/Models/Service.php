<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'duration'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function requests()
    {
        return $this->hasMany(ServiceRequest::class);
    }

}
