<?php include('header.php'); ?>
	
    <div id="content">

    	<div id="layout_dashboard" style="height: 100%; width: 100%;padding:5px;"></div>   
	  
	    <div id="dashboard_main" style="height: 100%; width: 100%;padding:5px;">
		
		<?php if(Handler::$_IS_ADMIN) echo "
		<div class='shell-wrap' style='width:300px;margin:5px;float:left'>
			<p class='shell-top-bar'>User task actions</p>
			<ul class='shell-body' style='overflow-y: auto; height: 92px;'> "; ?> 
			<?php if(Handler::$_IS_ADMIN) { foreach ($_STATUS_DATA as $key => $value) { ?>
			<li><?php echo $value->user['fullname']; ?> <?php echo substr(strip_tags($value['Name']),0,100); ?> 
			<a href="#" onClick="openTask('<?php echo $value['task_id']; ?>')">#<?php echo $value['task_id']; ?></a></li>
			<?php } } ?>
			<?php if(Handler::$_IS_ADMIN) echo "</ul>
		</div>"; ?>
		
	    	<div style="width:300px;height:auto;margin:5px;padding:5px;float:left">
	    		<div class="dialog-header" style="font-size:21px;font-weight:bold;font-family:Verdana;float:left;width:100%">
	    			<div class="w2ui-tb-image w2ui-icon icon-box"></div> Projects
	    		</div>
	    		<div class="dialog-content"  style="font-size:41px;font-weight:bold;font-family:Verdana;float:left;width:100%">
	    			<table>
	    				<tr>
	    					<td rowspan="4" style="width:100px;text-align:center">
	    						<?php echo $_PRO_DATA; ?>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Complete</td>
	    					<td style="font-size:12px">: <?php echo $_PRO_DATA_C; ?></td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Open</td>
	    					<td style="font-size:12px">: <?php echo $_PRO_DATA_O; ?></td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Other</td>
	    					<td style="font-size:12px">: <?php echo $_PRO_DATA_X; ?></td>
	    				</tr>
	    			</table>
	    			
	    		</div>
	    	</div> 

	    	<div style="width:300px;height:auto;margin:5px;padding:5px;float:left">
	    		<div class="dialog-header"  style="font-size:21px;font-weight:bold;font-family:Verdana;float:left;width:100%">
	    			<div class="w2ui-tb-image w2ui-icon icon-task"></div> Tasks
	    		</div>
	    		<div class="dialog-content"  style="font-size:41px;font-weight:bold;font-family:Verdana;float:left;width:100%">
	    			<table>
	    				<tr>
	    					<td rowspan="4" style="width:100px;text-align:center">
	    						<?php echo $_TASK_DATA; ?>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Complete</td>
	    					<td style="font-size:12px">: <?php echo $_TASK_DATA_C; ?></td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Open</td>
	    					<td style="font-size:12px">: <?php echo $_TASK_DATA_O; ?></td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Other</td>
	    					<td style="font-size:12px">: <?php echo $_TASK_DATA_X; ?></td>
	    				</tr>
	    			</table>
	    			
	    		</div>
	    	</div> 

	    	<div style="width:300px;height:auto;margin:5px;padding:5px;float:left">
	    		<div class="dialog-header"  style="font-size:21px;font-weight:bold;font-family:Verdana;float:left;width:100%">
	    			<div class="w2ui-tb-image w2ui-icon icon-programprogram"></div> Activities
	    		</div>
	    		<div class="dialog-content"  style="font-size:41px;font-weight:bold;font-family:Verdana;float:left;width:100%">
	    			<table>
	    				<tr>
	    					<td rowspan="4" style="width:100px;text-align:center">
	    						<?php echo $_ACT_DATA_A; ?>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Complete</td>
	    					<td style="font-size:12px">: <?php echo $_ACT_DATA_C; ?></td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Open</td>
	    					<td style="font-size:12px">: <?php echo $_ACT_DATA_O; ?></td>
	    				</tr>
	    				<tr>
	    					<td style="font-size:12px"> Other</td>
	    					<td style="font-size:12px">: <?php echo $_ACT_DATA_X; ?></td>
	    				</tr>
	    			</table>
	    			
	    		</div>
	    	</div> 
			
			<?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo "	
				<div style='width:300px;height:auto;margin:5px;padding:5px;float:left'>
	    		<div class='dialog-header'  style='font-size:21px;font-weight:bold;font-family:Verdana;float:left;width:100%'>
	    		<div class='w2ui-tb-image w2ui-icon icon-group'></div> Total Users
	    		</div>
	    		<div class='dialog-content'  style='font-size:41px;font-weight:bold;font-family:Verdana;float:left;width:100%'>
	    			<table>
	    				<tr>
	    					<td rowspan='4' style='width:100px;text-align:center'>
	    						";?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_USERS_DATA; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo "
	    					</td>
	    				</tr>
	    				<tr>
	    					<td style='font-size:12px'> Admin</td>
	    					<td style='font-size:12px'>:";?>  <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_ADM_DATA; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo "</td>
	    				</tr>
	    				<tr>
	    					<td style='font-size:12px'> Mannagers</td>
	    					<td style='font-size:12px'>:";?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_MAN_DATA; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo " </td>
	    				</tr>
	    				<tr>
	    					<td style='font-size:12px'> Other</td>
	    					<td style='font-size:12px'>: ";?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_OTH_DATA; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo " </td>
	    				</tr>
	    			</table>			
	    		</div>
	    	</div> 		
			"; ?>	

			<?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo "	
				<div style='width:300px;height:auto;margin:5px;padding:5px;float:left'>
	    		<div class='dialog-header'  style='font-size:21px;font-weight:bold;font-family:Verdana;float:left;width:100%'>
	    		<div class='w2ui-tb-image w2ui-icon icon-usergroup'></div> Total User Groups
	    		</div>
	    		<div class='dialog-content'  style='font-size:41px;font-weight:bold;font-family:Verdana;float:left;width:100%'>
	    			<table>
	    				<tr>
	    					<td rowspan='4' style='width:100px;text-align:center'>
	    						";?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_USERGROUP_DATA; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo "
	    					</td>
	    				</tr>
	    			</table>			
	    		</div>
	    	</div> 		
			"; ?>
			
			<?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo "	
				<div style='width:300px;height:auto;margin:5px;padding:5px;float:left'>
	    		<div class='dialog-header'  style='font-size:21px;font-weight:bold;font-family:Verdana;float:left;width:100%'>
	    		<div class='w2ui-tb-image w2ui-icon icon-reportall'></div> Total Logs
	    		</div>
	    		<div class='dialog-content'  style='font-size:41px;font-weight:bold;font-family:Verdana;float:left;width:100%'>
	    			<table>
	    				<tr>
	    					<td rowspan='4' style='width:100px;text-align:center'>
	    						";?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_STATUS_DATA2; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo "
	    					</td>
	    				</tr>
	    				<tr>
	    					<td style='font-size:12px'> INSERT</td>
	    					<td style='font-size:12px'>:";?>  <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_INSERT_DATA; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo "</td>
	    				</tr>
	    				<tr>
	    					<td style='font-size:12px'> UPDATE</td>
	    					<td style='font-size:12px'>:";?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_UPDATE_DATA; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo " </td>
	    				</tr>
	    				<tr>
	    					<td style='font-size:12px'> DELETE</td>
	    					<td style='font-size:12px'>: ";?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo $_DELETE_DATA; ?> <?php if(Handler::$_IS_MANAGER || Handler::$_IS_ADMIN) echo " </td>
	    				</tr>
	    			</table>			
	    		</div>
	    	</div> 		
			"; ?>	
			
	    </div>

	    <div id="dashboard_activities">
	    	<table>
	    	<?php foreach ($_ACT_DATA_S as $key => $value) { ?>
	    		<tr>
    			<td>
	    		<div style="width:100%;float:left;">
					<div style="width:40px;height:40px;float:left;border:1px solid #DFDFDF">
	    				<img src="<?php echo STATIC_DIR.$value->user['profile_pic_url']; ?>" style="width:100%;height:100%">
					</div>
	    			<div class="db-comment-box" style="width:300px;float:left">
		    			<div class="db-comment-box-point"></div>
		    			<div class="db-comment-box-task">
		    				<a href="#" onClick="openTask('<?php echo $value->task['id']; ?>')">#<?php echo $value->task['id']; ?></a> - 
			    			<?php echo substr(strip_tags($value->task['name']),0,30); ?>
		    			</div>
		    			<div class="db-comment-box-comment">
			    			<?php echo substr(strip_tags($value['comment']),0,100); ?>
		    			</div>
		    			<div class="db-comment-box-id">
		    				#<?php echo $value['id']; ?>
		    			</div>
		    			<div class="db-comment-box-date">
		    				<?php echo $this->time_elapsed_string($value['input_date']); ?> &nbsp;
		    			</div>
		    			<div class="db-comment-box-username">
		    				<?php echo $value->user['nickname']; ?> &nbsp;
		    			</div>
	    			</div>
	    		</div>
    			</td>
	    		</tr>
	    	<?php } ?>
	    	</table>
	    </div>
		
		<div id="dashboard_activities2">
	    	<table>
	    	<?php foreach ($_STATUS_DATA as $key => $value) { ?>
	    		<tr>
    			<td>
	    		<div style="width:100%;float:left;">
					<div style="width:40px;height:40px;float:left;border:1px solid #DFDFDF">
	    				<img src="<?php echo STATIC_DIR.$value->user['profile_pic_url']; ?>" style="width:100%;height:100%">
					</div>
	    			<div class="db-comment-box" style="width:300px;float:left">
		    			<div class="db-comment-box-point"></div>
		    			<div class="db-comment-box-task">
		    				<a href="#" onClick="openTask('<?php echo $value['task_id']; ?>')">#<?php echo $value['task_id']; ?></a> - 
			    			<?php echo substr(strip_tags($value['user_id']),0,30); ?>
		    			</div>
		    			<div class="db-comment-box-comment">
			    			<?php echo $value->user['fullname']; ?> <?php echo substr(strip_tags($value['Name']),0,100); ?> 
							Task ID: <a href="#" onClick="openTask('<?php echo $value['task_id']; ?>')">#<?php echo $value['task_id']; ?></a>
		    			</div>
		    			<div class="db-comment-box-id">
		    				#<?php echo $value['id']; ?>
		    			</div>
		    			<div class="db-comment-box-date">
		    				<?php echo $value['update_date']; ?> &nbsp;
		    			</div>
		    			<div class="db-comment-box-username">
		    				<?php echo $value->user['fullname']; ?> &nbsp;
		    			</div>
	    			</div>
	    		</div>
    			</td>
	    		</tr>
	    	<?php } ?>
	    	</table>
	    </div>		

	    <div id="dashboard_activities_owned">
	    	<table>
	    	<?php foreach ($_ACT_DATA_OWN as $key => $value) { ?>
	    		<tr>
    			<td>
	    		<div style="width:100%;float:left;">
					<div style="width:40px;height:40px;float:left;border:1px solid #DFDFDF">
	    				<img src="<?php echo STATIC_DIR.$value->user['profile_pic_url']; ?>" style="width:100%;height:100%">
					</div>
	    			<div class="db-comment-box" style="width:300px;float:left">
		    			<div class="db-comment-box-point"></div>
		    			<div class="db-comment-box-task">
		    				<a href="#" onClick="openTask('<?php echo $value->task['id']; ?>')">#<?php echo $value->task['id']; ?></a> -
							<?php echo substr(strip_tags($value->task['name']),0,30); ?> -
							<?php echo $value->user['fullname']; ?> 							
		    			</div>
		    			<div class="db-comment-box-comment">
			    			<?php echo substr(strip_tags($value['comment']),0,100); ?>
		    			</div>
		    			<div class="db-comment-box-id">
		    				#<?php echo $value['id']; ?>
		    			</div>
		    			<div class="db-comment-box-date">
		    				<?php echo $this->time_elapsed_string($value['input_date']); ?> &nbsp;
		    			</div>
		    			<div class="db-comment-box-username">
		    				<?php echo $value->user['nickname']; ?> &nbsp;
		    			</div>
	    			</div>
	    		</div>
    			</td>
	    		</tr>
	    	<?php } ?>
	    	</table>
	    </div>

    </div>

<?php include('footer.php'); ?>

<script>

	$(function () {

	    var pstyle = 'background-color: #F5F6F7; border: 1px solid #dfdfdf; padding: 5px;';
	    var pstyle2 = 'background-color:#E9F0F8; border: 1px solid #dfdfdf; padding: 5px;';
	    $('#layout_dashboard').w2layout({
	        name: 'layout_dashboard',
	        panels: [
	         	{ 
	            	type: 'right', 
		            size: 580, 
		            resizable: true, 
		            style: pstyle2, 
		            title: 'Users activities',
		            content: $('#dashboard_activities').html()
	        	},
				{ 
	            	type: 'preview', 
		            size: 130, 
		            resizable: true, 
		            style: pstyle2, 
		            title: 'Task Log',
		            content: $('#dashboard_activities2').html()
	        	},
	         	{ 
	            	type: 'left', 
		            size: '25%', 
		            resizable: true, 
		            content: $('#dashboard_main').html()
	        	},
	         	{ 
	            	type: 'main', 
		            resizable: true, 
		            style: pstyle2, 
		            title: 'Your activities',
		            content: $('#dashboard_activities_owned').html()
	        	},
	        ]
	    });

	});

	function openTask(id) {
		openInSameTab('<?php echo BASE_URL; ?>task/preview/'+id);
	}

</script>