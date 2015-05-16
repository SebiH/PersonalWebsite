var app = angular.module('SeHub', ['ui.router', 'ngAnimate']);

app.config(function($locationProvider, $stateProvider, $urlRouterProvider) {
    'use strict';

    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
    // For any unmatched url, redirect to /home
    $urlRouterProvider.otherwise("/home");

    $stateProvider
    .state('home', {
        url: "/home",
        templateUrl: "/content/load/index"
    })
    .state('CV', {
        url: "/CV",
        templateUrl: "/content/load/cv"
    })
    .state('contact', {
        url: "/contact",
        templateUrl: "/content/load/contact"
    })
    .state('aboutme', {
        url: "/aboutme",
        templateUrl: "/content/load/aboutme"
    })
    .state('projects', {
        url: "/projects",
        templateUrl: "/content/load/projects"
    });
});


app.controller('NavigationController', function($scope, $window, $rootScope) {
    'use strict';

    var MIN_WIDTH_FOR_VISIBLE_MENU = 1000;

    $scope.showMenu = true;
    // to prevent automatic window opening/closing
    var manuallyToggledWindow = false;
    $scope.burgerVisible = false;

    $scope.toggleMenu = function() {
        manuallyToggledWindow = true;
        $scope.showMenu = !$scope.showMenu;
    }; 

    $scope.width = $window.innerWidth;

    // angularjs won't update innerwidth automatically..
    var win = angular.element($window);
    win.bind("resize", function(e) {
        $scope.width = $window.innerWidth;
        updateMenuVisibility();
        $scope.$apply();
    });

    // hide menu if window is too small
    function updateMenuVisibility() {
        if ($scope.width < MIN_WIDTH_FOR_VISIBLE_MENU) {
            // respect user preference when window is too small
            if (!(manuallyToggledWindow)) {
                $scope.showMenu = false;
            }

            $scope.burgerVisible = true;
        } else {
            $scope.showMenu = true;
            $scope.burgerVisible = false;
        }
    }
    // trigger on load with initial window size
    updateMenuVisibility();



    // block the first state change: content is already loaded by phalcon,
    // triggering another statechange loads unnecessary content and triggers
    // slightly noticable animation
    var firstTransition = true;
    $rootScope.$on('$stateChangeStart', function(event, toState) {
        // update ui-sref-active classes manually
        $scope.$state = toState;

        if (firstTransition) {
            event.preventDefault();
            firstTransition = false;
        }
    });
});


app.controller('ContactController', function($scope, $http) {
    'use strict';

    $scope.data = { };
    $scope.formSent = false;

    $scope.send = function() {
        $http.post('/mail/send', $scope.data)
        .success(function(result) {
            if (result.success) {
                $scope.formSent = true;
            } else {
                window.alert(result.error);
            }
        })
        .error(function() {
            window.alert("Could not send form - is the website still reachable?");
        });
    };
});


