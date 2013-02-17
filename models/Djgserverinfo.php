<?php
/**
 * @package Plugins
 * @subpackage djg_core
 *
 * @author Michał Uchnast <djgprv@gmail.com>
 * @copyright kreacjawww.pl, 2012
 * @license http://www.gnu.org/licenses/gpl.html GPLv3 license
 */

class Djgserverinfo {
	function Djgserverinfo()
	{
		// constructor;
	}
	public static function selfTest()
	{
		return true;	
	}
	public static function executeSql($sql)
	{
		$PDO = Record::getConnection();
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	### Function: Format Bytes Into TiB/GiB/MiB/KiB/Bytes
	public static function format_filesize($rawSize) {
		if($rawSize / 1099511627776 > 1) {
			return __(':format TiB',array(':format'=>$rawSize/1099511627776));
		} elseif($rawSize / 1073741824 > 1) {
			return __(':format GiB',array(':format'=>$rawSize/1073741824));
		} elseif($rawSize / 1048576 > 1) {
			return __(':format MiB',array(':format'=>$rawSize/1048576));
		} elseif($rawSize / 1024 > 1) {
			return __(':format KiB',array(':format'=>$rawSize/1024));
		} elseif($rawSize > 1) {
			return __(':format Bytes',array(':format'=>$rawSize));
		} else {
			return __('unknown');
		}
	}
	public static function get_mysql_data_usage() {
		$tablesstatus = self::executeSql("SHOW TABLE STATUS");
		$data_usage = '';
		foreach($tablesstatus as $tablestatus) {
			$data_usage += $tablestatus['Data_length'];
		}
		if($data_usage=='') $server_load = __('N/A');
		return $data_usage;
	}
	### Function: Get MYSQL Index Usage
	public static function get_mysql_index_usage() {	
		$tablesstatus = self::executeSql("SHOW TABLE STATUS");
		$index_usage='';
		foreach($tablesstatus as $tablestatus) {
			$index_usage +=  $tablestatus['Index_length'];
		}
		if($index_usage=='') $server_load = __('N/A');
		return $index_usage;
	}
	### Function: Get MYSQL Max Allowed Packet
	public static function get_mysql_max_allowed_packet() {		
		$packet_max_query = self::executeSql("SHOW VARIABLES LIKE 'max_allowed_packet'");
		$packet_max = $packet_max_query[0]['Value'];
		if(!$packet_max) {
			$packet_max = __('N/A');
		}
		return $packet_max;
	}
	### Function: Get MYSQL Version
	public static function get_mysql_version() {	
		$get_mysql_ver = self::executeSql("SELECT version() AS version");
		return $get_mysql_ver[0]['version'];
	}
	### Function:Get MYSQL Max Allowed Connections
	public static function get_mysql_max_allowed_connections() {
		$connection_max_query = self::executeSql("SHOW VARIABLES LIKE 'max_connections'");
		$connection_max = $connection_max_query[0]['Value'];
		if(!$connection_max) {
			$connection_max = __('N/A');
		}
		return $connection_max;
	}
	### Function: Get GD Version
	public static function get_gd_version() {
		if (function_exists('gd_info')) { 
			$gd = gd_info();
			$gd = $gd["GD Version"];
		} else {
			ob_start();
			phpinfo(8);
			$phpinfo = ob_get_contents();
			ob_end_clean();
			$phpinfo = strip_tags($phpinfo);
			$phpinfo = stristr($phpinfo,"gd version");
			$phpinfo = stristr($phpinfo,"version");
			$gd = substr($phpinfo,0,strpos($phpinfo,"\n"));
		}
		if(empty($gd)) {
			$gd = __('N/A');
		}
		return $gd;
	}
	### Function: Get PHP Short Tag
	public static function get_php_short_tag() {
		if(ini_get('short_open_tag')) {
			$short_tag = __('On');
		} else {
			$short_tag = __('Off');	
		}
		return $short_tag;
	}
	### Function: Get PHP Safe Mode
	public static function get_php_safe_mode() {
		if(ini_get('safe_mode')) {
			$safe_mode = __('On');
		} else {
			$safe_mode = __('Off');
		}
		return $safe_mode;
	}
	### Function: Get PHP Magic Quotes GPC
	public static function get_php_magic_quotes_gpc() {
		if(get_magic_quotes_gpc()) {
			$magic_quotes_gpc = __('On');
		} else {
			$magic_quotes_gpc = __('Off');
		}
		return $magic_quotes_gpc;
	}
	### Function: PHP Memory Limit
	public static function get_php_memory_limit() {
		if(ini_get('memory_limit')) {
			$memory_limit = ini_get('memory_limit');
		} else {
			$memory_limit = __('N/A');
		}
		return $memory_limit;
	}
	### Function: Convert PHP Size Format to Localized
	public static function format_php_size($size) {
		if (!is_numeric($size)) {
			if (strpos($size, 'M') !== false) {
				$size = intval($size)*1024*1024;
			} elseif (strpos($size, 'K') !== false) {
				$size = intval($size)*1024;
			} elseif (strpos($size, 'G') !== false) {
				$size = intval($size)*1024*1024*1024;
			}
		}
		return is_numeric($size) ? self::format_filesize($size) : $size;
	}
	### Function: Get PHP Max Upload Size
	public static function get_php_upload_max() {
		if(ini_get('upload_max_filesize')) {
			$upload_max = ini_get('upload_max_filesize');	
		} else {
			$upload_max = __('N/A');
		}
		return $upload_max;
	}
	### Function: Get The Server Load
	public static function get_serverload() {
		if(PHP_OS != 'WINNT' && PHP_OS != 'WIN32') {
			if(@file_exists('/proc/loadavg') ) {
				if ($fh = @fopen( '/proc/loadavg', 'r' )) {
					$data = @fread( $fh, 6 );
					@fclose( $fh );
					$load_avg = explode( " ", $data );
					$server_load = trim($load_avg[0]);
				}
			} else {
				$data = @system('uptime');
				preg_match('/(.*):{1}(.*)/', $data, $matches);
				$load_arr = explode(',', $matches[2]);
				$server_load = trim($load_arr[0]);
			}
		}
		if(!isset($server_load)) $server_load = __('N/A');
		return $server_load;
	}
	### Function: Get PHP Max Post Size
	public static function get_php_post_max() {
		if(ini_get('post_max_size')) {
			$post_max = ini_get('post_max_size');
		} else {
			$post_max = __('N/A');
		}
		return $post_max;
	}
	### Function: PHP Maximum Execution Time
	public static function get_php_max_execution() {
		if(ini_get('max_execution_time')) {
			$max_execute = ini_get('max_execution_time');
		} else {
			$max_execute = __('N/A');
		}
		return $max_execute;
	}
	### Get PHP Information
	public static function get_phpinfo() {
		ob_start();
		phpinfo();
		$phpinfo = ob_get_contents();
		ob_end_clean();
		$phpinfo = strip_tags($phpinfo, '<table><tr><th><td>');
		$phpinfo = eregi('<table border="0" cellpadding="3" width="600">(.*)</table>', $phpinfo, $data);
		$phpinfo = $data[0];	
		// PHP Version Header
		$phpinfo = preg_replace("!<table border=\"0\" cellpadding=\"3\" width=\"600\">\n<tr class=\"h\"><td>\n(.*?)\n</td></tr>\n</table>!", "<h2>$1</h2>", $phpinfo);
		$phpinfo = preg_replace("!<\/table>\n(.*?)\n<table border=\"0\" cellpadding=\"3\" width=\"600\">!", "</table><h2>$1</h2><table class=\"stripeMe serverinfo\">", $phpinfo);
		$phpinfo = preg_replace("!</table>\n<table border=\"0\" cellpadding=\"3\" width=\"600\">\n<tr class=\"v\"><td>\n\n(.*?)</td></tr>\n</table>!", "<tr><td colspan=\"2\">$1</td></tr></table>", $phpinfo);
		$phpinfo = str_replace('<table border="0" cellpadding="3" width="600">', '<table class="stripeMe serverinfo">', $phpinfo);
		$phpinfo = str_replace('<tr class="h">', '<tr>', $phpinfo);
		$phpinfo = str_replace('<td class="e">', '<td>', $phpinfo);
		$phpinfo = str_replace('<td class="v">', '<td>', $phpinfo);
		$phpinfo = str_replace('PHP Credits', '', $phpinfo);
		$phpinfo = str_replace("Configuration\nPHP Core", '<h2>PHP Core Configuration</h2>', $phpinfo);
		echo '<div id="djg">';
		echo $phpinfo;
		echo '</div>';
	}
	### Get MYSQL Information
	public static function get_mysqlinfo() {
		$sqlversion = self::executeSql("SELECT version() AS version");
		$sqlversion = $sqlversion[0]['version'];
		$mysqlinfo = self::executeSql("SHOW VARIABLES");
		echo "<h2>MYSQL $sqlversion</h2>";
		echo '<div id="djg">';
		if($mysqlinfo):
			echo '<table class="stripeMe serverinfo">';
			echo '<thead><tr><th>'.__('Variable Name').'</th><th>'.__('Value').'</th></tr></thead><tbody>';
			foreach($mysqlinfo as $info) {
				echo '<tr><td>'.$info['Variable_name'].'</td><td>'.htmlspecialchars($info['Value']).'</td></tr>';
			}
			echo '</tbody></table>';
		endif;
		echo '</div>';
	}
}