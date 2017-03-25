<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['id'] && $_POST['titre'])) {
			$res =$app->getTable('Category')->update(
				$_POST['id'],
				['titre' => $_POST['titre']]);
			if ($res) {
				//message flash
				header('location: admin.php?p=categories.edit');
			}

		}
	}
	$category = $app->getTable('category')->find($_GET['id']);
	if ($category===false) {
		$app->notFound();
	}
	$app->titre = $category->titre;
?>

<!--pour faire la recuperation-->
<form method="post">
	<input type="hidden" name="id" value="<?= $category->id; ?>">
	<input type="text" name="titre" value="<?= $category->titre; ?>">

	
	<input class="btn btn-primary" type="submit" name="">
</form>











