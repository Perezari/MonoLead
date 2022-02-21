<?php

class TaskLogModel extends Model {

  public function getAllLogs()
  {
    $result = $this->notorm()->tasklog();
    return $result;
  }

  public function getLog($id = null)
  {
    $result = $this->notorm()->tasklog[$id];
    return $result;
  }

  public function saveLog($array = null)
  {
    if(empty($array['id'])){
      $this->notorm()->tasklog()->insert($array);
    } else {
      $result = $this->notorm()->tasklog[$array['id']];
      $result->update($array);
    }
  }

  public function deleteLog($id = null)
  {
    $result = $this->notorm()->tasklog[$id];
    $result->delete();
  }

  public function getUserLog($id = null)
  {
    $result = $this->notorm()->tasklog()->where( array("user_id" => $id) );
    return $result;
  }

  public function getLogUser($id = null)
  {
    $result = $this->notorm()->tasklog()->where( array("task_id" => $id) );
    return $result;
  }

  public function deletelogByTask($id = null)
  {
    $result = $this->notorm()->tasklog()->where( array("task_id" => $id));
    $result->delete();
  }
}

?>