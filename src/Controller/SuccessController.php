<?php

namespace Test\Controller;

use Test\Services\ConfigurationService,
    Test\Services\TemplateEngine;

class SuccessController extends BaseController
{
    public function getAction(): void
    {

        $this->render('layout', [
            'title' => ConfigurationService::getConfig('TITLE'),
            'content' => TemplateEngine::view('pages/success', []),
        ]);
    }
}