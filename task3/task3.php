<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<form action="./task3.php" method="post">
	N: <input type="number" name="N" /><br />
	K: <input type="number" name="K" /><br />
	<input type="submit" value="Узнать позицию элемента" />
</form>

<?php
	if (empty($_POST)) {
		exit('Введите значения');
	}
	
	$n=$_POST['N'];
	$k=$_POST['K'];

	if (empty($_POST['N']) and empty($_POST['K'])){
		exit('Введите значения');
	}

	$n = (int)$n;
	$k = (int)$k;
	echo "Введённые вами данные: ".$n." и ".$k."<br/>";

	$ms = range(1, $n); // заполняем массив элементами от 1 до n включительно
	$ms[] = $k; // добавляем в массив новое значение
	sort($ms, SORT_STRING); // сортируем массив по строковому представлению значений(лексиграфически)
	echo "<br/>"."Позиция: ".(array_search($k, $ms)+1); // +1, т.к. нумерация с 0
?>
