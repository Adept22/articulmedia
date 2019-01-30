<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule("iblock"))
	return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();
$arIBlock = array();
$rsIBlock = CIBlock::GetList(
     array(
          "sort" => "asc"
     ),
     array(
     	"TYPE" => $arCurrentValues["IBLOCK_TYPE"],
     	"ACTIVE" => "Y",
     )
);
while ($arr = $rsIBlock->Fetch())
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];

$arProperty = array();
$arProperty_LNS = array();
$rsProp = CIBlockProperty::GetList(
     array(
          "sort" => "asc",
          "name" => "asc"
     ),
     array(
          "IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"],
          "ACTIVE" => "Y",
     )
);
while ($arr = $rsProp->Fetch()) {
     $arProperty[$arr["CODE"]] = "[" . $arr["CODE"]."] " . $arr["NAME"];
     if (in_array($arr["PROPERTY_TYPE"], array("L", "N", "S"))) {
          $arProperty_LNS[$arr["CODE"]] = "[".$arr["CODE"]."] " . $arr["NAME"];
     }
}

$arComponentParameters = array(
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("CP_BCSE_IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("CP_BCSE_IBLOCK_ID"),
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
		),
		"PAGE_ELEMENT_COUNT" => array(
			"PARENT" => "VISUAL",
			"NAME" => GetMessage("IBLOCK_PAGE_ELEMENT_COUNT"),
			"TYPE" => "STRING",
			"DEFAULT" => "10",
		),
		"PROPERTY_CODE" => array(
			"PARENT" => "VISUAL",
			"NAME" => GetMessage("CP_BCS_PROPERTY_CODE"),
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arProperty,
			"ADDITIONAL_VALUES" => "Y",
		),
		"FILTER_NAME_PROPERTY" => array(
			"PARENT" => "BASE",
			"NAME" => "Поиск по имени",
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arProperty,
			"ADDITIONAL_VALUES" => "Y",
		),
		"CACHE_TIME" => array(
			"DEFAULT" => 36000000,
		),
	),
);
?>
