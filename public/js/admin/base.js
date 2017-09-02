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
    setInfoStepModal: function(t) {
        var info = '<div id="model-info-dialog" class="w3-modal info-step"><div class="w3-modal-dialog"><div class="w3-modal-content w3-card-4">'
                                +'<header class="w3-container w3-yellow"><a href="#" class="w3-closebtn"><i class="fa fa-close"></i></a><h2>Please Select Under List </h2></header></div></div>';
                    t.append(info);
                    $("#model-info-dialog").show();
                    Core.infoFlash($(".manage-table button").first());
                    $(".w3-closebtn").on("click",function(e){
                        e.stopPropagation();
                        $(this).parents().eq(3).remove();
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
       nameDesc : function(callback) {
           $(".manage-table button").off().on("click",function(){
                if($(this).index()) {
                    callback.delete($(this).parent().find("input").val());
                } else {
                    if($(this).data("edit")) {
                        callback.save($(this).parent().find("input").val(),$(this));
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
            Admin.edit.nameDesc(Admin.major);
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
        delete:function(id) {
            $.ajax({
                url : BASE_URL + '/admin/major/delete/'+id,
                type : 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType : "json",
                success : function(d) {
                    alert(d.msg);
                    Core.getTemplate('admin/major',Admin.major.complete);
                }
            });
        },
        save:function(id,t) {
            var data = $("#major_insert").serialize();
            var link = '/admin/major/save/new';
            if(id) {
                link = '/admin/major/save/'+id;
                data = {
                    name : t.parents().eq(1).find("input:first-child").val(),
                    desc : t.parents().eq(1).find("input").eq(1).val()
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
                    if(!id) Core.getTemplate('admin/major',Admin.major.complete);
                    $("#major_add_modal").remove();
                }
            });
        }
    },
    subject: {
        init : function() {
            $("#subject_add").off().on("click",function(e){
                e.preventDefault();
                if($(this).hasClass("disabled")) {
                    Admin.setInfoStepModal($(this));
                    return false;
                }
                var mid = $("#selected_major_id").val();
                Admin.getModal(this.id+"_modal",'subject/insert/'+mid,Admin.subject.create);
            });
            $(".manage-table button").off().on("click",function(){
                $("#subject_add").removeClass("disabled");
                if($(this).index()) {
                    
                } else {
                    Core.loadingIcon(true);
                    var id = $(this).parent().find("input").val();
                    $.ajax({
                        url : BASE_URL + '/admin/subject/get/'+id,
                        success : function(h) {
                            $(".manage-table tbody").html(h);
                            Admin.edit.nameDesc(Admin.subject);
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
        create:function() {
            $("#subject_create").off().on("click",function() {
                Admin.subject.save();
            });
        },
         delete:function(id) {
            $.ajax({
                url : BASE_URL + '/admin/subject/delete/'+id,
                type : 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType : "json",
                success : function(d) {
                    alert(d.msg);
                    $.ajax({
                        url : BASE_URL + '/admin/subject/get/'+$("#selected_major_id").val(),
                        success : function(h) {
                            $(".manage-table tbody").html(h);
                            Admin.edit.nameDesc(Admin.subject);
                            Core.loadingIcon(false);
                        }
                    });
                }
            });
        },
        save : function(id,t) {
            var data = $("#subject_insert").serialize();
            var link = '/admin/subject/save/new';
            if(id) {
                link = '/admin/subject/save/'+id;
                data = {
                    name : t.parents().eq(1).find("input:first-child").val(),
                    desc : t.parents().eq(1).find("input").eq(1).val()
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
                    if(!id) {
                     $.ajax({
                        url : BASE_URL + '/admin/subject/get/'+$("#selected_major_id").val(),
                        success : function(h) {
                            $(".manage-table tbody").html(h);
                            Admin.edit.nameDesc(Admin.subject);
                            Core.loadingIcon(false);
                        }
                    });
                }
                    $("#subject_add_modal").remove();
                }
            });
        }
    },
    content: {
        init : function() {
            $("#content_add").off().on("click",function(e){
                e.preventDefault();
                if($(this).hasClass("disabled")) {
                    Admin.setInfoStepModal($(this));
                    return false;
                }
                var mid = $("#selected_subject_id").val();
                Admin.getModal(this.id+"_modal",'content/insert/'+mid,Admin.content.create);
            });
           $(".manage-table button").off().on("click",function(){
                if($(this).index()) {
                    
                } else {
                    var link = $(this).parent().find("input").attr("class").split("-")[1];
                    if(link == "subject") {
                        $("#content_add").removeClass("disabled");
                        var thead = "<th>Content Main</th><th>Myanmar Meaning</th><th>question1</th><th>question2</th><th>question3</th>"
                                      + "<th>Answer</th><th>Choose Content Type</th><th>Audio</th><th>Image Link</th><th></th>";
                        $(".manage-table thead tr").html(thead);
                    }
                    Core.loadingIcon(true);
                    var id = $(this).parent().find("input").val();
                    $.ajax({
                        url : BASE_URL + '/admin/content/get/'+id,
                        data: {link:link},
                        success : function(h) {
                            $(".manage-table tbody").html(h);
                            if(link == "subject") {
                                Admin.edit.nameDesc(Admin.content);
                            } else {
                            Admin.content.init();
                            }
                            Core.loadingIcon(false);
                        }
                    });
                }
            }); 
        },
        create:function() {
            $("#content_create").off().on("click",function() {
                Admin.content.save();
            });
        },
         delete:function(id) {
            $.ajax({
                url : BASE_URL + '/admin/content/delete/'+id,
                type : 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType : "json",
                success : function(d) {
                    alert(d.msg);
                    $.ajax({
                        url : BASE_URL + '/admin/content/get/'+$("#selected_subject_id").val(),
                        success : function(h) {
                            $(".manage-table tbody").html(h);
                            Admin.edit.nameDesc(Admin.content);
                            Core.loadingIcon(false);
                        }
                    });
                }
            });
        },
        save : function(id,t) {
            var data = $("#content_insert").serialize();
            var link = '/admin/content/save/new';
            if(id) {
                data = {subjectId:$('#selected_subject_id').val()};
                t.parents().eq(1).find("input,select").each(function(){
                    data[$(this).attr("name")] = $(this).val();
                });
                link = '/admin/content/save/'+id;
            } else {
//                var sts = true;
//                $("#content_insert input").each(function() {
//                    if($(this).val() === "") {
//                        $(this).attr("placeholder","Type Something").addClass("input-error");
//                        sts = false;
//                        return false;
//                    }
//                    $(this).removeClass("input-error");
//                });
//                if(!sts) {
//                    return sts;
//                }
            }
            $.ajax({
                url : BASE_URL + link,
                type : 'POST',
                data : data,
                dataType : "json",
                success : function(d) {
                    alert(d.msg);
                    if(!id) {
                     $.ajax({
                        url : BASE_URL + '/admin/content/get/'+$("#selected_subject_id").val(),
                        data:{link:"subject"},
                        success : function(h) {
                            $(".manage-table tbody").html(h);
                            Admin.edit.nameDesc(Admin.content);
                            Core.loadingIcon(false);
                        }
                    });
                }
                    $("#content_add_modal").remove();
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
