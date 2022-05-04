<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function votes()
    {
        return $this->belongsToMany(Idea::class, 'votes');
    }

    public function GetAvatar()
    {
        // $url = 'https://www.gravatar.com/avatar/b863575d7db69014b2ff29cf02555fa0%3Fs=100&d=https%253A%252F%252Fs3.amazonaws.com%252Flaracasts%252Fimages%252Fforum%252Favatars%252Fdefault-avatar-18.png';

        $firstChar = $this->email[0];

        if (is_numeric($firstChar)) {
            $integerToUse = ord(strtolower($firstChar)) - 21;
        } else {
            $integerToUse = ord(strtolower($firstChar)) - 96;
        }

        $url = 'https://www.gravatar.com/avatar/'
            . md5($this->email)
            . '?s=200'
            . '&d=http://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
            . $integerToUse
            . '.png';

        // dd($url);

        return $url;
    }

    public function isAdmin()
    {
        return in_array($this->email, [
            'eos@lc-vote.com'
        ]);
    }
}
