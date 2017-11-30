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
        ans : null,
        hint : null,
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
        speakTest:function() {
            if($("#speakTest").length === 0) return;
            var recognizing;
            var recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.start();
            recognizing = true;
            var userVoice,target = $(".main-content header h4").text().toLowerCase().trim();
            recognition.onresult = function (event) {
            for (var i = event.resultIndex; i < event.results.length; ++i) {
              if (event.results[i].isFinal) {
                userVoice = event.results[i][0].transcript;
              }
            }
            if($(".speak-result").length >= 3) {
                $(".speak-result").remove();
            }
            if(userVoice.toLowerCase().trim() == target) {
              $("<div class='w3-green w3-padding speak-result'>").text("သင္ေၿပတာမွန္ပါတယ္").appendTo(".main-content .content-block");
            } else {
              $("<div class='w3-red w3-padding speak-result'>").text("သင္ေၿပတာမွားပါတယ္").appendTo(".main-content .content-block");
            }
        }
          recognition.onend = recognition.stop();
        },
        clickSound:function() {
            $(document).on("click",".fa-volume-up",function() {
                $(this).find("audio")[0].play();
            });
        },
        checkAns:function () {
            var userAns = $(".ques-ans :radio:checked").parent().text();
               if(userAns == Major.content.ans) {
                var a = new Audio("audio/correct_answer.mp3");
                a.play();
                $(".ques-ans :radio:checked").parent().append("<i class='fa fa-check-circle w3-green w3-center'></i>");
                Major.content.nextStep();
                return true;
            }
            var a = new Audio("audio/wrong_answer.mp3");
            a.play();
            $(".ques-ans div").each(function(){
                if($(this).text() == Major.content.ans) {
                    $(this).append("<i class='fa fa-check-circle w3-green'></i>");
                }
            });
           $(".ques-ans :radio:checked").parent().append("<i class='fa fa-times-circle w3-red'></i>");
          var info = '<div id="model-info-dialog" class="w3-modal"><div class="w3-modal-dialog"><div class="w3-modal-content w3-card-4">'
                             +'<header class="w3-container w3-red"><a href="#" class="model-info"><i class="fa fa-close"></i></a><h2>'+Major.content.hint+'</h2></header></div></div>';
         $(".main-content").append(info);
         $("#model-info-dialog").show();
         $(".model-info").on("click",function(){
             $("#model-info-dialog").remove();
         });
         Major.content.nextStep();
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
                    if($(html).find("#hint").length) {
                        Major.content.hint = $(html).find("#hint").val();
                    }
                    if($(html).find("#ans").length) {
                        var idx = $(html).find("#ans").val().split("")[1] - 1;
                        Major.content.ans = $(html).find(".ques-ans span").eq(idx).text();
                    }
                    $(".main-content").html(html);
                    Major.content.speakTest();
                    $("#hint").remove();$("#ans").remove();
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

