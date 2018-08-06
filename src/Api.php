<?php

namespace NickHotbrain\WalletApi;

use GuzzleHttp\Client;

class Api extends WalletServiceAbstract implements WalletServiceInterface
{
    protected $client = null;
    protected $token = null;
    protected $requestMethod = null;
    protected $requestUrl = null;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getBalance($walletId)
    {
        $url = 'https://edge.qiwi.com/funding-sources/v2/persons/' . $walletId . '/accounts';
        $result = $this->client->request('GET', $url, ['Accept' => 'application/json', 'Authorization' => 'Bearer ' . $this->token]);
        dd($result);
    }

    public function getProfileUser()
    {
        $this->requestMethod = 'GET';
        $this->requestUrl = 'https://edge.qiwi.com/person-profile/v1/profile/current';
        $result = $this->process();
        return $result;
    }

    public function getBalanceList($walletNumber)
    {
        $this->requestMethod = 'GET';
        $this->requestUrl = 'https://edge.qiwi.com/funding-sources/v2/persons/' . $walletNumber.'/accounts';
        $result = $this->processRequest();
        return $result;
    }

    public function process() {
        $options = ['headers' => [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->token
        ]];

        $result = $this->client->request($this->requestMethod, $this->requestUrl, $options);
        return $result;
    }
}