<?php
	$errors=trim($_POST['errors']);
	$warnings=trim($_POST['warnings']);
	if (empty($_POST['errors']) and empty($_POST['warnings'])){
		exit('Введите значения');
	}
	echo "Введённые вами данные: ".$errors." и ".$warnings."<br/>";

	if ($warnings == 0){
		if ($errors % 2 == 0){
			$commit = $errors / 2;
		} else {
			$commit = -1;
		}
	} else {
		if ($errors % 2 == 0){
			if ($warnings % 4 == 0){
				$commit = $warnings / 2;
				$errors += $warnings / 2;
				$commit += $errors / 2;
			} else {
				$commit = 4 - ($warnings % 4);
				$warnings += $commit;
				$commit += $warnings / 2;
				$errors += $warnings / 2;
				$commit += $errors / 2;
			}
		} else {
			if ($warnings % 4 == 0){
				$commit = 2;
				$warnings += 2;
				$commit += $warnings / 2;
				$errors += $warnings / 2;
				$commit += $errors / 2;
			} else {
				if ($warnings % 2 == 0){
					$commit = $warnings / 2;
				} else {
					$commit = $warnings % 4;
					$warnings += $commit;
					$commit += $warnings / 2;
				}
				$errors += $warnings / 2;
				$commit += $errors / 2;
				
			}
		}
	}
	echo "Количество коммитов: ".$commit;
?>