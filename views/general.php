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
<h1><?php echo __('General Overview'); ?></h1>
<div id="djg">
<table class="stripeMe serverinfo">
	<thead>
		<tr>
			<th><?php echo __('Variable Name'); ?></th>
			<th><?php echo __('Value'); ?></th>
			<th><?php echo __('Variable Name'); ?></th>
			<th><?php echo __('Value'); ?></th>
		</tr>
	</thead>
	<tr>
		<td><?php echo __('OS'); ?></td>
		<td><?php echo PHP_OS; ?></td>
		<td><?php echo __('Database Data Disk Usage'); ?></td>
		<td><?php echo Djgserverinfo::format_filesize(Djgserverinfo::get_mysql_data_usage()); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Server'); ?></td>
		<td><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></td>
		<td><?php echo __('Database Index Disk Usage'); ?></td>
		<td><?php echo Djgserverinfo::format_filesize(Djgserverinfo::get_mysql_index_usage()); ?></td>
	</tr>
	<tr>
		<td>PHP</td>
		<td>v<?php echo PHP_VERSION; ?></td>
		<td><?php echo __('MYSQL Maximum Packet Size'); ?></td>
		<td><?php echo Djgserverinfo::format_filesize(Djgserverinfo::get_mysql_max_allowed_packet()); ?></td>
	</tr>
	<tr>
		<td>MYSQL</td>
		<td>v<?php echo Djgserverinfo::get_mysql_version(); ?></td>
		<td><?php echo __('MYSQL Maximum No. Connection'); ?></td>
		<td><?php echo Djgserverinfo::get_mysql_max_allowed_connections(); ?></td>
	</tr>
	<tr>
		<td>GD</td>
		<td><?php echo Djgserverinfo::get_gd_version(); ?></td>
		<td><?php echo __('PHP Short Tag'); ?></td>
		<td><?php echo Djgserverinfo::get_php_short_tag(); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Server Hostname'); ?></td>
		<td><?php echo $_SERVER['SERVER_NAME']; ?></td>
		<td><?php echo __('PHP Safe Mode'); ?></td>
		<td><?php echo Djgserverinfo::get_php_safe_mode(); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Server IP:Port'); ?></td>
		<td><?php echo ($local_addr = isset($_SERVER['LOCAL_ADDR'])) ? $local_addr : ''; echo $_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT']; ?></td>
		<td><?php echo __('PHP Magic Quotes GPC'); ?></td>
		<td><?php echo Djgserverinfo::get_php_magic_quotes_gpc(); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Server Document Root'); ?></td>
		<td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
		<td><?php echo __('PHP Memory Limit'); ?></td>
		<td><?php echo Djgserverinfo::format_php_size(Djgserverinfo::get_php_memory_limit()); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Server Admin'); ?></td>
		<td><?php echo $_SERVER['SERVER_ADMIN']; ?></td>
		<td><?php echo __('PHP Max Upload Size'); ?></td>
		<td><?php echo Djgserverinfo::format_php_size(Djgserverinfo::get_php_upload_max()); ?></td>
	</tr>
	<tr>
		<td><?php echo _('Server Load'); ?></td>
		<td><?php echo Djgserverinfo::get_ServerLoad(); ?></td>
		<td><?php echo __('PHP Max Post Size'); ?></td>
		<td><?php echo Djgserverinfo::format_php_size(Djgserverinfo::get_php_post_max()); ?></td>
	</tr>
	<tr>
		<td><?php echo __('Server Date/Time'); ?></td>
		<td><?php echo date('Y-m-j').' / '.date('h:i:s'); ?></td>
		<td><?php echo __('PHP Max Script Execute Time'); ?></td>
		<td><?php echo Djgserverinfo::get_php_max_execution(); ?>s</td>
	</tr>
</table>
</div>