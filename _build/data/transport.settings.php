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
 * Loads system settings into build
 *
 * @package modextra
 * @subpackage build
 */
global  $modx, $sources;
$settings = array();

$settings['modLivestreet.url_prefix'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.url_prefix']->fromArray(array(
    'key' => 'modLivestreet.url_prefix',
    'value' => '/',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'site',
),'',true,true);

$settings['modLivestreet.default_modx_resource'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.default_modx_resource']->fromArray(array(
    'key' => 'modLivestreet.default_modx_resource',
    'value' => '{site_start}',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'site',
),'',true,true);

$settings['modLivestreet.index_file'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.index_file']->fromArray(array(
    'key' => 'modLivestreet.index_file',
    'value' => 'index.php',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'file',
),'',true,true);

$settings['modLivestreet.livestreet_path'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.livestreet_path']->fromArray(array(
    'key' => 'modLivestreet.livestreet_path',
    'value' => '{core_path}components/modlivestreet/livestreet/',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'file',
),'',true,true);

$settings['modLivestreet.template'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.template']->fromArray(array(
    'key' => 'modLivestreet.template',
    'value' => 'modx',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'site',
),'',true,true);

$settings['modLivestreet.sync_users'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.sync_users']->fromArray(array(
    'key' => 'modLivestreet.sync_users',
    'value' => '',
    'xtype' => 'combo-boolean',
    'namespace' => 'modLivestreet',
    'area' => 'authentication',
),'',true,true);

$settings['modLivestreet.registration_url'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.registration_url']->fromArray(array(
    'key' => 'modLivestreet.registration_url',
    'value' => '/registration/ajax-registration/',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'authentication',
),'',true,true);

$settings['modLivestreet.module.security.hash'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.module.security.hash']->fromArray(array(
    'key' => 'modLivestreet.module.security.hash',
    'value' => 'livestreet_security_key',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'authentication',
),'',true,true);

$settings['modLivestreet.replaceModxTagsInPost'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.replaceModxTagsInPost']->fromArray(array(
    'key' => 'modLivestreet.replaceModxTagsInPost',
    'value' => '1',
    'xtype' => 'combo-boolean',
    'namespace' => 'modLivestreet',
    'area' => 'site',
),'',true,true);

$settings['modLivestreet.login_url'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.login_url']->fromArray(array(
    'key' => 'modLivestreet.login_url',
    'value' => '/login/ajax-login/',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'authentication',
),'',true,true);

$settings['modLivestreet.logout_url'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.logout_url']->fromArray(array(
    'key' => 'modLivestreet.logout_url',
    'value' => '/login/exit/',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'authentication',
),'',true,true);

$settings['modLivestreet.site_url'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.site_url']->fromArray(array(
    'key' => 'modLivestreet.site_url',
    'value' => '{site_url}',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'site',
),'',true,true);

$settings['modLivestreet.cache_prefix'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.cache_prefix']->fromArray(array(
    'key' => 'modLivestreet.cache_prefix',
    'value' => 'livestreet_cache',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'caching',
),'',true,true);

$settings['modLivestreet.site_description'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.site_description']->fromArray(array(
    'key' => 'modLivestreet.site_description',
    'value' => 'MODX + LivestreetCMS site',
    'xtype' => 'textfield',
    'namespace' => 'modLivestreet',
    'area' => 'site',
),'',true,true);

$settings['modLivestreet.active'] = $modx->newObject('modSystemSetting');
$settings['modLivestreet.active']->fromArray(array(
    'key' => 'modLivestreet.active',
    'value' => '1',
    'xtype' => 'combo-boolean',
    'namespace' => 'modLivestreet',
    'area' => 'site',
),'',true,true);

return $settings;