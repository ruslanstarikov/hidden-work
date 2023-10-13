<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Invitation extends Model
{
    use HasFactory;

    public $fillable = [
        'company_id',
        'email',
        'created_by'
    ];

    protected static function booted()
    {
        static::creating(function ($invitation) {
            if (is_null($invitation->created_by) && Auth::check()) {
                $invitation->created_by = Auth::id();
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
