<?php

class securityController extends aclController
{
    public function __construct() 
    {
        parent::__construct();
        $this->_security = $this->loadModel('security');
    }
    
    public function getMenu()
    {
        
    }
}

?>
