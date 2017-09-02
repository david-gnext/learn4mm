/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 var Major = {
    init: function() {
        Major.subject.init();
        Major.content.init();
    },
    subject : {
        init : function() {
            $(".start-learn-btn").on("click",function() {
                Major.subject.get(this.id);
            });
        },
        get : function(id){
            $.ajax({
            url : "subject/"+id,
            type:"get",
            dataType : "html",
            success : function (html) {
                $(".main-content").html(html);
            }
            });
        }
    },
    content : {
        init:function() {
            Major.content.clickSound();
            $(document).on("click",".sub-learn-btn",function(e) {
                if($(".ques-ans").length) {
                    Major.content.isSelected();
                    return false;
                }
                Major.content.get($(this).data("link"),this.id,$(this).data('type'));
            });
        },
        clickSound:function() {
            $(document).on("click",".fa-volume-up",function() {
                $(this).find("audio")[0].play();
            });
        },
        checkAns:function () {
           $.get("content/check/"+$("#content_id").val(),{ans:$(".ques-ans :radio:checked").parent().text()},function(d){
               d = JSON.parse(d);
               if(d[1]) {
                   var a = new Audio("audio/correct_answer.mp3");
                   a.play();
                   $(".ques-ans :radio:checked").parent().append("<i class='fa fa-check-circle w3-green w3-center'></i>");
                   Major.content.nextStep();
                   return true;
               }
               var a = new Audio("audio/wrong_answer.mp3");
               a.play();
               $(".ques-ans div").each(function(){
                   if($(this).text() == d[0]) {
                       $(this).append("<i class='fa fa-check-circle w3-green'></i>");
                   }
               });
              $(".ques-ans :radio:checked").parent().append("<i class='fa fa-times-circle w3-red'></i>");
             var info = '<div id="model-info-dialog" class="w3-modal"><div class="w3-modal-dialog"><div class="w3-modal-content w3-card-4">'
                                +'<header class="w3-container w3-red"><a href="#" class="model-info"><i class="fa fa-close"></i></a><h2>'+$("#hint").val()+'</h2></header></div></div>';
            $(".main-content").append(info);
            $("#model-info-dialog").show();
            $(".model-info").on("click",function(){
                $("#model-info-dialog").remove();
            });
              Major.content.nextStep();
           });
        },
        nextStep: function() {
            $(".sub-learn-btn").prop("disabled",true);
              setTimeout(function(){
                      var link = $(".sub-learn-btn").data("link");
                      //last page
                       if(!$(".sub-learn-btn").data("link")) {
                           location.reload();
                           return false;
                       }
                       Major.content.get(link);
                   },1000*10);
        },
        isSelected:function() {
            if($(".ques-ans :radio:checked").length){
                Major.content.checkAns();
                return;
            }
             var info = '<div id="model-info-dialog" class="w3-modal"><div class="w3-modal-dialog"><div class="w3-modal-content w3-card-4">'
                                +'<header class="w3-container w3-indigo"><a href="#" class="model-info"><i class="fa fa-close"></i></a><h2>Please Check Under Option </h2></header></div></div>';
            $("body").append(info);
            $("#model-info-dialog").show();
            $(".model-info").on("click",function(){
                $("#model-info-dialog").remove();
            });
            Core.infoFlash($(".ques-ans :radio"));
            return false;
        },
        get : function(link,id,type){
            if(typeof link == "undefined") {
                link = "content/"+id;
            }
            $.ajax({
                url : link,
                type:"get",
                dataType : "html",
                success : function (html) {
                    if(type) {
                        $('body').addClass("w3-gray");
                    }
                    $(".main-content").html(html);
                    if(type != null & $(".fa-volume-up").length) {
                                //info for audio
                         var info = '<div id="model-info-dialog" class="w3-modal"><div class="w3-modal-dialog"><div class="w3-modal-content w3-card-4">'
                                            +'<header class="w3-container w3-indigo"><a href="#" class="model-info"><i class="fa fa-close"></i></a><h2>အသံထြက္အတြက္ေဖာ္ၿပပါခလုတ္ကိုႏွိပ္ပါ</h2></header></div></div>';
                        $("body").append(info);
                        $("#model-info-dialog").css("padding-top","15rem").show();
                        $(".model-info").on("click",function(){
                            $("#model-info-dialog").remove();
                        });
                        Core.infoFlash($(".fa-volume-up"));
                    }
                }
            });
        }
    }

 }
$(document).ready(function(){
    Major.init();
});

