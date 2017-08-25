<header class="w3-container" style="padding-top:22px">   
    <h4><i class="fa fa-book"></i> Content Management</h4>
</header>
@include("Admin::dbstatus")
<nav class="w3-container w3-topbar w3-pale-green">
    <a href="#" class="w3-button w3-padding-16 w3-white">Add</a>
</nav>
<div class="w3-responsive">
<table class="w3-table w3-bordered w3-border manage-table">
    <thead>
        <tr>
            <th>Name</th><th>Description</th><th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($dbstatus["major"]["data"] as $m) {
            echo "<tr><td><input type='text' value='$m->name'  class='w3-input readonly' readonly></td><td><input type='text' value='$m->description' class='w3-input readonly' readonly></td>";
            echo "<td><button type='button' class='w3-button w3-indigo'>Select</button><input type='hidden' value='$m->id' class='edit-major-id'></td></tr>";
        }
        ?>
    </tbody>
</table>
</div>