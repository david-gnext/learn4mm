<?php
function display($subjects) {
    if (count($subjects) == 0) {
        echo "<div class='w3-panel w3-yellow w3-leftbar w3-border-red'><p style='padding:2rem;'>ယခုဘာသာရပ္အားမတင္ရေသးပါ။မၾကာမီလာမည္။</p>" .
        "</div><a href='' class='w3-btn w3-display-middle w3-indigo'>Home</a>";
    } else {
        echo '<div class="flex-center position-ref full-height w3-container main-content"><div class="w3-row">';
        foreach ($subjects as $k => $subject) {
            ?>
            <div class="w3-col m11 s12 w3-center w3-border-gray w3-card-4">

                <header class="w3-container <?= $subject->class ?>">
                    <h4><?= $subject->content_main ?></h4>
                </header>

                <div class="w3-container">
                    <p><?= $subject->content_mm ?></p>
                    <?php
                    if (FALSE == empty($subject->ans)) {
                        echo "<div class='ques-ans'>";
                        echo "<div class='w3-col m10 s12'><input  type='radio' name='q' value>$subject->q1</div>";
                        echo "<div class='w3-col m10 s12'><input  type='radio' name='q'>$subject->q2</div>";
                        echo "<div class='w3-col m10 s12'><input  type='radio' name='q'>$subject->q3</div>";
                        echo "</div>";
                    } else {
                        ?>
                        <img src="<?= $subject->img ?>" height="300"/>
                        <?php
                    }
                    ?>
                </div>

                <footer class="w3-container">
                    <?php
                    if (!$subjects->hasMorePages()) {
                        echo '<a class="sub-learn-btn w3-button ' . $subject->class . '" href="">ၿပီးပါၿပီ</a>';
                    } else {
                        ?>
                        <h5 class="sub-learn-btn w3-button <?= $subject->class ?>" data-link="<?= $subjects->nextPageUrl() ?>">ေနာက္တစ္ခု</h5>
                        <?php
                    }
                    ?>
                </footer>

            </div>
            <?php
        }
        echo "</div></div>";
    }
}
?>
<?php
if (!$ajax) {
    ?>    
    @extends("layouts.app")
    @section('title', 'Content')

    @section('sidebar')
    @parent

    @endsection
    @section('content')
    <?= display($subjects) ?>
    @endsection
    <?php
} else {
    display($subjects);
    exit;
}
?>   