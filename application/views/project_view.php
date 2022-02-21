<?php include('header.php'); ?>
	
    <div id="content">
			
		<?php if(Handler::$_IS_ADMIN || Handler::$_HAVE_PT_PROJECTS){  ?>
		<div id="project_grid" style="width: 100%; height: 100%;"></div>
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
	<div id="FORM_<?php echo $FNAME[$i]; ?>_PROJECT" style="display:none"></div>
	<?php } ?>

<?php include('footer.php'); ?>

<script type="text/javascript">

	$(function () {
        $('#project_grid').w2grid({ 
	        name: 'project_grid', 
	        url: '<?php echo BASE_URL; ?>project/get_project_list',
	        method: 'POST',
	        recid:'id',
	       	header:'Projects',
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
					<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button',  id: 'add_project',  caption: 'Add', img: 'icon-add', hint: 'Add new project' },"; ?>
					<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button',  id: 'edit_project',  caption: 'Edit', img: 'icon-pencil', hint: 'Edit' },"; ?>
					<?php if(Handler::$_IS_ADMIN) echo "{ type: 'button',  id: 'delete_project',  caption: 'Delete', img: 'icon-cancel', hint: 'Delete' },"; ?>
					{ type: 'drop',  id: 'User_info', caption: 'Information', img: 'icon-info',
						html: '<div style="padding: 10px; line-height: 1.5">You are in the Projects table.'
					},
		        ],
		        onClick: function (target, data) {
		        	var selected = w2ui['project_grid'].get(w2ui['project_grid'].getSelection()[0]);
		        	if(target == 'add_project'){
		        		addProject();
		        	}
		        	if(target == 'edit_project'){
		        		if(selected == null){
						    showMessage('Please select a project.','error') ;
		        		} else {
		        			editProject(selected.id);
		        		}
		        	}
		        	if(target == 'delete_project'){
		        		if(selected == null){
						    showMessage('Please select a project.','error') ;
		        		} else {
		        			w2confirm('Are you sure to delete this project?', function (btn) { 
		        				if(btn == 'Yes'){
		        					deleteProject(selected.id);
		        				}
		        			});
		        		}
		        	}
		        }
		    },	   
	        columns: [                
	            { field: 'id', caption: 'ID', size: '50px', resizable: true, sortable: true, searchable: true },
	            { field: 'name', caption: 'Name', size: '300px', resizable: true, sortable: true, searchable: true },
	            { field: 'description', caption: 'Description', size: '30%', resizable: true, sortable: true, searchable: true },
	            { field: 'total_task',style:'text-align:center', caption: 'Tasks', size: '50px', resizable: true, searchable: true } ,
	            { field: 'status_name', caption: 'Status', size: '100px', resizable: true, sortable: true, searchable: true,
	                render: function (record, index, column_index) {
	                    var html = '<div style=";float:left;width:17px;height:17px;margin:0px 2px 0px 2px;line-height:20px" class="'+record.status_icon+'"></div><div class="icon-text-wrap">'+ record.status_name+'</div>';
	                    return html;
	                }
                }
	        ]
	    });    

	});
		
	function addProject(){

    	if (!w2ui.new_project_form) {
	        $('#FORM_ADD_PROJECT').w2form({
	            name: 'new_project_form',
	            style: 'border: 0px; background-color: transparent;',
	            formHTML: $('#FORM_ADD_PROJECT').html() ,
		        url: '<?php echo BASE_URL; ?>project/go_insert_project',
	            fields: [
	        		{ 
					    name     : 'name',      
					    type     : 'text',       
					    options  : {},     
					    required : true,         
					    html     : {      
					    	attr	: 'style="font-size:14px;width:320px"',       
					        caption : 'Name',
					    	value	:'Untitled'   
					    } 
					},
	                { 
					    name     : 'description',      
					    type     : 'textarea',       
					    options  : {},          
					    required : true,         
					    html     : {      
					    	attr	: 'style="height:80px;width:320px"',       
					        caption : 'Description'
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
					}

	            ],
	            record: { 
	                name    		: 'Untitled Project',
	                description   	: '-'
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
				    showMessage('Project succesfully submitted.','success') ;
				    w2ui['project_grid'].reload();
			    } 
	        });
        }
	    $().w2popup('open', {
	        title   : 'New Project',
	        body    : '<div id="form" style="width: 100%; height: 100%;"></div>',
	        style   : 'padding: 15px 0px 0px 0px',
	        width   : 500,
	        height  : 300, 
	        modal     : true,
	        showMax : false,img: 'icon-add',
	        onToggle: function (event) {
	            $(w2ui.new_project_form.box).hide();
	            event.onComplete = function () {
	                $(w2ui.new_project_form.box).show();
	                w2ui.new_project_form.resize();
	            }
	        },
	        onOpen: function (event) {
	            event.onComplete = function () {
	                $('#w2ui-popup #form').w2render('new_project_form');
	            }
	        }
	    });
	}

	function editProject(id){
		var getUrl = '<?php echo BASE_URL; ?>project/get_project/'+id;
		var saveUrl = '<?php echo BASE_URL; ?>project/go_edit_project/'+id;
    	if (!w2ui.edit_project_form) {
	        $('#FORM_EDIT_PROJECT').w2form({
	            name: 'edit_project_form',
	            style: 'border: 0px; background-color: transparent;',
	            formHTML: $('#FORM_EDIT_PROJECT').html() ,
	            recid    : 1,
			    url      : {
			        get  : getUrl,
			        save  : saveUrl
			    },
	            fields: [
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
					        caption : 'Description'
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
				    showMessage('Project succesfully updated.','success') ;
				    w2ui['project_grid'].reload();
			    } 
	        });
        }
	    $().w2popup('open', {
	        title   : 'Edit Project',
	        body    : '<div id="form" style="width: 100%; height: 100%;"></div>',
	        style   : 'padding: 15px 0px 0px 0px',
	        width   : 500,
	        height  : 300, 
	        showMax : false, 
	        modal     : true,
	        onClose : function (event) {
		        w2ui.edit_project_form.destroy();
		    },
	        onOpen: function (event) {
	            event.onComplete = function () {
	                $('#w2ui-popup #form').w2render('edit_project_form');
	            }
	        }
	    });

	}

	function deleteProject(id){
		$.ajax({
	        url: '<?php echo BASE_URL; ?>project/delete_project',
	        type: 'POST',
	        data: { 
	          id : id
	        },
	        }).success(function(data){
			    showMessage('Project succesfully deleted.','success') ;
			    w2ui['project_grid'].reload();
	    });
	}

</script>