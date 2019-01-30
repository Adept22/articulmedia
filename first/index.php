<!-- Пример вызова компонента на старанице -->

<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); $APPLICATION->SetTitle("Пример вызова компонента на старанице"); ?>
<?
$APPLICATION->IncludeComponent(
	"am:infoblock.search",
	"",
	array(
          "IBLOCK_TYPE" => "basic", // Тип инфоблока
		"IBLOCK_ID" => "1", // ID инфоблока
		"PROPERTY_CODE" => array(),
          "PAGE_ELEMENT_COUNT" => 10,
          "FILTER_NAME_PROPERTY" => $_GET['name'],
	),
	false
);
?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
