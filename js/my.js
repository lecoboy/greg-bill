$(".note").click(function(){
    var txt = $(this).val();
    if(txt == "买菜"){
        $(this).css("background-color","#138e8b");
    }else if(txt == "日用"){
        $(this).css("background-color","#386286");
    }
});