<?php
/**
 * Author  : Web Exorcist
 * Name    : Facebook Toolkit++
 * Version : 1.4
 * Update  : 12 June 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */
//error_reporting(0);

    $save_dir = "result/result_birthday.txt";
    $save_dir_name = "result/result_name-birthday.txt";
    
    $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_based . "/v3.2/me/friends/?fields=name,birthday&access_token=" . $token . "&limit=5000");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$wahyuarifpurnomo = curl_exec($curl);
    curl_close($curl);
    
    $decode = json_decode($wahyuarifpurnomo);
    $total  = $decode->summary->total_count;
    $climate->br()->info('Found ' .$total . ' Date of birth');
    sleep(5);
    $climate->br()->info('Starting retrieve date of birth your friends..');
    echo "\n";
    progress($progress);
    $no = 0;
    foreach ($decode->data as $hasil) {
        $no++;
        $colorstring = getName($n);
        if (!empty($hasil->birthday)) {
            echo $no.".". $colors->getColoredString(" $hasil->name | $hasil->birthday", $warifp[$colorstring]) . "\n";
            $save = fopen($save_dir, 'a');
            fwrite($save, $hasil->birthday . "\n");

            $save_name = fopen($save_dir_name, 'a');
            fwrite($save_name, $hasil->name . "|" . $hasil->birthday . "\n");

            fclose($save);
            fclose($save_name);
        }
    }
    
    echo "\n";
    $climate->shout('Done, your result saved in folder "' . $save_dir . '" and "' . $save_dir_name .'".');
    
/**
 * Author  : Web Exorcist
 * Name    : Facebook Toolkit++
 * Version : 1.4
 * Update  : 12 June 2019
 * 
 * If you are a reliable programmer or the best developer, please don't change anything.
 * If you want to be appreciated by others, then don't change anything in this script.
 * Please respect me for making this tool from the beginning.
 */