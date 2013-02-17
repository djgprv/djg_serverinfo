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
<h1><?php echo __('WolfCMS'); ?></h1>
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
		<td><?php echo __('Version'); ?></td>
		<td><?php echo CMS_VERSION; ?></td>
		<td><?php echo __('Debug'); ?></td>
		<td><?php echo (DEBUG)?_('Yes'):_('No'); ?></td>
	</tr>
	<tr>
		<td><?php echo __(''); ?></td>
		<td></td>
		<td><?php echo __('Check Updates'); ?></td>
		<td><?php echo (CHECK_UPDATES)?_('Yes'):_('No'); ?></td>
	</tr>

</table>
</div>