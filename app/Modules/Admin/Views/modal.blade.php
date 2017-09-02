 <div class="w3-modal-dialog">
 <div class="w3-modal-content w3-card-8">
 <header class="w3-container w3-indigo">
     <a href="#" class="w3-closebtn w3-margin-right w3-display-topright"><i class="fa fa-close"></i></a>
 <h2>{{$data["title"]}}</h2>
 </header>
    @include("Admin::$data[child]/insert")
     <div class="w3-container w3-margin"></div>
     <footer class="w3-container w3-gray w3-padding">
         <button type="button" class="w3-btn w3-indigo" title="Create" id="{{$data['id']}}"><i class="fa fa-podcast"></i></button>
         <button type="button" class="w3-btn w3-closebtn w3-sand">Close</button>
     </footer>
 </div>
 </div>
