<?php
namespace Itscript\Pnp\Helpers;

use Bitrix\Main;
use Bitrix\Main\Config\Option;

IncludeModuleLangFile(__FILE__);

class Util
{
    const MODULE_ID = "itscript.pnp";


    public static function getModules(): array
    {
        $result = [];

        $connection = \Bitrix\Main\Application::getConnection();
        $res = $connection->query("SELECT `ID` FROM `b_module`");

        while($row = $res->fetch()) {
            $result[$row['ID']] = $row['ID'];
        }

        return $result;
    }


    /**
     * Function print var
     * @param $value
     */
    public static function debug($value)
    {
        echo "<br/><pre style='padding:10px; border:1px solid #DDD; background-color:#EEE; text-color:#000; font-family:Verdana; font-size:13px;'>";

        switch (gettype($value)) {
            case 'integer':
            case 'double':
            case 'string':
            case 'array':
                print_r($value);
                break;
            default:
                var_dump($value);
                break;
        }

        echo "</pre><br/>";
    }

	public static function writeSysLog($auditTypeId, $itemId, $description, $severity = 'DEBUG')
    {
		\CEventLog::Add([
			"SEVERITY" => $severity,
			"AUDIT_TYPE_ID" => $auditTypeId,
			"MODULE_ID" => self::MODULE_ID,
			"ITEM_ID" => $itemId,
			"DESCRIPTION" => $description,
		]);
	}

}