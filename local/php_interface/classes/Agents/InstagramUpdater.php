<?php
namespace WS\Agents;
use Bitrix\Main\Loader;
use CFile;
use CIBlockElement;
use WS\Helpers\Instagram;
use WS\Tools\BaseAgent;
use WS_PSettings;

class InstagramUpdater extends BaseAgent
{
    private $instPosts;
    private $ibCode = "instagram_content"; /** символьный код инфоблока постов Instagram */

    public function algorithm() {
        $this->initModules();
        $token = WS_PSettings::getFieldValue("INSTAGRAM_TOKEN"); /** токен Instagram API (берется из настроек проекта) */
        if (!empty($token)){
            $inst = new Instagram($token);
            if (WS_PSettings::getFieldValue("INSTAGRAM_NEWS_COUNT") > 0) {               /** - кол-во выбираемых записей из ленты Instagram (берется из настроек проекта) */
                $inst->count_post = WS_PSettings::getFieldValue("INSTAGRAM_NEWS_COUNT"); /** - кол-во выбираемых записей из ленты Instagram (берется из настроек проекта) */
            }else{
                $inst->count_post = 10;
            }
            $this->instPosts = $inst->getInstagramPosts();
            if ($this->instPosts["ERROR"] != "Y"){
                self::preparePictures();
            }
        }
        return [];
    }

    private function preparePictures()
    {
        foreach ($this->instPosts["data"] as &$post){
            $postArObj = CIBlockElement::GetList(
                array("ID" => "asc"),
                array(
                    "NAME" => $post["id"],
                    "IBLOCK_CODE" => $this->ibCode
                ),
                false,
                false,
                array("ID")
            );
            if(intval($postArObj->SelectedRowsCount()) == 0){
                if (!empty($post["thumbnail_url"])) {
                    $rawPic = CFile::MakeFileArray($post["thumbnail_url"]);
                }else{
                    $rawPic = CFile::MakeFileArray($post["media_url"]);
                }
                $arrProp = Array();
                $arrProp[$this->getPropertyId("PICTURE")] = Array("VALUE" => $rawPic );
                $arrProp[$this->getPropertyId("LINK")] = $post["permalink"];
                $fields = array(
                    "IBLOCK_SECTION_ID" => false,
                    "IBLOCK_ID"      => $this->getIblockId($this->ibCode),
                    "NAME"           => $post["id"],
                    "ACTIVE"         => "N",
                    "PROPERTY_VALUES"=> $arrProp,
                );
                $el = new CIBlockElement;
                if ($element = $el->Add($fields)) {

                    /** символьный код почтового события и ID сайта */

                    \CEvent::Send("NEW_INSTAGRAM_POST", "s1", array("ID" => $element));
                }
            }
        }
    }
    /**
     * @throws \Bitrix\Main\LoaderException
     */
    private function initModules()
    {
        Loader::includeModule("ws.projectsettings");
        Loader::includeModule("iblock");
    }

    private function getIblockId($code)
    {
        $ibObj = \CIBlock::GetList(
          array(
              "id" => "asc"
          ),
          array(
              "CODE" => $code
          )
        );
        if ($ibRes = $ibObj->GetNext()) {
            return $ibRes["ID"];
        }else{
            return false;
        }
    }

    private function getPropertyId($code)
    {
        $propObj = \CIBlockProperty::GetList(
            array(
                "id" => "asc"
            ),
            array(
                "CODE" => $code
            )
        );
        if ($propRes = $propObj->GetNext()) {
            return $propRes["ID"];
        }else{
            return false;
        }
    }
}