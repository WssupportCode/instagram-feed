<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
foreach ($arResult['ITEMS'] as $k=>$arItem){
    if(!empty($arItem['PROPERTIES']['FILE']["VALUE"])){

        /** При необходимости параметры ресайза можно изменить */

        $arrFile = CFile::ResizeImageGet($arItem['PROPERTIES']['FILE']["VALUE"], array('width' => 263, 'height' => 263), BX_RESIZE_IMAGE_EXACT);

        $arResult['ITEMS'][$k]['IMG'] = $arrFile['src'];
    }
}

$arResult["INSTAGRAM_PROFILE"] = WS_PSettings::getFieldValue("INSTAGRAM_PROFILE");