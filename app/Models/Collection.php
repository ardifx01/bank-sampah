<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'drop_point_id',
        'collection_date',
        'total_points',
        'status',
    ];

    /**
     * Get the details for the collection.
     */
    public function details()
    {
        return $this->hasMany(CollectionDetail::class, 'collection_id');
    }

    /**
     * Get the user that owns the collection.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}