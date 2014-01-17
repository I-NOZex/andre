<?php

/**
 * This is the model class for table "tshirt".
 *
 * The followings are the available columns in table 'tshirt':
 * @property integer $ID
 * @property string $Nome
 * @property string $Preco
 * @property string $DataEntrada
 *
 * The followings are the available model relations:
 * @property Imagemtshirt[] $imagemtshirts
 * @property Linhaencomenda[] $linhaencomendas
 */
class Tshirt extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tshirt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID, Nome, Preco, DataEntrada', 'required'),
			array('ID', 'numerical', 'integerOnly'=>true),
			array('Nome', 'length', 'max'=>50),
			array('Preco', 'length', 'max'=>19),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, Nome, Preco, DataEntrada', 'safe', 'on'=>'search'),
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
			'imagemtshirts' => array(self::HAS_MANY, 'Imagemtshirt', 'IDTShirt'),
			'linhaencomendas' => array(self::HAS_MANY, 'Linhaencomenda', 'IDTShirt'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'Nome' => 'Nome',
			'Preco' => 'Preco',
			'DataEntrada' => 'Data Entrada',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('Nome',$this->Nome,true);
		$criteria->compare('Preco',$this->Preco,true);
		$criteria->compare('DataEntrada',$this->DataEntrada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tshirt the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
