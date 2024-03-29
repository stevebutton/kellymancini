<?php
/*************************************************************
 * 
 * helper.class.php
 * 
 * Utility functions
 * 
 * 
 * Copyright (c) 2011 Prelovac Media
 * www.prelovac.com
 **************************************************************/

define('MWP_SHOW_LOG', false);

class MMB_Helper
{
    /**
     * A helper function to log data
     * 
     * @param mixed $mixed
     */
    function _log($mixed)
    {		
    	if(defined('MWP_SHOW_LOG') && MWP_SHOW_LOG == true){
        if (is_array($mixed)) {
            $mixed = print_r($mixed, 1);
        } else if (is_object($mixed)) {
            ob_start();
            var_dump($mixed);
            $mixed = ob_get_clean();
        }
        
        $md5 = get_option('mwp_log_md5');
        if ($md5 === false) {
        	$md5 = md5(date('jS F Y h:i:s A'));
        	update_option('mwp_log_md5', $md5);
        }
        $handle = fopen(dirname(__FILE__) . '/log_'.$md5, 'a');
        fwrite($handle, $mixed . PHP_EOL);
        fclose($handle);
      }
    }
	
    function _escape(&$array)
    {
        global $wpdb;
        
        if (!is_array($array)) {
            return ($wpdb->escape($array));
        } else {
            foreach ((array) $array as $k => $v) {
                if (is_array($v)) {
                    $this->_escape($array[$k]);
                } else if (is_object($v)) {
                    //skip
                } else {
                    $array[$k] = $wpdb->escape($v);
                }
            }
        }
    }
    
    /**
     * Initializes the file system
     * 
     */
    function init_filesystem()
    {
        global $wp_filesystem;
        
        if (!$wp_filesystem || !is_object($wp_filesystem)) {
            WP_Filesystem();
        }
        
        if (!is_object($wp_filesystem))
            return FALSE;
        
        return TRUE;
    }
    
	/**
	 *
	 * Check if function exists or not on `suhosin` black list
	 *
	 */
	
	function mmb_get_user_info( $user_info = false, $info = 'login' ){
				
		if($user_info === false)
			return false;
			
		if( strlen( trim( $user_info ) ) == 0)
			return false;
			
			
		global $wp_version;
		if (version_compare($wp_version, '3.2.2', '<=')){
			return get_userdatabylogin( $user_info );
		} else {
			return get_user_by( $info, $user_info );
		}
	}
	
	/**
	 *
	 * Call action item filters
	 *
	 */
	
	function mmb_parse_action_params( $key = '', $params = null, $call_object = null ){
		
		global $_mmb_item_filter;
		$call_object = $call_object !== null ? $call_object : $this;
		$return = array();
		
		if(isset($_mmb_item_filter[$key]) && !empty($_mmb_item_filter[$key])){
			if( isset($params['item_filter']) && !empty($params['item_filter'])){
				foreach($params['item_filter'] as $_items){
					if(!empty($_items)){
						foreach($_items as $_item){
							if(isset($_item[0]) && in_array($_item[0], $_mmb_item_filter[$key])){
								$_item[1] = isset($_item[1]) ? $_item[1] : array();
								$return = call_user_func(array( &$call_object, 'get_'.$_item[0]), $return, $_item[1]);
							}
						}
					}
				}
			}
		}
		
		return $return;
	}
	
	/**
	 *
	 * Check if function exists or not on `suhosin` black list
	 *
	 */
	
	function mmb_function_exists($function_callback){
		
		if(!function_exists($function_callback))
			return false;
			
		$disabled = explode(', ', @ini_get('disable_functions'));
		if (in_array($function_callback, $disabled))
			return false;
			
		if (extension_loaded('suhosin')) {
			$suhosin = @ini_get("suhosin.executor.func.blacklist");
			if (empty($suhosin) == false) {
				$suhosin = explode(',', $suhosin);
				$blacklist = array_map('trim', $suhosin);
				$blacklist = array_map('strtolower', $blacklist);
				if(in_array($function_callback, $blacklist))
					return false;
			}
		}
		return true;
	}
	
    /**
     *  Gets transient based on WP version
     *
     * @global string $wp_version
     * @param string $option_name
     * @return mixed
     */
	 
	function mmb_set_transient($option_name = false, $data = false){
		
		if (!$option_name || !$data) {
            return false;
        }
		if($this->mmb_multisite)
			return $this->mmb_set_sitemeta_transient($option_name, $data);
			
		global $wp_version;
        
        if (version_compare($wp_version, '2.7.9', '<=')) {
            update_option($option_name, $data);
        } else if (version_compare($wp_version, '2.9.9', '<=')) {
            update_option('_transient_' . $option_name, $data);
        } else {
			update_option('_site_transient_' . $option_name, $data);
        }
		
	}
    function mmb_get_transient($option_name)
    {
        if (trim($option_name) == '') {
            return FALSE;
        }
        if($this->mmb_multisite)
			return $this->mmb_get_sitemeta_transient($option_name);
			
        global $wp_version;
		
        $transient = array();
		
        if (version_compare($wp_version, '2.7.9', '<=')) {
			return get_option($option_name);
        } else if (version_compare($wp_version, '2.9.9', '<=')) {
			$transient = get_option('_transient_' . $option_name);
			return apply_filters("transient_".$option_name, $transient);
        } else {
			$transient = get_option('_site_transient_' . $option_name);
			return apply_filters("site_transient_".$option_name, $transient);
        }
    }
    
    function mmb_delete_transient($option_name)
    {
        if (trim($option_name) == '') {
            return FALSE;
        }
        
        global $wp_version;
        
		if (version_compare($wp_version, '2.7.9', '<=')) {
            delete_option($option_name);
        } else if (version_compare($wp_version, '2.9.9', '<=')) {
            delete_option('_transient_' . $option_name);
        } else {
            delete_option('_site_transient_' . $option_name);
        }
    }
    
	function mmb_get_sitemeta_transient($option_name){
		global $wpdb;
		$option_name = '_site_transient_'. $option_name;
		
		$result = $wpdb->get_var( $wpdb->prepare("SELECT `meta_value` FROM `{$wpdb->sitemeta}` WHERE meta_key = '{$option_name}' AND `site_id` = '{$this->mmb_multisite}' ")); 
		$result = maybe_unserialize($result);
		return $result;
	}
	
	function mmb_set_sitemeta_transient($option_name, $option_value){
		global $wpdb;
		$option_name = '_site_transient_'. $option_name;
		
		if($this->mmb_get_sitemeta_transient($option_name)){
			$result = $wpdb->update( $wpdb->sitemeta,
				array(
					'meta_value' => maybe_serialize($option_value)
				),
				array(
					'meta_key' => $option_name, 
					'site_id' => $this->mmb_multisite
				)
			); 
		}else {
			$result = $wpdb->insert( $wpdb->sitemeta,
				array(
					'meta_key' => $option_name,
					'meta_value' => maybe_serialize($option_value),
					'site_id' => $this->mmb_multisite
				)
			); 
		}
		return $result;
	}
	
    function delete_temp_dir($directory)
    {
        if (substr($directory, -1) == "/") {
            $directory = substr($directory, 0, -1);
        }
        if (!file_exists($directory) || !is_dir($directory)) {
            return false;
        } elseif (!is_readable($directory)) {
            return false;
        } else {
            $directoryHandle = opendir($directory);
            
            while ($contents = readdir($directoryHandle)) {
                if ($contents != '.' && $contents != '..') {
                    $path = $directory . "/" . $contents;
                    
                    if (is_dir($path)) {
                        $this->delete_temp_dir($path);
                    } else {
                        unlink($path);
                    }
                }
            }
            closedir($directoryHandle);
            rmdir($directory);
            return true;
        }
    }
    
    function set_worker_message_id($message_id = false)
    {
        if ($message_id) {
            add_option('_action_message_id', $message_id) or update_option('_action_message_id', $message_id);
            return $message_id;
        }
        return false;
    }
    
    function get_worker_message_id()
    {
        return (int) get_option('_action_message_id');
    }
    
    function set_master_public_key($public_key = false)
    {
        if ($public_key && !get_option('_worker_public_key')) {
            add_option('_worker_public_key', base64_encode($public_key));
            return true;
        }
        return false;
    }
    
    function get_master_public_key()
    {
        if (!get_option('_worker_public_key'))
            return false;
        return base64_decode(get_option('_worker_public_key'));
    }
    
    
    function get_random_signature()
    {
        if (!get_option('_worker_nossl_key'))
            return false;
        return base64_decode(get_option('_worker_nossl_key'));
    }
    
    function set_random_signature($random_key = false)
    {
        if ($random_key && !get_option('_worker_nossl_key')) {
            add_option('_worker_nossl_key', base64_encode($random_key));
            return true;
        }
        return false;
    }
    
    
    function authenticate_message($data = false, $signature = false, $message_id = false)
    {
        if (!$data && !$signature) {
            return array(
                'error' => 'Authentication failed.'
            );
        }
        
        $current_message = $this->get_worker_message_id();
        
        if ((int) $current_message >= (int) $message_id)
            return array(
                'error' => 'Invalid message recieved. Deactivate and activate the ManageWP Worker plugin on this site, then re-add it to your ManageWP account.'
            );
        
        $pl_key = $this->get_master_public_key();
        if (!$pl_key) {
            return array(
                'error' => 'Authentication failed. Deactivate and activate the ManageWP Worker plugin on this site, then re-add it to your ManageWP account.'
            );
        }
        
        if (function_exists('openssl_verify') && !$this->get_random_signature()) {
            $verify = openssl_verify($data, $signature, $pl_key);
            if ($verify == 1) {
                $message_id = $this->set_worker_message_id($message_id);
                return true;
            } else if ($verify == 0) {
                return array(
                    'error' => 'Invalid message signature. Deactivate and activate the ManageWP Worker plugin on this site, then re-add it to your ManageWP account.'
                );
            } else {
                return array(
                    'error' => 'Command not successful! Please try again.'
                );
            }
        } else if ($this->get_random_signature()) {
            if (md5($data . $this->get_random_signature()) == $signature) {
                $message_id = $this->set_worker_message_id($message_id);
				return true;
            }
            return array(
                'error' => 'Invalid message signature. Deactivate and activate the ManageWP Worker plugin on this site, then re-add it to your ManageWP account.'
            );
        }
        // no rand key - deleted in get_stat maybe
        else
            return array(
                'error' => 'Invalid message signature. Deactivate and activate the ManageWP Worker plugin on this site, then re-add it to your ManageWP account.'
            );
    }
    
	function get_secure_hash(){
		
		$pl_key = $this->get_master_public_key();
		if ( empty($pl_key) )
			$pl_key = $this->get_random_signature();
        
		if( !empty($pl_key) )
			return md5(base64_encode($pl_key));
		
		return false;		
	}
	
	function _secure_data($data = false){
		if($data == false)
			return false;
			
		$pl_key = $this->get_master_public_key();
        if (!$pl_key)
            return false;
		
		$secure = '';
		if( function_exists('openssl_public_decrypt') && !$this->get_random_signature() ){
			if(is_array($data) && !empty($data)){
				foreach($data as $input){
					openssl_public_decrypt($input, $decrypted, $pl_key);
					$secure .= $decrypted;
				}
			} else if ( is_string( $data ) ) {
				openssl_public_decrypt($data, $decrypted, $pl_key);
				$secure = $decrypted;
			} else {
				$secure = $data;
			}
			return $secure;
		}
		return false;
		
	}
	
	function encrypt_data( $data = false, $single = false ){
		if( empty($data) )
			return $data;
		
		$pl_key = $this->get_master_public_key();
        if ( !$pl_key )
            return false;
		
		$data = serialize( $data );
		$crypted = '';
		if( function_exists('openssl_public_encrypt') && !$this->get_random_signature() ){
			$length = strlen( $data );
			if( $length > 100 ){
				for($i = 0; $i <= $length + 100; $i = $i+100){
					$input = substr($data, $i, 100);
					openssl_public_encrypt($input, $crypt, $pl_key);
					$crypted .= base64_encode($crypt).'::';
				}
			} else
				openssl_public_encrypt($input, $crypted, $pl_key);
		} else {
			$crypted = base64_encode($data);
		}
		
		return $crypted;
		
	}
	
    function check_if_user_exists($username = false)
    {
        global $wpdb;
        if ($username) {
			if( !function_exists('username_exists') )
				include_once(ABSPATH . WPINC . '/registration.php');
				
            include_once(ABSPATH . 'wp-includes/pluggable.php');
            
            if (username_exists($username) == null) {
                return false;
            }
			
            $user = (array) $this->mmb_get_user_info( $username );
			if ((isset($user[$wpdb->prefix . 'user_level']) && $user[$wpdb->prefix . 'user_level'] == 10) || isset($user[$wpdb->prefix . 'capabilities']['administrator']) || 
				(isset($user['caps']['administrator']) && $user['caps']['administrator'] == 1)){
                return true;
            }
            return false;
        }
        return false;
    }
    
    function refresh_updates()
    {
        if (rand(1, 3) == '2') {
            require_once(ABSPATH . WPINC . '/update.php');
            wp_update_plugins();
            wp_update_themes();
            wp_version_check();
        }
    }
    
    function remove_http($url = '')
    {
        if ($url == 'http://' OR $url == 'https://') {
            return $url;
        }
        return preg_replace('/^(http|https)\:\/\/(www.)?/i', '', $url);
        
    }
    
    function mmb_get_error($error_object)
    {
        if (!is_wp_error($error_object)) {
            return $error_object != '' ? $error_object : '';
        } else {
            $errors = array();
			if(!empty($error_object->error_data))  {
				foreach ($error_object->error_data as $error_key => $error_string) {
					$errors[] = str_replace('_', ' ', ucfirst($error_key)) . ': ' . $error_string;
				} 
			} elseif (!empty($error_object->errors)){
				foreach ($error_object->errors as $error_key => $err) {
					$errors[] = 'Error: '.str_replace('_', ' ', strtolower($error_key));
				} 
			}
            return implode('<br />', $errors);
        }
    }
    
	function is_server_writable(){
		
		if((!defined('FTP_HOST') || !defined('FTP_USER') || !defined('FTP_PASS')) && (get_filesystem_method(array(), false) != 'direct'))
			return false;
		else
			return true;
	}
	
	function mmb_download_url($url, $file_name)
	{
	    if (function_exists('fopen') && function_exists('ini_get') && ini_get('allow_url_fopen') == true && ($destination = @fopen($file_name, 'wb')) && ($source = @fopen($url, "r")) ) {
	    
	    while ($a = @fread($source, 1024* 1024)) {
	    @fwrite($destination, $a);
	    }
	    
	    fclose($source);
	    fclose($destination);
	    } else 
	    if (!fsockopen_download($url, $file_name))
	        die('Error downloading file ' . $url);
	    return $file_name;
	}
	
	function return_bytes($val) {
		$val = trim($val);
		$last = strtolower($val[strlen($val)-1]);
		switch($last) {
			// The 'G' modifier is available since PHP 5.1.0
			case 'g':
				$val *= 1024;
			case 'm':
				$val *= 1024;
			case 'k':
				$val *= 1024;
		}
	
		return $val;
	}
	     
}
?>