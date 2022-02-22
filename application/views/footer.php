<?php global $config; ?>

    	<div id="footer">
    		<div style="background: url(<?php echo STATIC_DIR; ?>images/cplogo.png) no-repeat;width:25px;height:25px;float:left"></div>
    		<div class="footer">Elementech <?php echo version;?> &nbsp; | &nbsp; </div>
			<?php if(Handler::$_IS_ADMIN) echo "<div class='footer'>Current Database Name:";?> <?php if(Handler::$_IS_ADMIN) echo $config['db_name'];?> <?php if(Handler::$_IS_ADMIN) echo " &nbsp; | &nbsp; </div>";?>
			<?php if(Handler::$_IS_ADMIN) echo "<div class='footer'>Database User Name:";?> <?php if(Handler::$_IS_ADMIN) echo $config['db_username'];?> <?php if(Handler::$_IS_ADMIN) echo " &nbsp; | &nbsp; </div>";?>
			<?php if(Handler::$_IS_ADMIN) echo "<div class='footer'>Database Password:";?> <?php if(Handler::$_IS_ADMIN) echo $config['db_password'];?> <?php if(Handler::$_IS_ADMIN) echo " &nbsp; | &nbsp; </div>";?>
			<?php if(Handler::$_IS_ADMIN) echo "<div class='footer'>User email:";?> <?php echo Handler::$_LOGIN_USER_EMAIL; ?> <?php if(Handler::$_IS_ADMIN) echo "</div>";?>
    		<div class="footer-additional">
    			<?php echo Handler::$_ADDITIONAL_FOOTER;?>
    		</div>
    	</div>
    </div>

	<script type="text/javascript">
	$(function () {
	    tools =  {
            items: [
			    { type: 'button',  id: 'mainpanel', caption: 'Main Panel', img: 'icon-programlocation' },
                { type: 'button',  id: 'main', caption: 'Dashboard', img: 'icon-house' },
                { type: 'break',  id: 'break0' },
                { type: 'button',  id: 'taskboard', caption: 'Taskboard', img: 'icon-taskboard' },
				{ type: 'button',  id: 'diary', caption: 'Contact Details', img: 'icon-requestordertype' },
				{ type: 'break' },				
				//{ type: 'button',  id: 'TicTac', caption: 'Tic-Tac-Toe', img: 'icon-TTT' },
               	{ type: 'spacer' },
				{ type: 'break' },
				{ type: 'button', id: 'contactus',  caption: 'Contact us', img: 'icon-emergencyrequestorder', hint: 'Contact' },
				{ type: 'break' },
				{ type: 'button',  id: 'user/profile',  caption: '<?php echo Handler::$_LOGIN_USER_NAME; ?>', img: 'icon-info', hint: 'Your profile' },
                { type: 'button',  id: 'user/<?php echo Handler::$_LOGIN_ACT_NAME; ?>',  caption: '<?php echo Handler::$_LOGIN_ACT_LABEL; ?> - <?php echo Handler::$_LOGIN_USER_EMAIL; ?>', img: 'icon-user', hint: 'Logout' }
            ],
            onClick: function (event) {
				var win = window.open('<?php echo BASE_URL; ?>'+event.target, '_self');
				win.focus();
            }
        }

        var pstyle = 'border: 1px solid #dfdfdf; padding: 5px;overflow:hidden';
	    var pstyle2 = 'overflow:hidden;';
	    $('#layout').w2layout({
	        name: 'layout',
	        panels: [
	            { type: 'top', size: 40, style: pstyle, content: $('#header').html() },
	            { type: 'main',style: pstyle2, content: $('#content').html(),toolbar:tools  },
	            { type: 'bottom', size: 25, style: pstyle, content: $('#footer').html()  }
	        ]
	    });
	});
	</script>

	</body>
</html>
