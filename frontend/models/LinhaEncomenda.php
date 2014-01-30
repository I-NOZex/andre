<?php

/**
 * This is the model class for table "linhaencomenda".
 *
 * The followings are the available columns in table 'linhaencomenda':
 * @property integer $IDLinhaEncomenda
 * @property integer $IDEncomenda
 * @property integer $IDTShirt
 * @property integer $Quantidade
 * @property string $Tamanho
 * @property string $PrecoUn
 *
 * The followings are the available model relations:
 * @property Encomenda $iDEncomenda
 * @property Tshirt $iDTShirt
 */
class LinhaEncomenda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'linhaencomenda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IDLinhaEncomenda, IDEncomenda, IDTShirt, Quantidade, Tamanho, PrecoUn', 'required'),
			array('IDLinhaEncomenda, IDEncomenda, IDTShirt, Quantidade', 'numerical', 'integerOnly'=>true),
			array('Tamanho', 'length', 'max'=>2),
			array('PrecoUn', 'length', 'max'=>19),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDLinhaEncomenda, IDEncomenda, IDTShirt, Quantidade, Tamanho, PrecoUn', 'safe', 'on'=>'search'),
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
			'iDEncomenda' => array(self::BELONGS_TO, 'Encomenda', 'IDEncomenda'),
			'iDTShirt' => array(self::BELONGS_TO, 'Tshirt', 'IDTShirt'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDLinhaEncomenda' => 'Idlinha Encomenda',
			'IDEncomenda' => 'Idencomenda',
			'IDTShirt' => 'Idtshirt',
			'Quantidade' => 'Quantidade',
			'Tamanho' => 'Tamanho',
			'PrecoUn' => 'Preco Un',
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

		$criteria->compare('IDLinhaEncomenda',$this->IDLinhaEncomenda);
		$criteria->compare('IDEncomenda',$this->IDEncomenda);
		$criteria->compare('IDTShirt',$this->IDTShirt);
		$criteria->compare('Quantidade',$this->Quantidade);
		$criteria->compare('Tamanho',$this->Tamanho,true);
		$criteria->compare('PrecoUn',$this->PrecoUn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LinhaEncomenda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
