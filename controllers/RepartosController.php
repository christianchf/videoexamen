<?php
namespace app\controllers;
use Yii;
use app\models\Reparto;
use app\models\RepartoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * RepartosController implements the CRUD actions for Reparto model.
 */
class RepartosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all Reparto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RepartoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Reparto model.
     * @param integer $ficha_id
     * @param integer $persona_id
     * @return mixed
     */
    public function actionView($ficha_id, $persona_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ficha_id, $persona_id),
        ]);
    }
    /**
     * Creates a new Reparto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reparto();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ficha_id' => $model->ficha_id, 'persona_id' => $model->persona_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Reparto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ficha_id
     * @param integer $persona_id
     * @return mixed
     */
    public function actionUpdate($ficha_id, $persona_id)
    {
        $model = $this->findModel($ficha_id, $persona_id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ficha_id' => $model->ficha_id, 'persona_id' => $model->persona_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Reparto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ficha_id
     * @param integer $persona_id
     * @return mixed
     */
    public function actionDelete($ficha_id, $persona_id)
    {
        $this->findModel($ficha_id, $persona_id)->delete();
        return $this->redirect(['index']);
    }
    /**
     * Finds the Reparto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ficha_id
     * @param integer $persona_id
     * @return Reparto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ficha_id, $persona_id)
    {
        if (($model = Reparto::findOne(['ficha_id' => $ficha_id, 'persona_id' => $persona_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
