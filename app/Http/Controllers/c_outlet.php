<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\m_outlet;
use App\Http\Resources\r_outlet as r_outlet;

class c_outlet extends BaseController
{
    public function index()
    {
        $arrOutlet = m_outlet::paginate(10);
        return $this->sendResponse(r_outlet::collection($arrOutlet), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama_usaha' => 'required',
            'hp'        => 'required',
            'email'     => 'required',
            'password'  => 'required'
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $arrOutlet = m_outlet::create($input);
        return $this->sendResponse(new r_outlet($arrOutlet),'Post created.');
    }

    public function show($id)
    {
        $input = $request->all();
        $arrOutlet = m_outlet::find($id);
        if (is_null($arrOutlet)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new r_outlet($arrOutlet), 'Post fetched.');
    }

    public function update($id, Request $request, m_outlet $arrOutlet)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama_usaha' => 'required',
            'hp'        => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'alamat'    => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $arrOutlet = m_outlet::find($id);
        $arrOutlet->nama_usaha = $input['nama_usaha'];
        $arrOutlet->hp = $input['hp'];
        $arrOutlet->email = $input['email'];
        $arrOutlet->password = $input['password'];
        $arrOutlet->alamat = $input['alamat'];
        $arrOutlet->save();
        
        return $this->sendResponse(new r_outlet($arrOutlet), 'Post updated.');
    }

    public function destroy(m_outlet $arrOutlet)
    {
        $arrOutlet->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
