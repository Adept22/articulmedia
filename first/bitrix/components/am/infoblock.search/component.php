<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

     use Bitrix\Main\Loader;

     if(!Loader::includeModule("iblock")) return;

     $res = CIBlockElement::GetList(
          array(
               "SORT" => "ASC"
          ),
          array(
               "IBLOCK_ID" => IntVal($arParams["IBLOCK_ID"]),
               "ACTIVE" => "Y",
               "NAME" => "%" . $arParams['FILTER_NAME_PROPERTY'] . "%"
          ),
          false,
          false,
          array(
               "ID",
               "NAME",
               "DETAIL_PAGE_URL",
          )
     );
     while($arFields = $res->GetNext())
     {
         $arResult[] = $arFields;
     }

     $this->IncludeComponentTemplate();
?>
