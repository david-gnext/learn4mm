<?php
     if($link == "major") {
        foreach($subject as $m) {
            echo "<tr><td><input type='text' value='$m->name'  class='w3-input readonly' readonly></td><td><input type='text' value='$m->description' class='w3-input readonly' readonly></td>";
            echo "<td><button type='button' class='w3-button w3-indigo' id='select'>Select</button><input type='hidden' value='$m->id' class='edit-subject-id'></td></tr>";
        }
     } else {
         echo "<input type='hidden' value='$subjectid' id='selected_subject_id'>";
         foreach($subject as $m) {
            echo "<tr><td><input type='text' value='$m->content_main'  name='name' class='w3-input readonly' readonly></td><td><input type='text' value='$m->content_mm' name='mm' class='w3-input readonly' readonly></td>";
            echo "<td><input type='text' name='q1' value='$m->q1'  class='w3-input readonly' readonly></td><td><input type='text' name='q2' value='$m->q2' class='w3-input readonly' readonly></td>";
            echo "<td><input type='text' name='q3' value='$m->q3'  class='w3-input readonly' readonly></td><td><input type='text' name='ans' value='$m->ans' class='w3-input readonly' readonly></td>";
            echo '<td><select class="w3-select w3-hover-none w3-col s8" name="isRead"><option value="1"'.($m->isFill ?"selected":"").'>Fill</option><option value="0" '.($m->isFill ?"":"selected").'>No Fill</option></select></td>';
            echo "<td><input type='text' name='audio' value='$m->audio'  class='w3-input readonly' readonly></td><td><input type='text' name='img'  value='$m->img' class='w3-input readonly' readonly></td>";
            echo "<td><button type='button' class='w3-button w3-indigo'><i class='fa fa-pencil-square-o'></i></button><button type='button' class='w3-button w3-red'><i class='fa fa-trash'></i></button>"
            . "<input type='hidden' value='$m->id' class='edit-content-id' name='content-id'></td></tr>";
        }
     }
  ?>
