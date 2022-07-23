var endpoint = "http://localhost/app/api/";
var app = angular.module('app', ['ngRoute','ngMeta','ngAnimate']);

let qas = "sim";

// ======================================== MAILE FUNCTION
function mailer(email,password) {

$.ajax({
    url: "https://api.smtp2go.com/v3/email/send",
    method: 'POST',
    headers: { 'Content-Type': "application/json" },
    data: JSON.stringify({
    'api_key': "api-2428E25442A111ECA77BF23C91BBF4A0",
    'to': [
    "Hello" + '<' + email + '>'
    ],
    'sender': "WebAdmin <info@paidlance.com>",
    'subject': "Account",
    'text_body': "Your account is ready and rememeber your " + password
    }),
})}
// ======================================== MALE FUNCTION

// FUNCTIONS
function get(item){
return window.sessionStorage.getItem(item);
}
function set(item, value){
window.sessionStorage.setItem(item, value);
}

// REDIRECT
function redirect(url) { window.location.href = url; }
url=window.location.href;

// GET LAST CHARACTER
hrefurl=$(location).attr("href");
lastURL=hrefurl.substr(hrefurl.lastIndexOf('/') + 1)

// CONTENT CONFIG
var ContentConfig = {
  headers : {
      'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
  }
}

// APP NAME
app.run(function($rootScope) {
  $rootScope.appname = 'APP NAME';
});

app.config(['$locationProvider', '$routeProvider','ngMetaProvider', function ($locationProvider, $routeProvider,ngMetaProvider) {

$routeProvider.

// HOME PAGE
when('/', {
  templateUrl: './app/components/global/home.html',
   data: {
        meta: {
          'title': 'Home',
          'description': 'Home'
        }
      }
  }).

// CONTACT PAGE
when('/contact', {
templateUrl: './app/components/cms/contact.html'
}).

// LOGIN PAGE
when('/login', {
  templateUrl: './app/components/account/login.html',
   data: {
        meta: {
          'title': 'Login',
          'description': 'Login'
        }
      }
  }).

when('/forget-password', {
  templateUrl: './app/components/account/forget_password.html',
    data: {
        meta: {
          'title': 'Forget Password',
          'description': 'Forget Password'
        }
      }
  }).

// SIGNUP PAGE
when('/signup', {
  templateUrl: './app/components/account/signup.html',
   data: {
        meta: {
          'title': 'Signup',
          'description': 'Signup'
        }
      }
  }).

// SIGNUP SUCCESS PAGE
when('/signup-success', {
templateUrl: './app/components/account/signup_success.html',
  data: {
      meta: {
        'title': 'Signup Success',
        'description': 'Signup Success'
      }
    }
}).

// PROFILE PAGE
when('/profile', {
  templateUrl: './app/components/account/profile.html',
    data: {
        meta: {
          'title': 'Profile',
          'description': 'Profile Page'
        }
      }
  }).

// CONTACTS PAGE
when('/contacts', {
  templateUrl: './app/components/contacts/contacts.html',
   data: {
        meta: {
          'title': 'Contacts',
          'description': 'Contacts'
        }
      }
  }).

// CONTACT Add PAGE
when('/contacts-add', {
templateUrl: './app/components/contacts/contact.html',
// controller: 'EditContactController',
  data: {
      meta: {
        'title': 'Add Contact',
        'description': 'Add Contact'
      }
    },
}).


// CONTACT EDIT PAGE
when('/contacts/:id', {
templateUrl: './app/components/contacts/contact.html',
  data: {
      meta: {
        'title': 'Add Contact',
        'description': 'Add Contact'
      }
    }
}).


// TERMS PAGE
when('/terms', {
templateUrl: './app/components/cms/terms.html',
  data: {
      meta: {
        'title': 'Terms & Condition',
        'description': 'Terms & Condition'
      }
    }
}).

// ACCOUNT PAGE
when('/dashboard', {
  templateUrl: './app/components/account/dashboard.html',
    data: {
        meta: {
          'title': 'Dashboard',
          'description': 'Dashboard'
        }
      }
  }).

// PRODUCTS PAGE
when('/products', {
templateUrl: './app/components/products/products.html',
  data: {
      meta: {
        'title': 'Products',
        'description': 'Products'
      }
    }
}).

// PRODUCTS ADD PAGE
when('/products-add', {
templateUrl: './app/components/products/product.html',
  data: {
      meta: {
        'title': 'Add Product',
        'description': 'Add Product'
      }
    }
}).

when('/product/:id', {
  templateUrl: './app/components/products/product.html',
    data: {
        meta: {
          'title': 'Add Product',
          'description': 'Add Product'
        }
      }
  }).

// Logout PAGE
when('/logout', {
  templateUrl: './app/components/account/logout.html',
    data: {
        meta: {
          'title': 'Logout',
          'description': 'Logout'
        }
      }
  }).


// TERMS PAGE
when('/table', {
  templateUrl: './app/components/global/table.html',
    data: {
        meta: {
          'title': 'Table',
          'description': 'Table'
        }
      }
  }).

when('/blog', {
  templateUrl: './app/components/blog/listing.html',
  data: {
        meta: {
          'title': 'Blog',
          'description': ''
        }
      }
}).

otherwise({
redirectTo: '/'
});

$locationProvider.html5Mode(true);
}])

.run(['ngMeta', function(ngMeta) {
    ngMeta.init();
}])

.directive('notfound', function() {
  return {
      restrict: 'E',
  templateUrl: './app/components/global/notfound.html',
  };
})

.directive('services', function() {
  return {
      restrict: 'E',
  templateUrl: './app/components/global/services.html',
  };
})

// HEADER
app.controller('header', ['$http','$scope',function ($http,$scope) {

if ("user_id" in sessionStorage) {

// alert(sessionStorage.getItem('user_id'));

$('.user_account_logged').hide(400);
  } else {
$('.user_account_not_logged').hide(400);
}

}])

// app.controller('Featured', ['$http','$scope',function ($http,$scope) {

//   $('.featured').slick({
//     lazyLoad: 'ondemand',
//     infinite: true,
//     slidesToShow: 6,
//     slidesToScroll: 1
//   });

// }])

app.controller('account', ['$http','$scope',function ($http,$scope) {
  $scope.user_id = sessionStorage.getItem('user_id');

  if ("user_id" in sessionStorage) {
  } else { window.location.href = './' }

}])

.controller('logoutController', function($scope,$location){

      sessionStorage.removeItem('user_id');
      $scope.username_id = '';
      $scope.username = '';
      $scope.password = '';
      window.location.href='./';

      // $location.path('/');

})

app.controller('Home', ['$http','$scope',function ($http,$scope) {

     $http({
      method: 'GET',
      url: '',
      data: $.param({ }),
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
      }).then(
      function(res) {

      $scope.items = res.data
      console.log('succes !',  res.data);
      },
      function(err) {
      console.log('error...', err);
      }
    );

}])

app.controller('signup', ['$http','$scope',function ($http,$scope) {

  $scope.submit_form = function(formData) {

    $scope.formData = formData;

    console.log(formData); // object
    console.log(JSON.stringify(formData)); // string

    $scope.form = {}; // clear ng-model form

}

}])

app.controller('dashboard', ['$http','$scope',function ($http,$scope) {


  $scope.user_id = sessionStorage.getItem('user_id');

  $scope.load = function() {

    // APPEND ON LOAD AT HEADER
    $('head').append("<script type='text/javascript' src='https://code.highcharts.com/5/js/highcharts.js'></script>");

    setTimeout(function() {

      Highcharts.chart('container', {

        title: {
              text: 'Monthly Sales',
              x: -20 //center
            },
            subtitle: {
              text: '',
              x: -20
            },
            xAxis: {
              categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
              title: {
                text: 'Values Graph'
              },
              plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
              }]
            },
            tooltip: {
              valueSuffix: '°C'
            },
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle',
              borderWidth: 0
            },
            series: [{
              name: 'Sales',
              data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
              name: 'Orders',
              data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
              name: 'Cancelled',
              data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
              name: 'Refunded',
              data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });

    }, 200);

  }


}])


app.controller('blog', ['$http','$scope',function ($http,$scope) {

// Variables
$scope.showLoadmore = true;
$scope.row = 0;
$scope.rowperpage = 3;
$scope.buttonText = "Load More";

// Fetch data
 $scope.getPosts = function(){

    $http({
    method: 'GET',
    url: 'https://phptravels.net/api/api/blog/list?appKey=phptravels',
    data: {row:$scope.row,rowperpage:$scope.rowperpage},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then(function successCallback(res) {

      console.log('succes !',  res.data.response.posts);

        if(res.data.response.posts !='' ){

            $scope.row+=$scope.rowperpage;
            if($scope.blogs != undefined){
                $scope.buttonText = "Loading ...";
                setTimeout(function() {
                    $scope.$apply(function(){
                    angular.forEach(res.data.response.posts,function(item) {
                        $scope.blogs.push(item);
                    });
                    $scope.buttonText = "Load More";
                    });
                },500);
                // $scope.posts.push(response.data);

            }else{
                $scope.blogs = res.data.response.posts;
            }
        }else{
            $scope.showLoadmore = false;
        }

    });
 }

 // Call function
 $scope.getPosts();



  // // API CALL
  // $http({
  //   method: 'GET',
  //   url: 'https://phptravels.net/api/api/blog/list?appKey=phptravels',
  //   data: $.param({ }),
  //   headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
  //   }).then(
  //   function(res) {

  //   $scope.blogs = res.data.response.posts
  //   console.log('succes !',  res.data.response.posts);
  //   },
  //   function(err) {
  //   console.log('error...', err);
  //   }
  // );


  // $scope.blogs = [];
  // $scope.reviewInfo = [];
  // var cnt = 6;
  // var ind = 0;

  // //for the sake of this demo, generate some dummy data
  // for (var i = 0; i < 1000; i++) {
  //   $scope.blogs.push(i);
  // }

  // $scope.loadMore = function() {

  //     ind = ind + cnt
  //     var r = cnt
  //     if (ind + cnt > $scope.blogs.length) {
  //       r = $scope.blogs.length - ind
  //     }
  //     $scope.reviewInfo = $scope.reviewInfo.concat($scope.blogs.slice(ind, r + ind))
  //   }
  //   //load the first bit right away
  // $scope.reviewInfo = $scope.blogs.slice(0, cnt);

  // $scope.resetList = function() {
  //   ind = 0
  //   $scope.reviewInfo = $scope.blogs.slice(0, cnt);
  // };


  // // $scope.blogs = [
  // //   {
  // //     "name":"friend1",
  // //     "email":"email1@gmail.com"
  // //   },
  // //   {
  // //     "name":"friend2",
  // //     "email":"email2@gmail.com"
  // //   },
  // //   {
  // //     "name":"friend3",
  // //     "email":"email4@gmail.com"
  // //   }
  // // ];

}

])