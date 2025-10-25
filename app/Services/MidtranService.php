<?php
namespace App\Services;
use Midtrans\Config;
use Midtrans\Snap;

class MidtranService{
    public function __construct(){
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

    }

    public function createTransaction($params){
        return Snap::createTransaction($params);
    }

}
