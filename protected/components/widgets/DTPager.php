<?php

/**
 * class will be used to persist ajax based url
 * or server side on the base of parameters
 */
class DTPager extends CLinkPager {

    public $ajax = false;
    public $jsMethod = "";
    public $cssFile = true;
    public $customHeader;

    public function run() {


        $this->nextPageLabel = Yii::t('yii', 'Next');

        $this->prevPageLabel = Yii::t('yii', 'Previous');

        $this->firstPageLabel = Yii::t('yii', 'First');

        $this->lastPageLabel = Yii::t('yii', 'Last');


        $this->header = Yii::t('yii', $this->customHeader);

        $this->registerClientScript();
        $buttons = $this->createPageButtons();
        if (empty($buttons))
            return;
        
        echo CHtml::tag('ul', $this->htmlOptions, $this->header.implode("\n", $buttons));
        echo $this->footer;
        

        if ($this->cssFile != false) {

            $cs = Yii::app()->clientScript;
            //$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/pagination.css');
        }
    }

    /**
     * only in case when u have to append extra param
     * @var type 
     */
    public $append_param;

    public function createPageButton($label, $page, $class, $hidden, $selected) {
        if ($this->ajax == true) {
            if ($hidden || $selected) {
                $class.=' ' . ($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
            }
            $htmlOptions = array();
            if ($this->jsMethod != "") {
                $htmlOptions = array("onclick" => $this->jsMethod);
            }
            $pageUrl = $this->createPageUrl($page);
            /**
             * extra param will be append
             */
            if (!empty($this->append_param)) {
                $this->append_param = utf8_decode($this->append_param);
                if (strstr($pageUrl, "?")) {
                    $pageUrl.= "&" . $this->append_param;
                } else {
                    $pageUrl.= "?" . $this->append_param;
                }
            }

            return '<li class="' . $class . '" pagenumber="' . $page . '">' . CHtml::link($label, $pageUrl, $htmlOptions) . '</li>';
        } else {
            return parent::createPageButton($label, $page, $class, $hidden, $selected);
        }
    }

}

/**
 * usage of the above widgets in view as follo
 * 
 * 
 */
/**
 * pagination
 */
//$this->widget('DTPager', array(
//    'pages' => $dataProvider->pagination,
//    'ajax'=>true,
//    'append_param'=> (!empty($_REQUEST['serach_field']))?"serach_field=".$_REQUEST['serach_field']:"",
//    'jsMethod' =>'dtech.updatePaginationFilter(this);return false;',
//   )
//);
?>
