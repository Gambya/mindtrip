$().ready(function(){
    $(".carrocel a:eq(0)").addClass("ativo").show();
    var titulo = $(".ativo").parent("a").attr("title");
    $(".caixa-texto h1").hide().html(titulo).delay(500).fadeIn();
    
    var qtdImg = $(".carrocel").find("img").size(); // Pegar a quantidade de imagens existem dentro da tag carrocel
    var str = "";
    var timer = null;
    
    for(var i = 0; i<qtdImg; i++){
        str += '<li><a href="#" alt="'+i+'">'+i+'</a></li>';
    }
    $(".caixa-seletor").html("<ul>"+str+"</ul>").fadeIn();
    $(".caixa-seletor ul li a:eq(0)").addClass("active");
    
    timer = setInterval(slide,3000);
    var cont = 0;
    function slide(){
        if($(".carrocel").find("a").length > 1){
            if($(".ativo").next("a").length){
                $(".ativo").fadeOut().removeClass("ativo").next().fadeIn().addClass("ativo");
                titulo = $(".ativo").attr("title");
                $(".caixa-texto h1").hide().html(titulo).delay(500).fadeIn();
                $(".active").removeClass("active").parent("li").next().children().addClass("active");
                
            }else{
                
                $(".ativo").fadeOut().removeClass("ativo");
                $(".carrocel a:eq(0)").fadeIn().addClass("ativo");
                titulo = $(".ativo").attr("title");
                $(".caixa-texto h1").hide().html(titulo).delay(500).fadeIn();
                $(".active").removeClass("active");
                $(".caixa-seletor ul li a:eq(0)").addClass("active");
                
            }
        }
    }
    $(".caixa-seletor a").click(function(){
        var position = $(this).attr("alt");
        
        $(".ativo").fadeOut().removeClass("ativo");
        $(".carrocel a").eq(position).fadeIn().addClass("ativo");
        titulo = $(".ativo").attr("title");
        $(".caixa-texto h1").hide().html(titulo).delay(500).fadeIn();
        $(".active").removeClass("active");
        $(".caixa-seletor ul li a:eq("+position+")").addClass("active");
    });
});