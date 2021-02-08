<?php

namespace c0rz\InstagramPHP;

use c0rz\InstagramPHP\userAgent;

class Instagram
{
    private $UserAgent;
    private $ig_did;
    private $csrftoken;
    private $mid;

    public function __construct()
    {
        $UA = new userAgent();
        $this->UserAgent = $UA->generate();
    }

    public function curl($url, $useragent, $post = null, $headers = null, $proxy = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if ($proxy) {
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
        }
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        if ($headers !== null) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if ($post !== null) curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        $header = substr($result, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $body = substr($result, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
        $cookies = array();
        foreach ($matches[1] as $item) {
            parse_str($item, $cookie);
            $cookies = array_merge($cookies, $cookie);
        }
        return array(
            $header,
            $body,
            $cookies
        );
    }

    public function infoData()
    {
        return
            [
                'Accept: */*',
                'Accept-Language: en-US,en;q=0.5',
                'Accept-Encoding: gzip, deflate, br',
                'X-Instagram-AJAX: cc6f59f85f33',
                'X-IG-App-ID: 936619743392459',
                'X-IG-WWW-Claim: 0',
                'Content-Type: application/x-www-form-urlencoded',
                'X-Requested-With: XMLHttpRequest',
                'Origin: https://www.instagram.com',
                'Connection: keep-alive',
                'Referer: https://www.instagram.com/accounts/emailsignup/',
                'Pragma: no-cache',
                'Cache-Control: no-cache',
            ];
    }

    public function generateHeader($proxy = null)
    {
        $url = 'https://www.instagram.com/data/shared_data/?__a=1';
        $cURL = $this->curl($url, $this->UserAgent);
        return $cURL;
    }
}
