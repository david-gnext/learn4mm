var Core = {
    init: function() {
       Core.setting.get();
    },
    setting: {
         get : function() {
        $(".setting-btn").on("click",function(){
            Core.getTemplate('setting',Core.setting.complete);
        });
        },
        complete : function(html) {
            $(".w3-main").html(html);
            $("#user_info_edit_save").on("click",function(){
                if($("#new_pass").val() == "") {
                    $("#new_pass").css("border","1px solid red");
                    return false;
                }
                $("#new_pass").css("border","none");
                $("#old_p_error,#profile_passed_text").addClass("w3-hide");
                Core.setting.save();
            });
            //setting visible password
            $("#pass_text").on("click",function(){
                var type = $(this).parent().find("input");
                if(type[0].type === "text") {
                    type[0].type= "password";
                    return false;
                }
                type[0].type = "text";
            });
            Core.loadingIcon(false);
        },
        save : function() {
            $.ajax({
                url : BASE_URL+'/setting/save',
                type:"POST",
                data : $("#user_info_edit").serialize(),
                dataType : "json",
                success : function(d) {
                    if(d.code === 400) {
                        $("#old_p_error").text(d.msg).removeClass("w3-hide");
                        return false;
                    }
                    $("#profile_passed_text").text(d.msg).removeClass("w3-hide");
                }
            });
        }
    },
    getTemplate: function(link,callback) {
        Core.loadingIcon(true);
         $.ajax({
                 url : BASE_URL+'/'+link,
                 type:'GET',
                 success : callback,
                 error : function(e) {
                     if(e.statusText == "Unauthorized") {
                         location.reload();
                     }
                 }
             });
    },
    loadingIcon: function(toggle) {
        $(".loader").remove();
        if(toggle) {
            $("body").append("<div class='w3-display-middle loader'></div>");
        }
    },
    infoFlash: function(ele){
        //flash message
        var info = setInterval(function(){
            ele.toggleClass("info-flash");
        },500);
        setTimeout(function(){
            ele.removeClass("info-flash");
           clearInterval(info);
        },6000);
    }
};
$(document).ready(function() {
    Core.init();
});