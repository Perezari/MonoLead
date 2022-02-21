<?php

class changedb extends Controller {
	function index()
	{
		$template = $this->loadView('changedb_view');
		$template->render();
	}
}
