<?php include('header.php'); ?>
	
    <div id="content">
		
		<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_TASKS){  ?>
		<div id="task_grid" style="width: 100%; height: 100%;"></div>
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
	<div id="FORM_<?php echo $FNAME[$i]; ?>_TASK" style="display:none"></div>
	<?php } ?>

<?php include('footer.php'); ?>

<script type="text/javascript">

	$(function () {
        $('#task_grid').w2grid({ 
	        name: 'task_grid', 
	        url: '<?php echo BASE_URL; ?>task/get_task_list',
	        method: 'POST',
	        recid:'id',
	       	header:'Tasks',
			multiSelect			: false, 
			reorderColumns		: true,
	        show: {
            	lineNumbers    	: true,
	        	header			: true,
				footer			: true,
        		toolbar     	: true,
			    toolbarColumns  : true,
				selectColumn	: true,
			    toolbarSearch   : true
	        },
		    onDblClick: function(event) {
		        previewTask(event.recid);
		    },   
		    toolbar: {
		        items: [
		            { type: 'button',  id: 'preview_task',  caption: 'Preview', img: 'icon-preview', hint: 'Preview task' }, 
		            { type: 'button',  id: 'add_task',  caption: 'Add', img: 'icon-add', hint: 'Add new task' },
		            { type: 'button',  id: 'edit_task',  caption: 'Edit', img: 'icon-pencil', hint: 'Edit' },
					<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button',  id: 'delete_task',  caption: 'Delete', img: 'icon-cancel', hint: 'Delete' },"; ?>
					{ type: 'drop',  id: 'User_info', caption: 'Information', img: 'icon-info',
						html: '<div style="padding: 10px; line-height: 1.5">You are in the Tasks table.'
					},
		        ],
		        onClick: function (target, data) {
		        	var selected = w2ui['task_grid'].get(w2ui['task_grid'].getSelection()[0]);
		        	if(target == 'add_task'){
		        		addTask();
		        	}
		        	if(target == 'edit_task'){
		        		if(selected == null){
						    showMessage('Please select a task.','error') ;
		        		} else {
		        			editTask(selected.id);
		        		}
		        	}
		        	if(target == 'delete_task'){
		        		if(selected == null){
						    showMessage('Please select a task.','error') ;
		        		} else {
		        			w2confirm('Are you sure to delete this task?', function (btn) { 
		        				if(btn == 'Yes'){
		        					deleteTask(selected.id);
		        				}
		        			});
		        		}
		        	}
		        	if(target == 'preview_task'){
		        		if(selected == null){
						    showMessage('Please select a task.','error') ;
		        		} else {
		        			previewTask(selected.id);
		        		}
		        	}
		        }
		    },	   
	        columns: [                
	            { field: 'id', caption: 'ID', size: '50px', resizable: true, searchable: true},
	            { field: 'priority', caption: 'Priority', size: '70px', resizable: true, 
	                render: function (record, index, column_index) {
	                	if(record.priority == 'High'){
	                		color = 'background-color:red';
	                	} else if(record.priority == 'Medium'){
	                		color = 'background-color:yellow';
	                	} else if(record.priority == 'Low') {
	                		color = 'background-color:LawnGreen';
	                	} else {
	                		color = '';
	                	}
	                    var html = '<div style="'+color+';float:left;width:10px;height:10px;margin:2px;border:1px solid gray"></div><div class="icon-text-wrap">'+ record.priority+'</div>';
	                    return html;
	                }
                },
	            { field: 'name', caption: 'Name', size: '400px', resizable: true, searchable: true,
	                render: function (record, index, column_index) {
	                	if(record.last_comment != ''){
		                    var html = record.name+'<div class="icon-comment" style="width:auto;height:15px;float:right;padding-left:20px"></div><sup style="float:right">'+ record.last_comment+'</sup>';
	                	} else {
		                    var html = record.name;
	                	}
	                    return html;
	                }
	            },
	            { field: 'total_comment',style:'text-align:center', caption: '<div class="icon-comment" style="width:15px;height:15px;"></div>', size: '25px', resizable: true },
	            { field: 'project_name', caption: 'Project Name', size: '250px', resizable: true, searchable: true },
	            { field: 'status_name', caption: 'Status', size: '80px', resizable: true, searchable: true,
	                render: function (record, index, column_index) {
	                    var html = '<div style=";float:left;width:17px;height:17px;margin:0px 2px 0px 2px;line-height:20px" class="'+record.status_icon+'"></div><div class="icon-text-wrap">'+ record.status_name+'</div>';
	                    return html;
	                }
                },
	            { field: 'progress', caption: 'Progress', size: '80px', resizable: true,sortable:true,
	                render: function (record, index, column_index) {
	                    var html = '<div style="font-weight:bold;text-align:center">'+ record.progress+'</div>';
	                    return html;
	                }
                },
	            { field: 'start_date', caption: 'Start Date', size: '120px', resizable: true, searchable: true },
	            { field: 'end_date', caption: 'End Date', size: '120px', resizable: true, searchable: true },
	            { field: 'assigned_to', caption: 'Member', size: '350px', resizable: true, searchable: true },
	            { field: 'description', caption: 'Description', size: '300px', resizable: true, searchable: true,
					render: function (record) {
						
						if(record.priority == 'High'){
	                		color = 'background-color:red';
	                	} else if(record.priority == 'Medium'){
	                		color = 'background-color:yellow';
	                	} else if(record.priority == 'Low') {
	                		color = 'background-color:LawnGreen';
	                	} else {
	                		color = '';
	                	}
						
						var html = 	'<div style="padding: 10px">'+
									' Description: ' + record.description + '<br><br> ' +
									' Project Name: ' + record.project_name + ' <br><br> ' +
									' Status: ' + record.status_name + ' <br><br> ' +
									' Start Date: ' + record.start_date + ' <br><br> ' +
									' End Date: ' + record.end_date + ' <br><br> ' +
									' Assigned to: ' + record.assigned_to + ' <br><br> ' +
									' Priority: <div style="'+color+';float:left;width:10px;height:10px;margin:2px;border:1px solid gray"></div><div class="icon-text-wrap">'+ record.priority+'</div> <br><br>' +
									record.progress + '%' + '<div class="progress-box" style="width:99px;overflow:hidden"><div class="progress-fill" style="width:'+record.progress+'px;background-color:hsl('+record.progress+', 100%, 50%)"></div></div>' +
									'</div>';
						return  	'<div onmouseover="$(this).w2overlay( w2utils.base64decode(\''+ w2utils.base64encode(html) +'\'), { left: -15 });" '+
									'onmouseout="$(this).w2overlay(\'\');">' + record.description + '</div>';
					}
				}
	        ]
	    });    

	});
	
	function addTask(){

    	if (!w2ui.new_task_form) {
	        $('#FORM_ADD_TASK').w2form({
	            name: 'new_task_form',
	            style: 'border: 0px; background-color: transparent;',
	            formHTML: $('#FORM_ADD_TASK').html() ,
		        url: '<?php echo BASE_URL; ?>task/go_insert_task',
	            fields: [
	        		{ 
					    name     : 'project_id',      
					    type     : 'list',     
					    options  : {items: <?php echo $_PROJECT_DATA; ?>},    
					    required : true,         
					    html     : {      
					    	attr	: 'style="font-size:14px;width:250px"',       
					        caption : 'Project' 
					    } 
					},
	        		{ 
					    name     : 'name',      
					    type     : 'text',       
					    options  : {},     
					    required : true,         
					    html     : {      
					    	attr	: 'style="font-size:14px;width:320px"',       
					        caption : 'Name'
					    } 
					},
	                { 
					    name     : 'description',      
					    type     : 'textarea',       
					    options  : {},          
					    required : true,         
					    html     : {      
					    	attr	: 'style="height:80px;width:320px"',       
					        caption : 'Description',
				        	text 	: ''
					    } 
					},
	                { 
					    name     : 'priority',      
					    type     : 'list',       
					    options  : {
					    	items: [{ id: 1, text: 'High' }, { id: 2, text: 'Medium' }, { id: 3, text: 'Low' }, { id: 4, text: 'Other' }]
					    },        				
					    required : true,         
					    html     : {      
					    	attr	: 'style="width:120px"',       
					        caption : 'Priority'
					    } 
					},
	                { 
					    name     : 'status_id',      
					    type     : 'list',       
					    options  : {items: <?php echo $_STATUS_DATA; ?>},          
					    required : true,         
					    html     : {             
					        caption : 'Status'
					    } 
					},
	                { 
					    name     : 'assigned',      
					    type     : 'enum',       
					    options  : {
					    	items: <?php echo $_USER_DATA; ?>,
					    	openOnFocus: true
					    },        				
					    required : true,         
					    html     : {      
					    	attr	: 'style="height:30px;width:400px"',       
					        caption : 'Assigned To'
					    } 
					},
	                { 
					    name     : 'start_date',      
					    type     : 'date',       
					    options  : {format: 'd-m-yyyy'},        				
					    required : true,         
					    html     : {            
					        caption : 'Start Date'
					    } 
					},
	                { 
					    name     : 'start_time',      
					    type     : 'time',       
					    options  : {format: 'h24'},        				
					    required : true,         
					    html     : {            
					        caption : 'Start Time'
					    } 
					},
	                { 
					    name     : 'end_date',      
					    type     : 'date',      
					    options  : {format: 'd-m-yyyy'},   			
					    required : true,         
					    html     : {            
					        caption : 'End Date'
					    } 
					},
	                { 
					    name     : 'end_time',      
					    type     : 'time',       
					    options  : {format: 'h24'},        				
					    required : true,         
					    html     : {            
					        caption : 'End Time'
					    } 
					},
	                { 
					    name     : 'progress',      
					    type     : 'int',       
					    options  : {precision: 0, min: 0, max: 100 },        				
					    required : true,         
					    html     : {          
					    	attr	: 'style="width:50px"',      
					        caption : 'Progress',
					        text 	: '%'
					    } 
					}

	            ],
	            record: { 
	                name    		: 'Untitled Task',
	                description   	: '-',
	                priority   	    : 2,
	                start_time   	: '00:00',
	                end_time   	    : '12:00',
	                progress   	    : '0'
	            },
	            actions: {
	                "Save": function () { 
                		if(this.validate()){
	                		this.save();	                		
	                	}
	                },
	                "Reset": function () { this.clear(); },
	            },
			    onSave: function(event) {
			        w2popup.close();
				    showMessage('Task succesfully submitted.','success') ;
				    w2ui['task_grid'].reload();
			    } 
	        });
        }
	    $().w2popup('open', {
	        title   : 'New Task',
	        body    : '<div id="form" style="width: 100%; height: 100%;"></div>',
	        style   : 'padding: 15px 0px 0px 0px',
	        width   : 600,
	        height  : 680, 
	        modal   : true,
	        showMax : true,
	        img		: 'icon-add',
	        onOpen: function (event) {
	            event.onComplete = function () {
	                $('#w2ui-popup #form').w2render('new_task_form');
	            }
	        }
	    });
	}

	function editTask(id){

		var getUrl = '<?php echo BASE_URL; ?>task/get_task/'+id;
		var saveUrl = '<?php echo BASE_URL; ?>task/go_edit_task/'+id;

    	if (!w2ui.edit_task_form) {
	        $('#FORM_EDIT_TASK').w2form({
	            name: 'edit_task_form',
	            style: 'border: 0px; background-color: transparent;',
	            formHTML: $('#FORM_EDIT_TASK').html() ,
	            recid    : 1,
			    url      : {
			        get  : getUrl,
			        save  : saveUrl
			    },
	            fields: [
	        		{ 
					    name     : 'id',      
					    type     : 'text',     
					    options  : {},    
					    required : true,         
					    html     : {      
					    	attr	: 'style="font-size:14px;width:250px" readonly',       
					        caption : 'Task ID' 
					    } 
					},
	        		{ 
					    name     : 'project_id',      
					    type     : 'list',     
					    options  : {items: <?php echo $_PROJECT_DATA; ?>},    
					    required : true,         
					    html     : {      
					    	attr	: 'style="font-size:14px;width:250px"',       
					        caption : 'Project' 
					    } 
					},
	        		{ 
					    name     : 'name',      
					    type     : 'text',       
					    options  : {},     
					    required : true,         
					    html     : {      
					    	attr	: 'style="font-size:14px;width:320px"',       
					        caption : 'Name'
					    } 
					},
	                { 
					    name     : 'description',      
					    type     : 'textarea',       
					    options  : {},          
					    required : true,         
					    html     : {      
					    	attr	: 'style="height:80px;width:320px"',       
					        caption : 'Description',
				        	text 	: ''
					    } 
					},
	                { 
					    name     : 'priority',      
					    type     : 'list',       
					    options  : {
					    	items: [{ id: 'High', text: 'High' }, { id: 'Medium', text: 'Medium' }, { id: 'Low', text: 'Low' }, { id: 'Other', text: 'Other' }]
					    },        				
					    required : true,         
					    html     : {      
					    	attr	: 'style="width:120px"',       
					        caption : 'Priority'
					    } 
					},
	                { 
					    name     : 'status_id',      
					    type     : 'list',       
					    options  : {items: <?php echo $_STATUS_DATA; ?>},          
					    required : true,         
					    html     : {             
					        caption : 'Status'
					    } 
					},
	                { 
					    name     : 'assigned',      
					    type     : 'enum',       
					    options  : {
					    	items: <?php echo $_USER_DATA; ?>,
					    	openOnFocus: true
					    },        				
					    required : true,         
					    html     : {      
					    	attr	: 'style="height:30px;width:400px"',       
					        caption : 'Assigned To'
					    } 
					},
	                { 
					    name     : 'start_date',      
					    type     : 'date',       
					    options  : {format: 'd-m-yyyy'},        				
					    required : true,         
					    html     : {            
					        caption : 'Start Date'
					    } 
					},
	                { 
					    name     : 'start_time',      
					    type     : 'time',       
					    options  : {format: 'h24'},        				
					    required : true,         
					    html     : {            
					        caption : 'Start Time'
					    } 
					},
	                { 
					    name     : 'end_date',      
					    type     : 'date',      
					    options  : {format: 'd-m-yyyy'},   			
					    required : true,         
					    html     : {            
					        caption : 'End Date'
					    } 
					},
	                { 
					    name     : 'end_time',      
					    type     : 'time',       
					    options  : {format: 'h24'},        				
					    required : true,         
					    html     : {            
					        caption : 'End Time'
					    } 
					},
	                { 
					    name     : 'progress',      
					    type     : 'int',       
					    options  : {precision: 0, min: 0, max: 100 },        				
					    required : true,         
					    html     : {          
					    	attr	: 'style="width:50px"',      
					        caption : 'Progress',
					        text 	: '%'
					    } 
					}

	            ],
	            actions: {
	                "Save": function () { 
                		if(this.validate()){
	                		this.save();	                		
	                	}
	                },
	                "Reset": function () { this.clear(); },
	            },
			    onSave: function(event) {
			        w2popup.close();
				    showMessage('Task succesfully submitted.','success') ;
				    w2ui['task_grid'].reload();
			    } 
	        });
        }
	    $().w2popup('open', {
	        title   : 'Edit Task',
	        body    : '<div id="form" style="width: 100%; height: 100%;"></div>',
	        style   : 'padding: 15px 0px 0px 0px',
	        width   : 600,
	        height  : 680, 
	        modal   : true,
	        showMax : true,
	        img		: 'icon-add', 
	        onClose : function (event) {
		        w2ui.edit_task_form.destroy();
		    },
	        onOpen: function (event) {
	            event.onComplete = function () {
	                $('#w2ui-popup #form').w2render('edit_task_form');
	            }
	        }
	    });
	}

	function deleteTask(id){
		$.ajax({
	        url: '<?php echo BASE_URL; ?>task/delete_task',
	        type: 'POST',
	        data: { 
	          id : id
	        },
	        }).success(function(data){
			    showMessage('Task succesfully deleted.','success') ;
			    w2ui['task_grid'].reload();
	    });
	}

	function previewTask(id){
		openInSameTab('<?php echo BASE_URL; ?>task/preview/'+id);
	}

</script>