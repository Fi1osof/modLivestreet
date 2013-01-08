<?php
/**
 * modExtra
 *
 * Copyright 2010 by Shaun McCormick <shaun+modextra@modx.com>
 *
 * modExtra is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * modExtra is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * modExtra; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package modextra
 */
/**
 * Add snippets to build
 * 
 * @package modextra
 * @subpackage build
 */
global  $modx, $sources;

$snippets = array();

// modLivestreet.run
$snippet= $modx->newObject('modSnippet');
$snippet->fromArray(array(
    'id' => NULL,
    'name' => 'modLivestreet.run',
    'description' => 'Выводит контент LiveStreet',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.modlivestreet.run.php'),
),'',true,true);
$properties = include $sources['build'].'properties/properties.modlivestreet.php';
$snippet->setProperties($properties);
unset($properties);

$snippets[] = $snippet;


// modLivestreet.ajax-registration
$snippet= $modx->newObject('modSnippet');
$snippet->fromArray(array(
    'id' => NULL,
    'name' => 'modLivestreet.ajax-registration',
    'description' => 'Register Livestreet User',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.modlivestreet.ajax-registration.php'),
),'',true,true);

$snippets[] = $snippet;


// modLivestreet.ajax-login
$snippet= $modx->newObject('modSnippet');
$snippet->fromArray(array(
    'id' => NULL,
    'name' => 'modLivestreet.ajax-login',
    'description' => 'Auth Livestreet User',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.modlivestreet.ajax-login.php'),
),'',true,true);

$snippets[] = $snippet;


// modLivestreet.ajax-logout
$snippet= $modx->newObject('modSnippet');
$snippet->fromArray(array(
    'id' => NULL,
    'name' => 'modLivestreet.ajax-logout',
    'description' => 'Auth Livestreet User',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.modlivestreet.ajax-logout.php'),
),'',true,true);

$snippets[] = $snippet;


// modLivestreet.account_editor
$snippet= $modx->newObject('modSnippet');
$snippet->fromArray(array(
    'id' => NULL,
    'name' => 'modLivestreet.account_editor',
    'description' => 'Livestreet account editor',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.modlivestreet.account_editor.php'),
),'',true,true);

$snippets[] = $snippet;


// modLivestreet.account_editor
$snippet= $modx->newObject('modSnippet');
$snippet->fromArray(array(
    'id' => NULL,
    'name' => 'modLivestreet.stream',
    'description' => 'Выводит ленту активности из Livestreet.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.modlivestreet.stream.php'),
),'',true,true);

$snippets[] = $snippet;


return $snippets;