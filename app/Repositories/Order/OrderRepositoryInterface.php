<?php
namespace App\Repositories\Order;
use App\Models\Order;

Interface OrderRepositoryInterface{    
    public function conferm_order(Order $order);
}