<div style="width:90%; background:#EBEBEB; padding:30px; font-family:Arial, Helvetica, sans-serif; margin:0 auto;">
    <a href="<?php echo Yii::app()->request->hostInfo . Yii::app()->baseUrl ?>" style="text-align:center; display:block;">

        <?php
        echo CHtml::image(Yii::app()->request->hostInfo . Yii::app()->baseUrl . "/images/email/pluginserver_email.png", '', array('width' => '75', 'height' => '106'))
        ?>
    </a>

    <center>
        <h1 style="text-align:center; font-size:14px; color:#089AD4; 
            color:#089AD4;">One of the Best Plugins providers
        </h1>
    </center>

    <h2 style="background: white;"><?php echo $email['Subject'] ?></h2>
    <p style="color:#575757; font-size:13px;">
        <?php
        echo $email['Body'];
        ?>
    </p>

    <p style="color:#575757; font-size:13px;">In case of any query, please let us know.</p><br />
    <span style="color:#575757; font-size:13px; font-weight:bold;">Plugins Provider</span><br />
    <span style="color:#575757; font-size:13px;">Address Plugin Server Office</span><br />
    <span style="color:#575757; font-size:13px;">Ph: +12345678</span><br />
    <span style="color:#575757; font-size:13px;">Fax: +12345678</span><br />
    <span style="color:#575757; font-size:13px;">
        <a href="<?php echo Yii::app()->request->hostInfo . Yii::app()->baseUrl ?>" style="color:#39F;">
            <?php echo Yii::app()->request->hostInfo . Yii::app()->baseUrl; ?>
        </a>
    </span><br />
    <span style="color:#575757; font-size:13px;">

        <?php
        echo CHtml::mailto("pluginserver2014@gmail.com", "pluginserver2014@gmail.com");
        ?>
    </span>
</div>