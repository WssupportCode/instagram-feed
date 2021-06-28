<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1623393785_infrastruktura_dlya_lenty_instagram extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Name of scenario
     **/
    static public function name() {
        return "инфраструктура для ленты Instagram";
    }

    /**
     * Priority of scenario
     **/
    static public function priority() {
        return self::PRIORITY_HIGH;
    }

    /**
     * @return string hash
     */
    static public function hash() {
        return "43cf3a48b38be6da3436336e16c71e6bc22aaeee";
    }

    /**
     * @return int approximately time in seconds
     */
    static public function approximatelyTime() {
        return 0;
    }

    /**
     * Write action by apply scenario. Use method `setData` for save need rollback data
     **/
    public function commit() {
        global $DB;
        CModule::IncludeModule("ws.projectsettings");
        CModule::IncludeModule("iblock");
        $ib = new CIBlock;

        $ibType = ""; /** Необходимо указать тип инфоблока */
        $siteId = ""; /** Необходимо указать SITE_ID */

        $arAccess = [
            "2" => "R",
        ];
        $arFields = [
            "ACTIVE" => "Y",
            "NAME" => "Лента Instagram",
            "CODE" => "instagram",
            "IBLOCK_TYPE_ID" => $ibType,
            "SITE_ID" => $siteId,
            "SORT" => "5",
            "GROUP_ID" => $arAccess,
            'LIST_MODE' => 'C',
            "FIELDS" => [
                "DETAIL_PICTURE" => [
                    "IS_REQUIRED" => "N",
                    "DEFAULT_VALUE" => [],
                ],
                "PREVIEW_PICTURE" => [
                    "IS_REQUIRED" => "N",
                    "DEFAULT_VALUE" => [],
                ],
                "CODE" => [
                    "IS_REQUIRED" => "N",
                    "DEFAULT_VALUE" => [
                        "TRANSLITERATION" => "Y",
                        "TRANS_SPACE" => "-",
                        "TRANS_CASE" => "L",
                    ],
                ],
            ],

            "VERSION" => 1,

            "ELEMENT_NAME" => "Блок",
            "ELEMENTS_NAME" => "Блоки",
            "ELEMENT_EDIT" => "Изменить блок",
            "ELEMENT_DELETE" => "Удалить блок",
        ];
        $DB->StartTransaction();

        $ID = $ib->Add($arFields);

        if(!$ID)
        {
            $DB->Rollback();
            echo 'Error: '.$ib->LAST_ERROR.'<br>';
        }
        else {
            $DB->Commit();
        }
        $arFields = Array(
            "NAME" => "Пост",
            "ACTIVE" => "Y",
            "SORT" => "100",
            "CODE" => "FILE",
            "PROPERTY_TYPE" => "F",
            "IBLOCK_ID" => $ID
        );

        $ibp = new CIBlockProperty;
        $PropID = $ibp->Add($arFields);

        $arFields = Array(
            "NAME" => "Ссылка на страницу поста",
            "ACTIVE" => "Y",
            "SORT" => "100",
            "CODE" => "URL",
            "PROPERTY_TYPE" => "S",
            "IBLOCK_ID" => $ID
        );

        $PropID = $ibp->Add($arFields);

        $this->setData(["ID" => $ID]);
        WS_PSettings::getFieldValue("INSTAGRAM_TOKEN");
        WS_PSettings::setupField([
            'label' => 'ИБ Instagram',
            'name' => 'IB_INSTAGRAM',
            'type' => 'iblock',
            'value' => $ID,
        ]);
        WS_PSettings::setupField([
            'label' => 'Токен Instagram',
            'name' => 'INSTAGRAM_TOKEN',
            'type' => 'string',
            'value' => "",
        ]);
        WS_PSettings::setupField([
            'label' => 'Кол-во новостей для выборки Instagram',
            'name' => 'INSTAGRAM_NEWS_COUNT',
            'type' => 'number',
            'value' => "",
        ]);
        // my code
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data
     **/
    public function rollback() {
        // my code
        CModule::IncludeModule("ws.projectsettings");
        CModule::IncludeModule("iblock");
        $data = $this->getData();
        CIBlock::Delete($data["ID"]);
        WS_PSettings::clearField('IB_INSTAGRAM');
        WS_PSettings::clearField('INSTAGRAM_TOKEN');
        WS_PSettings::clearField('INSTAGRAM_NEWS_COUNT');
    }
}