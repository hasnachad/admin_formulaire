<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['id'] && $_POST['titre'] && $_POST['contenu'])) {
			$res =$app->getTable('Post')->update(
				$_POST['id'],
				['titre' => $_POST['titre'], 'contenu' => $_POST['contenu']]);
			if ($res) {
				//message flash
				header('location:admin.php?p=posts.edit');
			}

		}
	}


	$post = $app->getTable('post')->find($_GET['id']);
	if ($post===false) {
		$app->notFound();
	}
	$app->titre = $post->titre;
?>

<!--pour faire la recuperation-->
<form method="post">
	<input type="hidden" name="id" value="<?= $post->id; ?>">
	<input class="form-control" type="text" name="titre" value="<?= $post->titre; ?>">
	<textarea class="form-control" name="contenu"><?= $post->contenu; ?></textarea>
	<input class="btn btn-primary" type="submit" name="">
</form>











