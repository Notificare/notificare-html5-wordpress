(function( $ ) {
	'use strict';

	$(document).ready(function(){

		var instance = $('body').notificare();

		$("body").bind("notificare:onReady", function(event, data) {
			instance.notificare("registerForNotifications");

			instance.notificare("fetchAssets", "GROUP_NAME", function(assets){
				console.log(assets);
			}, function(error){
				console.log(error);
			});

			instance.notificare("fetchPass", "SERIAL", function(pass){
				console.log(pass);
			}, function(error){
				console.log(error);
			});

		});

		$("body").bind("notificare:didReceiveDeviceToken", function(event, data) {
			//instance.notificare("userId","userID");
			//instance.notificare("username","userName");
			instance.notificare("registerDevice",data);
		});

		$("body").bind("notificare:didRegisterDevice", function(event, data) {
			//Here it's safe to register tags

			instance.notificare("getTags", function(tags){
				console.log(tags);
			}, function(error){
				console.log(error);
			});

			instance.notificare("startLocationUpdates", function(data){
				console.log(data);
			}, function(error){
				console.log(error);
			});

		});

		$("body").bind("notificare:didFailToRegisterDevice", function(event, data) {
			instance.notificare("registerDevice", data);


		});

		$("body").bind("notificare:didReceiveNotification", function(event, data) {

		});

		$("body").bind("notificare:didOpenNotification", function(event, data) {


		});

		$("body").bind("notificare:didUpdateBadge", function(event, data) {

		});


	});

})( jQuery );
