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
            $(document).on("click",".sub-learn-btn",function() {
                Major.content.get($(this).data("link"),this.id,$(this).data('type'));
            });
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
                }
            });
        }
    }

 }
$(document).ready(function(){
    Major.init();
});

