<?php

        $date = $_POST['date'];
        $newsvendor = $_POST['newsvendor'];
        
        
        if ($newsvendor == "Kantipur"){
            
            $url = 'http://epaper.ekantipur.com/epaper/kantipur/'.$date.'/'.$date.'.pdf';
            
            if (!file_exists('C:\News')) {
                mkdir('C:\News', 0777, true);
            }
            $path = 'C:\News\\';
            $name = $date.'.pdf';
            //echo $path.$name; exit;
            $flag = DownloadKantipur($url, $path.$name);
            session_start();
            
            if($flag == 1)
                $_SESSION["message"] = "Download Successfull.";
            else
                $_SESSION["message"] = "Failed to Download";
            
            header('Location: index.php');
        }
            
        function DownloadKantipur($url, $outFileName)
        {       
                  
            $handle = curl_init($url);
            curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
            
            /* Get the HTML or whatever is linked in $url. */
            $response = curl_exec($handle);

            /* Check for 404 (file not found). */
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            if($httpCode == 404) {
               return 2;
                exit;
            }
            

            //curl_close($handle);
            
            if(is_file($url)) {
                copy($url, $outFileName); 
            } else {
                $options = array(
                  CURLOPT_FILE    => fopen($outFileName, 'w'),
                  CURLOPT_TIMEOUT =>  28800, // set this to 8 hours so we dont timeout on big files
                  CURLOPT_URL     => $url
                );
                
                //echo '<pre>'; print_r($options); echo '</pre>'; exit;

                $ch = curl_init();
             
                curl_setopt_array($ch, $options);
               
                
                curl_exec($ch);
                
                curl_close($ch);
                return 1;
            
            }
        }

?>