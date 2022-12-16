<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Note extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'content',
        'priority',
        'created_at',
        'updated_at'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class,'notes_categories');
    }
}
