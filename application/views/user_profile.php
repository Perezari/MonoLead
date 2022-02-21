<?php include('header.php'); ?>

<script type="text/javascript" src="<?php echo STATIC_DIR; ?>js/jquery.form.min.js"></script>

<div id="content" >

  <center>
    <div id="form_user" style="width: 750px;height:80%;margin-top:50px">
      <div class="w2ui-page page-0">
        <div style="width: 340px; float: left; margin-right: 0px;">
          <div style="padding: 3px; font-weight: bold; color: #777;">General</div>
          <div class="w2ui-group" style="height: 210px;">
            <div class="w2ui-field w2ui-span4">
              <label>ID:</label>
              <div>
                <input name="id" type="text" maxlength="100" style="width: 100%" readonly>
              </div>
            </div>
            <div class="w2ui-field w2ui-span4">
              <label>Fullname:</label>
              <div>
                <input name="fullname" type="text" maxlength="100" style="width: 100%" >
              </div>
            </div>
            <div class="w2ui-field w2ui-span4">
              <label>Nickname:</label>
              <div>
                <input name="nickname" type="text" maxlength="100" style="width: 100%" >
              </div>
            </div>
            <div class="w2ui-field w2ui-span4">
              <label>Address:</label>
              <div>
                <textarea name="address" type="text" style="width: 100%; height: 50px; resize: none" ></textarea>
              </div>
            </div>
            <div class="w2ui-field w2ui-span4">
              <label>Password:</label>
              <div>
                <input name="password" type="text" maxlength="100" style="width: 100%"  />
              </div>
            </div>
          </div>
        </div>
        <div style="width: 380px; float: right; margin-left: 0px;">
          <div style="padding: 3px; font-weight: bold; color: #777;">More Details</div>
          <div class="w2ui-group" style="height: 210px;">
            <div class="w2ui-field w2ui-span4">
              <label>Email:</label>
              <div>
                <input name="email" type="text" maxlength="100" style="width: 100%"  />
              </div>
            </div>
            <div class="w2ui-field w2ui-span4">
              <label>Phone:</label>
              <div>
                <input name="phone" type="text" maxlength="100" style="width: 100%"  />
              </div>
            </div>
            <div class="w2ui-field w2ui-span4">
              <label>About me:</label>
              <div>
                <textarea name="other" type="text" style="width: 100%; height: 80px; resize: none" ></textarea>
              </div>
            </div>
            <div class="w2ui-field w2ui-span4">
              <label>Status:</label>
              <div>
                <input name="status" type="text" maxlength="100" style="width: 100%" readonly />
                <input name="profile_pic_url" id="profile_pic_url" type="text" style="display:none"/>
              </div>
            </div>
          </div>
        </div>

        <div style="width: 500px; float: left; margin-right: 0px;">
          <div class="w2ui-group" style="text-align:left;height: 50px;padding:0px">
            <div class="w2ui-field w2ui-span4">
              <label>Position:</label>
              <div class="<?php echo $_USER_GROUP['icon']; ?>" style="width:20px;height:20px;padding-left:50px;line-height:20px">
                <?php echo $_USER_GROUP['usergroup']; ?>
              </div>
            </div>
          </div>

          <div style="padding: 3px; font-weight: bold; color: #777;">Member of projects</div>
          <div class="w2ui-group" style="text-align:left; padding:0px; overflow-y: auto; height: 90px;">
            <div class="w2ui-span4">
              <?php
              foreach ($_USER_PROJECT as $key => $value) { //עבור כל פרויקט
                echo '<div class="icon-box user-project" >'.$value['project_name'].'&nbsp - &nbsp'.$value['task_name'].'</div>'; //הדפסת הפרויקטים שהמשתמש חבר בהם
              }
              ?>
            </div>
          </div>
        </div>

        <div style="width: 220px; float: right; margin-left: 0px;">
          <div class="w2ui-group" style="height: 170px;border:1px solid #CEDCEA">
            <div class="w2ui-field w2ui-span4">
              <a href="#" onClick="changeProfilePic()" style="text-decoration:none">
                <img id="profile_pic_image" src="<?php echo STATIC_DIR.$_USER_PROFILE_PIC; ?>" style="max-width:150px;max-height:150px;border:1px solid gray">
              </a>
            </div>
          </div>
          <a href="#" onClick="changeProfilePic()" style="text-decoration:none">Select a profile photo</a>
          <form
          enctype="multipart/form-data"
          id="profile_pic_form"
          method="post"
          style="display:none"
          action="<?php echo BASE_URL; ?>user/upload_profile_pic">
          <input type="file" name="profile_pic_input" id="profile_pic_input" style="width:190px"/>
        </form>
      </div>
      <div style="clear: both; "></div>
    </div>

    <div class="w2ui-buttons">
      <button class="btn" name="save">Save</button>
    </div>
  </div>
</center>

</div>

<?php include('footer.php'); ?>

<script type="text/javascript">

$(function () {
  $('#form_user').w2form({
    name   : 'form_user',
    header : 'My profile',
    url    : '<?php echo BASE_URL; ?>user/go_edit_profile',
    fields : [
      { field: 'id',  type: 'text' },
      { field: 'fullname',  type: 'text', required:true },
      { field: 'nickname',  type: 'text', required:true },
      { field: 'address',   type: 'text'},
      { field: 'email', type: 'email', required:true },
      { field: 'phone', type: 'text' },
      { field: 'password', type: 'text', required:true },
      { field: 'status', type: 'text' },
      { field: 'other', type: 'text' },
      { field: 'profile_pic_url', type: 'text' }
    ],
    actions: {
      save: function () {
        if(this.validate()){
          this.save();
        }
      }
    },
    onSave: function(event) {
      w2popup.close();
      w2alert('Profile successfully updated - please re-sign in to see the changes.','Update profile.');
      showMessage('הפרופיל עודכן בהצלחה','success') ;
      w2ui['form_user'].reload();
    },
    record: <?php echo $_USER_DATA; ?>
  });

  $("#profile_pic_input").change(function() { //פונקציה לשינוי תמונת המשתמש
    $('#profile_pic_form').ajaxForm({
      beforeSubmit: function() {  },
      beforeSend:function(){},
      success: function(msg) {
        var result = JSON.parse(msg);
        $('#profile_pic_url').val(result['fullurl']);
        w2ui['form_user'].record['profile_pic_url'] = result['fullurl'];
        w2ui['form_user'].refresh();
        $("#profile_pic_image").removeAttr("src");
        $("#profile_pic_image").attr("src", "<?php echo STATIC_DIR.$_USER_PROFILE_PIC; ?>?timestamp=" + new Date().getTime() );
      },
      complete: function(xhr) {}
    });
    $('#profile_pic_form').submit();
  });
});

function changeProfilePic(){
  $( "#profile_pic_input" ).click();
}

</script>
