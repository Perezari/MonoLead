<?php

class CreateNewdb extends Controller {
	function index()
	{
		$template = $this->loadView('createnewdb_view');
		$template->render();
	}
}
