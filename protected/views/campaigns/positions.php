<?php
/* @var $this CampaignsController */
/* @var $model CActiveDataProvider */
?>


<?php 
      if ($model!==NULL)
      {
	$this->widget('zii.widgets.CListView', array(
					       'dataProvider'=>$model,
					       	'itemView'=>'_view',
						));
	} else {
	  echo "No positions taken yet";
	} 

?>
