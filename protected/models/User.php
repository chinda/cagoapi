<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chinda
 * Date: 10/18/13
 * Time: 9:00 AM
 * To change this template use File | Settings | File Templates.
 */

class User extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     **/
    public function tableName()
    {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     **/
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Name, Password, Email, Phone', 'required'),
            array('Name', 'length', 'max'=>128),
        );
    }

    public function primaryKey()
    {
        return 'UserID';
    }

}