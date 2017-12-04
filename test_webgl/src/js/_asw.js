(function(){
	window.triangles = [], window.Striangles = [];
	
	var VERTICAL = 11, GORIZONTAL = 14, scene, camera, renderer, w = $(window).width(), h = $(window).height(), 
	coordinates, renderObj = [], countX = w/GORIZONTAL, countY = h/VERTICAL, offsetX = 0, offsetY = 0,
	
	//generate random number
	getRandomInt = function(min, max) {
		return Math.floor(Math.random() * (max - min)) + min;
	},
	
	//calculate coord for triangles
	calculeteObj = function(){
		var tmp;
		if(w < h){
			tmp = VERTICAL;
			VERTICAL = GORIZONTAL;
			GORIZONTAL = tmp;
		}
		coordinates = new Array(VERTICAL);
		for(var t = 0; t < coordinates.length; t++) coordinates[t] = new Array(GORIZONTAL);
		for(var j = 0; j < VERTICAL; j++){
			for(var i = 0; i < GORIZONTAL; i++){
				coordinates[j][i] = {};
				coordinates[j][i].y = Math.round(getRandomInt(-countY/2.5, countY/2.5) + offsetY);
				coordinates[j][i].x = Math.round(getRandomInt(-countX/2.5, countX/2.5) + offsetX);
				coordinates[j][i].biasX = Math.round(getRandomInt(-countX/2.5, countX/2.5));
				coordinates[j][i].biasY = Math.round(getRandomInt(-countY/2.5, countY/2.5));
				coordinates[j][i].speedX = getRandomInt(400, 700);
				coordinates[j][i].speedY = getRandomInt(400, 700);
				offsetX += countX;
			}
			offsetX = 0;
			offsetY += countY;
		}
	},

	//create triangles
  create_triangle = function(f,j,i,mode){
		var triangle, material, out, orientation, color;
		if (mode == "one") {
			orientation = 1;
			color = true;
		}else if(mode == "two"){
			orientation = -1;
			color = false;
		} else return false;
		triangle = new THREE.Geometry();
		material = new THREE.MeshBasicMaterial({color: color ? 0xcdcdcd : 0xdcdcdc, side: THREE.DoubleSide});
		triangle.vertices.push(new THREE.Vector3(f[j][i].x, f[j][i].y, 0));
		triangle.vertices.push(new THREE.Vector3(f[j][i+orientation].x, f[j][i+orientation].y, 0));
		triangle.vertices.push(new THREE.Vector3(f[j+orientation][i].x, f[j+orientation][i].y, 0));
		triangle.faces.push(new THREE.Face3(0,1,2));
		triangle.computeFaceNormals();
		out = new THREE.Mesh(triangle, material);
		out.name = name;
		out.bias = [
			{ x: f[j][i].biasX, y: f[j][i].biasY },
			{ x: f[j][i+orientation].biasX, y: f[j][i+orientation].biasY },
			{ x: f[j+orientation][i].biasX, y: f[j+orientation][i].biasY }
		];	
		out.speed = [
			{x: f[j][i].speedX, y: f[j][i].speedY},
			{x: f[j][i+orientation].speedX, y: f[j][i+orientation].speedY},
			{x: f[j+orientation][i].speedX, y: f[j+orientation][i].speedY},
		];
		return out;
  },

	//add triangles
	add_triangles = function(f){
    var g = 0, r, d;		
    for(var j = 0; j < VERTICAL; j++){
      for(var i = 0; i < GORIZONTAL; i++){
        if(i + 1 > GORIZONTAL - 1 || j + 1 > VERTICAL - 1) continue
        try{
					r = create_triangle(f,j,i,'one');
					if (r){
						 triangles[g] = r; 
						 scene.add(triangles[g]);
					}else throw new Error('do not suitable mode');
					if(j > 0 && i > 0){
						d = create_triangle(f,j,i,'two');
						if (d){
							Striangles[g] = d;
							scene.add(Striangles[g]);
						}						
					}			
          g++;
        }catch(e){
          throw new Error(e);
        }
      }
    }
	},

	//Start animate triangles
	StartAnimate = function(){
		triangles.forEach(function(e){
			e.bias.forEach(function(i, c){
				if(i.x < 0) i.modeX = "down"; else i.modeX = "up";
				if(i.y < 0) i.modeY = "down"; else i.modeY = "up";
				i.rangeX = e.geometry.vertices[c].x;
				i.rangeY = e.geometry.vertices[c].y;
			});
			renderObj.push(function(){
				SettlementsVerties(e);
			});
		});
		Striangles.forEach(function(e){
			e.bias.forEach(function(i, c){
				if(i.x < 0) i.modeX = "down"; else i.modeX = "up";
				if(i.y < 0) i.modeY = "down"; else i.modeY = "up";
				i.rangeX = e.geometry.vertices[c].x;
				i.rangeY = e.geometry.vertices[c].y;
			});
			renderObj.push(function(){
				SettlementsVerties(e);
			});
		});
	},
	
	//Settlement bias and speed of triangle verties
	SettlementsVerties = function(element){
		element.bias.forEach(function(i, c){
			if (i.modeX == "up"){
				if (element.geometry.vertices[c].x <= i.rangeX + Math.abs(i.x)) {element.geometry.vertices[c].x += Math.abs(i.x/element.speed[c].x); } else i.modeX = "down";
			}else{
				if (element.geometry.vertices[c].x >= i.rangeX - Math.abs(i.x)) {element.geometry.vertices[c].x -= Math.abs(i.x/element.speed[c].x); } else i.modeX = "up";
			}
			if(i.modeY == "up"){
				if(element.geometry.vertices[c].y <= i.rangeY + Math.abs(i.y)) {element.geometry.vertices[c].y += Math.abs(i.y/element.speed[c].y); } else i.modeY = "down";
			}else{
				if (element.geometry.vertices[c].y >= i.rangeY - Math.abs(i.y)) {element.geometry.vertices[c].y -= Math.abs(i.y/element.speed[c].y); } else i.modeY = "up";
			}
			element.geometry.verticesNeedUpdate = true;
		});
	},

	//Stop animate triangles
	StopAnimate = function(){
		renderObj.length = 0;
	},

	//add a light on stage
	addLight = function(){
		var light = new THREE.AmbientLight(0x0c0c0c);
		var spotLight = new THREE.SpotLight(0xffffff);
		scene.add(spotLight);
		scene.add(light);
		//spotLight.position.set(1100,h/2-50, 2000);
		spotLight.position.set(w/2,h/2, 5000);
	},

	//add a cam on stage
	addCam = function(){
		camera = new THREE.PerspectiveCamera(40, w/h, 0.1, 1000);
		camera.position.set(w/2-100,h/2-50,700);
	},

	//add a sphere on stage
	addSphere = function(){
		var geometry = new THREE.SphereGeometry(200, 50, 50, 20, 20);
		var material = new THREE.MeshBasicMaterial({color: 0x472F6D, wireframe: true});
		var sphere = new THREE.Mesh(geometry, material);
		scene.add(sphere);
		renderObj.push(function(){
			sphere.rotation.y += 0.01;
			sphere.rotation.x += 0.01;
			sphere.rotation.z += 0.01;
		});
	},

	//add a cube on stage
	addCube = function(){
		var cubeGeometry = new THREE.CubeGeometry(300,300,300,50,50,50);
		var cubeMaterial = new THREE.MeshNormalMaterial({wireframe: true, side:THREE.DoubleSide});
		//cubeMaterial = new THREE.MeshLambertMaterial( { color: 0xfeb74c, map: new THREE.TextureLoader().load( "textures/square-outline-textured.png" ) } );
		
		/*текстурирование
		
		 var imagePrefix = "http://megakolyan.ru/libs/img/sbox_";
		 var directions  = ["px", "nx", "py", "ny", "pz", "nz"];
		 var imageSuffix = ".jpg";
		 var skyGeometry = new THREE.CubeGeometry( 300, 300, 300 ); 

		 var materialArray = [];
		 for (var i = 0; i < 6; i++)
			 materialArray.push( new THREE.MeshBasicMaterial({
				 map: THREE.ImageUtils.loadTexture( imagePrefix + directions[i] + imageSuffix ),
				 side: THREE.BackSide
			 }));
		 var skyMaterial = new THREE.MeshFaceMaterial( materialArray );
		 var skyBox = new THREE.Mesh( skyGeometry, skyMaterial );
		 scene.add( skyBox );
		*/
		
		var cube = new THREE.Mesh(cubeGeometry, cubeMaterial);	
		scene.add(cube);
		renderObj.push(function(){
			cube.rotation.y += 0.01;
			cube.rotation.x += 0.01;
		});
	},

	loading = function(){
		/*var manager = new THREE.LoadingManager();
		manager.onProgress = function (item, loaded, total){
			console.log(item, loaded, total);
		};
		var loader = new THREE.ObjectLoader(manager);
		loader.load( 'model.obj', function (object){
			scene.add(object);
		});*/
	},
	
	//scene redraws
	draw = function(){
		requestAnimationFrame(draw);
		renderObj.forEach(function(callback){callback()});
		renderer.render(scene, camera);
	},

	//init function
	Init = function(){
		if (!window.WebGLRenderingContext) {
			throw new Error(e); alert('Скорее всего ваш браузер не поддерживает webGL');
		}		
		calculeteObj();
		var canvas = document.getElementById('canvas');
		canvas.setAttribute('width', w-4);
		canvas.setAttribute('height', h-4);
		renderer = new THREE.WebGLRenderer({canvas: canvas});
		renderer.setClearColor(0xB1B1B1);
		scene = new THREE.Scene();
		//addCube();
		//addSphere();
		add_triangles(coordinates);
		setTimeout(StartAnimate, 500);
		addCam();
		addLight();
		loading();
		draw();
	};

	//events
	window.onload = function(){
		Init();
	};
})();