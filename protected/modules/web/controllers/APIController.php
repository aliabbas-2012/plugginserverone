<?php

class APIController extends Controller {

    public $cache_key;
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
        );
    }

    /**
     * cache settings
     * @return type
     */

    public function filters() {

        return array(
        );
    }

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

        $this->render('//default/index');
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
