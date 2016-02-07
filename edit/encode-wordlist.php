<?php
 
    $file="grr.txt";

    $fopen = fopen($file, r);

    $fread = fread($fopen,filesize($file));

    fclose($fopen);

    $remove = "\r\n";

    $split = explode($remove, $fread);
    	
    echo "<pre>";
 //   print_r($split);
    print_r(json_encode($split));
    echo "</pre>";

    $fh = fopen("wordlist.json", 'w')
      or die("Error opening output file");
	fwrite($fh, json_encode($split,JSON_UNESCAPED_UNICODE));
	fclose($fh);

?>