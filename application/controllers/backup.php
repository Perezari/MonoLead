<?php

class backup extends Controller {
	function index()
	{
		$template = $this->loadView('backup_view');
		$template->render();
	}
}
