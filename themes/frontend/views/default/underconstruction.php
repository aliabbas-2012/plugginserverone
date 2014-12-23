

<style>

    body { background:url(images/page-not-found-bg.jpg) repeat; padding: 0; margin: 0; }

    .page_not_found { width:70%; padding-top: 200px; margin: 0 auto; padding-left: 10px; padding-right: 10px; }

    .left_found { float:left; width:40%; text-align:right; }

    .right_found { float:left; width:40%; margin-left:20px; }

    .right_found p { padding-top: 55px; margin: 0; color:#4d4d4d; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:29px; line-height:auto; }

    .right_found h1 { margin: 0; color:#2f368f; font-family:Arial, Helvetica, sans-serif; font-size:78px; line-height:60px; }

    .right_found article { margin: 0; color:#2f368f; font-family:Arial, Helvetica, sans-serif; font-size:39px; font-weight:bold; line-height:auto; }

    .right_found section { margin: 0; color:#999999; font-family:Arial, Helvetica, sans-serif; font-size:23px; line-height:auto; }

    .right_found a img { margin-left:110px; margin-top:5px; }

    @media (max-width: 538px) {
		
		.page_not_found { width:90%; }

        .left_found { float:none; width:100%; text-align:center; }

        .right_found { float:none; width:100%; text-align:center; }

    }

</style>

<div class="page_not_found">
    <div class="left_found">
        <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/under-sonstruction-img_03.png"); ?> 
    </div>
    <div class="right_found">
        <p>This page is</p>
        <h1>Under</h1>
        <article>Construction</article>
        <section>Please come back later</section>
        <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/go-back-construction_03.jpg"), Yii::app()->homeUrl,array("data-ajax"=>"false")); ?> 
    </div>
</div>
