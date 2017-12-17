$(document).ready(function () {
   $("ul.dropdown > li.main").click(function(){
       if($(this).hasClass('title_active')) {
       $(this).removeClass('title_active');
       $(this).siblings().toggle();
       } else {
       $("ul.dropdown > li.title_active").siblings().toggle();
       $("ul.dropdown > li.title_active").removeClass('title_active');
       $("ul.dropdown > li").find(".newcare").addClass('down-care');
       $(this).siblings().toggle();
       $(this).addClass('title_active');
       }
       $(this).find(".newcare").toggleClass('down-care');
       //$(this).toggleClass("title-active");
    });
    $('a li.active').parent('a').siblings('.main').addClass('title_active');
});
