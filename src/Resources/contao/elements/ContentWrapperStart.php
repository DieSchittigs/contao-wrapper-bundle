<?php

namespace DieSchittigs\ContaoWrapperBundle;

use Contao;

class ContentWrapperStart extends Contao\ContentElement
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_wrapperStart';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        if (TL_MODE == 'BE') {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new Contao\BackendTemplate($this->strTemplate);
            $this->Template->title = $this->headline;
        }
    }
}

class_alias(ContentWrapperStart::class, 'ContentWrapperStart');
