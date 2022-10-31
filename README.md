# phpbb-extensions

Monorepo for custom extensions for the [phpBB forum software](https://www.phpbb.com/). All extensions are available in English and German.

(Currently this only contains the honeypotantispam extension.)

## Extensions

### Honeypotantispam

Adds a simple invisible honeypot field to the registration form. If this field is filled the registree is most likely a bot, and therefore the registration will be denied.

## Installation

1. Check the [Releases page](https://github.com/DennisCiba/phpbb-extensions/releases) for the latest release of the extension you are interested in.
1. Download the `.zip` file contained in the release assets
1. Drop the contents into the `ext/` folder of your phpBB installation, then activate the extension in the admin panel