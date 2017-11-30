<form class="w3-container" id="content_insert">
    <div class="w3-group w3-margin">
         <label class="w3-label w3-col m4">Content Type</label>
         <input type="text" class="w3-col m8" value="{{$data['name'][0]->name}}" readonly>
         <input type="hidden" value="{{$data['subjectId']}}" name="subjectId"/>
     </div>
    <div class="w3-padding-16"></div>
     <div class="w3-group w3-margin">
         <label class="w3-label">Content Name</label>
         <input type="text" name="name" class="w3-input">
     </div>
     <div class="w3-group w3-margin">
         <label class="w3-label">Content Myanmar</label>
         <input type="text" name="mm" class="w3-input">
     </div>
    <div class="w3-group w3-margin">
         <label class="w3-label">Question1</label>
         <input type="text" name="q1" class="w3-input">
     </div>
    <div class="w3-group w3-margin">
         <label class="w3-label">Question2</label>
         <input type="text" name="q2" class="w3-input">
     </div>
    <div class="w3-group w3-margin">
         <label class="w3-label">Question3</label>
         <input type="text" name="q3" class="w3-input">
     </div>
    <div class="w3-group w3-margin">
         <label class="w3-label">Answer</label>
         <input type="text" name="ans" class="w3-input">
     </div>
    <div class="w3-group w3-margin">
         <label class="w3-label">Hint</label>
         <input type="text" name="hint" class="w3-input">
     </div>
     <div class="w3-group w3-margin">
         <label class="w3-label w3-col s4">Choose Content Type</label>
         <select class="w3-select w3-hover-none w3-col s8" name="isRead">
             <option value="1">Fill</option>
             <option value="0">No Fill</option>
             <option value="2">Voice</option>
        </select>
      </div>
    <div class="w3-group w3-margin">
         <label class="w3-label">Audio</label>
         <input type="text" name="audio" class="w3-input">
     </div>
    <div class="w3-group w3-margin">
         <label class="w3-label">Image</label>
         <input type="text" name="img" class="w3-input">
     </div>
    </form>
