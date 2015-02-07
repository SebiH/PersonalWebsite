var app = angular.module('SeHub', ['ui.router', 'ngMaterial']);

app.config(function($locationProvider, $stateProvider, $urlRouterProvider) {
  // It's 2015. I think we can start dropping non-html5 browser support now.
  $locationProvider.html5Mode({
      enabled: true,
      requireBase: false
  });
  // For any unmatched url, redirect to /home
  $urlRouterProvider.otherwise("/home");

  $stateProvider
    .state('home', {
      url: "/home",
      templateUrl: "content/home.html"
    })
    .state('CV', {
      url: "/CV",
      templateUrl: "content/CV.html"
    })
    .state('contact', {
      url: "/contact",
      templateUrl: "content/contact.html"
    })
    .state('error', {
      url: "/error",
      templateUrl: "content/error.html"
    })
    .state('aboutme', {
      url: "/aboutme",
      templateUrl: "content/aboutme.html"
    })
    .state('projects', {
      url: "/projects",
      templateUrl: "content/projects.html"
    });
});

app.controller('NavigationController', function($scope) {
    // TODO: https://github.com/angular-ui/ui-router/issues/456
    $scope.showMenu = true;

    $scope.toggleMenu = function() {
        $scope.showMenu = !me.showMenu;
    };


    function init() {
        // hide menu on small screens
        if (window.innerWidth < 1000)
            $scope.showMenu = false;
    };
    init();
});


app.controller('ContactController', function($scope, $http) {
    $scope.data = { };
    $scope.formSent = false;

    $scope.send = function() {
        window.alert('x');

        $http.post('scripts/send_mail.php', $scope.data)
            .success(function(result) {
                if (result.success)
                    $scope.formSent = true;
                else
                    window.alert(result.error);
            })
            .error(function() {
                window.alert("Could not send form - is the website still reachable?");
            });
    };
});


