'use strict';

var myApp = angular.module('myApp.view1', ['ngRoute']);

myApp.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/view1', {
    templateUrl: 'view1/view1.html',
    controller: 'View1Ctrl'
  });
}])

myApp.controller('View1Ctrl', [function() {

}]);


myApp.controller('textController', ['$scope', function($scope) {
	$scope.text = "wait...";
	//console.log($scope.text);
	var arr = $scope.text.split(' ');



	$scope.proccessText = function(text) {

		var paragraph = $scope.text.split(/\n/);
			
		for(var key in paragraph) {
	
		
			var arr = paragraph[key].split(' ');
			var rnd, index = 5, temp1 = 0, temp = 0

		

			while (index < arr.length) {
				var regexp = /[А-ЯЁа-яё\w]+/;
				rnd = getRnd(4, 6);

				// Regex для правильной обработки слов со знаками ппепинания
				if (regexp.test(arr[index])) {

					var str = arr[index].match(regexp);
					
					arr[index] = arr[index].substring(0, arr[index].indexOf(str[0])).concat('____', 
						arr[index].substring(arr[index].indexOf(str[0]) + str[0].length));




			}
				index += rnd;

			}

			paragraph[key] = arr.join(' ');

		}

		$scope.text = paragraph.join("\n");


		// Вариант решения со строками: 
		// var rnd, index = 0, temp1 = 0, temp = 0

		// while (index < $scope.text.length && index != -1) {

		// 	rnd = getRnd(3, 5);
			
		// 	for (var i = 0; i < rnd; i++) {
		// 		temp = temp + index + 1;
		// 		index = $scope.text.substring(temp).indexOf(' ');
		// 	}

		// 	if (index != -1) {

		// 		$scope.text = $scope.text.substring(0, temp) + "____" + $scope.text.slice(temp + index);
		// 		temp += 5;

		// 	}

		// 	console.log("Temp: " + temp + " Index: " + index + " Rnd: " + rnd);

		// };
	}
}]);



function getRnd(min, max) {
	return Math.floor(Math.random()*(max-min+1) + min);
}

