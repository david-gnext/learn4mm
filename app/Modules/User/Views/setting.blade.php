<!-- Header -->
<header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-user-circle"></i> My Profile</b></h5>
</header> 
<form class="w3-container w3-card-4 w3-padding-32" id="user_info_edit">
    <div class="w3-group w3-padding-16 w3-row">
        <label class="w3-label w3-col s2">Name</label><input type="text" name="email" value="<?=$info->email?>" class="w3-input w3-col s10">
    </div>
    <div class="w3-group w3-padding-16 w3-row">
        <label class="w3-label w3-col s2">Old Password</label>
        <div class=" w3-col s10">
        <input type="password" name="old-pass" value="" class="w3-input">
        <span class="w3-codespan w3-hide w3-red" id="old_p_error"></span>
        </div>
    </div>
    <div class="w3-group w3-padding-16 w3-row">
        <label class="w3-label w3-col s2">New Password</label>
        <div class=" w3-col s10">
            <input type="password" name="password" value="" class="w3-input" required id="new_pass">
        <button type="button" class="w3-button w3-gray" id="pass_text"><i class="fa fa-eye"></i></button> Make Password Visible
        </div>
    </div>
    <div class="w3-group w3-padding-16 w3-row">
        <?php
        $role = "USER";
        if($info->role == 1) {
            $role = "ADMIN";
        }
        ?>
        <label class="w3-label w3-col s2">Role</label><input type="text" value="<?=$role?>" class="w3-input w3-col s10" disabled>
    </div>
    <div class="w3-group w3-padding-16 w3-center">
        <button type="button" class="w3-button w3-indigo" id="user_info_edit_save">Save</button>
        <button type="button" class="w3-button w3-sand">Cancel</button>
    </div>
    <span class="w3-codespan w3-hide w3-green w3-padding-16" id="profile_passed_text"></span>
</form>