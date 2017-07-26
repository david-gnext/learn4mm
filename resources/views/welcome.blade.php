@extends('layouts.app')
@section("external")
<script src="{{URL::asset('js/major.js')}}"></script>
@endsection
@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="flex-center position-ref full-height w3-container main-content">
<!--            card major -->
<div class="w3-row">
<?php
    foreach ($majors as $k=>$major) {
        $divi = $k + 1;
      if($divi % 3 == 0 ) {
          if(count($majors) == $k) {
              echo "</div>";
          } else {
              echo "</div><div class='w3-row'>";
          }
      } else {
          ?>
          <div class="w3-card-4 w3-col m3 s6 w3-center">

                <header class="w3-container <?= $major->class ?>">
                    <h4><?= $major->mname ?></h4>
                </header>

                <div class="w3-container">
                    <p><?= $major->description?></p>
                </div>

                <footer class="w3-container">
                    <h5 class="start-learn-btn w3-button <?= $major->class ?>" id="<?=$major->mid?>">ေလ့လာမည္</h5>
                </footer>

            </div>
    <?php
      }
    }
?>
        </div>
@endsection