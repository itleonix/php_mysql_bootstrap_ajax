<?php //php 8.2, скрипт запускался и тестировался в терминале MacOs, редактор кода sublime Text 3

            //В этом блоке json файл с БД подгружается из сети, помещается на диск и приводится к приемлемому для работы виду
    $url_posts = 'https://jsonplaceholder.typicode.com/posts';                                                                               
    $file_posts = file_get_contents($url_posts);           
    $posts_file = '/Users/leonid/Sites/localhost/TestWorkInline/other/table_posts.txt';                                                                                  
    file_put_contents($posts_file, $file_posts);     
    $text = '{"Posts": ';
    $text .= file_get_contents($posts_file);                                              
    file_put_contents($posts_file, $text.'}');  

            //В этом блоке json файл с БД подгружается из сети, помещается на диск и приводится к приемлемому для работы виду
    $url_comment = 'https://jsonplaceholder.typicode.com/comments';                                                                               
    $file_comment = file_get_contents($url_comment);                                                                                               
    $comment_file = '/Users/leonid/Sites/localhost/TestWorkInline/other/table_comments.txt';                                                             
    file_put_contents($comment_file, $file_comment);                                                                                              
    $text = '{"Comments": ';
    $text .= file_get_contents($comment_file);                                              
    file_put_contents($comment_file, $text.'}');

            //Подключение к локальной БД Mysql, в случае неудачи выведется сообщение
    $connect = new mysqli("localhost:8889", "leonix", "", "testworkinline");
    if($connect->connect_error){
        die("Ошибка: " . $connect->connect_error);
    }
    echo "Подключение успешно установлено".PHP_EOL;

            //Подключение json файлов с диска
    $post = file_get_contents('/Users/leonid/Sites/localhost/TestWorkInline/other/table_posts.txt');
    $comment = file_get_contents('/Users/leonid/Sites/localhost/TestWorkInline/other/table_comments.txt');
    $json_post = json_decode($post);                                                                                                        //Декодирование json
    $json_comment = json_decode($comment);
    $p = 0;                                                                                                                                 //Счетчики количества постов и комментариев
    $pc = 0;

            //В цикле идет переборка всех элементов и нужные подставляются в запрос к БД на добавление записи
    foreach($json_post->Posts as $posts) {
        //echo $posts->userId.', '.$posts->title.PHP_EOL;
        $sql = "INSERT INTO post (user_id, title, body) VALUES (".$posts->userId.", '".$posts->title."', '".$posts->body."')";
        if ($connect->query($sql)) {                                                                                                        //Проверка ошибки
            echo 'Запись успешно внесена в таблицу post'.PHP_EOL;
        } else {
            echo "Error: " . $sql .PHP_EOL. mysqli_error($connect);
        }
        $p++;
    }
    foreach($json_comment->Comments as $comments) {
        //echo $comments->id.', '.$comments->name.PHP_EOL;
        $sql_comment = "INSERT INTO сomments (post_id, name, Email, body_comment) VALUES (".$comments->postId.", '".$comments->name."', '".$comments->email."', '".$comments->body."')";
        if ($connect->query($sql_comment)) {
            echo 'Запись успешно внесена в таблицу comment'.PHP_EOL;
        } else {
            echo "Error: " . $sql .PHP_EOL. mysqli_error($connect);
        }
        $pc++;
    }
    echo 'Загружено '.$p.' записей и '.$pc.' комментариев.';                                                                                //Вывод количества записей в БД
    $connect->close();                                                                                                                      //Отключение от БД
?>