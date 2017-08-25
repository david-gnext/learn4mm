<?php
        foreach($subject as $m) {
            echo "<tr><td><input type='text' value='$m->name'  class='w3-input readonly' readonly></td><td><input type='text' value='$m->description' class='w3-input readonly' readonly></td>";
            echo "<td><button type='button' class='w3-button w3-indigo'>Edit</button><button type='button' class='w3-button w3-red'>Delete</button></td></tr>";
        }
  ?>
