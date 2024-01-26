<?php

namespace DieSchittigs\ContaoWrapperBundle;

use Contao\System;
use Contao\ContentElement;
use Contao\BackendTemplate;

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
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            $this->strTemplate = 'be_wildcard';
            $objTemplate = new BackendTemplate($this->strTemplate);
            $objTemplate->id = $this->id;

            return $objTemplate->parse();
        }
    }
}
