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
 * Add templates to build
 * 
 * @package modextra
 * @subpackage build
 */
global  $modx, $sources;
$templates = array();


$template = $modx->newObject('modTemplate');
$template->fromArray(array(
    'id' => NULL,
    'templatename' => 'modLivestreet.MainPage',
    'description' => 'Главная страница Livestreet. Обязателен, если раздел Livestreet не в корне сайта',
    'content' => getSnippetContent($sources['templates'].'livestreet/modLivestreet.MainPage.tpl'),
),'',true,true);

$templates[] = $template;
unset($template);


$template = $modx->newObject('modTemplate');
$template->fromArray(array(
    'id' => NULL,
    'templatename' => 'modLivestreet.Default',
    'description' => 'Стандартный шаблон для вывода страниц Livestreet',
    'content' => getSnippetContent($sources['templates'].'livestreet/modLivestreet.Default.tpl'),
),'',true,true);

$templates[] = $template;
unset($template);


/*$template = $modx->newObject('modTemplate');
$template->fromArray(array(
    'id' => NULL,
    'templatename' => 'modLivestreet.ModxIndex',
    'description' => 'Шаблон для вывода главной страницы MODX',
    'content' => getSnippetContent($sources['templates'].'livestreet/modLivestreet.ModxIndex.tpl'),
),'',true,true);

$templates[] = $template;
unset($template);*/


$template = $modx->newObject('modTemplate');
$template->fromArray(array(
    'id' => NULL,
    'templatename' => 'modLivestreet.Modx',
    'description' => 'Шаблон для вывода страниц MODX с сайдбаром',
    'content' => getSnippetContent($sources['templates'].'livestreet/modLivestreet.Modx.tpl'),
),'',true,true);

$templates[] = $template;
unset($template);


$template = $modx->newObject('modTemplate');
$template->fromArray(array(
    'id' => NULL,
    'templatename' => 'modLivestreet.ModxNoSidebar',
    'description' => 'Шаблон для вывода страниц MODX без сайдбаром',
    'content' => getSnippetContent($sources['templates'].'livestreet/modLivestreet.ModxNoSidebar.tpl'),
),'',true,true);

$templates[] = $template;
unset($template);


$template = $modx->newObject('modTemplate');
$template->fromArray(array(
    'id' => NULL,
    'templatename' => 'modLivestreet.ModxCustom',
    'description' => 'Тестовый шаблон, демонстрирующий как самостоятельно можно создавать оформление для страниц MODX',
    'content' => getSnippetContent($sources['templates'].'livestreet/modLivestreet.ModxCustom.tpl'),
),'',true,true);

$templates[] = $template;
unset($template);

return $templates;