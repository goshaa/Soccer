<?php

/**
 * This is the model class for table "clubs".
 *
 * The followings are the available columns in table 'clubs':
 * @property string $club_id
 * @property string $name
 * @property string $year_of_foundation
 * @property string $date_created
 * @property string $date_updated
 *
 * The followings are the available model relations:
 * @property FootballPlayers[] $footballPlayers
 * @property Transfers[] $transfers_from
 * @property Transfers[] $transfers_to
 */
class BaseClubs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Clubs the static model class
	 */
	public static function model($className='Clubs')
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clubs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, year_of_foundation', 'required'),
            array('date_created, date_updated', 'safe'),
			array('name', 'length', 'min'=>3, 'max'=>45),
            array('name', 'ext.alpha', 'accentedLetters'=>true),
			array('year_of_foundation', 'length', 'min'=>4, 'max'=>4),
            array('year_of_foundation', 'numerical', 'integerOnly'=>true, 'min'=>1857, 'max'=>date('Y')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('club_id, name, year_of_foundation, date_created, date_updated', 'safe', 'on'=>'search'),
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
			'footballPlayers' => array(self::HAS_MANY, 'FootballPlayers', 'club_id'),
			'transfers_from' => array(self::HAS_MANY, 'Transfers', 'from_club_id'),
			'transfers_to' => array(self::HAS_MANY, 'Transfers', 'to_club_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'player_id' => 'Játékos',
			'club_id' => 'Klub id',
			'name' => 'Név',
			'year_of_foundation' => 'Alapítás dátuma',
			'date_created' => 'Létrehozás dátuma',
			'date_updated' => 'Módosítás dátuma',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('club_id',$this->club_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('year_of_foundation',$this->year_of_foundation,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_updated',$this->date_updated,true);
        $criteria->condition = 'name != "Szabadúszó"';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}