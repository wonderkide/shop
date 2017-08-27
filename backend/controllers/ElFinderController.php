<?php

namespace backend\controllers;         
use Yii;       
use yii\web\Controller;         
use zxbodya\yii2\elfinder\ConnectorAction; 
      
class ElFinderController extends Controller         
{         
    public function actions()         
    {         
        return [         
            'connector' => array(         
                'class' => ConnectorAction::className(),         
                'settings' => array(         
                    'root' => Yii::getAlias('uploads'),  // folder save file
                    //'URL' => Yii::getAlias('@backend') . '/uploads/',
                    //'URL' => Yii::getAlias('uploads'), //Path get file
                    'rootAlias' => 'Home',
                    'mimeDetect' => 'none',
                    'tmbDir' => Yii::getAlias('uploads'). '/tmb/',
                    'tmbCrop' => FALSE,
                )                    
            ),         
        ];                    
    }         
}