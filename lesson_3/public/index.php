<?php
//
///////// Вывод ошибок
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
///////////////////////


require_once 'db.php';
require_once 'gallery.php';

$db = new Database();
$gallery = new Gallery($db->connect);

if (isset($_GET['idImage'])) {
    $requestImage = $gallery->requestImage($_GET['idImage']);
    $arrImages = $gallery->getImage($requestImage);
} else {
    $requestAllImages = $gallery->requestAllImages();
    $arrImages = $gallery->getArrImages($requestAllImages);
}


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';

try {

    $loader = new FilesystemLoader(dirname(__DIR__) . '/templates');

    /* $twig = new Environment($loader, [
    'cache' => dirname(__DIR__) . '/cache']);
     */

    $twig = new Environment($loader);
    if (!isset($_GET['idImage'])) {
        echo $twig->render('home/index.twig.html', ['title' => "Галерея", 'arrImages' => $arrImages]);
    } else {
        echo $twig->render('image/index.twig.html', ['title' => "Просмотр изображения", 'arrImages' => $arrImages]);
    }
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}
