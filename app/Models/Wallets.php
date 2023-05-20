<?php

namespace App\Models;

use App\Models\WalletLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallets extends Model
{
    use HasFactory;

    public $guarded = [];


    // walletLogs
    public function walletLogs()
    {
        return $this->hasMany(WalletLog::class, 'wallet_id');
    }

    public function balance($type = null, $helper = null)
    {
        $total = 0;

        $logs = $this->walletLogs();
        if ($type)
            $logs = $logs->whereHas('type', function ($q) use ($type) {
                $q->where('name', $type);
                $q->where('model', 'wallet');
            });

        if ($helper)
            $logs = $logs->whereHas('helper', function ($q) use ($helper) {
                $q->where('id', $helper);
            });

        $logs = $logs->get();

        foreach ($logs as $key => $log) {
            if ($log->deposit()) {
                $total += $log->amount;
            } else {
                $total -= $log->amount;
            }
        }
        return sprintf("%.2f",$total) + 0.001;
    }
}
