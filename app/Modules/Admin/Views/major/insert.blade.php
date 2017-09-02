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
