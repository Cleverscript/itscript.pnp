<?php

namespace Itscript\Pnp\Service;

class PushAndPullShema
{
    public static function OnGetDependentModule(): array
    {
        return [
            'MODULE_ID' => ITSCRIPT_PNP_MODULE_ID,
            'USE' => ["PUBLIC_SECTION"]
        ];
    }

    public static function addByUser(string $mid, int $uid, string $cmd, array $params = []): bool
    {
        return \Bitrix\Pull\Event::add(1, Array(
            'module_id' => $mid,
            'command' => $cmd,
            'params' => $params,

        ));

        /*return \CPullStack::AddByUser($uid, [
            'module_id' => $mid,
            'command' => $cmd,
            'params' => $params,
        ]);*/
    }

    public static function addShared(string $mid, string $cmd, array $params = []): bool
    {
        return \CPullStack::AddShared([
            'module_id' => $mid,
            'command' => $cmd,
            'params' => $params,
        ]);
    }

    // Send only mobile
    public static function addQueue(string $mid, int $uid, string $mess, string $tag, string $subTag): bool
    {
        return (new \CPushManager)->AddQueue([
            'USER_ID' => $uid,
            'MESSAGE' => $mess,
            'TAG' => $tag,
            'SUB_TAG' => $subTag
        ]);
    }

    public static function paramsPrepare(?string $json): array
    {
        $result = [];

        $json = str_replace(["\r", "\n", "'"], ["", "", '"'], $json);

        $result = empty($json)? [] : json_decode($json, true);

        return $result;
    }
}