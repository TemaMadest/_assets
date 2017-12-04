my_app.directive('appInfo', function() { 
  return { 
    restrict: 'E', 
    scope: { 
      info: '=' 
    }, 
    templateUrl: 'src/directives/tmp/appInfo.html'
  }; 
});