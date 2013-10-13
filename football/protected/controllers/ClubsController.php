<?php

class ClubsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform the actions below
				'actions'=>array('view', 'create','update', 'admin','delete', 'deletePlayer', 'players'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        $club = $this->loadModel($id);
        $players = new CArrayDataProvider($club->footballPlayers, array('keyField' => 'player_id'));
		$this->render('view',array(
			'model'=>$club,
            'players'=>$players,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Clubs;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Clubs']))
		{
			$model->attributes=$_POST['Clubs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->club_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Clubs']))
		{
			$model->attributes=$_POST['Clubs'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->club_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Clubs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Clubs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Clubs']))
			$model->attributes=$_GET['Clubs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Clubs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='clubs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    /**
	 * This action changes the players club_id to 1 and makes a transfer for this action
	 * @param int $player_id
	 */
    public function actionDeletePlayer($player_id)
    {
        $player = FootballPlayers::model()->findByPk($player_id);
        $id = $player->club_id;
        $player->club_id = 1;
        $transfer = new Transfers;
        $transfer->player_id = $player_id;
        $transfer->from_club_id = $id;
        $transfer->to_club_id = 1;
        $transfer->payment = 0;
        $transfer->transfer_date = date("Y-m-d H:i:s");
		$transfer->save();
        $player->save();
        $club = $this->loadModel($id);
        $players = new CArrayDataProvider($club->footballPlayers, array('keyField' => 'player_id'));
		$this->render('view',array(
			'model'=>$club,
            'players'=>$players,
		));
    }
    
    /**
	 * This action shows the players that are not in the selected club,
     * and gives us a chance to add new players to the club. 
     * After a change it makes a transfer for the action.
	 * @param int $id
	 */
    public function actionPlayers($id)
	{
        $transfer = new Transfers;
        if(isset($_POST['Transfers']))
		{
			$player = FootballPlayers::model()->findByPk($_POST['Transfers']['player_id']);
            
            $transfer->player_id = $_POST['Transfers']['player_id'];
            $transfer->from_club_id = $player->club_id;
            $transfer->to_club_id = $id;
            $transfer->payment = $_POST['Transfers']['payment'];
            $transfer->transfer_date = date("Y-m-d H:i:s");
            $player->club_id = $id;
			if($transfer->save() && $player->save())
            {   
                $this->redirect(array('view','id'=>$id));
            }
		}
        $criteria = new CDbCriteria;
        $criteria->condition = 'club_id != '.$id;
        $rawData = array();
        $rawData = FootballPlayers::model()->findAll($criteria);
        
		$this->render('players',array(
			'model'=> Clubs::model()->findByPk($id),
            'players' => new CArrayDataProvider($rawData, array('keyField' => 'player_id')),
            'players_array' => $rawData,
            'transfer' => $transfer,
		));
	}
}
