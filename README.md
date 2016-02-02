# notificare-html5-wordpress

WordPress plugin for Website Push Notifications

This plugin allows your WordPress website to receive notifications natively in Chrome, Safari, Firefox and basically any modern browser.
To start with sending messages to your website visitors please make sure you create an account in [Notificare](https://notifica.re).

## Changing the source

You are allowed to change the source code of this plugin and any pull requests are welcome.
To be able to work with the source code of this you will need some dependencies. Make sure you have Node.js, npm and grunt installed before proceeding.

### Gettext

In order to internationalize this plugin in your language you will need gettext installed in your machine.
Installing gettext with Homebrew:

```bash

brew install gettext

```

Make sure you add it to your bash_profile:

```bash

export PATH=${PATH}:/usr/local/opt/gettext/bin

```