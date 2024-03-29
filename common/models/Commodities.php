<?php
	
	namespace common\models;
	use Yii;
	use common\models\Categories; 
	use yii\helpers\ArrayHelper; 
	/**
		* This is the model class for table "commodities".
		*
		* @property int $id
		* @property int $quantity 
		* @property double $price 
		* @property string $title
		* @property string $lead_photo
		* @property string $description
		* @property int $category_id
		* 
		* @property Categories $category 
	*/
	class Commodities extends \yii\db\ActiveRecord
	{
		/**
			* {@inheritdoc}
		*/
		public $categories;
		public $imageFile;
		
		public static function tableName()
		{
			return 'commodities';
		}
		public function rules()
		{
			return [
			[['category_id'], 'required'],
			[['category_id'], 'integer'],
			[['quantity', 'price', 'category_id'], 'required'],
			[['quantity', 'category_id'], 'integer'],
			[['price'], 'number'],
			[['title', 'lead_photo'], 'string', 'max' => 100],
			[['description'], 'string', 'max' => 2000],
			[['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']], 
			[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
			];
		}
		
		/**
			* {@inheritdoc}
		*/
		public function attributeLabels()
		{
			return [
			'id' => 'ID',
			'quantity' => 'Quantity', 
			'price' => 'Price', 
			'title' => 'Title',
			'lead_photo' => 'Lead Photo',
			'description' => 'Description',
			'category_id' => 'Category ID',
			];
		}
		
		public function getCategory()
		{
			return $this->hasOne(Categories::className(), ['id' => 'category_id']);
		}
		
		public function getCategoryList() 
		{ 
			return ArrayHelper::map(Categories::find()->all(), 'id', 'title'); 
		} 
		
		public function upload()
		{
			if ($this->validate()) {
				$filePath = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
				
				if (!file_exists(Yii::getAlias('@webroot').'/uploads/')) {
					mkdir(Yii::getAlias('@webroot').'/uploads/', 0755, true);
				}
				
				$this->imageFile->saveAs($filePath);
				$this->imageFile = null;
				$this->lead_photo = $filePath;
				return true;
			} else {
				return false;
			}
		}

        public static function getItems($indent = '', $parent_id = 0)
        {
            $items = [];
            // for all childs of $parent_id (roots if $parent_id == null)
            $groups = self::find()->where(['parent_id'=>$parent_id])
                ->orderBy('parent_id')/*->asArray()*/->all();
//            die(var_dump("<pre>", $groups, "</pre>"));

            foreach($groups as $group)
            {
                // add group to items list
                $items[$group->id] = $indent.$group->title;
//            (var_dump("<pre>",  $indent.$group->title, "</pre>"));
                // recursively add children to the list with indent
                $items = array_merge($items, self::getItems($indent.'>', $group->id));

            }
//        (var_dump("<pre>",  $items, "</pre>"));
//        die(var_dump("<pre>", $items, "</pre>"));

            return $items;
        }

	} 	