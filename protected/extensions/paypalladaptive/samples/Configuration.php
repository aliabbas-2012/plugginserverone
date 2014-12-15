<?php

class Configuration {

    // For a full list of configuration parameters refer in wiki page (https://github.com/paypal/sdk-core-php/wiki/Configuring-the-SDK)
    public static function getConfig() {
        $config = array(
            // values: 'sandbox' for testing
            //		   'live' for production
            "mode" => "sandbox"

                // These values are defaulted in SDK. If you want to override default values, uncomment it and add your value.
                // "http.ConnectionTimeOut" => "5000",
                // "http.Retry" => "2",
        );
        return $config;
    }

    // Creates a configuration array containing credentials and other required configuration parameters.
    public static function getAcctAndConfig() {
        $config = array(
            // Signature Credential
            "acct1.UserName" => "jb-us-seller_api1.paypal.com",
            "acct1.Password" => "WX4WTU3S8MY44S7F",
            "acct1.Signature" => "AFcWxV21C7fd0v3bYYYRCpSSRl31A7yDhhsPUU2XhtMoZXsWHFxu-RWy",
            "acct1.AppId" => "APP-80W284485P519543T",
            //brian id 
            "acct1.UserName" => "info-facilitator_api1.thepuzzzle.com",
            "acct1.Password" => "1378983481",
            "acct1.Signature" => "An5ns1Kso7MWUdW4ErQKJJJ4qi4-ACD8NLSILqiVIZ6C-6ntynTTzDIY",
//            "acct1.AppId" => "APP-80W284485P519543T",
//            "acct1.AppId" => "Af0gmxAPZPPNrMbqc_UghqHoZPirQJUhW4YyRKZrsLn-IOScLCk6FgSamC2",
//            "client_id" => "Af0gmxAPZPPNrMbqc_UghqHoZPirQJUhW4YyRKZrsLn-IOScLCk6FgSamC2",
//            "secret" => "ENAe6xD7SaSSIKameILGIu7zLsEvvIP8ipULP867euBeZGuJ-R2B3VM3TSp3",
//            
            //ali id 
            "acct1.UserName" => "itsgeniusstar-facilitator_api1.gmail.com",
            "acct1.Password" => "1396287298",
            "acct1.Signature" => "AFcWxV21C7fd0v3bYYYRCpSSRl31A.F1pMwuuKk-terTLTRLXghbYDGD",
            "acct1.AppId" => "APP-80W284485P519543T",
            "acct1.CertPath" => "cert_key.pem",
//            
                // Sample Certificate Credential
                // "acct1.UserName" => "certuser_biz_api1.paypal.com",
                // "acct1.Password" => "D6JNKKULHN3G5B8A",
                // Certificate path relative to config folder or absolute path in file system
                // "acct1.CertPath" => "cert_key.pem",
                // "acct1.AppId" => "APP-80W284485P519543T"
        );

        return array_merge($config, self::getConfig());
        ;
    }

}