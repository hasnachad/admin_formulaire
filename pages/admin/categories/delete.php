<?php
	$app = App::getInstance();

	if ($_POST) {
		if (!empty($_POST['id'])) {
			$res =$app->getTable('category')->delete(
				$_POST['id']);
			
			if ($res) {
				//message flash
				header('location:admin.php?p=categories.edit');

			}

		}
	}


	
?>