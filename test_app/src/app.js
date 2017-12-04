var my_app = angular.module('my_app', []);


my_app.config(function($routeProvider){
	$routeProvider
  	.when('/', {
  		controller: 'HomeController',
    	templateUrl: 'views/home.html'
  	})
  	.when('/', {
  		controller: 'MainController',
    	templateUrl: 'views/photo.html'
  	})
  	.otherwise({
  		redirectTo: '/'
  	});
});