<?php namespace App\Libraries;

class Tools
{
	static public function randomize($length)
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		return substr(str_shuffle($chars),0,$length);
	}

	static public function encode($string)
	{
	    $encoded = strtr(base64_encode(addslashes(gzcompress(serialize($string),9))), '+/=', '-_,');
	    return $encoded;
	}


	static public function decode($encoded)
	{
	    $decoded = unserialize(@gzuncompress(stripslashes(base64_decode(strtr($encoded, '-_,', '+/=')))));
	    return $decoded;
	}

	static public function seoify($title)
    {
    	$seoname = preg_replace('/\%/', ' percentage', $title);
    	$seoname = preg_replace('/\@/', ' at ', $seoname);
     	$seoname = preg_replace('/\&/', ' and ', $seoname);
    	$seoname = preg_replace('/\s[\s]+/', '-', $seoname); // Strip off multiple
    	   
    	$seoname = preg_replace('/[\s\W]+/', '-', $seoname); // Strip off spaces

    	$seoname = preg_replace('/^[\-]+/', '', $seoname); // Strip off the
    	   
    	$seoname = preg_replace('/[\-]+$/', '', $seoname); // // Strip off the
    	
    	$seoname = strtolower($seoname);
    	return ($seoname);
    }
	
	static public function preview($content, $limit = 100)
	{
		$content = strip_tags($content);
		$count = strlen($content);
		$preview = substr($content,0,$limit);
		
		if ($count > $limit)
			$preview .= '...';
		
		return $preview;
	}
	
	static public function stripDoctype($content)
	{
		return preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>','<head>', '</head>'), array('', '', '', '','',''), $content));
	}
	
	static public function getClientIP()
	{
    	$client  = @$_SERVER['HTTP_CLIENT_IP'];
    	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    	$remote  = $_SERVER['REMOTE_ADDR'];

    	if (filter_var($client, FILTER_VALIDATE_IP))
			$ip = $client;
    
    	else if (filter_var($forward, FILTER_VALIDATE_IP))
        	$ip = $forward;
    	else
        	$ip = $remote;
    	

    	return $ip;
	}
	
	static public function validateCreditCard($cc_number)
	{
		/* Validate; return value is card type if valid. */
		$false = false;
		$card_type = "";
		$card_regexes = array(
		  "/^4\d{12}(\d\d\d){0,1}$/" => "visa",
		  "/^5[12345]\d{14}$/"       => "mastercard",
		  "/^3[47]\d{13}$/"          => "amex",
		  "/^6011\d{12}$/"           => "discover"
		);
	 
		foreach ($card_regexes as $regex => $type) {
		   if (preg_match($regex, $cc_number)) {
			   $card_type = $type;
			   break;
		   }
		}
	 
		if (!$card_type) {
		   return $false;
		}
	 
		/*  mod 10 checksum algorithm  */
		$revcode = strrev($cc_number);
		$checksum = 0; 
	 
		for ($i = 0; $i < strlen($revcode); $i++) {
			$current_num = intval($revcode[$i]);  
			if($i & 1) {  /* Odd  position */
				$current_num *= 2;
			}
			/* Split digits and add. */
			$checksum += $current_num % 10; 
			
			if ($current_num >  9) {
			   $checksum += 1;
			}
		}
	 
		if ($checksum % 10 == 0) {
		   return $card_type;
		} 
		else {
		   return $false;
		}
	}
	
	
	static public function honeyPot($name = 'required_email')
	{
		$html = '';
		$html = '<input class="required-field" type="text" name="'.$name.'">';
		$html .= '
		<script type="text/javascript">
			$(function() {
				$(".required-field").hide();
			});	
		</script>';
		
		return $html;
	}
	
	
	static public function fbTime($date, $to = NULL)
    {
        if (empty($date))
            return "No date provided";
    
        if (! $to)
            $to = time();
        $periods = array(
                "second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array(
                "60", "60", "24", "7", "4.35", "12", "10");
        $now = $to;
        $unix_date = $date;
     
	 
        if (empty($unix_date))
            return "Bad date";
            

        if ($now > $unix_date)
        {
            $difference = $now - $unix_date;
            $tense = "ago";
    
        } else
        {
            $difference = $unix_date - $now;
            $tense = "from now";
        }
    
        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j ++)
            $difference /= $lengths[$j];
    
        $difference = round($difference);
    
        if ($difference != 1)
            $periods[$j] .= "s";
            $retdata = "$difference $periods[$j] {$tense}";
            if (trim($retdata) == "0 seconds from now")
            return ("Just now!");
            else
                return ($retdata);
    } 
	
	static public function linkify($text)
	{
		// The Regular Expression filter
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

		// Check if there is a url in the text
		if(preg_match($reg_exUrl, $text, $url)) 
			return preg_replace($reg_exUrl, "<a style='color:#42e7c5;' href=".$url[0].">{$url[0]}</a> ", $text);
		else 
			return $text;
	}
	
	static public function getVideoDuration($string)
	{
		$arr = explode('.',$string);
		return $arr[0];
	}
	
	static public function getMemcacheKeys($host = '127.0.0.1', $port = 11211){
 
        $mem = @fsockopen($host, $port);
        if($mem === FALSE) return -1;
 
        // retrieve distinct slab
        $r = @fwrite($mem, 'stats items' . chr(10));
        if($r === FALSE) return -2;
 
        $slab = array();
        while( ($l = @fgets($mem, 1024)) !== FALSE){
                // sortie ?
                $l = trim($l);
                if($l=='END') break;
 
                $m = array();
                // <STAT items:22:evicted_nonzero 0>
                $r = preg_match('/^STAT\sitems\:(\d+)\:/', $l, $m);
                if($r!=1) return -3;
                $a_slab = $m[1];
 
                if(!array_key_exists($a_slab, $slab)) $slab[$a_slab] = array();
        }
 
        // recuperer les items
        reset($slab);
        foreach($slab AS $a_slab_key => &$a_slab){
                $r = @fwrite($mem, 'stats cachedump ' . $a_slab_key . ' 100' . chr(10));
                if($r === FALSE) return -4;
 
                while( ($l = @fgets($mem, 1024)) !== FALSE){
                        // sortie ?
                        $l = trim($l);
                        if($l=='END') break;
 
                        $m = array();
                        // ITEM 42 [118 b; 1354717302 s]
                        $r = preg_match('/^ITEM\s([^\s]+)\s/', $l, $m);
                        if($r!=1) return -5;
                        $a_key = $m[1];
 
                        $a_slab[] = $a_key;
                }
        }
 
        // close
        @fclose($mem);
        unset($mem);
 
        // transform it;
        $keys = array();
        reset($slab);
        foreach($slab AS &$a_slab){
                reset($a_slab);
                foreach($a_slab AS &$a_key) $keys[] = $a_key;
        }
        unset($slab);
 
        return $keys;
	}
	
	static public function amount($amount)
	{
		$amount = preg_replace('/[\$,]/', '', $amount);
		$amount = floatval($amount);
		
		return $amount;
	}
	

	static public function generateGUID()
	{
    	if (function_exists('com_create_guid'))
		{
        	return com_create_guid();
    	}	else {
        	mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        	$charid = strtoupper(md5(uniqid(rand(), true)));
        	$hyphen = chr(45);// "-"
        	$uuid = ''
        	.substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);


			return $uuid;
		}	
	}
	
	// Get file extensions
    static public function file_ext($filename)
    {
        if( !preg_match('/\./', $filename) ) return '';
        return preg_replace('/^.*\./', '', $filename);
    }


    // Remove file extensions
    static public function file_ext_strip($filename)
    {
        return preg_replace('/\.[^.]*$/', '', $filename);
    }
    
    static public function br2nl($text)
    {
        $breaks = array("<br />","<br>","<br/>");  
        $text   = str_ireplace($breaks, "", $text); 
        
        return $text;
    }
	
	static public function validateUrl($url, $host = '')
	{
		$parse = parse_url($url);
		
		if ( !isset($parse['scheme']) || !isset($parse['host']) ){
			return false;
		} 
		
		$parsed_host = $parse['host'];
		$exploded = explode('.',$parsed_host);
	
		$sub_domain = ((count($exploded) > 1)) ? $exploded[0] : '' ;
		
		
		if (!empty($host) && ($parsed_host != $host && $parsed_host != $sub_domain.'.'.$host) ) {
			return false;
		} 
		
		return true;
	}
}