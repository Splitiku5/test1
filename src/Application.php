<?php

namespace Test;

use Test\Exceptions\ConfigurationException,
    Test\Exceptions\PathException,
    Test\Routing\Router;

class Application
{
    public function run(): void
    {
        try
        {
            $route = Router::find($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
            if ($route)
            {
                $action = $route->action;
                $variables = $route->getVariables();

                echo $action(...$variables);
            }
            else
            {
                http_response_code(404);
                $action = Router::find('GET','/error/')->action;
                $action();
                exit;
            }
        }
        catch (\Exception|ConfigurationException|PathException $e)
        {
            http_response_code(500);
            $action = Router::find('GET','/500/')->action;
            $action($e);
        }
    }
}