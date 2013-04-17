<?php

/**
 * Wolf CMS - Content Management Simplified. <http://www.wolfcms.org>
 * Copyright (C) 2008 Martijn van der Kleijn <martijn.niji@gmail.com>
 *
 * This file is part of Wolf CMS.
 *
 * Wolf CMS is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Wolf CMS is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Wolf CMS.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Wolf CMS has made an exception to the GNU General Public License for plugins.
 * See exception.txt for details and the full text.
 */


/**
 * The djg_serverinfo plugin
 * @author Micha³ Uchnast <djgprv@gmail.com>,
 * @copyright kreacjawww.pl
 * @license http://www.gnu.org/licenses/gpl.html GPLv3 license
 */
 
?>
<p class="button"><a href="<?php echo get_url('plugin/djg_serverinfo/general'); ?>"><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/djg_serverinfo/images/32_monitor.png" align="middle" alt="general icon" /> <?php echo __('Display General Overview'); ?></a></p>
<p class="button"><a href="<?php echo get_url('plugin/djg_serverinfo/php'); ?>"><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/djg_serverinfo/images/32_php.png" align="middle" alt="php icon" /> <?php echo __('Display PHP Information'); ?></a></p>
<p class="button"><a href="<?php echo get_url('plugin/djg_serverinfo/mysql'); ?>"><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/djg_serverinfo/images/32_dba.png" align="middle" alt="mysql icon" /> <?php echo __('Display MYSQL Information'); ?></a></p>
<p class="button"><a href="<?php echo get_url('plugin/djg_serverinfo/wolfcms'); ?>"><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/djg_serverinfo/images/32_wolfcms.png" align="middle" alt="mysql icon" /> <?php echo __('Display WolfCMS Information'); ?></a></p>
<p class="button"><a href="<?php echo get_url('plugin/djg_serverinfo/documentation/'); ?>"><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/djg_serverinfo/images/documentation.png" align="middle" alt="documentation icon" /> <?php echo __('Documentation'); ?></a></p>