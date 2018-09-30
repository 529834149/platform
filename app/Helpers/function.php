<?php
/**
 +----------------------------------------------------------
 * 字符串截取，支持中文和其他编码
 +----------------------------------------------------------
 * @static
 * @access public
 +----------------------------------------------------------
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 +----------------------------------------------------------
 * @return string
 +----------------------------------------------------------
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
    if(0 == $length || mb_strlen($str,'utf-8')<=$length) {
    	return $str;
    }
    
	if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    }else{
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    
    return $suffix ? $slice.'...' : $slice;
}
//日期换算
 function china_year($numYear){ 
	$china_era = array('0'=>'庚','1'=>'辛','2'=>'壬','3'=>'癸','4'=>'甲','5'=>'乙','6'=>'丙','7'=>'丁','8'=>'戊','9'=>'己');
	$china_branch = array('0'=>'申','1'=>'酉','2'=>'戌','3'=>'亥','4'=>'子','5'=>'丑','6'=>'寅','7'=>'卯','8'=>'辰','9'=>'巳','10'=>'午','11'=>'未');
	$lastNum = mb_strcut($numYear, -1);
	$remainder = $numYear%12;
	$chinaYear = $china_era[$lastNum].$china_branch[$remainder].'年';
	return $chinaYear;
}
/**
 * 获取客户端IP函数
 */
function tep_get_ip_address() { 
    if (isset($_SERVER)) { 
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
      } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) { 
        $ip = $_SERVER['HTTP_CLIENT_IP']; 
      } else { 
        $ip = $_SERVER['REMOTE_ADDR']; 
      } 
    } else { 
      if (getenv('HTTP_X_FORWARDED_FOR')) { 
        $ip = getenv('HTTP_X_FORWARDED_FOR'); 
      } elseif (getenv('HTTP_CLIENT_IP')) { 
        $ip = getenv('HTTP_CLIENT_IP'); 
      } else { 
        $ip = getenv('REMOTE_ADDR'); 
      } 
    } 
    return $ip; 
} 
/**
 * 时间轴函数
 * @param unknown_type $time
 * @return Ambigous <string, unknown>
 */
function tran_time($time) {
	$rtime = date("m-d H:i",$time);
	$htime = date("H:i",$time);
	 
	$time = time() - $time;

	if ($time < 60) {
		$str = '刚刚';
	}
	elseif ($time < 60 * 60) {
		$min = floor($time/60);
		$str = $min.'分钟前';
	}
	elseif ($time < 60 * 60 * 24) {
		$h = floor($time/(60*60));
		$str = $h.'小时前 ';
	}
	elseif ($time < 60 * 60 * 24 * 3) {
		$d = floor($time/(60*60*24));
		if($d==1)
			$str = '昨天 ';
		else
			$str = '前天 ';
	}
	else {
		$str = date("m月d日",$time);
	}
	return $str;
}
