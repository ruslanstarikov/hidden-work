<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'scope',
        'budget_satoshis',
        'client_id',
        'payment_options',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
