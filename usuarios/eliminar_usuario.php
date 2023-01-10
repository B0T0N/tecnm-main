<html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php 

include ('../app/config/config.php');
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM tb_usuarios WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
	}

?>