<script type="text/javascript" src="javascripts/sha512.js"></script>
<script type="text/javascript" src="javascripts/forms.js"></script>

<?php
if(isset($_GET['error'])) { 
   echo 'Error Logging In!';
}
?>
<form action="process_login.php" method="post" name="login_form">
   Username: <input type="text" name="username" /><br />
   Password: <input type="password" name="password" id="password"/><br />
   <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
</form>