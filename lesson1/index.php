<?php

class Article
{
    public $id;
    public $title;
    public $content;
// Метод для вывода статьи
    public function view()
    {
        echo "<h1>$this->title</h1><p>$this->content</p>";
    }
}
$a = new Article();
$a->id = 1;
$a->title = 'Новая статья';
$a->content = 'Какой-то текст!';
$a->view();
