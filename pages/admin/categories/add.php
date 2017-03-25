<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['titre'])) {
			$res =$app->getTable('Category')->create(
				['titre' => $_POST['titre']]);
			if ($res) {
				//message flash
				header('location:admin.php?p=categories.edit');
			}

		}
	}


	
?>

<!--pour faire la recuperation-->
<form method="post">

	<input type="text" class="form-control" name="titre" value="" placeholder="Merci de mettre un titre">
	<input class="btn btn-primary" type="submit" name="">
</form>











