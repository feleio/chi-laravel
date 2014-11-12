<?php

View::composer('*', function($view)
{
	$view->with('mailsCount', Mail::count());
});

