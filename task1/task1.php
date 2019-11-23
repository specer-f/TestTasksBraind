<?php
	$articleLink = 'http://127.0.0.1/text.php';
	$text = file_get_contents($articleLink); // получили текст
	$text = strip_tags($text); // на всякий случай избавляемся от тегов
	if (mb_strlen($text) > 200){
		$articleText = trim(mb_substr($text, 0, 200, "UTF-8")); // обрезаем с конца и начала строки пробелы
	} else {
		$articleText = $text;
	}
	$words = explode(" ", $articleText); // преобразовали строку в массив, разбив её на слова
	if (count($words) > 3){
		$refer = " ".$words[count($words) - 3]." ".$words[count($words) - 2]." ".$words[count($words) - 1]."...";
		$len = mb_strlen($words[count($words) - 3]) + mb_strlen($words[count($words) - 2]) + mb_strlen($words[count($words) - 1]);
		$articleText = mb_substr($articleText, 0, 200-$len-3, "UTF-8"); // 3 это пробелы, перед первым словом, между первым и вторым и между вторым и первым
		$articlePreview = $articleText."<a href=".$articleLink.">".$refer."</a>";
	} else {
		$refer = $text;
		$articlePreview = "<a href=".$articleLink.">".$refer."</a>";
	}
	echo $articlePreview;
?>
