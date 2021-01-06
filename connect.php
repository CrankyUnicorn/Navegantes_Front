<?php
 
        try  
        {  
            $serverName = "ANDROID-8FE6A54\SQLEXPRESS,63572";  
            $connectionOptions = array("Database"=>"Navegantes",  
                "Uid"=>"navegante", "PWD"=>"navega");  
            $conn = sqlsrv_connect($serverName, $connectionOptions);  
            if($conn == false){  
                die(var_dump(sqlsrv_errors()));
			}else{
				//echo("<p>Connecção bem sucedida!</p>");
			}
        }  
        catch(Exception $e)  
        {  
            echo("<p>Erro de connecção!</p>");  
        }  
 
?> 