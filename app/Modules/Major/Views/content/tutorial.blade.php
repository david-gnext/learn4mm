<?php
    if(count($subjects) == 0) {
        echo "<div class='w3-panel w3-yellow w3-leftbar w3-border-red'><p style='padding:2rem;'>ယခုဘာသာရပ္အားမတင္ရေသးပါ။မၾကာမီလာမည္။</p>".
                "</div><a href='' class='w3-btn w3-display-middle w3-indigo'>Home</a>";
    }
    else {
       echo '<div class="flex-center position-ref full-height w3-container main-content read-section"><div class="w3-row">';
       echo '<div class="w3-col m11 s12 w3-border-gray  w3-white w3-card-4">';
       echo file_get_contents($subjects[0]->content_main);
       echo '</div></div></div>';
    }  
?>