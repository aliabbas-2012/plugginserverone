<?php

class DefaultController extends Controller {

    /**
     * for mem cache
     * @var type
     */
    public $cache_key, $_slug;

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'foreColor' => 0x454545,
                'height' => 40,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * cache settings
     * @return type
     */

//    public function filters() {
//
//        return array(
//            array(
//                'DTOutputCache -quranReader',
//                'duration' => Yii::app()->params['cacheTime'],
//                'varyByRoute' => true,
//                'is_cached_allowd' => true,
//           ),
//        );
//    }

    /**
     * redirect site to for having www  lazmi
     * @param type $action
     * @return type
     */
    public function beforeAction($action) {

        return parent::beforeAction($action);
    }

    /**
     * home page
     */
    public function actionIndex() {
        $this->layout = "//layouts/frontend";
        
        /*$criteria_news = new CDbCriteria();
        $criteria_news->order = "user_order asc";
        $criteria_news->limit = 3;
        $criteria_news->condition = "type =:type";
        $criteria_news->params = array('type' => 'Updates');


        $this->cache_key = "default-index";*/
        //SeoMeta::model()->configureSeoFields("index", $this);

        //SeoOpenGraph::model()->configureSeoOpenGraphFields("index", $this);

        $this->render('//default/index');
    }

    public function actionNewsEvents($slug = "") {
        $this->layout = "//layouts/frontend";

        //set only when u want to cache those pages
        //$this->cache_key = "default-news-events";
        $this->render('//default/index', array(
            "news" => NewsEvents::model()->findAll(array('order' => 'user_order asc')),
            "reviews" => Reviews::model()->findAll(array('order' => 'user_order asc')),
        ));
    }

    /**
     * load home again
     */
    public function actionLoadHome() {
        $criteria = new CDbCriteria();
        $criteria->limit = 2;
        $categories = Category::model()->findAll($criteria);
        $count = 0;
        $json = array();
        foreach ($categories as $cat):
            if ($count == 0) {
                $json ['apps'] = $this->renderPartial("//default/_apps", array("cat" => $cat));
            } else if ($count == 1) {
                $json ['books'] = $this->renderPartial("//default/_ebooks", array("cat" => $cat));
            }
            $count++;
        endforeach;

        echo CJSON::encode($json);
    }

    /**
     * load slider
     */
    public function actionLoadSlider($slug = "") {

        $cat = Yii::app()->db->createCommand()
                ->select('id')
                ->from("category")
                ->where("LOWER(name) ='" . strtolower($slug) . "'")
                ->queryRow();


        $cat_id = $cat['id'];

        //slider content
        $sliders = ProductSlider::model()->findAll();
        $slider_content = $this->renderPartial('//default/_slider', array("sliders" => $sliders));

        //product content
        $criteria = new CDbCriteria();
        $criteria->select = "name";
        $category = Category::model()->findByPk($cat_id, $criteria);
        $products = Product::model()->getCategoryData($cat_id);
        $product_content = $this->renderPartial("//product/_products", array(
            "dataProvider" => $products['dataProvider'],
            "data" => $products['data'],
            "category" => $category,
            "slug" => $slug
                )
        );

        $json_data = array("slider" => $slider_content, "product_content" => $product_content);


        echo CJSON::encode($json_data);
    }

    /**
     * load Only booksd
     */
    public function actionEbooks($slug = "") {

        $slug_arr = explode("_", $slug);
        $cat_id = $slug_arr[count($slug_arr) - 1];

        //slider content
        //product content
        $criteria = new CDbCriteria();
        $criteria->select = "name";
        $category = Category::model()->findByPk($cat_id, $criteria);
        $products = Product::model()->getCategoryData($cat_id);

        $product_content = $this->renderPartial("//product/_products", array(
            "dataProvider" => $products['dataProvider'],
            "data" => $products['data'],
            "category" => $category,
            "slug" => $slug
                )
        );

        $json_data = array("product_content" => $product_content);


        echo CJSON::encode($json_data);
    }

    /**
     *  contact us page
     */
    public function actionContactUs() {
        $this->layout = "//layouts/frontend";
        SeoMeta::model()->configureSeoFields("contact-us", $this);
        SeoOpenGraph::model()->configureSeoOpenGraphFields("contact-us", $this);
        $model = new ContactFeedback();
        if (isset($_POST['ContactFeedback'])) {
            $model->attributes = $_POST['ContactFeedback'];
            if ($model->save()) {

                $email['To'] = Yii::app()->params['adminEmail'];
                $email['FromName'] = $model->name;
                $email['From'] = $model->email;
                $email['Subject'] = $model->subject . ' From Mr/Mrs: ' . $model->name;
                $email['Body'] = $model->body;
                $email['Body'] = $this->renderPartial('//common/_email_template', array('email' => $email));
                //die($email['Body']);
                $this->sendEmail2($email);

                Yii::app()->user->setFlash('contact', 'Thank you ! for your feedback ');
                $this->redirect($this->createUrl("/web/default/contactUs"));
            }
        }
        $this->render('//default/contactus', array("slug" => "", "model" => $model));
    }

    public function actionNotification() {
        $this->layout = "//layouts/frontend";
        $model = new NotificationModel;

        //set only when u want to cache those pages
        // $this->cache_key = "default-notification";
        if (isset($_POST['NotificationModel'])) {

            $model->attributes = $_POST['NotificationModel'];
            if ($model->validate()) {
                $email['To'] = Yii::app()->params['infoEmail'];

                $email['From'] = $model->email;
                $email['Subject'] = 'Darussalam Publishers Notification';
                $email['FromName'] = Yii::app()->name;
                $email['Body'] = $this->renderPartial('//common/_email_template', array('email' => $email));
                $this->sendEmail2($email);
                $email['To'] = $model->email;

                $email['From'] = Yii::app()->params['infoEmail'];
                $email['Subject'] = 'Darussalam Publishers Notification';
                $email['FromName'] = Yii::app()->name;
                $email['Body'] = $this->renderPartial('//common/_email_template', array('email' => $email));
                $this->sendEmail2($email);
                Yii::app()->user->setFlash('Notified', 'Thank you ! for your subscribing  ');
            }
        }
        $this->renderPartial('//layouts/_notification_box', array("model" => $model));
    }

    /*
     * Action for about us page
     * to render aboutus page
     *
     */

    public function actionAboutUs($target = "") {
        $this->layout = "//layouts/frontend";
        //SeoMeta::model()->configureSeoFields("about-us", $this);
        //SeoOpenGraph::model()->configureSeoOpenGraphFields("about-us", $this);
        $this->render('//default/about_us');
    }

    /*
     * Action for about us page
     * to render aboutus page
     *
     */

    public function actionIslamicGadgets($target = "") {

        $this->render('//default/underconstruction', array("target" => $target));
    }

    /*
     * Action for PrivacyPolicy page
     * to render PrivacyPolicy page
     *
     */

    public function actionPrivacyPolicy() {
        $this->layout = "//layouts/frontend";
        $this->render('//default/privacyPolicy');
    }

    /*
     * Action for CopyrightPolicy page
     * to render CopyrightPolicy page
     *
     */

    public function actionCopyrightPolicy() {
        SeoMeta::model()->configureSeoFields("copyright", $this);
        SeoOpenGraph::model()->configureSeoOpenGraphFields("copyright", $this);
        $this->render('//default/copyrightPolicy');
    }

    /*
     * Action for RefundPolicy page
     * to render RefundPolicy page
     *
     */

    public function actionRefundPolicy() {
        SeoMeta::model()->configureSeoFields("refund-policy", $this);
        SeoOpenGraph::model()->configureSeoOpenGraphFields("refund-policy", $this);
        $this->render('//default/refundPolicy');
    }

    /*
     * Action for Idea page
     * to render Idea page
     *
     */

    public function actionIdeas() {
        throw new CHttpException(404, 'The requested page does not exist.');
        $this->layout = "//layouts/frontend";
        $model = new Ideas();
        if (isset($_POST['Ideas'])) {
            $file = CUploadedFile::getInstance($model, 'wireframe');
            $model->wireframe = $file;
            $model->attributes = $_POST['Ideas'];
            if ($model->validate()) {

                /*                 * ***************attachment system **************** */
                $email['attachment'] = $file->tempName;
                $email['name'] = $file->name;
                $email['type'] = $file->type;
                /*                 * ***************attachment system  close**************** */

                $email['To'] = Yii::app()->params['dtechHR'];
                $email['FromName'] = $model->email;
                $email['From'] = $model->email;
                $email['Subject'] = $model->idea_name . 'From Mr/Mrs: ' . $model->email;

                $email['email'] = $model->email;
                $email['idea_column2type'] = $model->idea_for;
                $email['idea_name'] = $model->idea_name;
                $email['utility'] = $model->utility;
                $email['features'] = $model->features;
                $email['usp'] = $model->usp;
                $email['objective'] = $model->objective;
                $email['similar_products'] = $model->similar_products;
                $email['description'] = $model->description;

                $email['Body'] = $this->renderPartial('//common/_idea_template', array('email' => $email));
//                die($email['Body']);

                $this->sendEmail2($email);
                Yii::app()->user->setFlash('idea', 'Thank you ! for your precious idea');
                $this->redirect($this->createUrl("/web/default/ideas"));
            }
        }
        $this->render('//default/ideas', array("slug" => "", "model" => $model));
    }

    /*
     * Action for Idea page
     * to render Idea page
     *
     */

    public function actionJobs() {
        throw new CHttpException(404, 'The requested page does not exist.');
        $this->layout = "//layouts/frontend";
        $model = new Jobs();
        if (isset($_POST['Jobs'])) {
            $file = CUploadedFile::getInstance($model, 'cv_file');
            $model->cv_file = $file;
            $model->attributes = $_POST['Jobs'];


            if ($model->validate()) {
                /*                 * ***************attachment system **************** */
                $email['attachment'] = $file->tempName;
                $email['name'] = $file->name;
                $email['type'] = $file->type;
                /*                 * ***************attachment system  close**************** */

                $email['To'] = Yii::app()->params['dtechHR'];
                $email['FromName'] = "Job Application";
                $email['From'] = Yii::app()->params['defaultFrom'];
                $email['Subject'] = 'Job Application ';



                $email['Body'] = 'Application for Job';

                $email['Body'] = $this->renderPartial('//common/_job_template', array('email' => $email));


                $this->sendEmail2($email);
                Yii::app()->user->setFlash('jobs', 'Thank you ! We will contact you soon');
                $this->redirect($this->createUrl("/web/default/jobs"));
            }
        }
        $this->render('//default/jobs', array("slug" => "", "model" => $model));
    }

    /**
     * Loading Apps Page
     *
     *
     */
    public function actionApps() {
        $this->layout = "//layouts/frontend";
        $this->render('//default/apps');
    }

    /**
     * Loading Located Page
     *
     *
     */
    public function actionLocated() {
        $this->render("//default/located");
    }

    public function actionGallery() {
        $this->render("//default/gallery");
    }

    public function actionRamzanPackage() {
        SeoMeta::model()->configureSeoFields("ramadan-kareem", $this);
        SeoOpenGraph::model()->configureSeoOpenGraphFields("ramadan-kareem", $this);
        $this->render("//default/ramzan_package");
    }

    public function actionCatalouge() {
        $this->render("//default/catalouge");
    }

    public function actionFaq() {
        throw new CHttpException(404, 'The requested page does not exist.');
        $this->render("//default/faq");
    }

    public function actionQuranReader() {
        SeoMeta::model()->configureSeoFields("quranreader", $this);
        SeoOpenGraph::model()->configureSeoOpenGraphFields("quranreader", $this);
        $this->render("//default/quranreader");
    }

    /**
     * test action for fb app
     */
    public function actionFbApp() {
        $this->render("//default/fbapp");
    }

    public function actionKids() {
        //set only when u want to cache those pages
//        $this->cache_key = "default-kids";
        SeoMeta::model()->configureSeoFields("kids", $this);
        SeoOpenGraph::model()->configureSeoOpenGraphFields("kids", $this);
        $criteria = new CDbCriteria();
        $criteria->select = "id,image,alt,title,link,tags";
        $config = array(
            'pagination' => array('pageSize' => 30),
            'criteria' => $criteria
        );
        $provider = new CActiveDataProvider("ConfKids", $config);

        $this->render("//default/kids", array("data" => $provider->getData()), false, true);
    }

    public function actionUnderConstruction() {
        // $this->layout = "//layouts/column2";
        $this->render("//default/underconstruction");
    }

    public function actionDivision() {
        SeoMeta::model()->configureSeoFields("division", $this);
        SeoOpenGraph::model()->configureSeoOpenGraphFields("division", $this);
        $this->render("//default/division", array(), false, true);
    }

    public function actionCareer() {
        throw new CHttpException(404, 'The requested page does not exist.');
        $model = new Jobs();
        if (isset($_POST['Jobs'])) {


            $file = CUploadedFile::getInstance($model, 'cv_file');
            $model->cv_file = $file;
            $model->attributes = $_POST['Jobs'];


            if ($model->validate()) {
                /*                 * ***************attachment system **************** */
                $email['attachment'] = $file->tempName;
                $email['name'] = $file->name;
                $email['type'] = $file->type;
                /*                 * ***************attachment    system  close**************** */

                $email['To'] = Yii::app()->params['dtechHR'];
                $email['FromName'] = "Job Application";
                $email['From'] = Yii::app()->params['defaultFrom'];
                $email['Subject'] = 'Job Application';



                $email['Body'] = 'Application for Job';

                $email['Body'] = $this->renderPartial('//common/_job_template', array('email' => $email));


                $this->sendEmail2($email);

                Yii::app()->user->setFlash('jobs', 'Thank you ! We will contact you soon');

                $this->redirect($this->createUrl("/web/default/career"));
            }
        }
        $this->render("//default/career", array("slug" => "", "model" => $model));
    }

    /**
     * get Face book page
     * feeds
     */
    public function actionGetFacebookFeeds() {
        //set only when u want to cache those pages
        $this->cache_key = "default-getFacebookFeeds";
        $data_cache = Yii::app()->cache->get($this->cache_key . "_partial");

        if ($data_cache === false) {
            $feeds = array();
            $json_res = Yii::app()->curl
                    ->setOption(CURLOPT_HTTPHEADER, array('Content-type: application/json'))
                    ->post("https://www.facebook.com/feeds/page.php?id=175377742595349&format=json", array());
            $json_arr = CJSON::decode($json_res);
            if (!empty($json_arr['entries'])) {
                $feeds = array_slice($json_arr['entries'], 0, 5);
            }

            Yii::app()->cache->set($this->cache_key . "_partial", $feeds, Yii::app()->params['cacheTime']);
        } else {

            $feeds = $data_cache;
        }



        $this->renderPartial("//default/_facebook_feeds", array("feeds" => $feeds));
    }

    /**
     * render Social Feeds
     */
    public function actionSocialFeeds() {
        $thirdParty = new ThirdParty("twitter");
        $data = $thirdParty->getTwitterPageFeeds('DarussalamSNS', 10);
        $this->renderPartial("//common/_twitter_feeds", array("data" => $data));
    }

    /**
     * render Google Feeds
     */
    public function actionGoogleFeeds() {
        $key = 'AIzaSyAsTkMGPGIuSHILCFlf7G_AbNUJQqB6Y2s';
        $id = '106173933592983959516';

        $feed = CJSON::decode(@file_get_contents('https://www.googleapis.com/plus/v1/people/' . $id . '/activities/public?key=' . $key));
        $this->renderPartial("//common/_google_feeds", array("feed" => $feed));
    }

    /**
     * DB: magazine
     * Author : YH
     */

    public function actionMagazine() {
         /**
         * Overide meta tags
         */
        $this->description = 'ZIA E HADITH is a literary magazine focused towards betterment of society covering every social, economic and political aspect.';
        $this->keywords = 'darussalam, darussalam publishers, zia e hadith, zia e hadith darussalam, zia e hadith darussalam publishers, darussalam islamic magazine';
        /**
         * Overide open graph meta tags
         */
        $this->og_title = 'Zia e Hadith - A Litrary Islamic magazine by Darussalam';
        $this->og_description = 'ZIA E HADITH is a literary magazine focused towards betterment of society covering every social, economic and political aspect.';
        $this->og_image =  Yii::app()->baseUrl . "/uploads/Seo_Opengraph/Zia-e-Hadith.jpg";

        $this->pageTitle = 'Zia e Hadith - A Litrary Islamic magazine by Darussalam';
        $this->render("//default/magazine");
    }
    /**
     *
     * @param type $view
     * @param type $data
     * @param type $return
     * @param type $cache
     *

     * handling caching for pages
     * extending  or render

     */
    public function renderCustom($view, $data = null, $return = false, $cache = false) {

        if ($cache == true && !empty($this->cache_key)) {
            $render = Yii::app()->cache->get($this->cache_key);
            if ($render === false) {
                Yii::app()->cache->set($this->cache_key, parent::render($view, $data, true), Yii::app()->params['cacheTime']);
                parent::render($view, $data, $return);
            } else {
                echo $render;
            }
        } else {
            parent::render($view, $data, $return);
        }
    }

    /**
     *
     * @param type $view
     * @param type $data
     * @param type $cache
     * @param type $return
     * @param type $processOutput
     * handling caching for pages
     * extending renderPartial or render
     */
    public function renderPartialCustom($view, $data = null, $cache = false, $return = false, $processOutput = false) {

        if ($cache == true && !empty($this->cache_key)) {
            $data_cache = Yii::app()->cache->get($this->cache_key . "_partial");

            if ($data_cache === false) {
                Yii::app()->cache->set($this->cache_key . "_partial", $data_cache, Yii::app()->params['cacheTime']);

                $this->renderPartial($view, $data);
            } else {

                $this->renderPartial($view, $data_cache);
            }
        } else {

            $this->renderPartial($view, $data);
        }
    }

}
