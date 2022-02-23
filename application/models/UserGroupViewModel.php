<?php

class UserGroupViewModel extends Model {
	
    public function getAllUsergroup()
    {
        $result = $this->notorm()->usergroup_view()->where( array(" NOT groupcode " => array('ADM')) ) ;;
        return $result;
    }

    public function getUser($id = null)
    {
        if(empty($id)) die('Missing parameter.');
        
        $result = $this->notorm()->usergroup_view[$id];
        return $result;
    }

    public function addUserGroup($array = null)
    {
        $this->notorm()->usergroup_view()->insert($array);
    }

    public function saveUserGroup($array = null)
    {
        if(empty($array['id'])){
            $this->notorm()->usergroup_view()->insert($array);
        } else {
            $result = $this->notorm()->usergroup_view[$array['id']];
            $result->update($array);
        }
    }

    public function deleteUserGroup($id = null)
    {
        $result = $this->notorm()->usergroup_view[$id];
        $result->delete();
    }
}

?>
