<?php
class ProfileController
{
    public function actionProfile()
    {
        Auth::checkLogged();
        Profile::userProfile();
        Auth::getSession();
        require_once(ROOT . '/views/profile/profile.php');
        return true;
    }
}