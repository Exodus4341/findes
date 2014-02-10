<?php
	function isDupss($arr, $key){
        for($x=0; $x<sizeof($arr); $x++){   
         
            if(strcasecmp($arr[$x],$key) == 0){
                return true;
            }
        }
        return false;
    }

?>