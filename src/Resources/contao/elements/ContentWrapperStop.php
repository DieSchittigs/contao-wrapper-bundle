<?php

namespace DieSchittigs\ContaoWrapperBundle;

use Contao\System;
use Symfony\Component\HttpFoundation\Request;

class ContentWrapperStop extends ContentElement
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_wrapperStop';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) {
            $this->strTemplate = 'be_wildcard';
            $objTemplate = new BackendTemplate($this->strTemplate);
            $objTemplate->id = $this->id;

            return $objTemplate->parse();
        }
    }
}
