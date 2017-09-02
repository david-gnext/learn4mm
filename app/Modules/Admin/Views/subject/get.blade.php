<?php
        echo "<input type='hidden' value='$majorid' id='selected_major_id'>";
        foreach($subject as $m) {
            echo "<tr><td><input type='text' value='$m->name'  class='w3-input readonly' readonly></td><td><input type='text' value='$m->description' class='w3-input readonly' readonly></td>";
             echo "<td><button type='button' class='w3-button w3-indigo'><i class='fa fa-pencil-square-o'></i></button><button type='button' class='w3-button w3-red'><i class='fa fa-trash'></i></button>"
            . "<input type='hidden' value='$m->id' class='edit-subject-id'></td></tr>";
        }
  ?>
