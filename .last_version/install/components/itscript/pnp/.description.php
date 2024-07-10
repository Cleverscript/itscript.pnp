<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("T_PNP"),
	"DESCRIPTION" => GetMessage("T_PNP_DESC"),
	"ICON" => "/images/news_list.gif",
	"SORT" => 1,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "Itscript",
		"CHILD" => array(
			"ID" => "pnp",
			"NAME" => GetMessage("T_QUESTION"),
			"SORT" => 10,
			"CHILD" => array(
				"ID" => "pnp_cmpx",
			),
		),
	),
);