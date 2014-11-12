<?php

class PostcardrequestController extends \BaseController {
	public function postSend()
	{	
		$validator = Validator::make( 
			array(
				'name' => Input::get('name'),
				'email' => Input::get('email'),
				'content' => Input::get('content'),
				'address' => Input::get('address'),),
			array(
				'name' => 'required',
				'email' => 'email',
				'content' => 'required',
				'address' => 'required',
				));

		if ($validator->fails())
		{
			Session::flash('isSuccess', False);
			Session::flash('message', '請輸入必填訊息');
			return Redirect::to('postcard')
				->withErrors($validator);
		}

		$request = new Postcardrequest;
		$request->name = Input::get('name');
		$request->email = Input::get('email');
		$request->content = Input::get('content');
		$request->address = Input::get('address');
		$request->save();

		Session::flash('isSuccess', True);
		Session::flash('message', '成功寄出訊息');
		return Redirect::to('postcard');
	}
}