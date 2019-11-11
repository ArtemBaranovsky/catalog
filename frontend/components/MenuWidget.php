<?php
/**
 * Created by PhpStorm.
 * User: в
 * Date: 09.11.2019
 * Time: 23:00
 */

namespace frontend\components;
use yii\base\Widget;
use common\models\Categories;
use Yii;

class MenuWidget extends Widget
{
    public $tpl;
    public $data;   // raw DB data
    public $tree;
    public $menuHtml;   // ready html with tags


    public function init()
    {
        parent::init();
        if ( $this->tpl === null ){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        // get cache
        $menu = Yii::$app->cache->get('menu');
        if ($menu) return $menu;

        $this->data = Categories::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        // set cache
        Yii::$app->cache->set('menu', $this->menuHtml, 60);
        return $this->menuHtml;
    }

    public function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$node){
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree){
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    public function catToTemplate($category){
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}