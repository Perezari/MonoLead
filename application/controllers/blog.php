<?php

class Blog extends Controller {
	function index()
	{
		$template = $this->loadView('blog_view');
		$template->render();
	}
}
