<?php

class ImageController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$images = Image::orderBy('created_at', 'desc')->paginate(15);
		return View::make('images.index')->with('images', $images);
	}

	public function postIndex()
	{
		$imgFile = Input::file('image');
		if ($imgFile)
		{
			$tempFilePath = sys_get_temp_dir().'/'.$imgFile->getFilename();
			$fileType = exif_imagetype($tempFilePath);

			$type = '';

			if ($fileType == IMAGETYPE_GIF)
				$type = 'gif';
			elseif ($fileType == IMAGETYPE_JPEG || $fileType == IMAGETYPE_JPEG2000)
				$type = 'jpg';
			elseif ($fileType == IMAGETYPE_PNG)
				$type = 'png';
			else 
			{
				Session::flash('isSuccess', False);
				Session::flash('message', 'Invalid image type');
				return Redirect::to('images');
			}
		}
		else
		{
				Session::flash('isSuccess', False);
				Session::flash('message', 'No file uploaded');
				return Redirect::to('images');
		}

		$image = new Image;
		$image->type = $type;
		$image->save();

		if ($imgFile->move('imgs/uploads/', $image->id.'.'.$type))
		{
			Session::flash('isSuccess', True);
			Session::flash('message', 'Uploaded successfully');
		}
		else 
		{
			Session::flash('isSuccess', False);
			Session::flash('message', 'Failed with unknown reason');
		}

		return Redirect::to('images');
	}
}
