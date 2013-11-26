//HTTP LIST GEN 





<?php 

$http_list= fopen( "http_list.txt", 'w') or die("can't open file");
$https_list= fopen( "https_list.txt", 'w') or die("can't open file");
$URL='http://www.vpngeeks.com/proxylist.php?

country=0&port=&speed[]=3&anon[]=1&anon[]=2&anon[]=3&type[]=1&conn

[]=2&conn[]=3&sort=1&order=1&rows=200&search=Find+Prox';

  $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,$URL);
   
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_HEADER, 0);
         curl_setopt($ch, CURLOPT_NOBODY, 0);
         curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
         $res = curl_exec($ch);
 




$res= substr($res,17962, strlen($res)) ;
$res=explode("</td><td><img", $res);


$i=0 ;

foreach ($res as &$value) {
$value= substr($value,-(strlen($value)-strpos($value,'class="tr_')));
$value=str_replace('class="tr_style1"><td>', "", $value);
$value=str_replace('</td><td>', ":", $value);
$value=str_replace('class="tr_style2"><td>', "", $value);
$i++ ;
if($i!=sizeof($res))
{
fwrite($http_list,$value."\n");  
}
}

//////////////////////////////////////////////////////////////////////HTTPS/////////////////////////////

$URL='http://www.vpngeeks.com/proxylist.php?country=0&port=&speed[]=3&anon[]=1&anon[]=2&anon[]=3&type[]=2&conn[]=2&conn[]=3&sort=1&order=1&rows=200&search=Find+Proxy';

  $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL,$URL);
   
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_HEADER, 0);
         curl_setopt($ch, CURLOPT_NOBODY, 0);
         curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
         $res = curl_exec($ch);
 




$res= substr($res,17962, strlen($res)) ;
$res=explode("</td><td><img", $res);

$i=0 ;

foreach ($res as &$value) {
$value= substr($value,-(strlen($value)-strpos($value,'class="tr_')));
$value=str_replace('class="tr_style1"><td>', "", $value);
$value=str_replace('</td><td>', ":", $value);
$value=str_replace('class="tr_style2"><td>', "", $value);
$i++ ;
if($i!=sizeof($res))
{
fwrite($https_list,$value."\n");  
}
}

fclose($http_list);
fclose($https_list);

?>
