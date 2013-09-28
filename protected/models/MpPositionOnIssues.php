<?php

/**
 * This is the model class for table "mp_position_on_issues".
 *
 * The followings are the available columns in table 'mp_position_on_issues':
 * @property integer $mp_id
 * @property integer $issue_id
 * @property integer $position
 * @property string $statement
 */
class MpPositionOnIssues extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MpPositionOnIssues the static model class
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
		return 'mp_position_on_issues';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mp_id, issue_id, position', 'numerical', 'integerOnly'=>true),
			array('statement', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mp_id, issue_id, position, statement', 'safe', 'on'=>'search'),
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
			'mp_id' => 'Mp',
			'issue_id' => 'Issue',
			'position' => 'Position',
			'statement' => 'Statement',
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

		$criteria->compare('mp_id',$this->mp_id);
		$criteria->compare('issue_id',$this->issue_id);
		$criteria->compare('position',$this->position);
		$criteria->compare('statement',$this->statement,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}