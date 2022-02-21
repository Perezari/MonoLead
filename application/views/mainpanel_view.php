<?php include('header.php'); ?>

	<div id="content">
        <div id="sidebar" style="height: 100%; width: 200px;"></div>
    </div>

<?php include('footer.php'); ?>

<script type="text/javascript">
$(function () {
    $('#sidebar').w2sidebar({
        name: 'sidebar',
		topHTML    : '<div style="background-color: #eee; padding: 10px 5px; border-bottom: 1px solid silver">Menu</div>',
        bottomHTML : '<div style="background-color: #eee; padding: 10px 5px; border-top: 1px solid silver"></div>',
		style: 'background-color: #F5F6F7;border-right:1px solid #C0C0C0;',		
		nodes: [
	        { id: 'level-1', text: 'Quick Access', img: 'icon-folder', expanded: true, group: true,
	          nodes: [ { id: 'level-1-1', text: 'Quick Access', img: 'icon-folder', count: 3,
	                       nodes: [
									{ id: 'main', text: 'Dashboard', img: 'icon-house' },
									{ id: 'taskboard', text: 'Taskboard', img: 'icon-taskboard' },
									<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button',  id: 'config', caption: 'Configuration', img: 'icon-config' }"; ?>
	                   ]}
	                 ]
	        },
			{ id: 'level-2', text: 'Tables', img: 'icon-folder', expanded: true, group: true,        
	          nodes: [ { id: 'level-2-1', text: 'Users', img: 'icon-folder', count: 2,
	                       nodes: [
									<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_USERS) echo "{ type: 'button',  id: 'user', caption: 'Users', img: 'icon-group' },"; ?>
									<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_USERSGROUPS) echo "{ type: 'button',  id: 'usergroup', caption: 'User Group', img: 'icon-usergroup' },"; ?>
								  ]
						},
						{ id: 'level-2-2', text: 'Projects & Tasks', img: 'icon-folder', count: 2,
	                       nodes: [
									<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_PROJECTS) echo "{ type: 'button',  id: 'project', caption: 'Projects', img: 'icon-box' },"; ?>
									<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_TASKS) echo "{ type: 'button',  id: 'task', caption: 'Tasks', img: 'icon-task' },"; ?>
								  ]
						},
						{ id: 'level-2-3', text: 'Status', img: 'icon-folder', count: 1,
	                       nodes: [
									<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_STATUS) echo "{ type: 'button', id: 'status',  caption: 'Status', img: 'icon-organizationsub', hint: 'Status' },"; ?>
								  ]
						},
						{ id: 'level-2-4', text: 'Logs', img: 'icon-folder', count: 1,
	                       nodes: [
									<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_LOG) echo "{ type: 'button', id: 'tasklog',  caption: 'Tasks Log', img: 'icon-reportall', hint: 'Tasks Log' },"; ?>
								  ]
						}
	                 ]
	        },
			{ id: 'level-3', text: 'Tools', img: 'icon-folder', expanded: true, group: true,
	          nodes: [ { id: 'level-3-1', text: 'Tools', img: 'icon-folder', count: 6,
	                       nodes: [
									<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button', id: 'backup',  caption: 'Export Database', img: 'icon-dracula', hint: 'MySQL' },"; ?>
									<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button', id: 'createnewdb',  caption: 'Create New DB', img: 'icon-add', hint: 'Create New Database' },"; ?>																		
									<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button', id: 'changedb',  caption: 'Chnage DB', img: 'icon-reload', hint: 'Change Database' },"; ?>																		
									<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button', id: 'fixdb',  caption: 'Fix DB', img: 'icon-autogenerate', hint: 'Fix Database' },"; ?>																		
									<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button', id: 'filemanager',  caption: 'File Manager', img: 'icon-filemanager', hint: 'File Manager' },"; ?>
									{ type: 'button', id: 'blog',  caption: 'Blog', img: 'icon-help', hint: 'Our BlogS' },
								]}
	                 ]
	        },
	    ],	
		
		onClick: function (event) {
			      loadPage(event);
        }
    });
	
	function loadPage(event){
    if(event.node['img'] != 'icon-folder'){
      var win = window.open('<?php echo BASE_URL; ?>'+event.target, '_self');
	  win.focus();
    }
  }	
});
</script>
