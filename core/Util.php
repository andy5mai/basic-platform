<?php

namespace core;

class Util
{
    public static function implode()
    {
        $arr = func_get_args();
        $separator = array_shift($arr);
        return implode($separator, $arr);
    }
    
    public static function post($_url, $data, $isReturnTransfer, $ssl_verifypeer, $cookie = 'cookie.txt')
    {
        error_log(__FILE__.' post data is '.json_encode($data));
        
        $_ch = curl_init();
        curl_setopt($_ch, CURLOPT_URL, $_url);
        curl_setopt($_ch, CURLOPT_POST, true);
        curl_setopt($_ch, CURLOPT_POSTFIELDS, $data);
//        curl_setopt($_ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($_ch, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($_ch, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($_ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($_ch, CURLOPT_RETURNTRANSFER, $isReturnTransfer);
//        curl_setopt($_ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($_ch
                    , CURLOPT_USERAGENT
                    , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/13.0.782.220 Safari/535.1');
        curl_setopt($_ch, CURLOPT_SSL_VERIFYPEER, $ssl_verifypeer);
//        curl_setopt($_ch, CURLOPT_CAINFO, 'dartXLand.cer');
	$_result = curl_exec($_ch);
//        error_log("errorno ".curl_errno($_ch));
	error_log("info ".json_encode(curl_getinfo( $_ch )));
	curl_close($_ch);
        
        return $_result;
    }
}