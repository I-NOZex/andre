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
			array('NumVisa, Endereco', 'required'),
			array('IDEncomenda, Entregue', 'numerical', 'integerOnly'=>true),
			array('IDCliente', 'length', 'max'=>10),
			array('Total', 'length', 'max'=>19),
			array('NumVisa', 'length', 'max'=>16),
			array('NumVisa', 'match', 'pattern'=> '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/', 'allowEmpty'=>false),
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
			'iDCliente' => array(self::BELONGS_TO, 'Profile', 'IDCliente'),
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
			'NumVisa' => 'Nº Cartão Visa',
			'Endereco' => 'Endereço',
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

	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
		    $this->IDCliente = Yii::app()->user->getId();
		    $this->Data = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss',time());;
		    $this->Total = Yii::app()->shoppingCart->getCost();
		    $this->Entregue = 0;

			return true;
		}
		else
			return false;
	}

	protected function afterSave()
	{
            $positions = Yii::app()->shoppingCart->getPositions();
            //die(var_dump($this->IDEncomenda));
            foreach($positions as $position){
                $detalhes = new LinhaEncomenda;
                $detalhes->IDEncomenda = $this->IDEncomenda;
                $detalhes->IDTShirt = $position->ID;
                $detalhes->PrecoUn = $position->Preco;
                $detalhes->Quantidade = $position->getQuantity();
                $detalhes->Tamanho = strtoupper(Yii::app()->session["tamanho[".$position->ID."]"]);
                if(!$detalhes->save(false))
                    die(var_dump($detalhes->getErrors()));
                else
                    unset(Yii::app()->session["tamanho[".$position->ID."]"]);
            }
            Yii::app()->shoppingCart->clear();

        parent::afterSave();
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
