<?php

/**
 * This is the model class for table "football_players".
 *
 * The followings are the available columns in table 'football_players':
 * @property string $player_id
 * @property string $first_name
 * @property string $last_name
 * @property string $nationality
 * @property string $birth_date
 * @property string $date_created
 * @property string $date_updated
 *
 * The followings are the available model relations:
 * @property Clubs[] $clubs
 * @property Transfers[] $transfers
 */
class BaseFootballPlayers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FootballPlayers the static model class
	 */
	public static function model($className='FootballPlayers')
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'football_players';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, nationality, club_id, birth_date', 'required'),
            array('date_created, date_updated', 'safe'),
			array('first_name, last_name, nationality', 'length', 'min'=>3, 'max'=>45),
            array('first_name, last_name, nationality', 'ext.alpha', 'accentedLetters'=>true ),
			array('club_id', 'length', 'max'=>10),
            array('birth_date', 'date', 'format'=>'yyyy-MM-dd'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('player_id, first_name, last_name, nationality, club_id, birth_date, date_created, date_updated', 'safe', 'on'=>'search'),
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
			'club' => array(self::BELONGS_TO, 'Clubs', 'club_id'),
			'transfers' => array(self::HAS_MANY, 'Transfers', 'player_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'player_id' => 'Játékos',
			'first_name' => 'Keresztnév',
			'last_name' => 'Vezetéknév',
            'nationality' => 'Nemzetiség',
			'name' => 'Klub',
			'birth_date' => 'Születési dátum',
			'date_created' => 'Hozzáadás dátuma',
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

		$criteria->compare('player_id',$this->player_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('club_id',$this->club_id,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_updated',$this->date_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}