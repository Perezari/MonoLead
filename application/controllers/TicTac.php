<?php
class TicTac extends Controller {

  function index()
  {
    $template = $this->loadView('TicTac');
    $template->render();
  }  
}
?>
