<?php include('header.php'); ?>

    <div id="content">

		<?php if(Handler::$_IS_ADMIN){  ?>
		<div id="layouts" style="width: 100%; height: 100%;"></div>
	 	<?php } else { echo
							'<!DOCTYPE html>
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

        <div id="config_head" style="display:none">
        </div>
        <div id="config_site" style="display:none">
            <div id="form_site" style="width: 400x;height:730px"></div>
        </div>
        <div id="config_plugin" style="display:none"></div>
    </div>

<?php include('footer.php'); ?>

<script type="text/javascript">
$(function () {

    var pstyle = 'border: 1px solid #dfdfdf; padding: 5px;';
    $('#layouts').w2layout({
        name: 'layouts',
        panels: [
            { 
                type: 'main',
                size: 550,  
                style: pstyle + 'border-top: 0px;', 
                content: $('#config_site').html()
            }
        ]
    });

    $('#form_site').w2form({ 
        name    : 'form_site',
        header  : 'Site Configuration',
        url      : {
            save  : '<?php echo BASE_URL; ?>config/go_edit_config/'
        },
        fields : [
            { 
                field: 'maintenance_mode', 
                type: 'list', 
                required: true, 
                options: { 
                    items: [{"text":"Yes","id":"Yes"},{"text":"No","id":"No"}]
                },
                html: { 
                    caption: 'Maintenance Mode', 
                    text: ' *only admin allowed to view site',
                    attr: 'style="width: 100px"'
                } 
            },
            { 
                field: 'site_name', 
                type: 'text', 
                required: true, 
                html: { 
                    caption: 'Site Name', 
                    attr: 'style="width: 300px"'
                } 
            },
            { 
                field: 'additional_footer', 
                type: 'text', 
                html: { 
                    caption: 'Additional Footer', 
                    text: ' *footer text',
                    attr: 'style="width: 230px"'
                } 
            },
            { 
                field: 'datetime_format', 
                type: 'text', 
                html: { 
                    caption: 'Datetime Format', 
                    text: ' *PHP Format',
                    attr: 'style="width: 130px"'
                } 
            },
            { 
                field: 'guest_register', 
                type: 'list', 
                required: true, 
                options: { 
                    items: [{"text":"Yes","id":"Yes"},{"text":"No","id":"No"}]
                },
                html: { 
                    caption: 'Guest Register', 
                    text: ' *Allow guest to register',
                    attr: 'style="width: 130px"'
                } 
            }
        ],
        record: <?php echo $_CONFIG_DATA; ?>,
        actions: {
            'Save': function (event) {
                this.save();
                showMessage('Configuration succesfully updated.','success') ;
            }
        }
    });
});
</script>