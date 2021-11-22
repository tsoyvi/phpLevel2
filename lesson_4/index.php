<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="js.js"></script>
    <title>Каталог</title>
</head>
<style>
    body{
        margin: 0 auto;
        width: 800px;
        text-align: center;
    }
    .auth {
        display: flex;
        flex-direction: column;
        outline: #ede3e3 solid 1px;
        width: 245px;
        align-items: flex-end;
    }
    .auth > label {
        margin: 2px;
    }
    .cart {
        margin: 10px 10px 10px 10px;
        outline: #ede3e3 solid 1px;
        width: 500px;
    }
    .product-list {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 30px;
    }
    .product {
        display: flex;
        flex-direction: column;
        outline: #ede3e3 solid 1px;
        width: 245px;
        align-items: center;
        margin: 0 10px 10px 10px;
    }
</style>
<body>

<?php
//
///////// Вывод ошибок
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
///////////////////////


?>

<div class="product-list">
</div>

<button id="addMore">Показать еще</button>


</body>
</html>