<?php

/**
 * This is the model class for table "encomenda".
 *
 * The followings are the available columns in table 'encomenda':
 * @property integer $IDEncomenda
 * @property string $IDCliente
 * @property string $Data
 * @property string $Total
 * @property string $NumVisa
 * @property string $Endereco
 * @property integer $Entregue
 *
 * The followings are the available model relations:
 * @property Profile $iDCliente
 * @property Linhaencomenda[] $linhaencomendas
 */
class Encomenda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'encomenda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDEncomenda, IDCliente, Data, Total, NumVisa, Endereco', 'required'),
			array('IDEncomenda, Entregue', 'numerical', 'integerOnly'=>true),
			array('IDCliente', 'length', 'max'=>10),
			array('Total', 'length', 'max'=>19),
			array('NumVisa', 'length', 'max'=>16),
			array('Endereco', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDEncomenda, IDCliente, Data, Total, NumVisa, Endereco, Entregue', 'safe', 'on'=>'search'),
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
			'iDCliente' => array(self::BELONGS_TO, 'YumProfile', 'IDCliente'),
			'linhaencomendas' => array(self::HAS_MANY, 'Linhaencomenda', 'IDEncomenda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDEncomenda' => 'Idencomenda',
			'IDCliente' => 'Idcliente',
			'Data' => 'Data',
			'Total' => 'Total',
			'NumVisa' => 'Num Visa',
			'Endereco' => 'Endereco',
			'Entregue' => 'Entregue',
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

		$criteria->compare('IDEncomenda',$this->IDEncomenda);
		$criteria->compare('IDCliente',$this->IDCliente,true);
		$criteria->compare('Data',$this->Data,true);
		$criteria->compare('Total',$this->Total,true);
		$criteria->compare('NumVisa',$this->NumVisa,true);
		$criteria->compare('Endereco',$this->Endereco,true);
		$criteria->compare('Entregue',$this->Entregue);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Encomenda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
