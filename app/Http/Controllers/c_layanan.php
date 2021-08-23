<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\m_layanan;
use App\Http\Resources\r_layanan as r_layanan;

class c_layanan extends BaseController
{
    public function index()
    {
        $arrLayanan = m_layanan::paginate(10);
        return $this->sendResponse(r_layanan::collection($arrLayanan), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_layanan'   => 'required',
            'satuan'        => 'required',
            'harga_satuan'   => 'required',
            'outlet_id'      => 'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $arrLayanan = m_layanan::create($input);
        return $this->sendResponse(new r_layanan($arrLayanan),'Post created.');
    }

    public function show($id)
    {
        $arrLayanan = m_layanan::find($id);
        if (is_null($arrLayanan)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new r_layanan($arrLayanan), 'Post fetched.');
    }

    public function update($id, Request $request, m_layanan $arrLayanan)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
             'nama_layanan'   => 'required',
            'satuan'        => 'required',
            'harga_satuan'   => 'required',
            'outlet_id'      => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $arrLayanan = m_layanan::find($id);
        $arrLayanan->nama_layanan = $input['nama_layanan'];
        $arrLayanan->satuan = $input['satuan'];
        $arrLayanan->harga_satuan = $input['harga_satuan'];
        $arrLayanan->outlet_id = $input['outlet_id'];
        $arrLayanan->save();
        
        return $this->sendResponse(new r_layanan($arrLayanan), 'Post updated.');
    }

    public function destroy(m_layanan $arrLayanan)
    {
        $arrLayanan->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
