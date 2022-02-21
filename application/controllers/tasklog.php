<?php
class TaskLog extends Controller {

  function index()
  {
    $template = $this->loadView('tasklog_view');

    $_STATUS = $this->loadModel('TaskLogModel');
    $_STATUS_DATA = $_STATUS->getAllLogs();

    $result = array();
    foreach ($_STATUS_DATA as $key => $value) {
      array_push($result, array(
        'id' => $value['id'],
        'user_id' => $value->user['fullname'],
        'task_id' => $value['task_id'],
		'update_date' => $value['update_date'],
		'Name' => $value['Name'],
		'user_name' => $value['user_name']
      ));
    }

    $template->set('_STATUS_DATA',json_encode($result));

    $template->render();
  }

  function get_log_list()
  {
    $_STATUS = $this->loadModel('TaskLogModel');
    $_STATUS_DATA = $_STATUS->getAllLogs($_POST);

    $result['status'] = 'success';
    $result['total'] = count($_STATUS_DATA);
    $result['records'] = array();
    foreach ($_STATUS_DATA as $key => $value) {
      array_push($result['records'], array(
        'id' => $value['id'],
        'user_id' => $value['user_id'],
        'task_id' => $value['task_id'],
		'update_date' => $value['update_date'],
		'Name' => $value['Name'],
		'user_name' => $value['user_name']
      ));
    }
    echo json_encode($result);
    die();
  }

  function get_log($id = null)
  {
    $_STATUS = $this->loadModel('TaskLogModel');
    $_STATUS_DATA = $_STATUS->getLog($id);

    $result['status'] = 'success';
    $result['record'] = array(
      'recid' => 1,
      'id' => $value['id'],
      'user_id' => $value['user_id'],
      'task_id' => $value['task_id'],
	  'update_date' => $value['update_date'],
	  'Name' => $value['Name'],
	  'user_name' => $value['user_name']
    );
    echo json_encode($result);
    die();
  }

  function delete_log()
  {
    $_STATUS = $this->loadModel('TaskLogModel');
    $_STATUS->deleteLog($_POST['id']);

    die();
  }

}