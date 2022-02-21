<?php include('header.php'); ?>
	
    <div id="content">
	 	<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_LOG){  ?>
		<div id="user_group_grid" style="width: 100%; height: 100%;"></div>
	 	<?php } else { echo '<!DOCTYPE html>
							<html lang="en"> 
							<head>
							
							<style>
							* {
							-webkit-box-sizing: border-box;
							box-sizing: border-box;
							}
							
							body {
							padding: 0;
							margin: 0;
							}
							
							#notfound {
							position: relative;
							height: 100vh;
							}
							
							#notfound .notfound {
							position: absolute;
							left: 50%;
							top: 50%;
							-webkit-transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							transform: translate(-50%, -50%);
							}
							
							.notfound {
							max-width: 460px;
							width: 100%;
							text-align: center;
							line-height: 1.4;
							}
							
							.notfound .notfound-404 {
							position: relative;
							width: 180px;
							height: 180px;
							margin: 0px auto 50px;
							}

							.notfound .notfound-404>div:first-child {
							position: absolute;
							left: 0;
							right: 0;
							top: 0;
							bottom: 0;
							background: #ffa200;
							-webkit-transform: rotate(45deg);
							-ms-transform: rotate(45deg);
							transform: rotate(45deg);
							border: 5px dashed #000;
							border-radius: 5px;
							}

							.notfound .notfound-404>div:first-child:before {
							content: "";
							position: absolute;
							left: -5px;
							right: -5px;
							bottom: -5px;
							top: -5px;
							-webkit-box-shadow: 0px 0px 0px 5px rgba(0, 0, 0, 0.1) inset;
							box-shadow: 0px 0px 0px 5px rgba(0, 0, 0, 0.1) inset;
							border-radius: 5px;
							}

							.notfound .notfound-404 h1 {
							font-family: "Cabin", sans-serif;
							color: #000;
							font-weight: 700;
							margin: 0;
							font-size: 90px;
							position: absolute;
							top: 50%;
							-webkit-transform: translate(-50%, -50%);
							-ms-transform: translate(-50%, -50%);
							transform: translate(-50%, -50%);
							left: 50%;
							text-align: center;
							height: 40px;
							line-height: 40px;
							}				
				
							.notfound h2 {
							font-family: "Cabin", sans-serif;
							font-size: 33px;
							font-weight: 700;
							text-transform: uppercase;
							letter-spacing: 7px;
							text-align: center;
							}
							
							.notfound p {
							font-family: "Cabin", sans-serif;
							font-size: 16px;
							color: #000;
							font-weight: 400;
							}

							.notfound a {
							font-family: "Cabin", sans-serif;
							display: inline-block;
							padding: 10px 25px;
							background-color: #8f8f8f;
							border: none;
							border-radius: 40px;
							color: #fff;
							font-size: 14px;
							font-weight: 700;
							text-transform: uppercase;
							text-decoration: none;
							-webkit-transition: 0.2s all;
							transition: 0.2s all;
							}
							.notfound a:hover {
							background-color: #2c2c2c;
							}
							</style>
							
							<meta charset="utf-8">
							<meta http-equiv="X-UA-Compatible" content="IE=edge">
							<meta name="viewport" content="width=device-width, initial-scale=1">
							<title>404 HTML Template by Colorlib</title>
							<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
							<link type="text/css" rel="stylesheet" href="css\NotAuto.css" />
							</head>
							<body>
							<div id="notfound">
							<div class="notfound">
							<div class="notfound-404">
							<div></div>
							<h1>404</h1>
							</div>
							<h2>Not autorize</h2>
							<p>The page you are looking for available only for admins.</p>
							<a href="#">Dashboard</a>
							</div>
							</div>
							</body>
							</html>
							'; }  ?>
	</div>

	<?php $FNAME[0] = 'ADD'; $FNAME[1] = 'EDIT'; for($i = 0; $i <= 1; $i++){ ?>
	<div id="FORM_<?php echo $FNAME[$i]; ?>_USER" style="display:none"></div>
	<?php } ?>

	<?php include('footer.php'); ?>

<script type="text/javascript">

	$(function () {
        $('#user_group_grid').w2grid({ 
	        name: 'user_group_grid', 
	        url: '<?php echo BASE_URL; ?>TaskLog/get_log_list',
	        method: 'POST',
	        recid:'id',
	       	header:'Task Log',
        	multiSelect			: false, 
			reorderColumns		: true,  //סידור עמודות לפי צורך של המשתמש
	        show: {
            	lineNumbers    	: true,
	        	header			: true,
        		toolbar     	: true,
			    toolbarColumns  : true,
			    toolbarSearch   : true,
				footer			: true,
				toolbarSearch   : true
	        },			
		    toolbar: {
		        items: [
					<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button',  id: 'delete_user_group',  caption: 'Delete', img: 'icon-cancel', hint: 'Delete user group' },"; ?>
					{ type: 'button',  id: 'preview_task',  caption: 'Preview user', img: 'icon-preview', hint: 'Preview user' },
					{ type: 'drop',  id: 'User_info', caption: 'Information', img: 'icon-info',
						html: '<div style="padding: 10px; line-height: 1.5">You are in the Task Log table.'
					},

				],
		        onClick: function (target, data) {
		        	var selected = w2ui['user_group_grid'].get(w2ui['user_group_grid'].getSelection()[0]);
		        	if(target == 'delete_user_group'){
		        		if(selected == null){
						    showMessage('Please select a user group to delete.','error') ;
		        		} else {
		        			w2confirm('Are you sure you want to delete this user group?','Warning', function (btn) { 
		        				if(btn == 'Yes'){
		        					deleteTaskLog(selected.id);
		        				}
		        			});
		        		}
		        	}
					if(target == 'preview_task'){
		        		if(selected == null){
						    showMessage('Select a task to display.','info') ;
		        		} else {
		        			previewTask(selected.user_id);
		        		}
		        	}
		        }
		    },	   
	        columns: [                
	            { field: 'id', style:'text-align:center', caption: 'ID', size: '150px', resizable: true, sortable: true, searchable: true },
	            { field: 'user_id', style:'text-align:center', caption: 'User ID', size: '150px', resizable: true, sortable: true, searchable: true },
	            { field: 'user_name', style:'text-align:center', caption: 'User Name', size: '150px', resizable: true, sortable: true, searchable: true },
				{ field: 'task_id', style:'text-align:center', caption: 'Task ID', size: '150px', resizable: true, sortable: true, searchable: true },
	            { field: 'update_date', style:'text-align:center',caption: 'Update date', size: '150px', resizable: true, sortable: true, searchable: true },
	            { field: 'Name', caption: 'Action', size: '150px', resizable: true, sortable: true, searchable: true,
	                render: function (record, index, column_index) {
	                	if(record.Name == 'DELETE'){
	                		color = 'background-color:red';
	                	} else if(record.Name == 'UPDATE'){
	                		color = 'background-color:yellow';
	                	} else if(record.Name == 'INSERT') {
	                		color = 'background-color:LawnGreen';
	                	} else if(record.Name == 'FIX') {
	                		color = 'background-color:#00b8ff5c';
	                	} 
						else {
	                		color = '';
	                	}
	                    var html = '<div style="'+color+';float:left;width:10px;height:10px;margin:2px;border:1px solid gray"></div><div class="icon-text-wrap">'+ record.Name+'</div>';
	                    return html;
	                }
				}
			]
	    });    

	});

	function deleteTaskLog(id){
		$.ajax({
	        url: '<?php echo BASE_URL; ?>TaskLog/delete_log',
	        type: 'POST',
	        data: { 
	          id : id
	        },
	        }).success(function(data){
			    showMessage('Log successfully deleted.','success') ;
			    w2ui['user_group_grid'].reload();
	    });
	}
	
	function previewTask(user_id){
		openInSameTab('<?php echo BASE_URL; ?>user/preview/'+user_id);
	}

</script>