<?php

/**
 * This is the model class for table "num_guru".
 *
 * The followings are the available columns in table 'num_guru':
 * @property string $id
 * @property string $guruName
 * @property string $guruPhoto
 * @property string $guruDescription
 * @property string $guruCity
 * @property string $guruCountry
 */
class Guru extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'num_guru';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('guruName, guruPhoto, guruCity, guruCountry', 'length', 'max'=>20),
			array('guruDescription', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guruName, guruPhoto, guruDescription, guruCity, guruCountry', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'guruName' => 'Guru Name',
			'guruPhoto' => 'Guru Photo',
			'guruDescription' => 'Guru Description',
			'guruCity' => 'Guru City',
			'guruCountry' => 'Guru Country',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('guruName',$this->guruName,true);
		$criteria->compare('guruPhoto',$this->guruPhoto,true);
		$criteria->compare('guruDescription',$this->guruDescription,true);
		$criteria->compare('guruCity',$this->guruCity,true);
		$criteria->compare('guruCountry',$this->guruCountry,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Guru the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
