<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SMTP Settings Form</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.form-control{
		padding: 20px;
		text-align:center;
	}
	.form-control .error{
		color:red;
	}
	.form-control .success{
		color:green;
	}
	</style>
</head>
<body>

<div id="container">
	<div class="form-control">

	<h1>SMTP Settings</h1>
	<?php
//	print_r($settings);
echo $this->session->flashdata('Settings');
echo form_open('/smtp-save');
?>
                <input type="text" id="smtp_host" name="smtp_host" value="<?=$settings['smtp_host']?>" placeholder="SMTP HOST">
                <br><br>
                <input type="text" id="smtp_port" name="smtp_port" value="<?=$settings['smtp_port']?>" placeholder="SMTP PORT">
                <br><br>
                <input type="text" id="smtp_username" name="smtp_username" value="<?=$settings['smtp_username']?>" placeholder="SMTP USERNAME">
                <br><br>
                <input type="text" id="smtp_password" name="smtp_password" value="<?=$settings['smtp_password']?>" placeholder="SMTP PASSWORD">
                <br><br>
                <select  id="smtp_crypto" name="smtp_ssl" value="<?=$settings['smtp_ssl']?>" placeholder="SMTP HOST">
				<option value=""   >Select</option>
				<option value="ssl" <?= $settings['smtp_ssl']=='ssl' ? 'selected="selected"' : '' ?> >SSL</option>
				<option value="tls" <?= $settings['smtp_ssl']=='tls' ? 'selected="selected"' : '' ?> >TLS</option>
				</select>
                <br><br>
                <input type="submit" value="Update Settings" />
				<br><br>
                
				
<?php

echo form_close();

echo '<a href="'. base_url().'index.php/contact" >Contact Admin Now</a>';

?></div>
</div>

</body>
</html>