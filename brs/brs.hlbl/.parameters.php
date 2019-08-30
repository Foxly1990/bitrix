<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

\Bitrix\Main\Loader::includeModule('highloadblock');

$arHBList = array();
$hb_list = \Bitrix\Highloadblock\HighloadBlockTable::getList();

while ($hb_item = $hb_list->fetch())
{
  $arHBList[$hb_item["ID"]] = $hb_item["NAME"];
}

$arComponentParameters = Array(
  "PARAMETERS" => Array(
    "SECTION_HB" => Array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("SECTION_HB"),
      "TYPE" => "LIST",
      "VALUES" => $arHBList,
      "ADDITIONAL_VALUES" => "Y",
      "REFRESH" => "N",
    ),
    "ELEMENTS_HB" => Array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("ELEMENTS_HB"),
      "TYPE" => "LIST",
      "VALUES" => $arHBList,
      "ADDITIONAL_VALUES" => "Y",
      "REFRESH" => "N",
    ),
  )
);
