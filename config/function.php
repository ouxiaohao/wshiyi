<?php
/**
 * 自定义函数
 */
function p ($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
/**
 * @param array $result 返回的数据
 * @param integer $code 状态码 [1 controller 2 model 9 system
 * @param string $message 提示信息
 * @return string 返回数据类型为json字符串
 */
function ajax_return($result='',$code=0,$message='ok'){
    $all_data=[
        'code'=>$code,
        'message'=>$message,
    ];
    if (!empty($result)) {
        // 禁止使用的字段
        $reserved_words = ['id','title','price','product_title','product_id','product_category','product_number'];
        foreach ($reserved_words as $v) {
            if (array_key_exists($v, $result)) {
                $all_data['code'] = -901;
                $all_data['message'] = '禁止key：'.$v;
            }
        }
        ($all_data['code']>=0) && $all_data['result']=$result;
    }

    echo json_encode($all_data);
}
/**
 * @extension ffmpeg
 * @param $video_url 视频路径
 * @param $width 图片宽度
 * @param $height 图片高度
 * @param $output 输出路径[相对于又拍云]
 */
function upload_video_image($video_url,$width,$height,$file_name)
{
//    服务器临时路径
    $temp_path = 'Upload/temp/'. $file_name;
//    又拍云上传路径
    $u_path = '/video_image/'.date('Ymd'). '/'. $file_name;

//    截取视频帧到服务器
    exec("ffmpeg -i {$video_url} -y -f image2 -t 0.003 -vframes 1 -s {$width}x{$height} {$temp_path}",$output,$return_val);
//    上传到又拍云
//    $client = new \Org\Sl\UpYun('himalayaimg','himalaya','ypyimg2016');
//    $file = fopen($temp_path, 'r');
//    $res = $client->writeFile($u_path,$file,True);
    $res = [];
    if (!$res['x-upyun-height'] ||  !$res['x-upyun-width']) return false;
//    删除服务器文件
    unlink($temp_path);

    return true;
}
/**
 * 创建时间格式化
 */
function create_time_format($timestamp)
{
    $time_diff = time() - $timestamp;
//    发帖日期/天
    $create_day = date('ymd',$timestamp);
//    今天/天
    $now_day = date('ymd');
//    昨天/天
    $before_day = date("ymd",strtotime("-1 day"));

    switch (true) {
        case ($create_day == $before_day) :
            $string = '昨天';
            break;
        case $time_diff <60 :
            $string = '刚刚';
            break;
        case 60 <= $time_diff && $time_diff <60 * 60 :
            $string = intval($time_diff/60). '分钟前';
            break;
        case (60*60 <= $time_diff) && ($create_day == $now_day) :
            $string = intval($time_diff/(60*60)). '小时前';
            break;
        case (24*60*60 <= $time_diff) && ($create_day != $before_day) && ($time_diff < 30*24*60*60) :
            $string = intval($time_diff/(24*60*60)). '天前';
            break;
        case (30*24*60*60 <= $time_diff) && ($time_diff < 365*24*60*60) :
            $string = intval($time_diff/(30*24*60*60)). '个月前';
            break;
        case (365*24*60*60 <= $time_diff) :
            $string = intval($time_diff/(365*24*60*60)). '年前';
            break;
        default:
            $string = date('Y-m-d',$timestamp);
            break;
    }
    return $string;
}
/**
 * 图片路径处理
 * @param string $path 路径
 * @param string $format 压缩格式
 * @param string 图片完整路径
 */
function image_path_deal($path,$format='')
{
    return !empty($path) ? C('YUN_IMG_URL'). $path. $format : '';

}
/*
 * 天气预报
 * @param string $city 城市名称
 */
function daily_forecast($city){
    $url = 'https://free-api.heweather.com/v5/weather';
    // 参数
    $data = array(
        'city' => $city,
        'key' => C('WEATHER_KEY'),
    );
    // 处理参数
    $o="";
    foreach ($data as $key => $value) {
        $o.= "$key=".urlencode($value)."&";
    }
    $data = substr($o, 0,-1);
    // 发送post请求
    $response = post_curl($data,$url);
    $result = str_replace("\"", '"', $response);
    $result = json_decode($response);

    return $result->HeWeather5[0]->daily_forecast;
}
/**
 * 获取随机字符串
 * @param int $length 字符串长度
 * @param int $type   字符串类型 0字母+数字  1数字
 */
function rand_str($length, $type=false){
    $str = '';
    if ($type) {
        $char = '1234567890';
    }else{
        $char = "ABCDEFGH45353IJKLMNOPQRS56313TUVWXYZ0123456789abcdefghijklmnopq976745rstuvwxyz";
    }
    $max = strlen($char)-1;
    for($i=0;$i<$length;$i++){
        $str.=$char[mt_rand(0,$max)];
    }
    return $str;
}
/**
 * 发送post请求
 * @param $post_data string
 * @param $url
 * @param int $second
 * @return bool|mixed
 */
function post_curl($post_data,$url,$second=0){
    //初始化curl
    $ch = curl_init();
    //超时时间
    curl_setopt($ch,CURLOPT_TIMEOUT,$second);
    //这里设置代理，如果有的话
    //curl_setopt($ch,CURLOPT_PROXY, '8.8.8.8');
    //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
    //设置header
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //post提交方式
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    //运行curl
    $data = curl_exec($ch);
    //返回结果
    if($data)
    {
        curl_close($ch);
        return $data;
    }
    else
    {
        $error = curl_errno($ch);
        echo "curl出错，错误码:$error"."<br>";
        echo "<a href='http://curl.haxx.se/libcurl/c/libcurl-errors.html'>错误原因查询</a></br>";
        curl_close($ch);
        return false;
    }
}
/**
 * 处理时间戳
 * @param $time 时间戳
 * @param $type 类型 默认1--格式  2//格式
 * @return 格式化时间
 */
function deal_empty_time($time,$type=1){
    if ($type==1) {
        return $time==0 ? '' : date('Y-m-d H:i:s',$time);
    }else{
        return $time==0 ? '' : date('y/m/d H:i:s',$time);
    }
}
/**
 * add log
 * @param $arr
 * @param $name
 * @param $description
 * @return bool
 */
function addlog($arr,$name,$description){
    return error_log ($description.':'.date('Y-m-d H:i:s').'----'.var_export($arr,true).PHP_EOL,3,RUNTIME_PATH.'/Logs/Api/'.date('Y-m-d')."-".$name.".log");
}

/**
 * 匹配手机号正则
 * @param $mobile
 * @return int
 */
function preg_mobile($mobile)
{
    return preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57]|17[0-9]|19[0-9])[0-9]{8}$/', $mobile);

}
function createRedisObj()
{
    vendor('Redis.RedisClient','','.class.php');
    return RedisClient::getInstance(C('REDIS_CONF'));
}
/**
 * 将json字符串转化成php数组
 * @param  $json_str
 * @return $json_arr
 */
function json_to_array($json_str){
    if(is_array($json_str) || is_object($json_str)){
        $json_str = $json_str;
    }else if(is_null(json_decode($json_str))){
        $json_str = $json_str;
    }else{
        $json_str =  strval($json_str);
        $json_str = json_decode($json_str,true);
    }
    $json_arr=array();
    foreach($json_str as $k=>$w){
        if(is_object($w)){
            $json_arr[$k]= json_to_array($w); //判断类型是不是object
        }else if(is_array($w)){
            $json_arr[$k]= json_to_array($w);
        }else{
            $json_arr[$k]= $w;
        }
    }
    return $json_arr;
}
// 获取远程文件
function get_url_content($request_url)
{
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $request_url);
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($curl_handle, CURLOPT_TIMEOUT, 0);
    curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl_handle, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
    $JsonResponse = curl_exec($curl_handle);
    $http_code = curl_getinfo($curl_handle);
    return ($JsonResponse);
}
/**
 * 将数组递归转字符串
 * @author liqingkuo   akuo1992@163.com
 * @param  array $data 需要转的数组
 * @return array       转换后的数组
 */
function array_to_str($data)
{
    foreach ($data as $k => $v) {
        if (is_array($v)) {
            $data[$k] = to_str($v);
        } else {
            $data[$k] = strval($v);
        }
    }
    return $data;
}
//将数字转换成大写字母
function numtostr($num)
{
    $arr = array(0 => 'A', 1 => 'B', 2 => 'C', 3 => 'D', 4 => 'E', 5 => 'F', 6 => 'G', 7 => 'H', 8 => 'I', 9 => 'J', 10 => 'K', 11 => 'L', 12 => 'M', 13 => 'N', 14 => 'O', 15 => 'P', 16 => 'Q', 17 => 'R', 18 => 'S', 19 => 'T', 20 => 'U', 21 => 'V', 22 => 'W', 23 => 'X', 24 => 'Y', 25 => 'Z');
    return $arr[$num];
}
/**
 * 获取首字母
 */
if (!function_exists('getfirstchar')) {
    function getfirstchar($s0)
    {
        $firstchar_ord = ord(strtoupper($s0{0}));
        if (($firstchar_ord >= 65 and $firstchar_ord <= 91) or ($firstchar_ord >= 48 and $firstchar_ord <= 57)) return $s0{0};
        $s = iconv("UTF-8", "gb2312", $s0);
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if ($asc >= -20319 and $asc <= -20284) return "A";
        if ($asc >= -20283 and $asc <= -19776) return "B";
        if ($asc >= -19775 and $asc <= -19219) return "C";
        if ($asc >= -19218 and $asc <= -18711) return "D";
        if ($asc >= -18710 and $asc <= -18527) return "E";
        if ($asc >= -18526 and $asc <= -18240) return "F";
        if ($asc >= -18239 and $asc <= -17923) return "G";
        if ($asc >= -17922 and $asc <= -17418) return "H";
        if ($asc >= -17417 and $asc <= -16475) return "J";
        if ($asc >= -16474 and $asc <= -16213) return "K";
        if ($asc >= -16212 and $asc <= -15641) return "L";
        if ($asc >= -15640 and $asc <= -15166) return "M";
        if ($asc >= -15165 and $asc <= -14923) return "N";
        if ($asc >= -14922 and $asc <= -14915) return "O";
        if ($asc >= -14914 and $asc <= -14631) return "P";
        if ($asc >= -14630 and $asc <= -14150) return "Q";
        if ($asc >= -14149 and $asc <= -14091) return "R";
        if ($asc >= -14090 and $asc <= -13319) return "S";
        if ($asc >= -13318 and $asc <= -12839) return "T";
        if ($asc >= -12838 and $asc <= -12557) return "W";
        if ($asc >= -12556 and $asc <= -11848) return "X";
        if ($asc >= -11847 and $asc <= -11056) return "Y";
        if ($asc >= -11055 and $asc <= -10247) return "Z";
        return null;
    }
}
/**
 * 去除数组俩表的空格
 */
function array_map_trim($v)
{
    if(!is_array($v)){
        return trim($v);
    }else{
        return $v;
    }

}
//搜索关键字标红
function returnred($key, $content)
{
    return str_replace($key, '<font color="red">' . $key . '</font>', $content);
}