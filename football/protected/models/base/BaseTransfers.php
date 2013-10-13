<?php

/**
 * This is the model class for table "transfers".
 *
 * The followings are the available columns in table 'transfers':
 * @property string $transfer_id
 * @property string $player_id
 * @property string $from_club_id
 * @property string $to_club_id
 * @property string $transfer_date
 * @property string $payment
 * @property string $date_created
 * @property string $date_updated
 *
 * The followings are the available model relations:
 * @property FootballPlayers $player
 * @property Clubs $fromClub
 * @property Clubs $toClub
 */
class BaseTransfers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transfers the static model class
	 */
	public static function model($className='Transfers')
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transfers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('player_id, from_club_id, to_club_id, transfer_date, payment', 'required'),
            array('date_created, date_updated', 'safe'),
			array('player_id, from_club_id, to_club_id, payment', 'length', 'max'=>10),
            array('payment', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('transfer_id, player_id, from_club_id, to_club_id, transfer_date, payment, date_created, date_updated', 'safe', 'on'=>'search'),
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
			'player' => array(self::BELONGS_TO, 'FootballPlayers', 'player_id'),
			'fromClub' => array(self::BELONGS_TO, 'Clubs', 'from_club_id'),
			'toClub' => array(self::BELONGS_TO, 'Clubs', 'to_club_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'transfer_id' => 'Átigazolás',
			'player_id' => 'Játékos',
			'from_club_id' => 'Honnan',
			'to_club_id' => 'Hová',
			'transfer_date' => 'Átigazolás dátuma',
			'payment' => 'Összeg',
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

		$criteria->compare('transfer_id',$this->transfer_id,true);
		$criteria->compare('player_id',$this->player_id,true);
		$criteria->compare('from_club_id',$this->from_club_id,true);
		$criteria->compare('to_club_id',$this->to_club_id,true);
		$criteria->compare('transfer_date',$this->transfer_date,true);
		$criteria->compare('payment',$this->payment,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_updated',$this->date_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}