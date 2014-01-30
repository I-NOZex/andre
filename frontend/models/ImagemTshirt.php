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
    * This is the attribute holding the uploaded picture
    * @var CUploadedFile
    */
    public $picture = array();
    public $tID;

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
			array('Path', 'required'),
			array('TipoImagem', 'numerical', 'integerOnly'=>true),
			//array('Path', 'length', 'max'=>256),
            array('picture', 'length', 'max' => 255, 'tooLong' => '{attribute} is too long (max {max} chars).', 'on' => 'upload'),
            array('picture', 'file', 'types' => 'jpg,jpeg,gif,png', 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'Size should be less then 2MB !!!', 'on' => 'upload'),
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
			'TShirt' => array(self::BELONGS_TO, 'Tshirt', 'IDTShirt'),
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

    private function makeThumb($img_path,$dest){
        Yii::import("ext.EPhpThumb.EPhpThumb");

        $thumb=new EPhpThumb();
        $thumb->init(); //this is needed

        //chain functions
        $thumb->create($img_path)
              ->resize(100,100)
              ->save($dest.'_thumb');
    }

    public function getImageUrl($thumb=false){
        if ($thumb === true)
            return Yii::app()->baseUrl.'/../../uploads/'.$this->Path.'_thumb';
        else
            return Yii::app()->baseUrl.'/../../uploads/'.$this->Path;
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

	protected function beforeSave()
	{
		if(parent::beforeSave())
		{

			if($this->isNewRecord){
			    $this->makeThumb('uploads/'.$this->Path,'uploads/'.$this->Path);
				//$this->IDTShirt = Tshirt::model()->lastId()+1;
            }

			return true;
		}
		else
			return false;
	}
}
