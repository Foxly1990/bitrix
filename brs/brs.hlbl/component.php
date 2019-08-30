<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

\Bitrix\Main\Loader::includeModule('highloadblock');

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 *
 */

$this->InitComponentTemplate();

$hlblock     = HL\HighloadBlockTable::getById($arParams["ELEMENTS_HB"])->fetch();
$entity      = HL\HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();

$res = $entityClass::getList(array('select' => array('*')));

$hlbl           = HL\HighloadBlockTable::getById($arParams["SECTION_HB"])->fetch();
$entityCat      = HL\HighloadBlockTable::compileEntity($hlbl);
$entityClassCat = $entityCat->getDataClass();

$arResult["ITEMS"] = array();

while ($elem = $res->fetch())
{
  $id = $elem["UF_CATEGORY"];
  $elem_name = $elem["UF_STRING"];

  $getCatRes = $entityClassCat::getList(
    array(
      'select' => array('*'),
      'filter' => array('ID' => $id)
    )
  );

  $cat_name = $getCatRes->fetch()["UF_CATEGORY"];

  $item = array(
    "ID" => $elem["ID"],
    "NAME" => $elem_name,
    "SECTION_NAME" => $cat_name
  );

  array_push($arResult["ITEMS"], $item);
}

$this->IncludeComponentTemplate();
