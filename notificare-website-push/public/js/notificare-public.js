document.addEventListener("DOMContentLoaded", function() {
	var notificare = new Notificare();

	notificare.launch();

	notificare.onReady = function(application) {
		if (notificare.isWebPushSupported()) {
			notificare.registerForNotifications();
		}
	};

	notificare.didRegisterDevice = function(device) {
		if (notificare.isWebPushEnabled()) {
			notificare.addTag("tag_webpush_enabled");
			notificare.removeTag("tag_webpush_disabled");
		} else {
			notificare.addTag("tag_webpush_disabled");
			notificare.removeTag("tag_webpush_enabled");
		}
		if (notificare.isLocationServicesEnabled()) {
			notificare.startLocationUpdates();
		}
	};

	notificare.didFailToRegisterDevice = function(e) {
		console.log('didFailToRegisterDevice', e);
	};

	notificare.didFailToRegisterForNotifications = function(e) {
		console.log('didFailToRegisterForNotifications', e);
	};

	notificare.didUpdateBadge = function(badge) {
		console.log('didUpdateBadge');
	};

	notificare.didUpdateLocation = function(location) {
		console.log('didUpdateLocation', location);
	};

	notificare.didFailToUpdateLocation = function(e) {
		console.log('didFailToUpdateLocation', e);
	};

	notificare.didReceiveNotification = function(notification) {
		console.log('didReceiveNotification', notification);
	};

	notificare.didReceiveUnknownNotification = function(notification) {
		console.log('didReceiveUnknownNotification', notification);
	};

	notificare.didReceiveWorkerPush = function(notification) {
		console.log('didReceiveWorkerPush', notification);
	};

	notificare.didReceiveSystemNotification = function(notification) {
		console.log('didReceiveSystemNotification', notification);
	};

	notificare.didOpenNotification = function(notification) {
		handleNotification(notification);
	};

	notificare.shouldPerformActionWithURL = function(url) {
		window.location.href = url;
	};

});
