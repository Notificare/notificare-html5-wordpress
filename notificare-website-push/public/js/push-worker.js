/*
 *  Push Worker for Google Chrome
 *  http://notifica.re
 *
 *  @author Joel Oliveira joel@notifica.re
 *  copyright 2015 Notificare
 */

var theConfig = null;
var theApplication = null;

self.addEventListener('push', function (event) {

    event.waitUntil(

        self.registration.pushManager.getSubscription().then(function(deviceSubscription){

            return fetch(theConfig.apiUrl + '/application/info', {
                headers: new Headers({
                    "Authorization": "Basic " + btoa(theConfig.appKey + ":" + theConfig.appSecret)
                })
            }).then(function(response) {
                return response.json();
            }).then(function(info) {

                var application = info.application;
                theApplication = application;

                return fetch(theConfig.apiUrl + '/notification/inbox/fordevice/' + getPushToken(deviceSubscription) + '?skip=0&limit=1',{
                    headers: new Headers({
                        "Authorization": "Basic " + btoa(theConfig.appKey + ":" + theConfig.appSecret)
                    })
                }).then(function(response) {
                    return response.json();
                }).then(function(data) {

                    if(data && data.inboxItems && data.inboxItems.length > 0){
                        var title = application.name;
                        var message = data.inboxItems[0].message;
                        var icon = theConfig.awsStorage + application.websitePushConfig.icon;
                        var notificationTag = data.inboxItems[0].notification;

                        self.clients.matchAll().then(function(clients) {
                            clients.forEach(function(client) {
                                client.postMessage('notificationreceived:' + data.inboxItems[0].notification);
                            });
                        });

                        return self.registration.showNotification(title, {
                            body: message,
                            icon: icon,
                            tag: notificationTag
                        });
                    } else {
                        return null;
                    }
                }).catch(function(err) {
                    console.log('Notificare: Failed to fetch message', err);
                    return null;
                })

            }).catch(function(e){
                console.log('Notificare: Failed to get application info', e);
                return null;
            })

        }).catch(function(e){
            console.log('Notificare: Failed to get subscription', e);
            return null;
        })

    );

});


self.addEventListener('notificationclick', function (event) {

    event.notification.close();

    event.waitUntil(

        self.clients.matchAll({
            type: "window"
        })
        .then(function(clientList) {

            clientList.forEach(function(client) {

                if(event.notification.tag != 'user_visible_auto_notification'){
                    if (client  && client.url == theConfig.appHost + '/' && 'focus' in client){
                        client.postMessage('notificationclick:' + event.notification.tag);
                        return client.focus();
                    }
                }
            });

            if (clientList.length == 0) {
                var url = theApplication.websitePushConfig.urlFormatString.replace("%@", event.notification.tag);
                return clients.openWindow(url);
            }

        })


    );
});

//Set the callback for the activate step
self.addEventListener('activate', function (event) {
    clients.claim();
    clients.matchAll().then(function(clients) {
        clients.forEach(function(client) {
            client.postMessage('workeractivated:');
        });
    });
});

// Set the callback for the install step
self.addEventListener('install', function(event) {
    // Perform install steps
    event.waitUntil(self.skipWaiting());
});


self.addEventListener("message", function(e) {

    switch(e.data.action) {
        case 'init':
            theConfig = e.data.options;
            break;
        case 'update':
            //
            break;
        default:
            console.log(e);
        break;
    }
});

/**
 * Handles Device Token
 * @param deviceToken
 * @returns {string}
 */
function getPushToken(deviceToken) {
    var pushToken = '';
    if (deviceToken.subscriptionId) {
        pushToken = deviceToken.subscriptionId;
    }
    else {
        pushToken = deviceToken.endpoint.split('/').pop();
    }
    return pushToken;
}