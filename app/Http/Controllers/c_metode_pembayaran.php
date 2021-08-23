<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\m_metode_pembayaran;
use App\Http\Resources\r_metode_pembayaran as r_metode_pembayaran;

class c_metode_pembayaran extends BaseController
{
    public function index()
    {
       $arrMetode = m_metode_pembayaran::paginate(10);
       return $this->sendResponse(r_metode_pembayaran::collection($arrMetode),'Posts fetched .');
    }

    public function store(Request $request)
    {
       $input=$request->all();
       $validator=Validator::make($input, [
            'nama_metode' => 'required',
        ]);

       if ($validator->fails()) {
           return $this->sendError($validator->errors());
       }

       $arrMetode=m_metode_pembayaran::create($input);
       return $this->sendResponse(new r_metode_pembayaran($arrMetode),'Post Create .');

    }

    public function show($id)
    {
        $arrMetode = m_metode_pembayaran::find($id);
        if (is_null($arrMetode)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new r_metode_pembayaran($arrMetode), 'Post fetched.');
    }

    public function update($id, Request $request,m_metode_pembayaran $arrMetode)
    {
        $input = $request->all();
        $validator=Validator::make($input, [
            'nama_metode' => 'required',
        ]);
         if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $arrMetode=m_metode_pembayaran::find($id);
        $arrMetode->nama_metode=$input['nama_metode'];
        $arrMetode->save();

        return $this->sendResponse(new r_metode_pembayaran($arrMetode),'Posts Update.');
    }


    public function destroy(m_metode_pembayaran $arrMetode)
    {
        $arrMetode->delete();
        return $this->sendResponse([],'Post Deleted. ');
    }
}
