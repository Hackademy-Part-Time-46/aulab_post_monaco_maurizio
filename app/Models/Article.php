<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
//use App\Models\HasFactory;
use Laravel\Scout\Searchable;

class Article extends Model
{
   use HasFactory, Searchable;
    protected $fillable = ['title', 'subtitle','body', 'image', 'user_id', 'category_id', 'is_accepted'];
    public function user(){
        return$this->belongsTo(User::class);
    }

    public function category(){
        return$this->belongsTo(Category::class);
    }
    public function toSearchbleArray(){
        return[
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'category' => $this->category, 
        ];
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    
}
