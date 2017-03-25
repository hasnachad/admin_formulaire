<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['titre'] && $_POST['contenu'])) {
			$res =$app->getTable('Post')->create(
				['titre' => $_POST['titre'], 'contenu' => $_POST['contenu']]);
			if ($res) {
				//message flash
				header('location:admin.php?p=posts.edit');
			}

		}
	}


	
?>

<!--pour faire la recuperation-->
<form method="post">

	<input class="form-control" type="text" name="titre" placeholder="Merci de mettre un titre">
	<textarea class="form-control" name="contenu" placeholder="le contenu de l'article"></textarea>
	<input class="btn btn-primary" type="submit" name="">
</form>











