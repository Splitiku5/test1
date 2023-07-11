<?php

namespace Test\Controller;

use Test\Services\TemplateEngine,
    Test\Services\ConfigurationService;

class ErrorController extends BaseController
{
    public function getSystemErrorAction(\Exception $e = null) : void
    {
        if($e !== null)
        {
            $log = date('Y-m-d H:i:s')
                . ' ErrorController.php'
                . $e->getCode() . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() .PHP_EOL;
            $path = ROOT . '/var/logs/errorLog.txt';
            file_put_contents($path, $log, FILE_APPEND);
        }
        echo TemplateEngine::view('layout', [
            'title' => ConfigurationService::getConfig('TITLE'),
            'content' => TemplateEngine::view('pages/500', []),
        ]);
    }
}