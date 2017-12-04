my_app.controller('MainController', ['$scope', 'forecast', function($scope, forecast) {

  $scope.apps = [
    {
    	icon: 'http://cs543107.vk.me/v543107904/1addb/HdZKZdnYW-M.jpg',
      title: 'Chevrole Camaro',
      developer: 'MOVE, Inc.',
      price: 2000000
    },
    {
    	icon: 'http://cs543107.vk.me/v543107904/1aea8/t8yYZZJJVk0.jpg', 
      title: 'lamborgini', 
      developer: 'Murceleago', 
      price: 22000100 
    },
    {
    	icon: 'http://cs543104.vk.me/v543104781/275b3/yugdrKoGsKk.jpg', 
      title: 'hopeless', 
      developer: 'self', 
      price: 0 
    },
    {
    	icon: 'http://cs628726.vk.me/v628726269/535f0/e_GBr-Saj6w.jpg', 
      title: 'WarCraft', 
      developer: 'Blizzard', 
      price: 450 
    },
		{
			icon: 'http://cs636028.vk.me/v636028753/cd7a/TFi6230LUBQ.jpg',
			title: 'Forecast',
			developer: 'Forecast',
			price: 1.99
		},
		{
			icon: 'http://cs543104.vk.me/v543104832/12255/yVFFlkSSWJ8.jpg',
			title: 'Gameboard',
			developer: 'Armando P.',
			price: 1.99
		},
		{
			icon: 'http://cs636028.vk.me/v636028753/cd96/jSBcFu-3YaQ.jpg',
			title: 'Shutterbugg',
			developer: 'Chico Dusty',
			price: 2.99
		},
		{
			icon: 'http://cs635102.vk.me/v635102418/16b5e/fGDC8IeyrOU.jpg',
			title: 'MOVE',
			developer: 'MOVE, Inc.',
			price: 0.99
		}		
  ];

	
	forecast
		.success(function(data){
			if(typeof data !== "object") return false;
			$scope.d = [];
			data.forEach(function(e,i){			
				$scope.d.push({
					icon: e.image,
					title: e.title,
					developer: e.publish,
					price: e.price
				});			
			});
		})
		.error(function(e){
			throw new error(e);
		});
	
	
}]);