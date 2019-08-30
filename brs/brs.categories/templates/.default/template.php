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
  <?echo GetMessage("CAT_TITLE");?>
</h3>

<div class="row">
  <?foreach($arResult["ITEMS"] as $arItem):?>
    <div class="col-sm-6 col-md-4 section-item">
      <a href="<?echo $arItem["SECTION_PAGE_URL"];?>">
        <div><?echo $arItem["NAME"];?></div>
        <div class="section-item_wr-img">
          <img class="section-item_img" alt="" src="<?echo $arItem["PICTURE"]["SRC"];?>"/>
        </div>
      </a>
    </div>
  <?endforeach;?>
</div>
