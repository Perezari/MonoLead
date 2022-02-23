<?php

class StatusModel extends Model {
	
    public function getAllStatuses()
    {
        $result = $this->notorm()->status();
        return $result;
    }    

    public function getStatus($id = null)
    {
        $result = $this->notorm()->status[$id];
        return $result;
    }
	
    public function getStatusByName($name = null)
    {
        $result = $this->notorm()->status()->where( array("name" => $name) );
        return $result;
    }

    public function addStatus($array = null)
    {
		$this->notorm()->status()->insert($array);
    }

    public function saveStatus($array = null)
    {
        if(empty($array['id'])){
            $this->notorm()->status()->insert($array);
        } else {
            $result = $this->notorm()->status[$array['id']];
            $result->update($array);
        }
    }

    public function deleteStatus($id = null)
    {
        $result = $this->notorm()->status[$id];
        $result->delete();
    }
}

?>
