$(function(){

    var colors = ['#F43D6B','#B564D4','#FFDD40','#34C6CD','#7B72D8','#FFC140','rgb(150, 224, 169)'];
    var color = ['rgba(244, 61, 107, 0.51)','rgba(181, 100, 212, 0.5)','rgba(255, 221, 64, 0.5)','rgba(52, 198, 205, 0.5)','rgba(123, 114, 216, 0.5)','rgba(255, 193, 64, 0.5)','rgba(150, 224, 169, 0.5)'];
    var flag = false;

   var init = function(){
        var rand; 
        
        $('.row').each(function(){
            rand = Math.random().toFixed(2);
            if(rand >= 0 && rand < 0.15){
                $(this).children('.shadow').css({background: colors[0]});
                $(this).find('.title_row').css({background: color[0]});
            }else
            if(rand >= 0.15 && rand < 0.30){
                $(this).children('.shadow').css({background: colors[1]});
                $(this).find('.title_row').css({background: color[1]});
            }else
            if(rand >= 0.30 && rand < 0.45){
                $(this).children('.shadow').css({background: colors[2]});
                $(this).find('.title_row').css({background: color[2]});
            }else
            if(rand >= 0.45 && rand < 0.60){
                $(this).children('.shadow').css({background: colors[3]});
                $(this).find('.title_row').css({background: color[3]});
            }else
            if(rand >= 0.60 && rand < 0.75){
                $(this).children('.shadow').css({background: colors[4]});
                $(this).find('.title_row').css({background: color[4]});
            }else
            if(rand >= 0.75 && rand < 0.90){
                $(this).children('.shadow').css({background: colors[5]});
                $(this).find('.title_row').css({background: color[5]});
            }else
            if(rand >= 0.90 && rand < 1){
                $(this).children('.shadow').css({background: colors[6]});
                $(this).find('.title_row').css({background: color[6]});
            }else{
                $(this).children('.shadow').css({background: 'rgb(218, 217, 241)'});
                $(this).find('.title_row').css({background: 'rgb(218, 217, 241)'});
            }
        });
   }; 
   
    $('#open').click(function(){
        if(flag === false){
            $('.prod').css({
                transition:'all .8s cubic-bezier(.785,.135,.15,.86)',
                transform:'translateX(-'+Math.round($(window).width()/2)+'px)'
            });     
            $('.left-place-prod').css({
                transition:'all .7s ease',
                transform:'translateX(-'+Math.round($(window).width()/2)+'px)',
                opacity:'0'
            });
            $('.unvisible-block').css({
                left:'20px',
                opacity:'1',
            });
            flag = true;
        }else{
            $('.prod').css({
                transition:'all .8s cubic-bezier(.785,.135,.15,.86)',
                transform:'translateX(0px)'
            });     
            $('.left-place-prod').css({
                transition:'all .7s ease',
                transform:'translateX(0px)',
                opacity:'1'
            });
            $('.unvisible-block').css({
                left:'100%',
                opacity:'0',
            });
            flag = false;
        }
    });

    //для магазина
    var count_prod = 1;
                
    $('#shk_up').click(function(){
        count_prod++;
        $('.ccount').attr('value',count_prod);
        $('.tcount').attr('value',count_prod);
        return false;
    });
    
    $('#shk_down').click(function(){
        if(count_prod !== 1){
            count_prod--;
            $('.ccount').attr('value',count_prod);
            $('.tcount').attr('value',count_prod);
        }
        return false;
    });
   
   $('.cloce').click(function(){
        $('.cloce').parent().css({height: '40px'});
        
        if($(this).next('.cc').height() > 0){
            $(this).parent().css({
                transition: 'all .3s cubic-bezier(.785,.135,.15,.86)',
                height: $(this).next('.cc').height() + 55,
            });    
        }
    });
   
   
   
   
   init();
});
