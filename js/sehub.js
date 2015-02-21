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


app.controller('NavigationController', function($scope, $window) {
    var MIN_WIDTH_FOR_VISIBLE_MENU = 1000;

    $scope.showMenu = true;
    // to prevent automatic window opening/closing
    $scope.manuallyToggledWindow = false;

    $scope.toggleMenu = function() {
        $scope.manuallyToggledWindow = true;
        $scope.showMenu = !$scope.showMenu;
    }; 

    $scope.width = $window.innerWidth;
    console.log("starting with: " + $scope.width);

    // angularjs won't update innerwidth automatically..
    var win = angular.element($window);
    win.bind("resize", function(e) {
        $scope.width = $window.innerWidth;
        updateMenuVisibility();
        $scope.$apply();
    });

    // hide menu if window is too small
    function updateMenuVisibility() {
        // respect user preference
        if ($scope.manuallyToggledWindow)
            return;

        if ($scope.width < MIN_WIDTH_FOR_VISIBLE_MENU) {
            $scope.showMenu = false;
        } else {
            $scope.showMenu = true;
        }
    };
    // trigger on load with initial window size
    updateMenuVisibility();

});


app.controller('ContactController', function($scope, $http) {
    $scope.data = { };
    $scope.formSent = false;

    $scope.send = function() {
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


