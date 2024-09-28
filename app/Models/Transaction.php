<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'account_id', 'transaction_type', 'amount', 'description', 'transaction_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }

    public function ledgers()
    {
        return $this->hasMany(Ledger::class);
    }
}