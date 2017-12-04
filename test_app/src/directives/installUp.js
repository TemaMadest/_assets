my_app.directive('installUp', function(){
	return {
  	restrict: 'E',
    scope: {},
    templateUrl: 'src/directives/tmp/installUp.html',
    link: function(scope, element, attrs){
      scope.buttonText = "unactive",
      scope.installed = false,
      scope.download = function(){
        element.toggleClass('btn-active');
        if(scope.installed){
          scope.buttonText = "unactive";
          scope.installed = false;
        }else{
          scope.buttonText = "active";
          scope.installed = true;
        }
      }
    }
  };
});