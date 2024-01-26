<?php

use Contao\System;

/**
 * Contao wrapper content element
 *
 * Copyright (c) 2022 Die Schittigs
 *
 * @license LGPL-3.0+
 */


$request = System::getContainer()->get('request_stack')->getCurrentRequest();
$scopeMatcher = System::getContainer()->get('contao.routing.scope_matcher');

if (null !== $request && $scopeMatcher->isBackendRequest($request)) {
    $GLOBALS['TL_CSS'][] = 'bundles/contaowrapper/backend.css';
}
// Own Wrapper
$GLOBALS['TL_CTE']['wrapper'] = [
    'wrapperStart' => 'DieSchittigs\ContaoWrapperBundle\ContentWrapperStart',
    'wrapperStop' => 'DieSchittigs\ContaoWrapperBundle\ContentWrapperStop'
];

$GLOBALS['TL_WRAPPERS']['start'][] = 'wrapperStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'wrapperStop';
