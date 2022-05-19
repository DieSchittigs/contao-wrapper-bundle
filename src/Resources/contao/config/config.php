<?php

/**
 * Contao wrapper content element
 *
 * Copyright (c) 2022 Die Schittigs
 *
 * @license LGPL-3.0+
 */



if (TL_MODE == "BE") {
    $GLOBALS['TL_CSS'][] = 'bundles/contaoclasses/backend.css';
}
// Own Wrapper
$GLOBALS['TL_CTE']['wrapper'] = [
    'wrapperStart' => 'DieSchittigs\DieSchittigsHelpers\ContentWrapperStart',
    'wrapperStop' => 'DieSchittigs\DieSchittigsHelpers\ContentWrapperStop'
];

$GLOBALS['TL_WRAPPERS']['start'][] = 'wrapperStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'wrapperStop';