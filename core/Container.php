<?php 
namespace core;

class Container
{
    public $properties = array();
    public function __set ($serviceName, $instance)
    {
        $this->properties[$serviceName] = $instance;
    }

    public function __get ($serviceName)
    {
        if (!isset($this->properties[$serviceName])) {
            return null;
        }
        
        if (is_callable($this->properties[$serviceName])) {
            $this->properties[$serviceName] = $this->properties[$serviceName]();
        }
        
        return $this->properties[$serviceName];
    }
}