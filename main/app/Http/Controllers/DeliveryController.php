<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Delivery;
use App\DeliveryTimes;

class DeliveryController extends Controller
{

	public function __construct()
    {
        $this->middleware('isAdmin');
    }

	public function store(Request $request)
	{
		$this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);
        Delivery::create($request->all());
    	return \Redirect('/admin/delivery')->with([
            'flash_message' => 'Delivery Method Successfully Created'
        ]);
	}

	public function edit(Request $request,$id)
	{
		$this->validate($request, [
            'name' => 'required',
            'price' => 'required',
        ]);
        Delivery::find($id)->update($request->all());
    	return \Redirect()->back()->with([
            'flash_message' => 'Delivery Method Successfully Updated'
        ]);
	}

	public function delete($id)
	{
		Delivery::destroy($id);
		return \Redirect()->back()->with([
            'flash_message' => 'Delivery method Successfully removed',
            'flash-warning' => true
        ]); 
	}

}
