<?php
/**
 * PHPSense Encryption Class
 *
 * PHP tutorials and scripts
 *
 * @package		PHPSense
 * @author		Jatinder Singh Thind
 * @copyright	Copyright (c) 2012, Jatinder Singh Thind
 * @link		http://www.phpsense.com
 */

// ------------------------------------------------------------------------
class PS_Encrypt {

	private $cipher = MCRYPT_RIJNDAEL_256;
	private $cipher_mode = MCRYPT_MODE_ECB;

	public function __construct() {
		if(!function_exists('mcrypt_encrypt')) {
			throw new Exception('mcrypt library not installed.');
		}
	}

	/**
	 * Encrypt data.
	 *
         * @key Key for encryption
	 * @data Data to encrypt
	 * @access public
	 * @return string
	 */
	public function encrypt($key,$data) {
		return mcrypt_encrypt($this->cipher, $key, $data, $this->cipher_mode);
	}

	/**
	 * Generate random string
	 *
	 * @len Length of string to generate
	 * @access private
	 * @return string
	 */
	public function randomString($len) {
		$str = '';
		$pool = '0123456789*&$#@ABCDEFghijklmNOPQRStuvwxyzabcdefGHIJKLMnopqrsTUVWXYZ';
		$pool_len = strlen($pool);
		for ($i = 0; $i < $len; $i++) {
			$str .= substr($pool, mt_rand(0, $pool_len - 1), 1);
		}
		return $str;
	}
}
?>
