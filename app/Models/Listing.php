<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title','user_id','logo','company','location','website','email','tags','description'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false)
        {
            $query->where('tags', 'like' , '%' . request('tag') . '%' );
        }
        if($filters['search'] ?? false)
        {
            $query->where('title', 'like' , '%' . request('search') . '%' )
            ->orwhere('title', 'like' , '%' . request('search') . '%' )
            ->orwhere('description', 'like' , '%' . request('search') . '%' )
            ->orwhere('tags', 'like' , '%' . request('search') . '%' )
            ->orwhere('company', 'like' , '%' . request('search') . '%' );
        }
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
