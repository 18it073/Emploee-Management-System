<?php
session_start();
session_destroy();

?>
<script type="text/javascript">
	alert("logout Successfully");
	window.location="login.php";
</script>