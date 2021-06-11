<? use Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?if(!empty($arResult["ITEMS"])):?>
    <a href="https://www.instagram.com/<?=str_replace("@", "", WS_PSettings::getFieldValue("INSTAGRAM_PROFILE"))?>/?hl=ru" target="_blank" rel="nofollow">
        <?=WS_PSettings::getFieldValue("INSTAGRAM_PROFILE")?>
    </a>
    <div class="insta-list">
        <ul class="insta-list__list">
            <?foreach($arResult["ITEMS"] as $i=>$arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <li class="insta-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="insta-list__in">
                        <a rel="nofollow" class="insta-list__link" href="<?=$arItem['PROPERTIES']['URL']["VALUE"]?>" target="_blank">
                            <img src="<?=$arItem["IMG"]?>"/>
                        </a>
                    </div>
                </li>
            <?endforeach;?>
        </ul>
    </div>
<?endif;?>