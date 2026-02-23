<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_id',
        'saving_type_id',
        'amount',
        'start_date',
        'end_date',
        'ongoing',
        'interest_rate',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'ongoing' => 'boolean',
        'amount' => 'decimal:2',
        'interest_rate' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function savingType()
    {
        return $this->belongsTo(SavingType::class);
    }
}
