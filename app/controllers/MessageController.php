<?php

class MessageController extends \BaseController {
	public function getSend()
	{
		$data = array(
			'savedName' => '',
			'savedEmail' => '' );
		return View::make('messages.send')->with($data);
	}

	public function postSend()
	{	
		$validator = Validator::make( 
			array(
				'name' => Input::get('name'),
				'email' => Input::get('email'),
				'content' => Input::get('content'),),
			array(
				'name' => 'required',
				'email' => 'email',
				'content' => 'required',
				));

		if ($validator->fails())
		{
			Session::flash('isSuccess', False);
			Session::flash('message', '請輸入必填訊息');
			return Redirect::to('messages/send')
				->withErrors($validator);
		}

		$message = new Message;
		$message->name = Input::get('name');
		$message->email = Input::get('email');
		$message->content = Input::get('content');
		$message->save();

		Session::flash('isSuccess', True);
		Session::flash('message', '成功寄出訊息');
		return Redirect::to('messages/send');
	}
}