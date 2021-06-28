<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php'); ?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "instagram.list",                                           /** Базовый шаблон для вывода изображений из Instagram */
    Array(
        "ACTIVE" => "Y",
        "ACTIVE_DATE_FORMAT" => "d M",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "86400",
        "CACHE_TYPE" => "A",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "N",
        "FIELD_CODE" => array(),
        "IBLOCK_ID" => WS_PSettings::getFieldValue("IB_INSTAGRAM"), /** ID инфоблока Instagram (берется из настроек проекта) */
        "IBLOCK_TYPE" => "content",
        "NEWS_COUNT" => "10",                                                   /** Кол-во выводимых записей */
        "PROPERTY_CODE" => array("FILE", "URL"),
        "SORT_BY1" => "NAME",
        "SORT_BY2" => "ID",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "DESC",
        "STRICT_SECTION_CHECK" => "N",
        "IMAGE_HEIGHT" => 100,                                                  /** Ширина и высота */
        "IMAGE_WIDTH" => 100,                                                   /** изображения     */
        "SHOW_PROFILE_LINK" => "Y",                                             /** Вывод ссылки на профиль Instagram */
    )
);
?>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>