<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class type extends Model
{
    use HasFactory;
    //* Order sataus
    const TYPE_ORDER_PENDING = 9;
    const TYPE_ORDER_CONFIRM = 10;
    //* Wallset status
    const TYPE_WALLET_STATUS_REWARDS = 17;
    //* Wallet
    const TYPE_WALLET_COIN = 18;
    const TYPE_WALLET_BUCKS = 20;
    public $guarded = [];

}
