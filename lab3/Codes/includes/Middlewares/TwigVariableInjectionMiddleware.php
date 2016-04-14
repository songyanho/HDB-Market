<?php

class TwigVariableInjectionMiddleware{
    private $c;
    public function __construct($class, $container){
        $this->c = $container;
    }
    public function __invoke($request, $response, $next)
    {
        $routeName = $request->getAttribute('route')->getName();
        $route = new AuthRoute($routeName);
        $this->c->hdb->setRoute($route);
        foreach($this->c->hdb->toArray() as $k=>$v)
            $this->c->view->getEnvironment()->addGlobal($k, $v);
        $response = $next($request, $response);
        return $response;
    }
}