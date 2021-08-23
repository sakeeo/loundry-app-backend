<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\m_transaksi;
use App\Http\Resources\r_transaksi as r_transaksi;

class c_transaksi extends BaseController
{
    //get all transaksi
    public function index()
    {
        $arrTransaksi = m_transaksi::
        with('getDetail','getPembayaran','getOutlet','getCustomer')
        ->paginate(10);
        
        return $this->sendResponse(r_transaksi::collection($arrTransaksi), 'Posts fetched.');
    }

    //get transaksi by id
    public function show($id)
    {
        $arrTransaksi = m_transaksi::
        with('getDetail','getPembayaran','getOutlet','getCustomer')
        ->where('id',$id)
        ->get();

        if (is_null($arrTransaksi)) {
            return $this->sendError('Post does not exist.');
        }
       
        return $this->sendResponse(new r_transaksi($arrTransaksi),'Post fetched.');
    }


    //simpan transaksi
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'tanggal_masuk'             => 'required',
            'tanggal_selesai'           => 'required',
            'tanggal_pengambilan'       => 'required',
            'customer_id'               => 'required',
            'outlet_id'                 => 'required',
            'status'                    => 'required',
            'status_pembayaran'         => 'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

       $arrTransaksi = new m_transaksi;
       $arrTransaksi->tanggal_masuk         =$input['tanggal_masuk'];
       $arrTransaksi->tanggal_selesai       =$input['tanggal_selesai'];
       $arrTransaksi->tanggal_pengambilan   =$input['tanggal_pengambilan'];
       $arrTransaksi->customer_id           =$input['customer_id'];
       $arrTransaksi->outlet_id             =$input['outlet_id'];
       $arrTransaksi->status                =$input['status'];
       $arrTransaksi->status_pembayaran     =$input['status_pembayaran'];
       $arrTransaksi->save();
       return $this->sendResponse(new r_transaksi($arrTransaksi),'Post created.');
    }


    //update transaksi
    public function update($id, Request $request, m_transaksi $arrTransaksi){
        $input = $request->all();
        $validator = Validator::make($input, [
            'tanggal_masuk'             => 'required',
            'tanggal_selesai'           => 'required',
            'tanggal_pengambilan'       => 'required',
            'customer_id'               => 'required',
            'outlet_id'                 => 'required',
            'status'                    => 'required',
            'status_pembayaran'         => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $arrTransaksi = m_transaksi::find($id);
        $arrTransaksi->tanggal_masuk         =$input['tanggal_masuk'];
        $arrTransaksi->tanggal_selesai       =$input['tanggal_selesai'];
        $arrTransaksi->tanggal_pengambilan   =$input['tanggal_pengambilan'];
        $arrTransaksi->customer_id           =$input['customer_id'];
        $arrTransaksi->outlet_id             =$input['outlet_id'];
        $arrTransaksi->status                =$input['status'];
        $arrTransaksi->status_pembayaran     =$input['status_pembayaran'];
        $arrTransaksi->save();

        return $this->sendResponse(new r_transaksi($arrTransaksi),'Post updated.');
    }


    //delete transaksi
    public function destroy(m_transaksi $arrTransaksi)
    {
        $arrTransaksi->delete();
        return $this->sendResponse([], 'Post deleted.');
    }


}


