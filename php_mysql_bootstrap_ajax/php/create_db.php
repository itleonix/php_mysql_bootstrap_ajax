<?php 	//php 8.2, скрипт запускался и тестировался в терминале MacOs, редактор кода sublime Text 3
          //Подключение к локальной БД Mysql, в случае неудачи выведется сообщение
    $connect = new mysqli("localhost:8889", "leonix", "");
    if($connect->connect_error){
        die("Ошибка: " . $connect->connect_error);
    }
    echo "Подключение успешно установлено".PHP_EOL;

    																//sql запрос к БД
    $sql = "CREATE DATABASE IF NOT EXISTS `testworkinline`";//Запрос на создание БД
    $result = $connect->query($sql);
    if ($result) {											//Проверяем создалась ли БД, если да, то формируем запрос на создание таблицу post
    	$sql = "CREATE TABLE `testworkinline`.`post` (`user_id` INT(50) NOT NULL , `id` INT(50) NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `body` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    	$result = $connect->query($sql);					//Создание таблицы post
    	if ($result) {										//Проверяем создалась ли таблица post, если да, то формируем запрос на создание таблицы comments
    		$sql = "CREATE TABLE `testworkinline`.`сomments` (`post_id` INT(20) NOT NULL , `id_comment` INT(20) NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `Email` TEXT NOT NULL , `body_comment` TEXT NOT NULL , PRIMARY KEY (`id_comment`), INDEX (`post_id`)) ENGINE = InnoDB";
    		$result = $connect->query($sql);				//Создание связи между таблицами
    		$sql = "ALTER TABLE `testworkinline`.`сomments` ADD FOREIGN KEY (`post_id`) REFERENCES `post`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT";
    		$result = $connect->query($sql);
    		if ($result) {									//Проверяем создалась ли таблица comments со связью с таблицей post,если да, то выводим сообщение об успешном завершении процесса
    			echo "Create database and tables complited".PHP_EOL;
    		} else {
    			echo "Error create table comments".PHP_EOL;			//Ессли таблица comments не создалась
    		}
    	} else {
    		echo "Error create table post".PHP_EOL;					//Если таблица post не создалась
    	}

    } else {
    	echo "Error create database".PHP_EOL;						//Если БД не создалась
    }
    $connect->close();												//Отключение от БД
?>