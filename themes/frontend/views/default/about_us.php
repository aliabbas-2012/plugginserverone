<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/about_us.css"); ?>
<section id="about">
    <article>
        <div class="about_img">
            <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/mosque_img_03.png"); ?>

        </div>
        <div class="about_content">
            <h1>About Us</h1>
            <h2>Introduction:</h2>
            <p>Darussalam is an International Islamic Publishing House, headquartered in Riyadh, Kingdom of Saudi Arabia, and branches and agents in major cities around the world. Mr. Abdul Malik Mujahid established Darussalam in 1986. This International Organization has achieved a lot of success within the last two decades and is renowned across the Muslim world and beyond in the field of Islamic publishing. This success is attributed to the efforts of more than 250 research scholars, experts and workers of the institution. This institution is known for the propagation of the Quran and Sunnah. Darussalam considers it a priority to maintain international publishing standards in terms of quality and content.</p>
            <div class="about_border">
            </div>
        </div>
        <div class="about_content">
            <h2>Founder:</h2>
            <p>Mr. Abdul Malik Mujahid was born in the village of Kailiyanwala (District Gujranwala) in 1955. He received early education there and then his family moved to Hafiz Abad. He completed his matric from Hafiz Abad, and received further religious education from Dar ul Hadees Muhammadiyya. Then he immigrated to Saudi Arabia and has been living there for the past 30 years. He did not stop enlightening himself and continued to pursue religious understanding.</p>
            <div class="about_hidden">
                <p> He received knowledge of Ahadith from Fazal Ilahi, brother of Ehsan Ilahi Zaheer. He also gained knowledge of English and Arabic language. Mr. Mujahid is a calligrapher by profession. He worked in the calligraphy department of Defense Ministry of Saudi Arabia before resigning and laying the foundation of Darussalam.</p>
            </div>
            <div class="about_border">
            </div>
        </div>
        <div class="clickable_img">
            <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/clickable_img_03.jpg"), '', array('down_image' => 'as')); ?>
        </div>
    </article>
</section>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.about_hidden').hide();

        jQuery('.clickable_img img').css("-moz-transform", "rotate(-180deg)");
        jQuery(".clickable_img").click(function() {
            if (jQuery('.about_hidden').is(":visible") == false)
            {
                jQuery('.clickable_img img').css("-moz-transform", "rotate(-360deg)");
            }
            else {
                jQuery('.clickable_img img').css("-moz-transform", "rotate(-180deg)");
            }
            jQuery('.about_hidden').slideToggle('slow');
        })
    })
</script>