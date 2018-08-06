<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.08.2018
 * Time: 12:07
 */

namespace NickHotbrain\WalletApi\Services;


class WalletServiceAbstract implements WalletServiceInterface
{
    protected $token = null;

    public function setToken($token)
    {
        $this->token = $token;
    }
}