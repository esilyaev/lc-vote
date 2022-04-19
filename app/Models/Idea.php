<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
}
