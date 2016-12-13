<?php

namespace app\testModule\controller;

class Test
{
    protected $services;
    public function __construct($uriAry, $services) {
        $this->services = $services;
    }
    
    public function goAction()
    {
        echo 'test go...';
    }
    
    public function testSqlAction()
    {
        trigger_error('select...!', E_USER_WARNING);
        if (!($result = $this->testSql())) {
            trigger_error('select failed!', E_USER_WARNING);
            echo 'failed!';
            return;
        }
        trigger_error('select start!', E_USER_WARNING);
        echo 'testSql result:'.json_encode($result);
    }
    
    public function testSql()
    {
        trigger_error('testSql...', E_USER_WARNING);
        $rh = $this->services->db->execute('select * from country');
        if (!$rh->success()) {
            trigger_error('select failed!', E_USER_WARNING);
            return false;
        }
        
        return $rh->fetch();
    }
    
    public function setSessionAction()
    {
        $this->services->session->test = 123;
    }
    
    public function getSessionAction()
    {
        echo $this->services->session->test;
    }
}