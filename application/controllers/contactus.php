<?php

class contactus extends Controller {
	function index()
	{
		$template = $this->loadView('contactus_view');
		$template->render();
	}
}
