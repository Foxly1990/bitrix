<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<h3 class="text-center">
  <?echo GetMessage("HLBL_TITLE");?>
</h3>
<div class="row">
  <?foreach($arResult["ITEMS"] as $arItem):?>
    <div class="col-sm-12 col-md-12">
      Элемент <strong><?echo $arItem['NAME'];?></strong>
      принадлежит к категории <strong><?echo $arItem['SECTION_NAME'];?></strong>
    </div>
  <?endforeach;?>
</div>
