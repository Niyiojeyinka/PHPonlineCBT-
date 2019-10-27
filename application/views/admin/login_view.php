<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="<?php //echo $description; ?>">
<meta name="keywords" content="<?php
/*foreach ($keywords as $keyw)
{
echo $keyw.',';
}*/
?>">
<meta name="robots" content="noindex, nofollow">
<meta name="author" content="<?php //echo $author;?>">
<title><?php //echo $title; ?></title>
<link rel="stylesheet"  href="<?php echo base_url('assets/css/w3.css'); ?>">
<style>

</style>





<meta name="viewport" content="width=device-width, initial-scale=1.0">
</script>
<noscript>Pls turn on JavaScript!</noscript>
</head>
<body class="">

<center>

<div style="width:100%;height:100%" class="w3-container w3-light-grey w3-text-blue-grey">

    <div style="width:60%;height:10%" class="w3-container w3-card w3-white"><b style="width:55%;height:10%" class="w3-text-indigo"><a href="<?php echo site_url();?>">Pryce Ng </a></b>
</div>
</center>

<div class="w3-text-indigo w3-center"><?php
echo validation_errors();
echo $err; ?>

<div style="width:100%" class="w3-container">
<?php echo form_open("/team/index");

?>
        <center>

<span class="w3-label">Username:</span>

<input class="w3-input" name="name" value="<?php //echo set_values("name"); ?>" placeholder="Username" requiindigo></input>
<br>

<span class="w3-label">Password:</span>
<input class="w3-input" type='password' name="pass" value="<?php //echo set_vlues(); ?>" placeholder="Password" requiindigo></input>
<br>

<input class="w3-btn w3-indigo" name="submit" type="submit" value="Login"></center>




<div>

<div style="padding:12%" class="w3-contaner w3-indigo w3-text-white">
<center><div style="width:60%" class="">

All right reserved<span class="w3-large">|</span>A Pryce Ng Internet ltd<br>
<?php
if (date('y') == 17)
{
echo "© 20".date('y');
}else{
echo "© 2017 - 20".date('y');
}
?>
</div></center>
</div>


</div>
</body>
</html>