<?php
    if(count($subjects) == 0) {
        echo "<div class='w3-panel w3-yellow w3-leftbar w3-border-red'><p style='padding:2rem;'>ယခုဘာသာရပ္အားမတင္ရေသးပါ။မၾကာမီလာမည္။</p>".
                "</div><a href='' class='w3-btn w3-display-middle w3-indigo'>Home</a>";
    }
    else {
    foreach ($subjects as $k=>$subject) {
       echo file_get_contents($subject->content_main);
    }  
    }
?>