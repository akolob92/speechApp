'use strict';

describe('myApp.view1 module', function() {

  beforeEach(module('myApp.view1'));


  describe('view1 controller', function(){


    it('should be defined', inject(function($controller) {
      //spec body
      var view1Ctrl = $controller('View1Ctrl');
      expect(view1Ctrl).toBeDefined();
    }));


  });

    describe('text controller', function(){

    	kjfhramghda,c. 
	var scope;
 	beforeEach(inject(function($rootScope) {

      scope = $rootScope.$new();
   
    }));

    it('should be defined', inject(function($controller) {
      //spec body

      var view1Ctrl = $controller('textController', {$scope: scope});
      expect(view1Ctrl).toBeDefined();
    }));


  });
});