<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

\Bitrix\Main\Loader::IncludeModule("iblock");

$arIBlocks = array();
$db_iblock = CIBlock::GetList(
  array("SORT" => "ASC"),
  array(
    "SITE_ID" => $_REQUEST["site"],
    "TYPE" => ($arCurrentValues["IBLOCK_TYPE"] != "-" ? $arCurrentValues["IBLOCK_TYPE"] : "")
  ));

while ($arRes = $db_iblock->Fetch())
{
  $arIBlocks[$arRes["ID"]] = $arRes["NAME"];
}

$arComponentParameters = Array(
  "PARAMETERS" => Array(
    "IBLOCK_ID" => Array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("IBLOCK_ID"),
      "TYPE" => "LIST",
      "VALUES" => $arIBlocks,
      "DEFAULT" => '={$_REQUEST["ID"]}',
      "ADDITIONAL_VALUES" => "Y",
      "REFRESH" => "N",
    ),
    "RANGE" => Array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("RANGE"),
      "TYPE" => "STRING",
      "DEFAULT" => '3',
    )
  )
);
?>
