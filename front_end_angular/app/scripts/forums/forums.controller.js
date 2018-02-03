(function () {
    'use strict';

    angular
        .module('zigforumApp')
        .controller('ForumsController', ForumsController);

    ForumsController.$inject = ['forums'];

    function ForumsController(forums) {
        var vm = this;

        vm.topLevelForums = [];

        forums.getAllTopLevel(getAllTopLevelOnSuccess, getAllTopLevelOnFail);

        function getAllTopLevelOnSuccess(data) {
            //vm.topLevelForums = data;
            vm.topLevelForums = [{'name': 'Go to library', 'id': 1}];
        }

        function getAllTopLevelOnFail(error) {
            //alert(error);
            vm.topLevelForums = [{'name': 'Go to library', 'id': 1}];
        }
    }
})();
