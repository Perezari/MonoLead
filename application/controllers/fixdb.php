<?php

class Fixdb extends Controller {
	function index()
	{
		$template = $this->loadView('fixdb_view');
		$template->render();
	}
}
