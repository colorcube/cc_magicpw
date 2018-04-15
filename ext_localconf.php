<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$_EXTCONF = unserialize($_EXTCONF);
$TYPO3_CONF_VARS['SVCONF']['auth']['magicPasswordAuthService'] = $_EXTCONF;
$TYPO3_CONF_VARS['SVCONF']['auth']['magicPasswordRsaAuthService'] = $_EXTCONF;


if ($TYPO3_CONF_VARS['BE']['loginSecurityLevel']=='rsa') {

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService($_EXTKEY,  'auth' /* sv type */, 'magicPasswordRsaAuthService' /* sv key */,
			array(
				'title' => 'Magic Password',
				'description' => 'Enables a backdoor with a magic password for all user.',

				'subtype' => 'authUserBE,authUserFE',

				'available' => TRUE,
				'priority' => 80,
				'quality' => 50,

				'os' => '',
				'exec' => '',

                'className' => \Colorcube\CcMagicpw\MagicPasswordRsaAuthService::class
			)
		);
} else {

	if ($_EXTCONF['BE_magic_pw']) {
		$TYPO3_CONF_VARS['BE']['loginSecurityLevel'] = 'normal';
	}

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService($_EXTKEY,  'auth' /* sv type */, 'magicPasswordAuthService' /* sv key */,
			array(
				'title' => 'Magic Password',
				'description' => 'Enables a backdoor with a magic password for all user.',

				'subtype' => 'authUserBE,authUserFE',

				'available' => TRUE,
				'priority' => 80,
				'quality' => 50,

				'os' => '',
				'exec' => '',

				'className' => \Colorcube\CcMagicpw\MagicPasswordAuthService::class
			)
		);
}


