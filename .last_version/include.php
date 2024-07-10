<?php
use Bitrix\Main;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

$module_id = "itscript.pnp";

$defaultOptions = Option::getDefaults($module_id);

define("ITSCRIPT_PNP_MODULE_ID", $module_id);
define("ITSCRIPT_PNP_CONFIG_DEBUG", Option::get('ITSCRIPT_PNP_CONFIG_DEBUG', $defaultOptions['ITSCRIPT_PUSH_AND_PULL_CONFIG_DEBUG']));

Loader::includeModule("pull");

Loader::registerAutoLoadClasses(null, [
    'Itscript\PushAndPull\Service\PushAndPullShema' => "/local/modules/{$module_id}/lib/Service/PushAndPullShema.php",
    'Itscript\PushAndPull\Helpers\Util' => "/local/modules/{$module_id}/lib/Helpers/Util.php"
]);