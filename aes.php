<?php
/**
 * Created by PhpStorm.
 * User: hasanen
 * Date: 8/6/17
 * Time: 5:09 PM
 */

/*  Author: Cody Phillips
*  Company: Phillips Data
*  Website: www.phpaes.com, www.phillipsdata.com
*  File: AES.class.php
*  October 1, 2007
*
*  This software is sold as-is without any warranties, expressed or implied,
*  including but not limited to performance and/or merchantability. No
*  warranty of fitness for a particular purpose is offered. This script can
*  be used on as many servers as needed, as long as the servers are owned
*  by the purchaser. (Contact us if you want to distribute it as part of
*  another project) The purchaser cannot modify, rewrite, edit, or change any
*  of this code and then resell it, which would be copyright infringement.
*  This code can be modified for personal use only.
*
*  Comments, Questions? Contact the author at cody [at] wshost [dot] net
*/


class AESController {
    /**
     * @param      $data
     * @param      $passphrase
     * @param null $salt        ONLY FOR TESTING
     * @return string           encrypted data in base64 OpenSSL format
     */
    public static function encrypt($data, $passphrase, $salt = null) {
        $salt = $salt ?: openssl_random_pseudo_bytes(8);
        list($key, $iv) = self::evpkdf($passphrase, $salt);
        $ct = openssl_encrypt($data, 'aes-256-cbc', $key, true, $iv);
        return self::encode($ct, $salt);
    }
    /**
     * @param string $base64        encrypted data in base64 OpenSSL format
     * @param string $passphrase
     * @return string
     */
    public static function decrypt($base64, $passphrase) {
        list($ct, $salt) = self::decode($base64);
        list($key, $iv) = self::evpkdf($passphrase, $salt);
        $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
        return $data;
    }
    public static function evpkdf($passphrase, $salt) {
        $salted = '';
        $dx = '';
        while (strlen($salted) < 48) {
            $dx = md5($dx . $passphrase . $salt, true);
            $salted .= $dx;
        }
        $key = substr($salted, 0, 32);
        $iv = substr($salted, 32, 16);
        return [$key, $iv];
    }
    public static function decode($base64) {
        $data = base64_decode($base64);
        if (substr($data, 0, 8) !== "Salted__") {
            throw new \InvalidArgumentException();
        }
        $salt = substr($data, 8, 8);
        $ct = substr($data, 16);
        return [$ct, $salt];
    }
    public static function encode($ct, $salt) {
        return base64_encode("Salted__" . $salt . $ct);
    }
}
