<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThirdParty
 *
 * @author Hamza
 */
class ThirdParty {

    //put your code here

    public $facebook;
    public $twitter;
    public $gplus;

    public function __construct($partyname = "") {
        if ($partyname == "Twitter" || $partyname == "twitter") {

            $this->twitter = $this->getTwitterInstance();
        } else if ($partyname == "Facebook" || $partyname == "facebook") {

            $this->facebook = $this->getFacebookInstance();
            
        }
    }

    /*
     * @settings is the array with all the access token in it
     * Demo array is as follow:
     *  $settings = array(
     * 'oauth_access_token' => "",
     * 'oauth_access_token_secret' => "",
     * 'consumer_key' => "",
     * 'consumer_secret' => ""
     * );
     * 
     * 
     */

    private function getTwitterInstance() {

        Yii::import("ext.*");
        return new TwitterAPIExchange(array(
            'oauth_access_token' => "365362488-KcU9deL9e016J1U0ouGPyAw9Ew0kf7Zsf5DXhpcb",
            'oauth_access_token_secret' => "8gxWtz0ZNblWVrP5cdT9f5PiNHa6rRChkgfoI28GfuSPq",
            'consumer_key' => "OXyWFoDTKRxG4SuZIuyv5A",
            'consumer_secret' => "LJHxDQjP7Ayp8rkNiYol3CtJP0MsM81K4MeDZlVc"
        ));




    
    }

    /*
     * @settings is the array with all the access token in it
     * Demo array is as follow:
     *  $settings = array(
     * 'oauth_access_token' => "",
     * 'oauth_access_token_secret' => "",
     * 'consumer_key' => "",
     * 'consumer_secret' => ""
     * );
     * 
     * 
     */

    private function getFacebookInstance() {
        Yii::import("application.extensions.facebook.*");
        
       
        return new Facebook(array(
            'appId' => '395003540638224',
            'secret' => 'ea988ca3a01f1f344c0e006ee6b39108',
        ));
        
    }

    /**
     * 
     * @param type $pageName is the name of page on twitter
     * @param type $amountOffeeds is for how many number of feeds you acquire
     * @return type is the data of feeds
     */
    public function getTwitterPageFeeds($pageName, $amountOffeeds) {

        if (!empty($this->twitter)) {
            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?q=' . $pageName . '&since_id=&max_id=&result_type=mixed&count=' . $amountOffeeds;
            $requestMethod = 'GET';
            $data = json_decode($this->twitter->setGetfield($getfield)
                            ->buildOauth($url, $requestMethod)
                            ->performRequest(), true);

            return $data;
        } else {
            return "Call the Constructor of this class to instantiate twitter ";
        }
    }

    public function getFacebookPageStats($urllist) {
//        https://graph.facebook.com/fql?q=SELECT%20url,%20normalized_url,%20share_count,%20like_count,%20comment_count,%20total_count,%20commentsbox_count,%20comments_fbid,%20click_count%20FROM%20link_stat%20WHERE%20url%20IN%28%27http://mysite.com/8/the-dali-lama-returns%27,%27http://mysite.com/9/the-dali-lama-returns%27%29

        $url = "http://api.facebook.com/restserver.php?method=links.getStats&urls=";

        foreach ($urllist as $ur)
            $fields = $fields . $ur['url'] . ',';

//         $fields=   'http://facebook.com/darussalam.sns ,
//            //
//            //
//            //
//            //
//            //http://bussongs.com/songs/the-banana-boat-dayo.php,http://bussongs.com/songs/im-a-little-teapot.php,http://bussongs.com/songs/your-are-my-sunshine.php,http://bussongs.com/songs/head-shoulders-knees-and-toes.php,http://bussongs.com/songs/hot-cross-buns.php";
        //open connection
        $url = $url . $fields;


        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);



        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
//    print_r($result);
        $arr = simplexml_load_string($result);
        $arr = json_decode(json_encode($arr), true);


        return $arr;
    }

}

?>
