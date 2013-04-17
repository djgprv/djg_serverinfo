<?php
/*
 * Wolf CMS - Content Management Simplified. <http://www.wolfcms.org>
 * Copyright (C) 2008-2010 Martijn van der Kleijn <martijn.niji@gmail.com>
 *
 * This file is part of Wolf CMS. Wolf CMS is licensed under the GNU GPLv3 license.
 * Please see license.txt for the full license text.
 */

/* Security measure */
if (!defined('IN_CMS')) { exit(); }

/**
 * @package Plugins
 * @subpackage djg_serverinfo
 *
 * @author Michał Uchnast <djgprv@gmail.com>
 * @copyright kreacjawww.pl, 2012
 * @license http://www.gnu.org/licenses/gpl.html GPLv3 license
 */

Plugin::setInfos(array(
    'id'          => 'djg_serverinfo',
    'title'       => __('[djg] Serverinfo'),
    'description' => __('Serverinfo'),
    'version'     => '0.0.4',
   	'license'     => 'GPL',
	'author'      => 'Michał Uchanst',
    'website'     => 'http://www.kreacjawww.pl/',
    'update_url'  => 'http://kreacjawww.pl/public/wolf_plugins/plugin-versions.xml',
    'require_wolf_version' => '0.7.3'
));

Plugin::addController('djg_serverinfo', __('[djg] Serverinfo'), 'administrator', false);
AutoLoader::addFolder(PLUGINS_ROOT.'/djg_serverinfo/models/');