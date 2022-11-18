<?php

/*
* @Author   : Dicky Ermawan S., S.T., MTA
* @Email    : wanasaja@gmail.com
* @Dashboard: http://dickyermawan.dev.php.or.id/
* @Date     : 2018-05-21 15:34:30
* @Last Modified by  : Dicky Ermawan S., S.T., MTA
* @Last Modified time: 2018-05-21 15:58:55
*/
 
namespace app\components;
  
class AccessRule extends \yii\filters\AccessRule {
 
    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            // Check if the user is logged in, and the roles match
            } elseif (!$user->getIsGuest() && $role === $user->identity->akses) {
                return true;
            }
        } 
        return false;
    }
}