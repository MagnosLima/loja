<?php 
namespace app\controllers;

use yii\rest\ActiveController;

class ApiController extends ActiveController
{
   public $modelClass = 'app\models\User';
   //http://localhost/loja/web/api
}