/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $(".start-learn-btn").on("click",function() {
        $.ajax({
            url : "subject/"+this.id,
            type:"get",
            dataType : "html",
            success : function (html) {
                $(".main-content").html(html);
            }
        });
    });
    $(document).on("click",".sub-learn-btn",function() {
        $.ajax({
            url : "content/"+this.id,
            type:"get",
            dataType : "html",
            success : function (html) {
                $(".main-content").html(html);
            }
        });
    });
});

