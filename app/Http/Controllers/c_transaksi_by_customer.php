<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\m_transaksi;
use App\Http\Resources\r_transaksi as r_transaksi;

class c_transaksi_by_customer extends BaseController
{
    public function index()
    {
        return $this->sendResponse([], 'id not found.');
    }
    //get all transaksi by customer
    public function show($id)
    {
        $arrTransaksi = m_transaksi::with('getDetail','getPembayaran','getOutlet','getCustomer')
        ->where('customer_id',$id)
        ->paginate(10);
        return $this->sendResponse(r_transaksi::collection($arrTransaksi), 'Posts fetched.');
    }
}
