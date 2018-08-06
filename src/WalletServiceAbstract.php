<?php

namespace NickHotbrain\WalletApi;


class WalletServiceAbstract implements WalletServiceInterface
{
    protected $token = null;

    public function setToken($token)
    {
        $this->token = $token;
    }
}