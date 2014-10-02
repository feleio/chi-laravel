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

	public function __construct()
    {
        $this->beforeFilter('auth');
    }

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

		$destDir = 'imgs/uploads/';
		if ($imgFile->move($destDir, $image->id.'.'.$type))
		{
			$this->generateThumnail($image->id, $type, $destDir);

			if (Input::get('artwork'))
				$this->createArtwork($image->id);

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

	private function generateThumnail($id, $type, $destDir)
	{
		$oriImgPath = $destDir.$id.'.'.$type;

		if ($type == 'gif')
			$oriImg = imagecreatefromgif($oriImgPath);
		elseif ($type == 'jpg')
			$oriImg = imagecreatefromjpeg($oriImgPath);
		elseif ($type == 'png')
			$oriImg = imagecreatefrompng($oriImgPath);

		$ox = imagesx($oriImg);
	    $oy = imagesy($oriImg);
	     
	    $ns = Config::get('image.thumbnail_length');
	     
	    $newImg = imagecreatetruecolor($ns, $ns);
	    if ($oy < $ox)
	    {
	    	$x = ($ox - $oy)/2;
	    	imagecopyresampled ($newImg, $oriImg, 0,0,$x,0, $ns,$ns,$oy,$oy);
	    }
	    else
	    {
	    	$y = ($oy - $ox)/2;
	    	imagecopyresampled ($newImg, $oriImg, 0,0,0,$y, $ns,$ns,$ox,$ox);
	    }
	 
	    imagejpeg($newImg, $destDir . $id.'_thm'.'.'.$type);
	}

	private function createArtwork($imageId)
	{
		$artwork = new Artwork;
		$artwork->image_id = $imageId;
		$artwork->save();
	}
}
