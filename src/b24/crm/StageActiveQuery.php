<?php

namespace wm\yii\b24\crm;

//Код не универсален а направлен на смарт процессы стоит перенести в другой класс
use yii\helpers\ArrayHelper;
use wm\yii\b24\ActiveQuery;

class StageActiveQuery extends ActiveQuery {

    protected $listMethodName = 'crm.status.list';

    protected $oneMethodName = 'crm.status.get';

//    protected function getPrimaryTableName()
//    {
//        $modelClass = $this->modelClass;
//        //return $modelClass::tableName();
//        return $modelClass::entityTypeId();
//    }

    protected function prepairParams(){
        $data = [
            'filter' => $this->where,
            'order' => $this->orderBy,
            //'select' => $this->select,
            //Остальные параметры
        ];
        $this->params = $data;
    }

    protected function prepairOneParams(){
        $id = null;
        if(ArrayHelper::getValue($this->where, 'id')){
            $id = ArrayHelper::getValue($this->where, 'id');
        }
        if(ArrayHelper::getValue($this->link, 'id')){
            $id = ArrayHelper::getValue($this->where, 'inArray.0');
        }
        $data = [
            'id' => $id
        ];
        $this->params = $data;
    }
}
