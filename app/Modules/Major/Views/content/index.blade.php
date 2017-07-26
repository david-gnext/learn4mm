<?php
    if(count($subjects) == 0) {
        echo "<div class='w3-panel w3-yellow w3-leftbar w3-border-red'><p style='padding:2rem;'>ယခုဘာသာရပ္အားမတင္ရေသးပါ။မၾကာမီလာမည္။</p>".
                "</div><a href='' class='w3-btn w3-display-middle w3-indigo'>Home</a>";
    }
    else {
    echo '<div class="w3-row">';
    foreach ($subjects as $k=>$subject) {
          ?>
          <div class="w3-col m11 s12 w3-center w3-border-gray">

                <header class="w3-container <?= $subject->class ?>">
                    <h4><?= $subject->content_main ?></h4>
                </header>

                <div class="w3-container">
                    <p><?= $subject->content_mm?></p>
                    <img src="<?=$subject->img?>" height="300"/>
                </div>

                <footer class="w3-container">
                    <h5 class="sub-learn-btn w3-button <?= $subject->class ?>">ေနာက္တစ္ခု</h5>
                </footer>

            </div>
    <?php
    }
    }
?>