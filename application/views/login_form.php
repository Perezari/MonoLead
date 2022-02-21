<?php include('header.php'); ?>

<div id="content">
  <div class="centered">
    <div id="login_form" style="width: 480px"></div>
  </div>
</div>

<div id="footer" ><center>Elementech <?php echo version;?></center></div>
</div>

<script type="text/javascript">
$(function () {

  var pstyle = 'border: 1px solid #dfdfdf; padding: 5px;';
  var frontstyle = 'background:  url("<?php echo STATIC_DIR; ?>/images/bgone.jpg") white; background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;';

  $('#layout').w2layout({
    name: 'layout',
    panels: [
      { type: 'top', size: 40, style: pstyle, content: $('#header').html() },
      { type: 'main',style: frontstyle, content: $('#content').html()  },
      { type: 'bottom', size: 30, style: pstyle, content: $('#footer').html()  }
    ]
  });

  $('#login_form').w2form({
    name   	: 'login_form',
    url 	: '<?php echo BASE_URL; ?>user/login',
    method	: 'POST',
    header	: 'Login ',
    msgSaving: 'Login...',
    fields 	: [
      {
        name     : 'username',
        type     : 'Email', //'list',
        options: {}, // { items: [{"text":"ari.perez25.06@gmail.com","id":"Yes"},{"text":"Elad@gmail.com","id":"No"}] },
        required : true,
        html     : {
          attr	: 'style="font-size:14px;width:220px"',
          caption : 'Email'
        }
      },
      {
        name     : 'password',
        type     : 'password',
        options  : {},
        required : true,
        html     : {
          attr	: 'style="font-size:14px;width:220px"',
          caption : 'Password'
        }
      }
    ],
    actions: {
      <?php if(Handler::$_IS_MAINTENANCE == 'Yes'){ ?> "MAINTENANCE MODE": function () { if(this.validate()){ this.save(); } }, <?php } ?>
      <?php if(Handler::$_IS_MAINTENANCE == 'No'){ ?> "Login": function () { if(this.validate()){ this.save(); } }, <?php } ?>
      <?php if(Handler::$_GUEST_REGISTER == 'Yes'){ ?> "Registration": function () { openRegister(); } <?php } ?>
    },
    onSave: function(event) {
      if(event.xhr['responseText'] == '1'){
        w2alert('you have successfully connected.','Login');
        location.reload();
      } else if(event.xhr['responseText'] == '2'){
        w2alert('You do not have permission to sign in.','Permission Error');
      } else {
        w2alert('Incorrect username or password.','Error entering data.');
      }
    }
  });

  $(document).keypress(function(e) {
    if(e.which == 13) {
      w2popup.close();
      w2ui['login_form'].submit();
    }
  });
});

function openRegister () {
  if (!w2ui.register_form) {
    $().w2form({
      name: 'register_form',
      header	: 'After registration your administrator will have to approve you.',
      style: 'border: 0px; background-color: transparent;',
      url: '<?php echo BASE_URL; ?>user/register',
      formHTML:
      '<div class="w2ui-page page-0">'+
      '    <div class="w2ui-field">'+
      '        <label>Fullname</label>'+
      '        <div>'+
      '           <input name="fullname" type="text" maxlength="100" style="width: 250px"/>'+
      '        </div>'+
      '    </div>'+
      '    <div class="w2ui-field">'+
      '        <label>Nickname</label>'+
      '        <div>'+
      '            <input name="nickname" type="text" maxlength="100" style="width: 250px"/>'+
      '        </div>'+
      '    </div>'+
      '    <div class="w2ui-field">'+
      '        <label>Email:</label>'+
      '        <div>'+
      '            <input name="email" type="email" style="width: 250px"/>'+
      '        </div>'+
      '    </div>'+
      '    <div class="w2ui-field">'+
      '        <label>Password:</label>'+
      '        <div>'+
      '            <input name="password" type="password" style="width: 250px"/>'+
      '        </div>'+
      '    </div>'+
      '</div>'+
      '<div class="w2ui-buttons">'+
      '    <button class="btn" name="Register">Register</button>'+
      '</div>',
      fields: [
        { field: 'fullname', type: 'text', required: true },
        { field: 'nickname', type: 'text', required: true },
        { field: 'email', type: 'email', required: true },
        { field: 'password', type: 'password', required: true }
      ],
      actions: {
        "Register": function() {
          if(this.validate()){
            this.save();
          }
        }
      },
      onSave: function(event, data) {
        if(data.xhr.responseText == "0"){
          w2alert('Email already taken');
        } else {
          w2popup.close();
          showMessage('User succesfully registered. Please contact administrator for activation','success') ;
          w2ui['task_grid'].reload();
        }
      }
    });
  }
  $().w2popup('open', {
    title   : 'Registration',
    body    : '<div id="form_register" style="width: 100%; height: 100%;"></div>',
    style   : 'padding: 15px 0px 0px 0px',
    width   : 500,
    height  : 300,
    showMax : false,
    onToggle: function (event) {
      $(w2ui.register_form.box).hide();
      event.onComplete = function () {
        $(w2ui.register_form.box).show();
        w2ui.register_form.resize();
      }
    },
    onOpen: function (event) {
      event.onComplete = function () {
        $('#w2ui-popup #form_register').w2render('register_form');
      }
    }
  });
}
</script>

</body>
</html>
