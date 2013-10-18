<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chinda
 * Date: 10/17/13
 * Time: 3:55 PM
 * To change this template use File | Settings | File Templates.
 */

class WorkController extends Controller
{
    public function filterRestAccessRules( $c )
    {
        Yii::app()->clientScript->reset(); //Remove any scripts registered by Controller Class
        Yii::app()->onException = array($this, 'onException'); //Register Custom Exception
        $c->run();
    }

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            array(
                'ext.starship.RestfullYii.filters.ERestFilter +
                 REST.GET, REST.PUT, REST.POST, REST.DELETE'
            ),
        );
    }

    public function actions()
    {
        return array(
            'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', 'actions'=>array('REST.GET', 'REST.PUT', 'REST.POST', 'REST.DELETE'),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


}

?>