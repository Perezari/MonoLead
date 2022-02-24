<?php
class Main extends Controller {

  function index()
  {
    $template = $this->loadView('main_view');

    /* משתנים עבור פעילות */
    $_ACT = $this->loadModel('ActivityModel');
    $_ACT_DATA = $_ACT->getAllActivities();
	//$_ACT_DATABASE_NAME = $_ACT->GetDatabaseName();
    $_ACT_DATA_S = $_ACT->getAllActivitiesLimit(10,Handler::$_LOGIN_USER_ID,'not');
    $_ACT_DATA_OWN = $_ACT->getAllActivitiesLimit(10,Handler::$_LOGIN_USER_ID,'in');

    /* משתנים עבור פרויקטים */
    $_PRO = $this->loadModel('ProjectModel');
    $_PRO_DATA = $_PRO->getAllProjects();
	
	/* משתנים עבור משימות */
	$_TASK = $this->loadModel('TaskModel');
    $_TASK_DATA = $_TASK->getAllTasks();
	
	/* משתנים עבור משתמשים */
	$_USERS = $this->loadModel('UserModel');
    $_USERS_DATA = $_USERS->getAllUsers();
	
	/* משתנים עבור מחלקות */
	$_USERSGROUP = $this->loadModel('UserGroupModel');
    $_USERGROUP_DATA = $_USERSGROUP->getAllUsergroup();
	
	/* משתנים עבור לוג */
	$_STATUS = $this->loadModel('TaskLogModel');
    $_STATUS_DATA = $_STATUS->getAllLogs();
		
	/* חישובים עבור דף דשבורד */
	
	/* חישובים עבור לוג */
	$totallog = 0;
	$insert = 0;
	$update = 0;
	$delete = 0;
	
	foreach ($_STATUS_DATA as $key => $value)
    {
	  if ($value['Name'] == 'INSERT')
      {
        $insert++;
      }

      else if ($value['Name'] == 'UPDATE')
      {
        $update++;
      }

      else if ($value['Name'] == 'DELETE')
      {
        $delete++;
      }
	  
	  else {}
    }
	
	/* Total Insert Log */
    $template->set('_INSERT_DATA',$insert);
    /* Total Insert Log */
    $template->set('_UPDATE_DATA',$update);
    /* Total Insert Log */
    $template->set('_DELETE_DATA',$delete);
    /* סכום הלוגים שיש במערכת */
    $template->set('_STATUS_DATA2',count($_STATUS_DATA));	
	/* כל הלוגים שיש במערכת */
	$template->set('_STATUS_DATA',$_STATUS_DATA);
	
	/* חישובים עבור מחלקות */	
	$usergroups = 0;

    foreach ($_USERGROUP_DATA as $key => $value)
    {
		$usergroups++;
    }

    /* סכום המחלקות שיש במערכת */
    $template->set('_USERGROUP_DATA',count($_USERGROUP_DATA));	
	
	
	/* חישובים עבור משתמשים */
	$admin = 0;
	$mannager = 0;
	$other = 0;

    foreach ($_USERS_DATA as $key => $value)
    {
	  if ($value['usergroup_id'] == '1')
      {
        $admin++;
      }

      else if ($value['usergroup_id'] == '2')
      {
        $mannager++;
      }

      else
      {
        $other++;
      }
    }

	/* Total Admins */
    $template->set('_ADM_DATA',$admin);
    /* Total Mannagers */
    $template->set('_MAN_DATA',$mannager);
    /* Total Other Users */
    $template->set('_OTH_DATA',$other);
    /* Total Users Existed */
    $template->set('_USERS_DATA',count($_USERS_DATA));		

	/* חישובים עבור פרויקטים */
    $pc = 0;
    $po = 0;
    $px = 0;

    foreach ($_PRO_DATA as $key => $value)
    {
      if ($value['status_id'] == '5') 
      {
        $pc++; /* פרויקטים שהושלמו */
      }

      else if ($value['status_id'] == '1' || $value['status_id'] == '3')
      {
        $po++; /* פרויקטים פתוחים */
      }

      else
      {
        $px++; /* פרויקטים אחרים */
      }
    }

    /* Total Projects Other Status */
    $template->set('_PRO_DATA_X',$px);
    /* Total Projects Completed */
    $template->set('_PRO_DATA_C',$pc);
    /* Total Projects Opened */
    $template->set('_PRO_DATA_O',$po);
    /* Total Projects Existed */
    $template->set('_PRO_DATA',count($_PRO_DATA));

    /* חישובים עבור משימות */
    $tc = 0;
    $to = 0;
    $tx = 0;

    foreach ($_TASK_DATA as $key => $value)
    {
      if ($value['status_id'] == '5')
      {
        $tc++;
      }

      else if ($value['status_id'] == '1' || $value['status_id'] == '3')
      {
        $to++;
      }

      else
      {
        $tx++;
      }
    }

    /* Total Task Other Status */
    $template->set('_TASK_DATA_X',$tx);
    /* Total Task Completed */
    $template->set('_TASK_DATA_C',$tc);
    /* Total Task Opened */
    $template->set('_TASK_DATA_O',$to);
    /* Total Task Existed */
    $template->set('_TASK_DATA',count($_TASK_DATA));

	/* חישובים עבור פעילות */
    $ac = 0;
    $ao = 0;
    $ax = 0;
	
    foreach ($_ACT_DATA as $key => $value)
    {
      if ($value['status_id'] == '5')
      {
        $ac++;
      }

      else if ($value['status_id'] == '1' || $value['status_id'] == '3')
      {
        $ao++;
      }

      else
      {
        $ax++;
      }
    }

    /* Total Activities Other Status */
    $template->set('_ACT_DATA_X',$ax);
    /* Total Activities Completed */
    $template->set('_ACT_DATA_C',$ac);
    /* Total Activities Opened */
    $template->set('_ACT_DATA_O',$ao);
    /* Total Activities Existed */
    $template->set('_ACT_DATA_A',count($_ACT_DATA));
    /* הצגת פעילות המשתמש */
    $template->set('_ACT_DATA_OWN',$_ACT_DATA_OWN);
	/* הצגת פעילות של משתמשים אחרים */
    $template->set('_ACT_DATA_S',$_ACT_DATA_S);	
	
	//$template->set('_ACT_DATABASE_NAME',$_ACT_DATABASE_NAME);	
	
    $template->render();	
  }
}

?>