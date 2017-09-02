<form class="w3-container" id="subject_insert">
    <div class="w3-group w3-margin">
         <label class="w3-label w3-col m4">Major Type</label>
         <input type="text" class="w3-col m8" value="{{$data['name'][0]->name}}" readonly>
         <input type="hidden" value="{{$data['mid']}}" name="majorId"/>
     </div>
    <div class="w3-padding-16"></div>
     <div class="w3-group w3-margin">
         <label class="w3-label">Subject Name</label>
         <input type="text" name="name" class="w3-input">
     </div>
     <div class="w3-group w3-margin">
         <label class="w3-label">Subject Description</label>
         <input type="text" name="desc" class="w3-input">
     </div>
     <div class="w3-group w3-margin">
         <label class="w3-label w3-col s4">Choose Subject Type</label>
         <select class="w3-select w3-hover-none w3-col s8" name="isRead">
             <option value="1">Read</option>
             <option value="0">Fill</option>
        </select>
      </div>
    </form>
