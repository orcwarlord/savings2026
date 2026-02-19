<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Bank extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'url',
        'address',
    ];

    /**
     * The users linked to this bank.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('institution_username', 'institution_password')->withTimestamps();
    }

}

