<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<form action="./task2_2.php" method="post">
	Количество ошибок: <input type="text" name="errors" /><br />
	Количество предупреждений: <input type="text" name="warnings" /><br />
	<input type="submit" value="Узнать количество коммитов" />
</form>

<?php
	if (empty($_POST)) {
		exit('Введите значения');
	}
	$errors=trim($_POST['errors']);
	$warnings=trim($_POST['warnings']);
	if (empty($_POST['errors']) and empty($_POST['warnings'])){
		exit('Введите значения');
	}
	echo "Введённые вами данные: ".$errors." и ".$warnings."<br/>";
	
	if ($warnings == 0 and $errors % 2 != 0){
		$commit = -1;
	} else {
		$commit = 0;
		while (fmod(($errors + $warnings / 2), 2) != 0) { # проверяем делимость на 2
		    $warnings++;
		    $commit++;
		}
		$commit += $warnings / 2;
		$errors += $warnings / 2;
		$commit += $errors / 2;
	}
	echo "Количество коммитов: ".$commit;
?>