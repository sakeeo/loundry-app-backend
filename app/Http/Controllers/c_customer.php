<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\m_customer;
use App\Http\Resources\r_customer as r_customer;

class c_customer extends BaseController
{
    public function index()
    {
        $arrCustomer = m_customer::paginate(10);
        return $this->sendResponse(r_customer::collection($arrCustomer), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama'      => 'required',
            'hp'        => 'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $arrCustomer = m_customer::create($input);
        return $this->sendResponse(new r_customer($arrCustomer),'Post created.');
    }

    public function show($id)
    {
        $arrCustomer = m_customer::find($id);
        if (is_null($arrCustomer)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new r_customer($arrCustomer), 'Post fetched.');
    }

    public function update($id, Request $request, m_customer $arrCustomer)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama'      => 'required',
            'hp'        => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $arrCustomer = m_customer::find($id);
        $arrCustomer->nama  = $input['nama'];
        $arrCustomer->hp    = $input['hp'];
        $arrCustomer->save();
        
        return $this->sendResponse(new r_customer($arrCustomer), 'Post updated.');
    }

    public function destroy(m_customer $arrCustomer)
    {
        $arrCustomer->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}
