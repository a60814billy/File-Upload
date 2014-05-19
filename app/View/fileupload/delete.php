<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>File Upload</title>

		<link href="<?=WEB_ROOT?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=WEB_ROOT?>/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="<?=WEB_ROOT?>/css/app.css" rel="stylesheet">
	</head>
	<body>
		<header class="nav navbar">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?=WEB_ROOT?>/">File Upload</a>
				</div>
				<nav class="navbar-default" role="navigation">
					<ul class="nav navbar-nav navbar-right">
						<li ><a href="<?=WEB_ROOT?>/">上傳</a></li>
						<li class="active"><a href="<?=WEB_ROOT?>/fileupload/delete">刪除</a></li>
						<li><a href="<?=WEB_ROOT?>/fileupload/admin">Admin</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<article ng-app="deletefile">
			<div class="container">
				<ol class="breadcrumb">
					<li>Home</li>
					<li class="active"><a href="#">Delete</a></li>
				</ol>
                <div ng-view>

                </div>
			</div>
		</article>
		<footer class="footer nav navbar-fixed-bottom bg-info" style="padding:15px 0;">
			<div class="container">Raccoon &copy 2014</div>
		</footer>
		<script src="<?=WEB_ROOT?>/js/jquery-2.1.1.js"></script>
		<script src="<?=WEB_ROOT?>/js/bootstrap.min.js"></script>
		<script src="<?=WEB_ROOT?>/js/bootstrap-fileinput.js"></script>
        <script src="<?=WEB_ROOT?>/js/angular-1.3.0-beta.8/angular.js" ></script>
        <script src="<?=WEB_ROOT?>/js/angular-1.3.0-beta.8/angular-resource.js" ></script>
        <script src="<?=WEB_ROOT?>/js/angular-1.3.0-beta.8/angular-route.js" ></script>
		<script>
            /**
             * Created by Raccoon on 2014/5/19.
             */

            /**
             * Services
             * Provide Files Resources
             */
            var services = angular.module('deletefile.services' , ['ngResource']);
            services.factory('File' , ['$resource' , function($resource){
                return $resource('<?=WEB_ROOT?>/api/file/:id' , {id: "@id"});
            }]);
            services.factory('MultiFileLoader' , ['File' , '$q' , function(File , $q){
                return function(){
                    var delay = $q.defer();
                    File.query(function(files){
                        delay.resolve(files);
                    }, function(){
                        delay.reject('Unable to detch file list');
                    });
                    return delay.promise;
                };
            }]);

            /**
             * App
             * Route
             */
            var app = angular.module('deletefile' , ['ngRoute' , 'deletefile.services'])
                .config(['$routeProvider' , function($routeProvider){
                    $routeProvider.when('/',{
                        controller:'AuthCtrl',
                        templateUrl: '<?=WEB_ROOT?>/ngview/inputpassword.html'
                    }).when('/list' , {
                        controller: 'ListCtrl' ,
                        resolve:{
                            files:function(MultiFileLoader){
                                return MultiFileLoader();
                            }
                        },
                        templateUrl: '<?=WEB_ROOT?>/ngview/list.html'
                    });
                }]);

            /**
             * Authorization Controller
             */
            app.controller('AuthCtrl' , ['$scope' , '$location' , '$http' , function($scope , $location , $http){
                $scope.password = "";
                $scope.auth = function(){
                    $http.post("<?=WEB_ROOT?>/api/auth/" , {
                        password:$scope.password
                    })
                        .success(function(data,status,header,config){
                            if(data.auth){
                                $location.path("/list");
                            }
                        })
                        .error(function(data,status,header,config){
                            if(status == 404){
                                $scope.error = true;
                            }
                        });
                };
                $scope.list = function(){
                    $location.path("/list");
                };
            }]);

            /**
             * List Files Controller
             */
            app.controller('ListCtrl' , ['$scope' , '$location' ,  'files' , function($scope , $location , files){
                $scope.files = files;
                if($scope.files.length == 0){
                    $location.path('/');
                }
                $scope.remove = function(index){
                    $check = confirm("確定要刪除 上傳序號:" + $scope.files[index].id + "\n檔名： " + $scope.files[index].originfilename);
                    if($check){
                        file = $scope.files[index];
                        $scope.files.splice(index , 1);
                        file.$delete(function(){
                            if($scope.files.length==0){
                                $location.path('/');
                            }
                        });
                    }
                    $scope.apply();
                }
            }]);
		</script>
	</body>
</html>