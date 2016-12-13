<?php 

namespace core;

class App extends \stdClass
{
    protected $appClassNamespacePrefix = 'app\\';
    protected $basicConfig;
    public $controllerName;
    public $actionName;
    public function __construct(&$basicConfig)
    {
        $this->basicConfig = $basicConfig;
    }

    public function run()
    {
        //separate url to uriAry
        $uri = isset($_GET['_url']) ? $_GET['_url'] : '';
        $uriAry = explode('/', $uri);
        array_shift($uriAry);
 
        $this->dispatch($uriAry);
    }

    public function dispatch ($uriAry)
    {
        if (count($uriAry) < 2 
            || empty($uriAry[0]) 
            || empty($uriAry[1])
            || empty($uriAry[2])
            || !class_exists($servicesClass = $this->appClassNamespacePrefix . $uriAry[0] . '\\Services')) {
            
            $servicesClass = $this->basicConfig['route']['errorHandler'];
            new $servicesClass(404);
            return;
        }
        
        $services = new $servicesClass();
        $services->run($uriAry);
    }
}