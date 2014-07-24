$().ready(function(){
    //Conportamento do Menu de navegação
    $("#menu li a").mouseover(function(){
        var index = $("#menu li a").index(this);
        
        $("#menu li").eq(index).children("ul").slideDown();
        if($(this).siblings('ul').size() > 0){
            return false;
        }
    });
    $("#menu li").mouseleave(function(){
        var index = $("#menu li").index(this);
        $("#menu li").eq(index).children("ul").slideUp();
    });
    
    //Comportamento do Categorias
    $("#dcategoria").click(function(){
       if($("#scategoria").is(":hidden")){
           $("#scategoria").slideDown();    
       }else{
           $("#scategoria").slideUp();
       }
    });
});