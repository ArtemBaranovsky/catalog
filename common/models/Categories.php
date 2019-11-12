<?php

namespace common\models;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title
 * @property int $parent_id
 * @property string $description
 * @property Commodities[] $commodities
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['edit', 'create', 'delete'],
                'rules' => [
                    [
                        'actions' => ['view', 'index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['edit', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent_id'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'parent_id' => 'Parent ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommodities()
    {
        return $this->hasMany(Commodities::className(), ['category_id' => 'id']);
    }

    public static function getItemsInter($indent = '', $parent_id = 0)
    {
        $items = [];
        // for all childs of $parent_id (roots if $parent_id == null)
        $groups = self::find()->where(['parent_id'=>$parent_id])
            ->orderBy('parent_id')->all();

        foreach($groups as $group)
        {
            // add group to items list
            $items["_{$group->id}"] = $indent.$group->title;
            // recursively add children to the list with indent
            $items = array_merge($items, self::getItemsInter($indent.'>', $group->id));

        }
        return $items;
    }

    public static function getItems(){
        $items = self::getItemsInter();
        foreach ($items as $key => $item) {
            $keys[$key] = ltrim($key, '_');
        }
        $items = array_combine($keys,$items);
    return $items;
    }
}
