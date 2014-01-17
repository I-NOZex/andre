<?php

/**
 * This is the model class for table "imagemtshirt".
 *
 * The followings are the available columns in table 'imagemtshirt':
 * @property integer $ID
 * @property integer $IDTShirt
 * @property integer $TipoImagem
 * @property string $Path
 *
 * The followings are the available model relations:
 * @property Tshirt $iDTShirt
 */
class ImagemTshirt extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'imagemtshirt';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID, IDTShirt, Path', 'required'),
			array('ID, IDTShirt, TipoImagem', 'numerical', 'integerOnly'=>true),
			array('Path', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, IDTShirt, TipoImagem, Path', 'safe', 'on'=>'search'),
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
			'iDTShirt' => array(self::BELONGS_TO, 'Tshirt', 'IDTShirt'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'IDTShirt' => 'Idtshirt',
			'TipoImagem' => 'Tipo Imagem',
			'Path' => 'Path',
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
		$criteria->compare('IDTShirt',$this->IDTShirt);
		$criteria->compare('TipoImagem',$this->TipoImagem);
		$criteria->compare('Path',$this->Path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ImagemTshirt the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
