<?php
class Instagram
{
    public function curl($url, $post, $headers)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        /* Socks/Proxy
        curl_setopt($ch, CURLOPT_PROXY, "50.118.142.62:21246");
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, "suciandr:cnv0b99tan");
        */
        curl_setopt($ch, CURLOPT_POST, 1);
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
}
