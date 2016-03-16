<?php

class IndexController extends ControllerBase
{
    public function initialize(){
        parent::initialize();
        $this->view->navname = '@';
    }
    
    
    public function indexAction()
    {
        
    }

}

