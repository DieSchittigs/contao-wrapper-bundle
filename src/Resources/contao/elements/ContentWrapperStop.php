<?php

namespace DieSchittigs\ContaoWrapperBundle;

use Contao;
use Contao\System;
use Symfony\Component\HttpFoundation\Request;

class ContentWrapperStop extends Contao\ContentElement
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

            $this->Template = new Contao\BackendTemplate($this->strTemplate);
        }
    }
}
class_alias(ContentWrapperStop::class, 'ContentWrapperStop');
