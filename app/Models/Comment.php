<?php

namespace App\Models;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'idea_id', 'body'];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
