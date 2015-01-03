<div class="row-fluid">


    <div class="span9">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => '<span class="icon-tag"></span>' . $model->name . " Pluggins",
            'titleCssClass' => ''
        ));
        ?>
        <?php
        $this->breadcrumbs = array(
            $model->name . " Pluggins",
        );
        ?>
        <div class="clear"></div>

        <?php
        $criteria = new CDbCriteria;
        $criteria->compare("plateform_id", $model->id);
        $dataProvider = new CActiveDataProvider('Pluggin', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'tour-grid',
            'dataProvider' => $dataProvider,
            'htmlOptions' => array(
                'class' => 'table-responsive'
            ),
            'itemsCssClass' => 'table table-striped table-bordered table-hover',
            'columns' => array(
                'name',
                'meta_title',
            ),
        ));
        ?>


        <?php $this->endWidget(); ?>

    </div>
</div>    