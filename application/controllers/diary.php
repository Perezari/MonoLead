<?php

class Diary extends Controller {
	function index()
	{
		$template = $this->loadView('diary_view');
		$template->render();
	}
}
