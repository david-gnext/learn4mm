@extends('layouts.app')
@section("external")
<script src="{{URL::asset('js/base.js')}}"></script>
<script src="{{URL::asset('js/major.js')}}"></script>
@endsection
@section('title', 'Created By David Jor Hpan (ေဒးဗစ္ေဂ်ာ္ဖန္)')

@section('sidebar')
@parent
<!--    for facebook share-->
<div id="fb-root"></div>
<!--<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1435983886447940";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->
@endsection

@section('content')
<div class="flex-center position-ref full-height w3-container main-content">
    <!--            card major -->
    <div class="w3-row">
        <?php
        if (count($majors) == 0) {
            echo "<div class='w3-panel w3-yellow w3-leftbar w3-border-red'><p style='padding:2rem;'>ယခုဘာသာရပ္အားမတင္ရေသးပါ။မၾကာမီလာမည္။</p>" .
            "</div><a href='' class='w3-btn w3-display-middle w3-indigo'>Home</a>";
        } else {
            foreach ($majors as $k => $major) {
                $divi = $k + 1;
                ?>
                <div class="w3-card-4 w3-col m3 s6 w3-center">

                    <header class="w3-container <?= $major->class ?>">
                        <h4><i class="fa fa-book"></i><?= $major->mname ?></h4>
                    </header>

                    <div class="w3-container">
                        <p><?= $major->description ?></p>
                    </div>

                    <footer class="w3-container">
                        <h5 class="start-learn-btn w3-button <?= $major->class ?>" id="<?= $major->mid ?>"><i class="fa fa-university"></i>ေလ့လာမည္</h5>
                    </footer>

                </div>
                <?php
                if ($divi % 3 == 0) {
                    if (count($majors) == $k) {
                        echo "</div>";
                    } else {
                        echo "</div><div class='w3-row'>";
                    }
                }
            }
        }
        ?>
    </div>
    @endsection
    <!--<div class="fb-share-button w3-display-bottommiddle" data-href="https://learn4myanmar.000webhostapp.com" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Flearn4myanmar.000webhostapp.com%2F&amp;src=sdkpreparse">Share</a></div>-->