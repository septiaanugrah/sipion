<?php
/*
 * @Author: Dicky Ermawan S., S.T., MTA 
 * @Email: wanasaja@gmail.com 
 * @Linkedin: linkedin.com/in/dickyermawan 
 * @Date: 2018-11-21 10:17:31 
 * @Last Modified by: Dicky Ermawan S., S.T., MTA
 * @Last Modified time: 2019-01-06 15:46:03
 */


namespace app\components;

use Yii;
  
class Helpers {
 
    public static function label($id)
    {
        $arrId = [
            'superadmin' => '<small class="label bg-maroon">SUPERADMIN</small>',
            'admin' => '<small class="label bg-navy">ADMIN</small>',
            'operator' => '<small class="label label-success">OPERATOR</small>',
            'supervisor' => '<small class="label label-primary">SUPERVISOR</small>',
            'laboratorium' => '<small class="label label-warning">LABORATORIUM</small>',
            'admin-lab' => '<small class="label label-warning">ADMIN LABORATORIUM</small>'
        ];
        return $arrId[$id];
    }
    
    public static function active($id)
    {
        if(Yii::$app->controller->action->id == $id)
            return 'active';
    }
}