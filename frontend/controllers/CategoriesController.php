<?php

namespace frontend\controllers;

use common\models\Commodities;
use Yii;
use common\models\Categories;
use common\models\CategoriesSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends AppController
{
    /**
     * {@inheritdoc}
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
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new CategoriesSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $items = Commodities::find()->limit(6)->all();
        $this->setMeta('Products catalog prototype');
//        var_dump($items);
        return $this->render('index', ['items' => $items ]/*compact($items)*/
//        [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]
        );
    }

    /**
     * Displays a single Categories model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(/*$id*/)
    {
        $id = Yii::$app->request->get('id');
//        $commodities = Commodities::find()->where(['category_id' => $id])->limit(6)->all();
        $query = Commodities::find()->where(['category_id' => $id])->limit(6);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false ]);
        $commodities = $query->offset($pages->offset)->limit($pages->limit)->all();
        $categories = Categories::findOne($id);
        $this->setMeta('Products catalog prototype | ' . $categories->title, null, $categories->description);

        return $this->render('view',[
                'commodities' => $commodities,
                'categories' => $categories,
                'pages' => $pages,
            ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
