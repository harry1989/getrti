<?php

/**
 * This is the model class for table "positions".
 *
 * The followings are the available columns in table 'positions':
 * @property string $statement
 * @property integer $user_id
 * @property integer $position
 * @property integer $id
 * @property integer $issue_id
 */
class Positions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Positions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'positions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, position, issue_id', 'numerical', 'integerOnly'=>true),
			array('statement', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('statement, user_id, position, id, issue_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'statement' => 'Statement',
			'user_id' => 'User',
			'position' => 'Position',
			'id' => 'ID',
			'issue_id' => 'Issue',
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

		$criteria->compare('statement',$this->statement,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('position',$this->position);
		$criteria->compare('id',$this->id);
		$criteria->compare('issue_id',$this->issue_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}