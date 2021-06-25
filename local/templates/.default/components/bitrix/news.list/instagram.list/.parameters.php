<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"DISPLAY_DATE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_NAME" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_NAME"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PICTURE" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_PREVIEW_TEXT" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"DISPLAY_LIST_PAGE_URL" => Array(
		"NAME" => GetMessage("T_IBLOCK_DESC_NEWS_LIST_PAGE_URL"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"IMAGE_HEIGHT" => Array(
		"NAME" => GetMessage("IMAGE_HEIGHT"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"IMAGE_WIDTH" => Array(
		"NAME" => GetMessage("IMAGE_WIDTH"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
	"SHOW_PROFILE_LINK" => Array(
		"NAME" => GetMessage("SHOW_PROFILE_LINK"),
		"TYPE" => "STRING",
		"DEFAULT" => "",
	),
);
?>
