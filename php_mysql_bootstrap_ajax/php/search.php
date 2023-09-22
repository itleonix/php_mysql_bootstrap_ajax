<?php //php 8.2, скрипт запускался и тестировался на локальном сервере, редактор кода sublime Text 3
	$text_search = htmlspecialchars($_POST["search"]);				//Получение введенного значения в поле поиска

            														//Подключение к локальной БД Mysql, в случае неудачи выведется сообщение
    $connect = new mysqli("localhost:8889", "*******", "", "********");
    if($connect->connect_error){
        die("Error: " . $connect->connect_error);
    }
    																//sql запрос к БД
    $sql = "SELECT `post`.`title`, `сomments`.`body_comment` FROM `post` CROSS JOIN `сomments` ON `post`.`id` = `сomments`.`post_id` WHERE `сomments`.`body_comment` LIKE '%".$text_search."%'";
    $result = $connect->query($sql);
    $valid = '';
    																//Переборка всех значений полученного массива из БД
    foreach ($result as $result_search){
    	$result_search_mes = $result_search;
    																//Приведение к удобночитаемому виду полученного массива (отображается на странице index.php)
    	if ($result_search_mes['title'] !== $valid) {
    		echo ("<figure><blockquote class='blockquote'><p>".$result_search_mes['title']."</p></blockquote><figcaption class='blockquote-footer'>".$result_search_mes['body_comment']."</figcaption></figure>");
    	} else {
    		echo ("<figcaption class='blockquote-footer'>".$result_search_mes['body_comment']."</figcaption>");
    	}
    																
    	$valid = $result_search_mes['title'];
    }
    $connect->close();												//Отключение от БД
  ?>
