my_app.factory('forecast', [ '$http', function($http){
	return $http.get('core/ajaxRequest.php')
    .success(function(data) {
      return data;
    }) 
		.error(function(err) {
      return err;
    });
}]);