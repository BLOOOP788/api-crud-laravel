<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Note;
class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'created_at',
        'updated_at'
    ];

    public function notes(){
        return $this->belongsToMany(Note::class,'notes_categories');
    }
}
