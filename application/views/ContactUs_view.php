
<?php include('header.php'); ?>
    
    <div id="content">
	<style>
body, html {
    height: 100%;
    margin: 0;
}

.bgimg {
    background-image: url("<?php echo STATIC_DIR; ?>/images/Wallpaper/bgone.jpg");
    height: 100%;
    background-position: center;
    background-size: cover;
    position: relative;
    color: white;
    font-family: "Courier New", Courier, monospace;
    font-size: 25px;
}

.topleft {
    position: absolute;
    top: 0;
    left: 16px;
}

.bottomleft {
    position: absolute;
    bottom: 0;
    left: 16px;
}

.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

hr {
    margin: auto;
    width: 40%;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
    <p><img src="<?php echo STATIC_DIR; ?>/images/logo2.png" height="100" width="100"/></p>
  </div>
  <div class="middle">
    <h1>MAIL TO US</h1>
    <hr>
    <p>Your email: <?php echo Handler::$_LOGIN_USER_EMAIL; ?></p>
	
<div id="form" style="width: 750px;">
    <div class="w2ui-page page-0">
        <div class="w2ui-field">
            <label>Name:</label>
            <div>
                <input name="first_name" type="text" maxlength="100" size="60" style="width: 100%; resize: none"/>
            </div>
        </div>
        <div class="w2ui-field">
            <label>Last name:</label>
            <div>
                <input name="last_name" type="text" maxlength="100" size="60" style="width: 100%; resize: none"/>
            </div>
        </div>
        <div class="w2ui-field">
            <label>Notes:</label>
            <div>
                <textarea name="comments" type="text" style="width: 100%; height: 80px; resize: none"></textarea>
            </div>
        </div>
    </div>
    <div class="w2ui-page page-1">
        <div class="w2ui-field">
            <label>Address:</label>
            <div>
                <input name="address1" type="text" maxlength="100" style="width: 100%"/>
            </div>
        </div>
        <div class="w2ui-field">
            <label>Another address:</label>
            <div>
                <input name="address2" type="text" maxlength="100" style="width: 100%"/>
            </div>
        </div>
        <div class="w2ui-field">
            <label>City:</label>
            <div>
                <input name="city" type="text" maxlength="50" size="25" style="width: 100%; resize: none"/>
            </div>
        </div>
        <div class="w2ui-field">
            <label>State:</label>
            <div>
                <input name="state" type="text" maxlength="2" size="2" style="width: 100%; resize: none"/>
            </div>
        </div>
        <div class="w2ui-field">
            <label>Postal Code:</label>
            <div>
                <input name="zip" type="text" maxlength="10" size="10" style="width: 100%; resize: none"/>
            </div>
        </div>
    </div>
    <div class="w2ui-page page-2">
        <div class="w2ui-field">
            <label>Short biography:</label>
            <div>
                <textarea name="short_bio" type="text" style="width: 100%; height: 80px; resize: none"></textarea>
            </div>
        </div>
        <div class="w2ui-field">
            <label>Header of message:</label>
            <div>
                <input name="talk_name" type="text" maxlength="100" style="width: 100%"/>
            </div>
        </div>
        <div class="w2ui-field">
            <label>The message title:</label>
            <div>
                <textarea name="description" type="text" style="width: 100%; height: 80px; resize: none"></textarea>
            </div>
        </div>
    </div>

    <div class="w2ui-buttons">
        <button class="btn" name="reset">Clean the form</button>
        <button class="btn" name="save">Submit</button>
    </div>

</div>
	
    <br>			
			<button class="btn" onclick="$('#popup1').w2popup()">About Us</button>
			<button class="btn" onclick="$('#popup2').w2popup()">Owners</button>

			<div id="popup1" style="display: none; width: 600px; height: 400px; overflow: hidden">
				<div rel="title">
					About us
				</div>
				<div rel="body" style="padding: 10px; line-height: 150%">
				<div style="float: left; background-color: white; width: 150px; height: 80px; border: 1px solid silver; margin: 5px;"> </div>
				<br>ELEMENTECH is a web-based project management system,
				<br>Which aspires to be as simple as possible to be defined by the user.
				</div>
				<div rel="buttons">
					<button class="btn" onclick="$('#popup2').w2popup()">Go to Owners.</button>
				</div>
			</div>

			<div id="popup2" style="display: none; width: 400px; height: 200px; overflow: hidden">
				<div rel="title">
					Owners
				</div>
			<div rel="body" style="padding: 10px; line-height: 150%">
				Ari Perez mail: <a href="mailto:ari.perez25.06@gmail.com?Subject=Hello%20Ari&body=Write here..." target="_top">ari.perez25.06@gmail.com</a><br/>
				Ofer Hokima mail: <a href="mailto:Ofer@gmail.com?Subject=Hello%20Ofer&body=Write here..." target="_top">Ofer@gmail.com</a>
			</div>
			<div rel="buttons">
				<button class="btn" onclick="$('#popup1').w2popup()">Go to About Us</button>
			</div>
			</div>

            <br><br>

            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - הדרך הקלה והבטוחה יותר לשלם באינטרנט!">
				<img alt="" border="" src="https://www.paypalobjects.com/he_IL/i/scr/pixel.gif" width="0" height="0">
			</form>		

  </div>
  <div class="bottomleft">
  <!-- <p> Elementech </p> -->	
  </div>
</div>

</div>
<?php include('footer.php'); ?>

<script type="text/javascript">
$(function () {
    $('#form').w2form({ 
        name   : 'form',
        header : 'Contact us',
        url    : 'server/post',
        fields : [
            { field: 'first_name', type: 'text', required: true },
            { field: 'last_name',  type: 'text', required: true },
            { field: 'comments',   type: 'text'},
            { field: 'address1', type: 'text', required: true },
            { field: 'address2', type: 'text' },
            { field: 'city', type: 'text', required: true },
            { field: 'state', type: 'text', required: true },
            { field: 'zip', type: 'int', required: true },
            { field: 'short_bio', type: 'text' },
            { field: 'talk_name', type: 'text', required: true },
            { field: 'description', type: 'text' }
        ],
        tabs: [
            { id: 'tab1', caption: 'General' },
            { id: 'tab2', caption: 'Address'},
            { id: 'tab3', caption: 'Message' }
        ],
        actions: {
            reset: function () {
                this.clear();
            },
            save: function () {
                this.save();
            }
        }
    });
});
</script>