<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraphEdge extends Model
{
    protected $fillable = [
        'from_node',
        'to_node',
        'weight'
    ];
}