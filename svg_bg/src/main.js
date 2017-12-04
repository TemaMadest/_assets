(function(window) {
	
	var matrixX,matrixY = [];
	
	var getInit = function(width, height){
		var w,h = 0, Woffset,Hoffset = 0;		
		
		if(width > 400 & width <= 1000){
			try{
				w = width / 15;
				h = height / 10;
				Woffset = 15;
				Hoffset = 10;
			}catch(e){
				throw ("fail in the first verify", e);
			}			
		}else if(width > 1000){
			try{
				w = width / 20;
				h = height / 15;
				Woffset = 20;
				Hoffset = 15;
			}catch(e){
				throw ("fail in the second verify", e);
			}	
		}
		
		/*if(Math.round(Math.random()*10) < 5){
			w = w - Math.random()*100 / 1.5;
		}else{
			w = w + Math.random()*100 / 1.5;
		}*/
		
		for (var i = 0; i <= Math.round(w); i++){
			matrixX[i] = matrixX[i] + Woffset;
		}
		for (var j = 0; j <= Math.round(h); j++){
			//matrixY[j] = 
		}
		
		//return w,h;
	}
	
	$(document).ready(function() {
					
		$('.inside').on('click', function(e){
			var coor = e.offsetX+","+e.offsetY;
			console.log(coor);
			var i = $('.mark').length + 1;
			$(this).append("<i class='mark' id='"+i+"' style='display:block;width:5px;height:5px;border-radius:50%;background:red;position:absolute;top:"+e.offsetY+"px;left:"+e.offsetX+"px;'></i>");
		});	

	});
	
	

})(window);