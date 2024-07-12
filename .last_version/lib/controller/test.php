<?php
namespace Itscript\Pnp\Controller;

use Bitrix\Main\Error;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\ActionFilter\Csrf;
use Bitrix\Main\Engine\ActionFilter\Authentication;
use Bitrix\Main\Engine\ActionFilter\HttpMethod;
use Bitrix\Main\Engine\CurrentUser;
use Itscript\Pnp\Util;
use Itscript\Pnp\Service\PushAndPullShema;

Loader::includeModule('itscript.pnp');

class Test extends Controller
{
    public function configureActions(): array
    {
        return [
            'shared' => [
                'prefilters' => [
                    new Csrf(),
                    new HttpMethod([HttpMethod::METHOD_POST]),
                    new Authentication(),
                ],
            ],
            'addbyuser' => [
                'prefilters' => [
                    new Csrf(),
                    new HttpMethod([HttpMethod::METHOD_POST]),
                    new Authentication(),
                ],
            ],
            'queue' => [
                'prefilters' => [
                    new Csrf(),
                    new HttpMethod([HttpMethod::METHOD_POST]),
                    new Authentication(),
                ],
            ],
        ];
    }

	public function sharedAction(string $mid, string $cmd, ?string $params): bool
	{
		return PushAndPullShema::addShared($mid, $cmd, PushAndPullShema::paramsPrepare($params));
	}

    public function addbyuserAction(string $mid, int $uid, string $cmd, ?string $params): bool
    {
        return PushAndPullShema::AddByUser($mid, $uid, $cmd, PushAndPullShema::paramsPrepare($params));
    }

    // only mobile
    public function queueAction(string $mid, int $uid, string $mess, string $tag, string $subTag): bool
    {
        return PushAndPullShema::addQueue($mid, $uid, $mess, $tag, $subTag);
    }
}