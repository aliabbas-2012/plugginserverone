<?php
//loading css and js files for own pages
$cs = Yii::app()->clientScript;

$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/about.css');
?>
<div class="about_us_part">
    <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="location-content col-lg-12">
                <h2>Offices/Branches</h2>
                <p>Darussalam’s head office is located in Riyadh, Saudi Arabia. There are four Darussalam’s showrooms in Riyadh at Olaya, Malaz, Suwailam and Suwaidi. Other than nine cities of Saudi Arabia, the distribution network of Darussalam is spread in approximately twenty eight countries. These main countries include the UAE, Kuwait, UK, USA, France, Australia, Malaysia, Singapore, Sri Lanka, India and South Africa.</br>In Pakistan their showrooms are located in Lahore, Karachi and Islamabad. The main showroom is in Lahore and Pakistan’s head office of Darussalam is located at 36 Lower Mall. More than a hundred institutes sell Darussalam books across Pakistan.</p>
                <div class="border-bottom-p"></div>
             	<h2>Head Office (Riyadh)</h2>
              	<p>P.O. Box: 22743, Riyadh 11416 K.S.A.</p>
             	<div class="border-bottom-p"></div>
                <div class="border-bottom-p" style="min-height:365px;">
                    <div class="col-lg-6 country-border list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Saudi-Arabia.png" /> <a href="http://www.darussalamksa.com" target="_blank">Saudi Arabia</a></h2>
                        <ul>
                            <li>Riyadh
                                <ul>
                                    <li>Olaya Branch</li>
                                    <li>Malaz Branch</li>
                                    <li>Suwailam Branch</li>
                                    <li>Suwadi Branch</li>
                                </ul>
                            </li>
                            <li>Jeddah</li>
                            <li>Makkah</li>
                            <li>Madinah</li>
                            <li>Al-Khobar</li>
                            <li>Khamis Mushayt</li>
                            <li>Yanbu Al-Bahr</li>
                            <li>Al-Buraida</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Pakistan.png" /> <a href="http://www.darussalampk.com" target="_blank">Pakistan</a></h2>
                        <ul>
                            <li>36 B Lower Mall, Lahore</li>
                            <li>Gulberg, Lahore</li>
                            <li>PECO Road, Lahore</li>
                            <li>Rahman Market, Ghazni Street Urdu Bazar, Lahore </li>
                            <li>Z-110, 111 (D.C.H.S) Main Tariq Road. Opposite to Free Port Shopping Mall Karachi</li>
                            <li>Shawaiz Center, F-8 Markaz, Islamabad</li>
                        </ul>
                    </div>
                </div>
                <div class="border-bottom-p" style="min-height:147px;">
                    <div class="col-lg-6 country-border list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/United-Kingdom.png" /> <a href="http://www.darussalam.com" target="_blank">U.K</a></h2>
                        <ul>
                            <li>Darussalam International Publications Ltd, Leyton Business Centre, Unit-17, Etloe Road, Leyton, London</li>
                            <li>Darussalam International Publications Ltd, Regents Park Mosque, 146 Park Road, London</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Canada.png" /> Canada</h2>
                        <ul>
                            <li>Nasser Khattab 2-3415 Dixie Rd, Unit # 505, Mississauga, Ontario</li>
                            <li>Islamic Book Service, 2200 South Sheridan way, Mississauga, Ontario</li>
                        </ul>
                    </div>
                </div>
                <div class="border-bottom-p" style="min-height:107px;">
                    <div class="col-lg-6 country-border list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/United-States-of-America.png" /> <a href="http://www.dar-us-salam.com" target="_blank">U.S.A</a></h2>
                        <ul>
                            <li>Darussalam, Houston</li>
                            <li>Darussalam, 486 Atlantic Ave, Brooklyn, New York</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/South-Africa.png" /> South Africa</h2>
                        <ul>
                            <li>Islamic Da'wah Movement (IDM), 48009 Qualbert 4078, Durban, South Africa</li>
                        </ul>
                    </div>
              	</div>
                <div class="border-bottom-p" style="min-height:86px;">
                    <div class="col-lg-6 country-border list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Kuwait.png" /> Kuwait</h2>
                        <ul>
                            <li>Kuwait, Islam Presentation Committee Enlightment, Safat 13017 Kuwait</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 list-property">
                    	<h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/France.png" /> France</h2>
                        <ul>
                            <li>Editions &amp; Librarie Essalam, 135, Bd de Ménilmontant, 75011 Paris</li>
                        </ul>
                    </div>
             	</div>
                <div class="border-bottom-p" style="min-height:87px;">
                    <div class="col-lg-6 country-border list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/United-Arab-Emirates.png" /> U.A.E</h2>
                        <ul>
                            <li>Darussalam, Sharjah U.A.E</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Australia.png" /> Australia</h2>
                        <ul>
                            <li>Darussalam, 153 Haldon St, Lakemba (Sydney)</li>
                        </ul>
                    </div>
             	</div>
                <div class="border-bottom-p" style="min-height:107px;">
                    <div class="col-lg-6 country-border list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Malaysia.png" /> Malaysia</h2>
                        <ul>
                            <li>Darussalam Int'l Publishing &amp; Distribution SDN BHD, D-1-12, Setiawangsa 11, Taman Setiawangsa 54200, Kuala, Lumpur</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Singapore.png" /> Singapore</h2>
                        <ul>
                            <li>Muslims Converts Association of Singapore, 32 Onan Road, The Galaxy, Singapore</li>
                        </ul>
                    </div>
             	</div>
                <div class="border-bottom-p we-located-end" style="min-height:115px;">
                    <div class="col-lg-6 country-border list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/India.png" /> India</h2>
                        <ul>
                            <li>Islamic Books International, 54, Tandel Street (North) Dongri, Mumbai</li>
                            <li>31/5, Musvee Plaza, Triplicane High Road, Triplicane, Chennai Tamil Nadu</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 list-property">
                        <h2><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/Sri-Lanka.png" /> Sri Lanka</h2>
                        <ul>
                            <li>Darul Kitab 6, Nimal Road, Colombo-4</li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.col-lg-9 -->
        </div><!-- /.row -->
    </div>

</div>