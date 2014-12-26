var app = angular.module('SeHub', ['ui.router']);

app.config(function($stateProvider, $urlRouterProvider) {

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
    var me = this;

    me.showMenu = true;

    me.toggleMenu = function() {
        me.showMenu = !me.showMenu;
    };



    function init() {
        // hide menu on small screens
        if (window.innerWidth < 1000)
            me.showMenu = false;
    };
    init();
});



