<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\VoteNotFoundException;
use App\Exceptions\DuplicateVoteException;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory, Sluggable;

    const IDEA_COUNT_PER_PAGE = 5;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function votes()
    {
        return $this->belongsToMany(User::class, 'votes');
    }

    public function GetStatusClasses()
    {
        $status = $this->status->name;

        switch ($status) {
            case 'Open':
                return 'bg-yellow-200';
            case 'In progress':
                return 'bg-lime-200';
            case 'Answered':
                return 'bg-cyan-200';
            case 'Closed':
                return 'bg-gray-400';
            case 'Void':
                return 'bg-gray-200';

            default:
                # code...
                break;
        }
    }


    /**
     * @param User $user
     * 
     * @return bool
     */
    public function isVotedByUser(?User $user): bool
    {
        if (!$user) {
            return false;
        }
        return Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->exists();
    }

    public function vote(User $user)
    {
        if ($this->isVotedByUser($user)) {
            throw new DuplicateVoteException;
        }
        Vote::create([
            'user_id' => $user->id,
            'idea_id' => $this->id,
        ]);
    }

    public function removeVote(User $user)
    {
        $voteToDelete = Vote::where('user_id', $user->id)
            ->where('idea_id', $this->id)
            ->first();
        if ($voteToDelete) {
            $voteToDelete->delete();
        } else {
            throw new VoteNotFoundException;
        }
    }
}
