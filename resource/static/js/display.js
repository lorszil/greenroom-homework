'use strict';

greenroom.controller('TractorsCtrl', function($scope, $http) {

    $scope.getTractors = function () {

        $scope.tractors = null;

        $http.get('http://localhost:63342/greenroom-homework/index.php?_ijt=j5r2kmc8k6u7ec50tvrml2ehtv')
            .then(function (response) {
                console.log(response);
                $scope.tractors = response.data;
            })
        console.log($scope.tractors);
    };

    $scope.getTractors();

});