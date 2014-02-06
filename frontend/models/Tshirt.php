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
class Tshirt extends CActiveRecord implements IECartPosition {

    //public $quantidade = 0;
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
			array('Nome, Preco, DataEntrada', 'required'),
			array('Preco', 'numerical'),
			array('Preco', 'length', 'max'=>19),
			array('Preco', 'length', 'max'=>19),
			array('Nome', 'length', 'max'=>50),
            array('DataEntrada', 'date', 'format'=>'dd-mm-yyyy'),
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
			'imagem' => array(self::HAS_MANY, 'Imagemtshirt', 'IDTShirt'),
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
			'Preco' => 'Preço',
			'DataEntrada' => 'Data de Entrada',
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
        //die(var_dump(Yii::app()->dateFormatter->format('yyyy-MM-dd H:i:s',$this->DataEntrada)));
        if(!empty($this->DataEntrada))
	        $criteria->compare('DataEntrada',Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss',$this->DataEntrada),true);
        else
		$criteria->compare('DataEntrada',$this->DataEntrada,true);
        //die(var_dump(Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss',$this->DataEntrada)));

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

	protected function beforeSave()
	{
		if(parent::beforeSave())
		{

		    $this->DataEntrada = Yii::app()->dateFormatter->format('yyyy-MM-dd HH:mm:ss',$this->DataEntrada);

			return true;
		}
		else
			return false;
	}

    public  function getImg($id,$thumb = false){
        $img = ImagemTshirt::model()->find('IDTShirt = :id OR (IDTShirt = :id AND TipoImagem = :ti)',array(':id'=>$id,':ti'=>2));
        if ($thumb==true){
            return Yii::app()->baseUrl.'/../../uploads/'.$img->Path.'_thumb';
        }else{
            return Yii::app()->baseUrl.'/../../uploads/'.$img->Path;
        }
    }

    public static function lastID(){
        $record=self::model()->find(array(
                //'condition' => 'id<:current_id AND pubstatus=:approved',
                'order' => 'ID DESC',
                'limit' => 1,
                //'params'=>array(':current_id'=>$id,':approved'=>Music::STATUS_APPROVED),
        ));
        return($record!==null ? $record->ID : 0);
    }
    function getId(){
        return 'Tshirt'.$this->ID;
    }

    function getPrice(){
        return $this->Preco;
    }
}
