<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    /** 
     * 初始化方法：子类自动执行
     */
    public function initialize() {
        // $auth = $this->session->get('auth');
        $isLogin = true;
        if ($isLogin == false) {
            return $this->dispatcher->forward(array(
                "controller" => "login",
                "action" => "index"
            ));
        }
    }
}
