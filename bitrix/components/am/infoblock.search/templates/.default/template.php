<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); $this->setFrameMode(true); ?>
<?
$APPLICATION->IncludeComponent(
	"am:infoblock.search",
	".default",
	array(
          "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"PROPERTY_CODE" => $arParams["PROPERTY_CODE"],
          "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
          "FILTER_NAME_PROPERTY" => $arParams["FILTER_NAME_PROPERTY"],
	),
	false,
     array('HIDE_ICONS' => 'Y')
);
?>
