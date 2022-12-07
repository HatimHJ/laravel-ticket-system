<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    protected $fillable = ['title', 'description', 'image', 'user_id'];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
