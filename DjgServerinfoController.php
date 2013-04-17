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
 * @author Micha³ Uchnast <djgprv@gmail.com>
 * @copyright kreacjawww.pl, 2012
 * @license http://www.gnu.org/licenses/gpl.html GPLv3 license
 */

class DjgServerinfoController extends PluginController {

    public function __construct() {
        $this->setLayout('backend');
		$this->assignToLayout('sidebar', new View('../../plugins/djg_serverinfo/views/sidebar'));
		
	}
    public function index() {
        $this->general();
    }
    public function general() {
        $this->display('djg_serverinfo/views/general');
    }
    public function php() {
        $this->display('djg_serverinfo/views/php');
    }
    public function mysql() {
        $this->display('djg_serverinfo/views/mysql');
    }
    public function wolfcms() {
        $this->display('djg_serverinfo/views/wolfcms');
    }
    public function documentation() {
        $this->display('djg_serverinfo/views/documentation');
    }
}