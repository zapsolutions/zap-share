$(function() {

	// $(document).on('click', '.client', function() {
	// 	if ($(this).attr('data-state') === 'inactive') {
	// 		$(this).attr('data-state', 'active');
	// 		$('#sidebar li.active').removeClass('active');
	// 		$(this).parent('li').addClass('active');
	// 		$('i.fa.fa-minus').removeClass('fa-minus').addClass('fa-plus');
	// 		$(this).children('i.fa.fa-plus').removeClass('fa-plus').addClass('fa-minus');
	// 		$.ajax({
	// 			type: 'POST',
	// 			url: '/session/set_active_menu/' + $(this).attr('data-id'),
	// 		});
	// 	} else {
	// 		$('#sidebar a.client').attr('data-state', 'inactive');
	// 		$('#sidebar li.active').removeClass('active');
	// 		$('i.fa.fa-minus').removeClass('fa-minus').addClass('fa-plus');
	// 		$.ajax({
	// 			type: 'POST',
	// 			url: '/session/set_active_menu/null',
	// 		});
	// 	}
	// });

});

var zapApp = angular.module('zapShare', []);

zapApp.directive('client', function($rootScope) {
	return {
		restrict: 'C',
		scope: {
			state:'@'
		},
		link: function(scope, element, attrs) {
			element.bind('click', function() {
				switch(scope.state) {
					case 'active':
						$rootScope.$broadcast('collapse_clients');
						scope.setActiveMenu(null);
						break;

					case 'inactive':
						$rootScope.$broadcast('collapse_clients');
						element.parent().addClass('active');
						element.find('.collapse-icon').removeClass('fa-plus').addClass('fa-minus');
						scope.setActiveMenu(attrs.id);
						break;
				}
			});

			$rootScope.$on('collapse_clients', function() {
				scope.state = 'inactive';
				element.parent().removeClass('active');
				element.find('.collapse-icon').removeClass('fa-minus').addClass('fa-plus');
			});
		},
		controller: function($scope, $rootScope, zapFactory) {
			$scope.setActiveMenu = function(id) {
				if(typeof id === 'string') $scope.state = 'active';
				zapFactory.postData('/session/set_active_menu/' + id);
			}
		}
	}
});

// ADDS FILTERING TO THE CLIENT/PROJECT LIST
zapApp.directive('clientRow', function($rootScope) {
	return {
		restrict: 'C',
		scope: true,
		link: function(scope, element, attrs) {
			// POPULATE SCOPE VARIABLES
			scope.clientName = element.find('.client').data('client-name');
			angular.forEach(element.find('.project'), function(project) {
				scope.projectNames.push($(project).data('project-name'));
			});

			// UPDATE VISIBILITY DURING SEARCH
			$rootScope.$on('client_search', function(e, val) {
				var searchText = val[0];
				if(searchText.length === 0) {
					element.removeClass('active');
					element.removeClass('hide');
					return false;
				}

				var search = new RegExp(searchText.toLowerCase(), 'g');
				if(!scope.clientName.toLowerCase().match(search) && !scope.matchProject(search)) {
					element.addClass('hide');
					element.removeClass('active');
				} else {
					element.addClass('active');
					element.removeClass('hide');
				}
			});
		},
		controller: function($scope) {
			$scope.clientName = '';
			$scope.projectNames = [];

			$scope.matchProject = function(regMatch) {
				var found = false;
				angular.forEach($scope.projectNames, function(name) {
					if(name.toLowerCase().match(regMatch)) {
						console.log(name);
						found = true;
					}
				});

				return found;
			}
		}
	}
})

zapApp.directive('deleteKey', function() {
	return {
		link: function(scope, element, attrs) {
			element.bind('click', function(e) {
				if(confirm('Are you sure you wish to delete this?')) {
					console.log($(attrs.form));
					$(attrs.form).submit();
				}

				return false;
			});
		}
	}
});

zapApp.directive('projectData', function() {
	return {
		restrict: 'C',
		requires: '^projectSearch',
		replace: true,
		templateUrl: '/templates/project_data_list.html',
		link: function(scope, element, attrs) {
			scope.href = attrs.href;

			scope.getData();
		},
		controller: function($scope, $rootScope, $timeout, zapFactory, zapService) {
			$scope.data = [];
			$scope.href = null;
			$scope.filterText = '';

			$rootScope.$on('search_updated', function() {
				$scope.updateFilter();
			});

			$scope.findData = function(data) {
				var search = new RegExp($scope.filterText.toLowerCase(), 'g');
				return data.Datum.key.toLowerCase().match(search) || data.Datum.value.toLowerCase().match(search);
			}

			$scope.getData = function() {
				zapFactory.getData($scope.href)
					.success(function(data) {
						$scope.data = data.data;
					})
					.error(function(data) {

					});
			}

			$scope.updateFilter = function() {
				$timeout(function() {
					$scope.filterText = zapService.retrieve('search');

					$scope.$apply();
				}, 0);
			}
		}
	}
});

zapApp.directive('projectSearch', function() {
	return {
		restrict: 'C',
		link: function(scope, element, attrs) {
			element.find('input').bind('keyup', function(e) {
				scope.set('search', this.value);
			});

			scope.set('search', element.find('input').val());
		}, 
		controller: function($scope, zapService) {
			$scope.search = '';

			$scope.set = function(key, val) {
				return zapService.set(key, val);
			}
		}
	}
});

// SEARCHES THROUGH THE LIST OF CLIENTS AND PROJECTS TO REVEAL ONLY THOSE MATCHING THE SEARCH
zapApp.directive('searchClientInput', function() {
	return {
		restrict: 'C',
		link: function(scope, element, attrs) {
			element.bind('keyup', function(e) {
				scope.clientName = this.value;

				scope.updateClientlist();
			});
		},
		controller: function($scope, $rootScope) {
			$scope.clientName = '';

			$scope.updateClientlist = function() {
				$rootScope.$broadcast('client_search', [$scope.clientName]);
			}
		}
	}
});

// GATHER JSON DATA
zapApp.factory('zapFactory', function($http) {
	var factory = {};

	factory.getData = function(href, data) {
		if (typeof data === 'undefined') data = {};
		return $http.get(href, data);
	}

	factory.postData = function(href, data) {
		if (typeof data === 'undefined') data = {};
		return $http.post(href, data);
	}

	return factory;
});

zapApp.factory('zapService', function($rootScope) {
	var srvc = {
		search: '',

        retrieve: function(key) {
            if(typeof this[key] !== typeof undefined) return this[key];

            return typeof undefined;
        },

        set: function(key, val) {
            if(typeof key !== 'undefined' && typeof this[key] !== 'undefined') {
                this[key] = val;
                if(key === 'search') {
                    $rootScope.$broadcast('search_updated');
                }

                return true;
            }

            return false;
        },
	};

	return srvc;
});