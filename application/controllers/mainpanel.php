<?php
class mainpanel extends Controller {

  function index()
  {
    $template = $this->loadView('mainpanel_view');
    $template->render();
  }  
}
?>
