<?php

class FileManager extends Controller {
	function index()
	{
		$template = $this->loadView('filemanager_view');
		$template->render();
	}
}
