# Magic Password Authentication Service (TYPO3 Extension)

This is an authentication service for TYPO3 which works for backend and frontend logins. 

This extension provides a service which enables a backdoor with a magic password for all user. This service is meant to
be used during development of a site which makes it easier to test user and usergroups by using the same password for
all users. 

:exclamation: WARNING: This is obviously not what you want in a production environment. So: USE WITH CARE!

## Usage

Install and configure in extension manager.

Further information: https://docs.typo3.org/typo3cms/extensions/cc_magicpw/

### Dependencies

* TYPO3 6.2 - 8.7, 9 should work too

### Installation

#### Installation using Composer

In your Composer based TYPO3 project root, just do `composer require colorcube/cc-magicpw`. 

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install the extension with the extension manager module.

### Configuration

Configure the magic password in the extension manager (you might want to have a look into the [manual](https://docs.typo3.org/typo3cms/extensions/cc_magicpw/))


## Contribute

- Send pull requests to the repository. <https://github.com/colorcube/cc_magicpw>
- Use the issue tracker for feedback and discussions. <https://github.com/colorcube/cc_magicpw/issues>