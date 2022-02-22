<?php
class Status extends Controller {

  function index()
  {
    $template = $this->loadView('status_view');

    $_STATUS = $this->loadModel('StatusModel');
    $_STATUS_DATA = $_STATUS->getAllStatuses();

    $result = array();
    foreach ($_STATUS_DATA as $key => $value) {
      array_push($result, array(
        'text' => $value['status'],
        'id' => $value['id'],
        'icon' => $value['icon']
      ));
    }

    $template->set('_STATUS_DATA',json_encode($result));

    $template->render();
  }

  function get_status_list()
  {
    $_STATUS = $this->loadModel('StatusModel');
    $_STATUS_DATA = $_STATUS->getAllStatuses($_POST);

    $result['status'] = 'success';
    $result['total'] = count($_STATUS_DATA);
    $result['records'] = array();
    foreach ($_STATUS_DATA as $key => $value) {
      array_push($result['records'], array(
        'id' => $value['id'],
        'name' => $value['name'],
        'type' => $value['type'],
        'icon' => $value['icon']
      ));
    }
    echo json_encode($result);
    die();
  }

  function get_status($id = null)
  {
    $_STATUS = $this->loadModel('StatusModel');
    $_STATUS_DATA = $_STATUS->getStatus($id);

    $result['status'] = 'success';
    $result['record'] = array(
      'recid' => 1,
      'id' => $_STATUS_DATA['id'],
      'name' => $_STATUS_DATA['name'],
      'type' => $_STATUS_DATA['type'],
      'icon' =>$_STATUS_DATA['icon']
    );
    echo json_encode($result);
    die();
  }

  function go_insert_status()
  {
    $_STATUS = $this->loadModel('StatusModel');

    $_STATUS_DATA = $_STATUS->getStatusByName($_POST['record']['name']);
    if(count($_STATUS_DATA) >= 1){
      echo 0;
      die();
    }

    $name = 'icon-developer';
    if(isset($_POST['record']['icon'][0]))
    {
      $content = $_POST['record']['icon'][0]['content'];
      $name = $_POST['record']['icon'][0]['name'];
      $name = str_replace(' ', '_', $name);
      $class = str_replace('.', '_', $name);
      file_put_contents(ROOT_STATIC_DIR.'/css/icons/'.$name, base64_decode($content));
      $css = "\n.icon-".$class."{\nbackground:url('icons/".$name."') no-repeat center center;}";
      $myfile = file_put_contents(ROOT_STATIC_DIR.'/css/icon.css', $css.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    $array = array(
      "id" => null,
      "name" => $_POST['record']['name'],
      "type" => $_POST['record']['type'],
      "icon" => 'icon-'.$class
    );

    $_STATUS->addStatus($array);

    die();
  }

  function go_edit_status()
  {

    $_STATUS = $this->loadModel('StatusModel');

    $name = 'icon-developer';
    if(isset($_POST['record']['icon'][0])){
      $content = $_POST['record']['icon'][0]['content'];
      $name = $_POST['record']['icon'][0]['name'];
      $name = str_replace(' ', '_', $name);
      $class = str_replace('.', '_', $name);
      file_put_contents(ROOT_STATIC_DIR.'/css/icons/'.$name, base64_decode($content));
      $css = "\n.icon-".$class."{\nbackground:url('icons/".$name."') no-repeat center center;}";
      $myfile = file_put_contents(ROOT_STATIC_DIR.'/css/icon.css', $css.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    $array = array(
      "id" => $_POST['record']['id'],
      "name" => $_POST['record']['name'],
      "type" => $_POST['record']['type'],
      "icon" => 'icon-'.$class
    );

    $_STATUS->saveStatus($array);

    die();
  }

  function delete_status()
  {
    $_STATUS = $this->loadModel('StatusModel');
    $_STATUS->deleteStatus($_POST['id']);

    die();
  }

}