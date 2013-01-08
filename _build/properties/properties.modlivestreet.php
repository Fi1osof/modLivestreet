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
 * Properties for the modExtra snippet.
 *
 * @package modextra
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'request_uri',
        'desc' => 'rewrite $SERVER["REQUEST_URI"]',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => '',
    ),
    
    array(
        'name' => 'parseOutput',
        'desc' => 'Is do parsing MODX-tags',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => '',
        'lexicon' => '',
    ),
);

return $properties;