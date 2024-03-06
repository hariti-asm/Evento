<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=['title','description','date_time','location','category_id','available_seats','approved', 'organizer_id','reservation_type'];

    public function organizer()
    {
        return $this->belongsTo(User::class,'id')->where('user_type', 2);
    }
     public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
  
