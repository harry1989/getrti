<?php

class CampaignsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	public function actionView ($id,$mp_id){
	  $mp=Mps::model()->findByPk($mp_id);
	  $mpPosition = MpPositionOnIssues::model()->findByAttributes(array('mp_id'=>$mp_id,'issue_id'=>$id));
	  if($mpPosition===null)
	    $pos = "The MP has not decided yet";
	  else
	    $pos = $mpPosition->statement;
	  $issue=Issues::model()->findByPk($id);
	  //TODO: Need to get all the positions on the issue
	  $this->render('view',array('issue'=>$issue,'mp'=>$mp,'pos'=>$pos));
	}
}