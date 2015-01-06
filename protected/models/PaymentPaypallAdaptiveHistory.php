<?php

/**
 * This is the model class for table "payment_paypall_adaptive_history".
 *
 * The followings are the available columns in table 'payment_paypall_adaptive_history':
 * @property string $id
 * @property string $paypall_adaptive_id
 * @property string $buyer_status
 * @property string $seller_status
 * @property double $amount
 * @property double $extra_amount
 * @property double $start_transfer_puzzzle
 * @property double $puzzzle_commission
 * @property double $puzzzle_admin_status
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property PaymentPaypallAdaptive $paypallAdaptive
 */
class PaymentPaypallAdaptiveHistory extends DTActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'payment_paypall_adaptive_history';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('paypall_adaptive_id, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('amount, extra_amount, start_transfer_puzzzle, puzzzle_commission', 'numerical'),
            array('paypall_adaptive_id, create_user_id, update_user_id', 'length', 'max' => 11),
            array('buyer_status, seller_status', 'length', 'max' => 9),
            array('puzzzle_admin_status', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, paypall_adaptive_id, buyer_status, seller_status, amount, extra_amount, start_transfer_puzzzle, puzzzle_commission, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'paypallAdaptive' => array(self::BELONGS_TO, 'PaymentPaypallAdaptive', 'paypall_adaptive_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'paypall_adaptive_id' => 'Paypall Adaptive',
            'buyer_status' => 'Buyer Status',
            'seller_status' => 'Seller Status',
            'amount' => 'Amount',
            'extra_amount' => 'Extra Amount',
            'start_transfer_puzzzle' => 'Start Transfer Puzzzle',
            'puzzzle_commission' => 'Puzzzle Commission',
            'puzzzle_admin_status' => 'Puzzzle Admin Status',
            'create_time' => 'Create Time',
            'create_user_id' => 'Create User',
            'update_time' => 'Update Time',
            'update_user_id' => 'Update User',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('paypall_adaptive_id', $this->paypall_adaptive_id, true);
        $criteria->compare('buyer_status', $this->buyer_status, true);
        $criteria->compare('seller_status', $this->seller_status, true);
        $criteria->compare('amount', $this->amount);
        $criteria->compare('extra_amount', $this->extra_amount);
        $criteria->compare('start_transfer_puzzzle', $this->start_transfer_puzzzle);
        $criteria->compare('puzzzle_commission', $this->puzzzle_commission);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PaymentPaypallAdaptiveHistory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
