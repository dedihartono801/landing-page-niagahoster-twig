<?php

require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);
$str = file_get_contents('data.json');
$data = json_decode($str, true);

$price_bayi = $data['price_bayi']['discount'];
$price_pelajar = $data['price_pelajar']['discount'];
$price_personal = $data['price_personal']['discount'];
$price_bisnis = $data['price_bisnis']['discount'];
$new_price_bayi = explode('.',$price_bayi);
$new_price_pelajar = explode('.',$price_pelajar);
$new_price_personal = explode('.',$price_personal);
$new_price_bisnis = explode('.',$price_bisnis);

echo $twig->render('index.html.twig', [
						"data" => $data,
						"price_bayi"=>$new_price_bayi,
						"price_pelajar"=>$new_price_pelajar,
						"price_personal"=>$new_price_personal,
						"price_bisnis"=>$new_price_bisnis,
						]
				  );

?>