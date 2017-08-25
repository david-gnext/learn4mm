<?php
    if(count($subjects) == 0) {
        echo "<div class='w3-panel w3-yellow w3-leftbar w3-border-red'><p style='padding:2rem;'>ယခုဘာသာရပ္အားမတင္ရေသးပါ။မၾကာမီလာမည္။</p>".
                "</div><a href='' class='w3-btn w3-display-middle w3-indigo'>Home</a>";
    }
    else {
    echo '<div class="w3-row">';
    foreach ($subjects as $k=>$subject) {
        $divi = $k + 1;
      if($divi % 3 == 0 ) {
          if(count($subjects) == $k) {
              echo "</div>";
          } else {
              echo "</div><div class='w3-row'>";
          }
      } else {
          ?>
          <div class="w3-card-4 w3-col m3 s6 w3-center">

                <header class="w3-container <?= $subject->class ?>">
                    <h4><?= $subject->sname ?></h4>
                </header>

                <div class="w3-container">
                    <p><?= $subject->description?></p>
                </div>

                <footer class="w3-container">
                    <h5 class="sub-learn-btn w3-button <?= $subject->class ?>" id="<?=$subject->sid?>" data-type="<?=$subject->rd?>"><i class="fa fa-mortar-board"></i>ေလ့လာမည္</h5>
                </footer>

            </div>
    <?php
      }
    }
    }
?>