<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column2';
    public $page_key = '';

    /**
     * Register script/css files
     * @var array
     */
    public $cs;
    public $scriptMap = array();

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    public $_module;

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $basePath = "";

    /**
     *  menu html for code
     * @var type 
     */
    public $menuHtml = "";

    /**
     * PCM Widget array
     * @var type 
     */
    public $PcmWidget;

    /**
     *
     * @var Twitter
     */
    public $twitter;

    /**
     *
     * @var type 
     */
    public $webPcmWidget;
    public $lang_id;
    public $meta_keywords, $meta_description;

    public function beforeAction($action) {

        parent::beforeAction($action);

        $this->registerWidget();
        $this->basePath = Yii::app()->basePath;
        if (strstr($this->basePath, "protected")) {
            $this->basePath = realPath($this->basePath . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR);
        }



        if (get_class($this->getModule()) == "WebModule") {

            Yii::app()->theme = "frontend";
            $this->layout = "//layouts/column2";
            Yii::app()->language = 'en';
            if (isset($_GET['lang'])) {
                Yii::app()->language = $_GET['lang'];
            }

            $this->lang_id = Language::model()->getLanuageId(Yii::app()->language)->id;
        } else {
            
        }
        /**
         * install configurations
         */
        $this->installConfig();

        /**
         * Check if script is already loaded then not reload it.
         * This is used in case of ajax calls.
         */
        Yii::app()->clientScript->scriptMap = array(
            (YII_DEBUG ? 'jquery.js' : 'jquery.min.js') => false,
            'jquery.ba-bbq.js' => false
                //'jquery-ui.min.js' => false,
                //'jquery-ui.css' => false
        );

        return true;
    }

    /**
     * register widget
     * e.g gridview 
     */
    public function registerWidget() {
        Yii::app()->widgetFactory->widgets = array(
            'ItstGridView' => array(
                'cssFile' => Yii::app()->baseURL . '/css/gridview.css',
                'template' => '{items}{summary}{pager}<div class="clear"></div>',
                'pager' => array('cssFile' => Yii::app()->baseURL . '/css/pager.css'),
                'emptyText' => "No Record Found",
                'showTableOnEmpty' => false,
        ));
    }

    /**
     * handle client script to see 
     * no script will be loaded again 
     */
    public function handleClientScript() {
        Yii::app()->clientScript->scriptMap = array(
            (YII_DEBUG ? 'jquery.js' : 'jquery.min.js') => false,
            'jquery-ui.min.js' => false,
            'jquery-ui.css' => false
        );
        /* Script Maping: Load necessary scripts in scriptMap array */
        $this->scriptMap = array(
            'jquery.js' => Yii::app()->request->baseUrl . '/packages/jui/js/jquery.js',
            'jquery-ui.min.js' => Yii::app()->request->baseUrl . '/packages/jui/js/jquery-ui.min.js',
            'jquery-ui.css' => Yii::app()->request->baseUrl . '/packages/jui/css/base/jquery-ui.css',
        );
        $this->cs = Yii::app()->clientScript;
    }

    /**
     * To Save multiple child records in view mode
     * @param Obj $model
     * @param String $child_relation_name
     * @param String $parent_relation_name
     * @param String $scanario
     * @param INT $redirect_to_parent_id 
     *  In-case to redirect to specific id, or saving some child's child data and have to show view of parent
     */
    public function manageChild($model, $child_relation_name, $parent_relation_name, $scanario = "", $redirect_id = 0, $redirect_path = "") {
        /* Get exact classs name */
        $activeRelation = $model->getActiveRelation($child_relation_name);
        $className = $activeRelation->className;


        /* if that child is posted */
        if (isset($_POST[$className])) {
            /* create child object of above class */

            $cModel = new $className($scanario);


            /*  */
            $repRes = $cModel->saveMultiple($parent_relation_name, $model->primaryKey);


            if ($repRes['result'] == false)
                $model->$child_relation_name = $repRes['models'];
            else {
                $id = ($redirect_id == 0 ? $model->primaryKey : $redirect_id);
                if (!empty($redirect_path)) {
                    $this->redirect($redirect_path);
                } else {
                    $this->redirect(array('view', 'id' => $id, '#' => $child_relation_name));
                }
            }
        }
    }

    /**
     *  used for 
     *  handling top menues
     *  in controller
     * @return int 
     */
    public function getRootParent() {
        $model = Menu::model()->findByAttributes(array("controller" => $this->id, "is_assigned" => "Yes"));
        if (count($model) == 1) {
            return $model->root_parent;
        } else {
            return 0;
        }
    }

    /**
     * get the navigation 
     * list for top menu
     * @param type $pid
     * @param type $level
     * @param type $root_parent
     * @param type $pidArray 
     * @param type $action
     *      based on action to view  
     */
    public function getNavigation($pid = 0, $level = 0, $root_parent = 0, $pidArray = array(), $action = false) {

        $foundAny = false;
        $model = Menu::model()->findAllByAttributes(array("pid" => $pid, "is_assigned" => "Yes"));
        $l = $level;

        if (count($model) > 0) {
            if ($pid == 0) {
                $this->menuHtml .= '<ul id="nav">';
                $l = 1;
            } else {
                $this->menuHtml .='<ul class="' . ($level == 1 ? 'sub' : '') . '">';
                $l = 2;
            }
            $foundAny = false;
            foreach ($model as $menu) {

                $operation = ($level == 0) ? $menu->min_permission : $menu->min_permission;


                $childCount = Menu::model()->count("pid = $menu->id"); {
                    $foundAny = true;

                    $this->menuHtml .='<li ' . ($pid == 0 ? "class='top'" : "") . '>';
                    $url = "#";
                    if ($menu->controller != "") {
                        $url = $this->createUrl("/" . $menu->controller . "/" . $menu->action);
                    }
                    $this->menuHtml .='<a href="' . $url . '" class="' . ($pid == 0 ? "top_link " . ($menu->id == $root_parent ? "active " : "") . $menu->root_class : ($childCount > 0 ? "fly" : "")) . '">';
                    if ($pid == 0)
                        $this->menuHtml .='<span class="down">';
                    $this->menuHtml .=$menu->user_title;
                    if ($pid == 0)
                        $this->menuHtml .='</span>';
                    $this->menuHtml .='</a>';

                    if (in_array($menu->id, $pidArray))
                        $this->getNavigation($menu->id, $l, 0, $pidArray, true);
                    $this->menuHtml .='</li>';
                }
            }
        }
        if ($foundAny == false)
            $this->menuHtml .='<span class="noItemFound"></span>';
        $this->menuHtml .='</ul>';
    }

    /**
     * general mesg for sending 
     * email
     * @param type $email
     * @return boolean 
     */
    public function sendEmail2($email = array()) {
        if (isset($email['To'])) {

            $mailer = Yii::createComponent('application.extensions.mailer.EMailer');



            $mailer->FromName = (isset($email['FromName']) && !empty($email['FromName']) ? $email['FromName'] : Yii::app()->name); //Yii::app()->user->name;

            if (Yii::app()->params['smtp'] == 1) {
                $mailer->IsSMTP();

                $mailer->SMTPAuth = true;
                $mailer->SMTPSecure = Yii::app()->params['mailSecuity'];
                $mailer->SMTPDebug = 0;
                $mailer->Host = Yii::app()->params['mailHost'];
                $mailer->Port = Yii::app()->params['mailPort'];

                $mailer->Username = Yii::app()->params['mailUsername'];
                $mailer->Password = Yii::app()->params['mailPassword'];
            }

            $mailer->IsHTML(true);
            if (is_array($email['To'])) {
                foreach ($email['To'] as $to) {
                    $mailer->AddAddress($to);
                }
            } else {
                $mailer->AddAddress($email['To']);
            }

            $mailer->From = $email['From'];
            $mailer->Subject = $email['Subject'];
            $mailer->Body = $email['Body'];

            $headers = "From: " . $email['FromName'] . " <" . $email['From'] . ">\r\n";
            //$headers .= "Reply-To: " . $email['From'] . "\r\n";

            if (!empty($email['To'])) {
                //$headers .= 'Cc:' . $email['To'] . "\r\n";
            }

            $mailer->AddReplyTo($email['From'], $email['FromName']); // indicates ReplyTo headers
            //$mailer->addCustomHeader($headers);

            $mailer->WordWrap = 50;                                 // set word wrap to 50 characters
            //$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
            //$mailer->AddAttachment(Yii::app()->basePath . "/yiic.php");
            if (!empty($email['attachment']) && !empty($email['name']) && !empty($email['type'])) {
                $mailer->AddAttachment($email['attachment'], $email['name'], 'base64', $email['type']);
            }

            if (!$mailer->Send()) {
                
            }

            $mailer->ClearAddresses();
            //$mailer->ClearCustomHeaders();
        }
        return true;
    }

    /**
     * 
     * @param type $route
     * @param type $params
     * @param type $ampersand
     * @return My own simple Url redirctor
     */
    public function createDTUrl($route, $params = array(), $ampersand = '&') {
        if ($route === '')
            $route = $this->getId() . '/' . $this->getAction()->getId();
        elseif (strpos($route, '/') === false)
            $route = $this->getId() . '/' . $route;
        if ($route[0] !== '/' && ($module = $this->getModule()) !== null)
            $route = $module->getId() . '/' . $route;
        return Yii::app()->createUrl(trim($route, '/'), $params, $ampersand);
    }

    /*
     * $pageName is the page whose feeds you want to get
     * @other variables are the setting variables
     * 
     */

    public function getTwitterInstance($oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret) {


        /** Set access tokens here - see: https://dev.twitter.com/apps/ * */
        $settings = array(
            'oauth_access_token' => $oauth_access_token,
            'oauth_access_token_secret' => $oauth_access_token_secret,
            'consumer_key' => $consumer_key,
            'consumer_secret' => $consumer_secret
        );

        /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ * */
        $this->twitter = new TwitterAPIExchange($settings);
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
            return "Call the method getTwitterInstance() of the controller to instantiate twitter ";
        }
    }

    /*
     * DT dumper for development only just pass the variable...
     */

    public function dtdump($var) {
        return CVarDumper::dump($var, 10, TRUE);
    }

    /*
     * Install configurations
     * for soical application
     */

    public function installConfig() {

        $criteria = new CDbCriteria();

        $selected = array("dateformat", "smtp", "slider_time");
        //$criteria->addInCondition("param", $selected);

        $criteria->select = "param,value";

        $conf = ConfMisc::model()->findAll($criteria);

        if (!empty($conf)) {
            foreach ($conf as $data) {
                Yii::app()->params[$data->param] = $data->value;
            }
        }
    }

    public function createUrl($route, $params = array(), $ampersand = '&') {
        if (get_class($this->getModule()) == "WebModule" && !isset($params['lang'])) {
            $params['lang'] = Yii::app()->language;
        } else {
            $params['admin'] = 1;
        }
        return parent::createUrl($route, $params, $ampersand);
    }

    /**
     * Split a string into groups of words with a line no longer than $max
     * characters.
     *
     * @param string $string
     * @param integer $max
     * @return array
     * */
    public function split_words($string, $max = 1) {
        $words = preg_split('/\s/', $string);
        $lines = array();
        $line = '';

        foreach ($words as $k => $word) {
            $length = strlen($line . ' ' . $word);
            if ($length <= $max) {
                $line .= ' ' . $word;
            } else if ($length > $max) {
                if (!empty($line))
                    $lines[] = trim($line);
                $line = $word;
            } else {
                $lines[] = trim($line) . ' ' . $word;
                $line = ' ';
            }
        }
        $lines[] = ($line = trim($line)) ? $line : $word;

        return $lines;
    }

    /**
     * set Meta information
     */
    public function setMetaInformation() {

        if (!empty($this->page_key)) {
            $critera = new CDbCriteria();
            $critera->addCondition("t.key = :key AND lang_id = :lang_id");
            $critera->params = array(
                "key" => $this->page_key,
                "lang_id" => $this->lang_id,
            );
            if ($seo = Seo::model()->find($critera)) {

                $this->pageTitle = $seo->title;
                $this->meta_keywords = $seo->keywords;
                $this->meta_description = $seo->description;
            }
        }
    }

}
