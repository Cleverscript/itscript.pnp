<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Engine\CurrentUser;
use Bitrix\Main\UI\Extension;
use Itscript\Pnp\Service\PushAndPullShema;
use Itscript\Pnp\Helpers\Util;

Loader::includeModule('itscript.pnp');

class PushAndPull extends CBitrixComponent
{
	public function onPrepareComponentParams($arParams) 
    {
		$result = [
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => isset($arParams["CACHE_TIME"])? $arParams["CACHE_TIME"]: 36000000,
        ];

        $result = $result+$arParams;

		return $result;
	}

    public function getTemplateNameDefault()
	{
		if ($name = $this->getTemplateName()) {
			return $name;
        } 

        return '.default';
	}

	public function executeComponent() 
    {
        try {
            Asset::getInstance()->addCss($this->GetPath() . '/templates/' . $this->getTemplateNameDefault() . '/style.css');
            Asset::getInstance()->addJs($this->GetPath().'/templates/'. $this->getTemplateNameDefault() . '/js/script.js');
            Extension::load('pull.client');

            if ($this->startResultCache(false, [($this->arParams["CACHE_GROUPS"]==="N"? false: CurrentUser::get()->getUserGroups())])) {

            }

            // Include template
            $this->includeComponentTemplate();
            
        } catch (\Throwable $e) {
            print $e->getMessage();
        }
	}
}