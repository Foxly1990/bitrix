<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 *
 */

$this->InitComponentTemplate();

\Bitrix\Main\Loader::includeModule('landing');
\Bitrix\Main\Loader::includeModule('iblock');

$query = new \Bitrix\Main\Entity\Query(Bitrix\Iblock\SectionTable::getEntity());

$queryRandFields = $query->registerRuntimeField(
  'RAND',
  array(
    'data_type' => 'float',
    'expression' => array('RAND()')
  )
);

$secOrder = array('RAND' => 'ASC');
$secFields = array('ID', 'IBLOCK_ID', 'NAME', 'PICTURE');

$secFilter = array(
  'ACTIVE' => 'Y',
  'GLOBAL_ACTIVE' => 'Y',
  'IBLOCK_ID' => $arParams["IBLOCK_ID"],
  'DEPTH_LEVEL' => 1
);

$getSections = $queryRandFields
->setOrder($secOrder)
->setSelect($secFields)
->setFilter($secFilter)
->setLimit($arParams["RANGE"]);

$rsSection = $getSections->exec();
$arResult["ITEMS"] = array();

foreach ($rsSection as $arSection)
{
  $curSection = CIBlockSection::GetByID($arSection['ID']);

  if ($curSection = $curSection->GetNext())
  {
    $sectionPageUrl = $curSection["SECTION_PAGE_URL"];
  }

  $arSecPicture = CFile::GetFileArray($arSection["PICTURE"]);

  $item = array(
    "ID" => $arSection["ID"],
    "NAME" => $arSection["NAME"],
    "PICTURE" => $arSecPicture,
    "SECTION_PAGE_URL" => $sectionPageUrl
  );

  array_push($arResult["ITEMS"], $item);
}

$this->IncludeComponentTemplate();
