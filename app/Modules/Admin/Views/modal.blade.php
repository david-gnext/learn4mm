 <div class="w3-modal-dialog">
 <div class="w3-modal-content w3-card-8">
 <header class="w3-container w3-indigo">
     <a href="#" class="w3-closebtn w3-margin-right w3-display-topright"><i class="fa fa-close"></i></a>
 <h2>Create Major</h2>
 </header>
     <form class="w3-container" id="major_insert">
     <div class="w3-group w3-margin">
         <label class="w3-label">Major Name</label>
         <input type="text" name="name" class="w3-input">
     </div>
     <div class="w3-group w3-margin">
         <label class="w3-label">Major Description</label>
         <input type="text" name="desc" class="w3-input">
     </div>
     <div class="w3-group w3-margin">
         <label class="w3-label w3-col s4">Choose Color</label>
         <select class="w3-select w3-hover-none w3-col s8" name="cname">
         <?php
         foreach ($colors as $c) {
             echo "<option>$c</option>";
         }
         ?>
     </select>
      </div>
    </form>
     <div class="w3-container w3-margin"></div>
     <footer class="w3-container w3-gray w3-padding">
         <button type="button" class="w3-btn w3-indigo" title="Create" id="major_create"><i class="fa fa-podcast"></i></button>
         <button type="button" class="w3-btn w3-closebtn w3-sand">Close</button>
     </footer>
 </div>
 </div>
