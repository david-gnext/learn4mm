/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var Admin = {
    init:function() {
        Admin.setButtonListen();
    },
    setButtonListen: function() {
        //admin home button
        $("#admin_home").off().on("click",function(){
            Core.getTemplate('admin/dashboard',Admin.home.complete);
        });
        //admin major page
        $("#admin_major").off().on("click",function(){
            Core.getTemplate('admin/major',Admin.major.complete);
        });
        //admin subject page
        $("#admin_subject").off().on("click",function(){
            Core.getTemplate('admin/subject',Admin.subject.complete);
        });
        //admin content page
        $("#admin_content").off().on("click",function(){
            Core.getTemplate('admin/content',Admin.content.complete);
        });
    },
    getModal:function(id,link,callback) {
        if($("#"+id).length == 0) {
            $("body").append('<div id="'+id+'" class="w3-modal"></div>');
        }
        $.ajax({
            url : BASE_URL+'/admin/'+link,
            success : function(modal) {
                $("#"+id).html(modal).show();
                $(".w3-closebtn").on("click",function(){
                     $("#"+id).remove();
                });
                callback();
            }
        });
    },
    edit : {
       nameDesc : function(save) {
           $(".manage-table button").off().on("click",function(){
                if($(this).index()) {
                    
                } else {
                    if($(this).data("edit")) {
                        save($(this).parent().find("input").val());
                        $(this).parents().eq(1).find("input").prop("readonly",true).addClass("readonly");
                        $(this).data("edit",false);
                        return false;
                    }
                    $(this).data("edit",true);
                    $(this).parents().eq(1).find("input").prop("readonly",false).removeClass("readonly");
                }
            });
       } 
    },
    home : {
        complete : function(h) {
             $(".w3-main").html(h);
            Core.loadingIcon(false);
        }
    },
    major: {
        init : function() {
            $("#major_add").off().on("click",function(){
                Admin.getModal(this.id+"_modal",'major/insert',Admin.major.create);
            });
            Admin.edit.nameDesc(Admin.major.save);
        },
        complete : function(h) {
             $(".w3-main").html(h);
            Core.loadingIcon(false);
            Admin.major.init();
        },
        create:function() {
            $("#major_create").off().on("click",function() {
                Admin.major.save();
            });
        },
        save:function(id) {
            var data = $("#major_insert").serialize();
            var link = '/admin/major/save/new';
            if(id) {
                link = '/admin/major/save/'+id;
                data = {
                    name : $(".manage-table input:first-child").val(),
                    desc : $(".manage-table input").eq(1).val()
                };
                var sts = true;
                $(".manage-table input").each(function() {
                    if($(this).val() === "") {
                        $(this).attr("placeholder","Type Something").addClass("input-error");
                        sts = false;
                        return false;
                    }
                    $(this).removeClass("input-error");
                });
                if(!sts) {
                    return sts;
                }
            } else {
                var sts = true;
                $("#major_insert input").each(function() {
                    if($(this).val() === "") {
                        $(this).attr("placeholder","Type Something").addClass("input-error");
                        sts = false;
                        return false;
                    }
                    $(this).removeClass("input-error");
                });
                if(!sts) {
                    return sts;
                }
            }
            $.ajax({
                url : BASE_URL + link,
                type : 'POST',
                data : data,
                dataType : "json",
                success : function(d) {
                    alert(d.msg);
                    $("#major_add_modal").remove();
                }
            });
        }
    },
    subject: {
        init : function() {
            $(".manage-table button").off().on("click",function(){
                if($(this).index()) {
                    
                } else {
                    Core.loadingIcon(true);
                    var id = $(this).parent().find("input").val();
                    $.ajax({
                        url : BASE_URL + '/admin/subject/get/'+id,
                        success : function(h) {
                            $(".manage-table tbody").html(h);
                            Admin.edit.nameDesc(Admin.subject.save);
                            Core.loadingIcon(false);
                        }
                    })
                }
            });
        },
        complete : function(h) {
             $(".w3-main").html(h);
            Core.loadingIcon(false);
            Admin.subject.init();
        },
        save : function() {
            alert("subject save");
        }
    },
    content: {
        init : function() {
           $(".manage-table button").off().on("click",function(){
                if($(this).index()) {
                    
                } else {
                    Core.loadingIcon(true);
                    var id = $(this).parent().find("input").val();
                    $.ajax({
                        url : BASE_URL + '/admin/content/get/'+id,
                        success : function(h) {
                            $(".manage-table tbody").html(h);
                            Core.loadingIcon(false);
                        }
                    })
                }
            }); 
        },
        complete : function(h) {
             $(".w3-main").html(h);
            Core.loadingIcon(false);
            Admin.content.init();
        }
    }
};
$(document).ready(function() {
    Admin.init();
});
