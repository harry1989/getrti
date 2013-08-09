<?php

/**
 * This is the model class for table "mps".
 *
 * The followings are the available columns in table 'mps':
 * @property integer $id
 * @property string $name
 * @property string $dob
 * @property string $party
 * @property string $constituency
 * @property string $state
 * @property string $p_address
 * @property string $p_telephone
 * @property string $d_address
 * @property string $d_telephone
 * @property string $email
 * @property string $house
 */
class Mps extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mps the static model class
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
		return 'mps';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'numerical', 'integerOnly'=>true),
			array('name, dob, party, constituency, state, p_address, p_telephone, d_address, d_telephone, house', 'length', 'max'=>512),
			array('email', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, dob, party, constituency, state, p_address, p_telephone, d_address, d_telephone, email, house', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'dob' => 'Dob',
			'party' => 'Party',
			'constituency' => 'Constituency',
			'state' => 'State',
			'p_address' => 'P Address',
			'p_telephone' => 'P Telephone',
			'd_address' => 'D Address',
			'd_telephone' => 'D Telephone',
			'email' => 'Email',
			'house' => 'House',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('party',$this->party,true);
		$criteria->compare('constituency',$this->constituency,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('p_address',$this->p_address,true);
		$criteria->compare('p_telephone',$this->p_telephone,true);
		$criteria->compare('d_address',$this->d_address,true);
		$criteria->compare('d_telephone',$this->d_telephone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('house',$this->house,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	* Need to retrieve matched records and filter the fields that will be returned
	* TODO: Need to further filter the fields
	* TODO: Order by something for later
	**/

	public function mpsMatch($query,$maxRows)
	{
		$criteria=new CDbCriteria;

//		$criteria->compare('id',$query,'OR');
		$criteria->compare('name',$query,true,'OR');
//		$criteria->compare('dob',$query,true,'OR');
		$criteria->compare('party',$query,true,'OR');
		$criteria->compare('constituency',$query,true,'OR');
		$criteria->compare('state',$query,true,'OR');
//		$criteria->compare('p_address',$query,true,'OR');
//		$criteria->compare('p_telephone',$query,true,'OR');
//		$criteria->compare('d_address',$query,true,'OR');
//		$criteria->compare('d_telephone',$query,true,'OR');
		$criteria->compare('email',$query,true,'OR');
		$criteria->compare('house',$query,true,'OR');
		$criteria->order = 'name ASC';
		$criteria->limit = $maxRows;
		return Mps::model()->findall($criteria);
		
		
	}
}

