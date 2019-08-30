<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
  "NAME" => "Демонстрация работы с highloadblock",
  "DESCRIPTION" => "Создать на базе highload инфоблоков 2 сущности и связать их по какому-либо полю. После чего получить из одной сущности другую. Например товар с привязкой к категории (категория и товар это highload инфоблоки), необходимо получить название категории в запросе товара.",
  "ICON" => "images/catalog.gif",
  "SORT" => 20,
  "CACHE_PATH" => "Y",
  "PATH" => array(
    "ID" => "brs"
  ),
);
?>
