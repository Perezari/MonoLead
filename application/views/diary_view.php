
<?php include('header.php'); ?>

<div id="content">

<div style="position: relative; height: 100%;">
    <div id="grid1" style="position: absolute; left: 0px; width: 49.9%; height: 100%;"></div>
    <div id="grid2" style="position: absolute; right: 0px; width: 49.9%; height: 100%;"></div>
</div>

</div>

<?php include('footer.php'); ?>

<script type="text/javascript">
$(function () {
    $('#grid1').w2grid({ 
        name: 'grid1', 
        header: 'Master',
        url: '<?php echo BASE_URL; ?>user/get_user_list',
	    method: 'POST',
	    recid:'id',

        show: {
            	lineNumbers : true,
	        	header: true,
				footer: true,
        		toolbar: true,
			    toolbarColumns: true,
			    toolbarSearch: true
	        }, 
        columns: [                
            { field: 'id', caption: 'ID', size: '50px', sortable: true, attr: 'align=center', searchable: true },
            { field: 'fullname', caption: 'full name', size: '30%', sortable: true, searchable: true },
            { field: 'nickname', caption: 'nick name', size: '30%', sortable: true, searchable: true},
            { field: 'email', caption: 'Email', size: '40%', searchable: true },
            { field: 'phone', caption: 'phone', size: '120px', searchable: true },
            { field: 'status', caption: 'phone', size: '120px', searchable: true },
            { field: 'usergroup_name', caption: 'Position', size: '150px', resizable: true,sortable:true, searchable: true ,				
	                render: function (record, index, column_index) {
	                    var html = '<div style=";float:left;width:17px;height:17px;margin:0px 2px 0px 2px;line-height:20px" class="'+record.usergroup_icon+'"></div><div class="icon-text-wrap">'+ record.usergroup_name+'</div>';
	                    return html;
	                }
            }
        ],
        onClick: function (event) {
            w2ui['grid2'].clear();
            var record = this.get(event.recid);
            w2ui['grid2'].add([
                { recid: 0, name: 'ID:', value: record.recid },
                { recid: 1, name: 'Full Name:', value: record.fullname },
                { recid: 2, name: 'Nick Name:', value: record.nickname },
                { recid: 3, name: 'Email:', value: record.email },
                { recid: 4, name: 'Phone:', value: record.phone },
                { recid: 5, name: 'Status:', value: record.status },
                { recid: 6, name: 'Usergroup:', value: record.usergroup_name }
            ]);
        }
    });
    
    $('#grid2').w2grid({ 
        header: 'Details',
        show: { 
            header: true, 
            columnHeaders: true,
            toolbar: true,
            footer: true
            },
        name: 'grid2', 
        columns: [                
            { field: 'name', caption: 'Name', size: '100px', style: 'background-color: #efefef; border-bottom: 1px solid white; padding-right: 5px;', attr: "align=right" },
            { field: 'value', caption: 'Value', size: '100%' }
        ]
    });    
});
</script>