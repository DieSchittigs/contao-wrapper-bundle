<?php

namespace DieSchittigs\ContaoWrapperBundle;

use Contao;

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
        if (TL_MODE == 'BE') {
            $this->strTemplate = 'be_wildcard';

            $this->Template = new Contao\BackendTemplate($this->strTemplate);
        }
    }
}
class_alias(ContentWrapperStop::class, 'ContentWrapperStop');
