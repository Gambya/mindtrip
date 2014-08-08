$().ready(function(){
    //Chamada do carrocel
    $("body").queryLoader2();
    
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
    
    //Comportamento do header
    $(window).scroll(function(){
        if($(this).scrollTop() > 78){
            $('.header').addClass("fixo");
        }else{
            $('.header').removeClass("fixo");
        }
    });
    
    //Retirar title de links ao passar mouse envima e recolocar
    $(".menu a").hover(function(){

        // Pegar title corrente
        var title = $(this).attr("title");

        // Store it in a temporary attribute
        $(this).attr("tmp_title", title);

        // Setar title para deixar ele vazio
        $(this).attr("title","");
        
    });

  $(".menu a").click(function(){

        // Retrieve the title from the temporary attribute
        var title = $(this).attr("tmp_title");

        // Return the title to what it was
        $(this).attr("title", title);
        
    });
    
});