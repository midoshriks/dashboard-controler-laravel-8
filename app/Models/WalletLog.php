<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletLog extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $deposit = ['debit', 'rewards'];
    protected $withdrawal = ['credit', 'used'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function walletStatus()
    {
        return $this->belongsTo(Type::class, 'wallet_status_id');
    }

    public function Helper()
    {
        return $this->belongsTo(Helper::class, 'helper_id');
    }

    public function deposit()
    {
        if (in_array($this->walletStatus->name, $this->deposit)) {
            return true;
        }
        return false;
    }
}
