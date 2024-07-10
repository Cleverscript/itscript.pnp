<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

Loader::includeModule('itscript.pnp');

$arModules = \Itscript\Pnp\Helpers\Util::getModules();

$arComponentParameters = [
	"GROUPS" => [],
	"PARAMETERS" => [
		"AJAX_MODE" => [],

        "PNP_MODULE_ID" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("PNP_MODULE_ID"),
            "TYPE" => "LIST",
            "DEFAULT" => ITSCRIPT_PNP_MODULE_ID,
            "VALUES" => $arModules,
            "ADDITIONAL_VALUES" => "Y",
        ],
		
		"PNP_USER_ID" => [
			"PARENT" => "BASE",
			"NAME" => GetMessage("PNP_USER_ID"),
			"TYPE" => "STRING",
			"REFRESH" => "Y",
			"DEFAULT" => 1
		],

        "PNP_CMD" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("PNP_CMD"),
            "TYPE" => "STRING",
            "REFRESH" => "Y",
            "DEFAULT" => "check"
        ],

		"PNP_TAG" => [
			"PARENT" => "BASE",
			"NAME" => GetMessage("PNP_TAG"),
			"TYPE" => "STRING",
			"REFRESH" => "Y",
			"DEFAULT" => "IM_MESS_1"
		],
	
		"PNP_TAG_SUB" => [
			"PARENT" => "BASE",
			"NAME" => GetMessage("PNP_TAG_SUB"),
			"TYPE" => "STRING",
			"REFRESH" => "Y",
			"DEFAULT" => "IM_MESS"
		],

        "PNP_MESSAGE" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("PNP_MESSAGE"),
            "TYPE" => "STRING",
            "REFRESH" => "Y",
            "DEFAULT" => "test"
        ],

		"CACHE_TIME"  =>  ["DEFAULT"=>36000000],
		"CACHE_GROUPS" => [
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("CP_BP_CACHE_GROUPS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		],
	],
];