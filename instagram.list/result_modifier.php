<?php
foreach ($arResult['ITEMS'] as $k=>$arItem){
    // pics
    if(!empty($arItem['PROPERTIES']['FILE']["VALUE"])){
        $arrFile = CFile::ResizeImageGet($arItem['PROPERTIES']['FILE']["VALUE"], array('width' => 263, 'height' => 263), BX_RESIZE_IMAGE_EXACT);
        $arResult['ITEMS'][$k]['IMG'] = $arrFile['src'];
    }
}
