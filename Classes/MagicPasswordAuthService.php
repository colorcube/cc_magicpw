<?php

namespace Colorcube\CcMagicpw;

/***************************************************************
*  Copyright notice
*
*  (c) 2004 Rene Fritz (r.fritz@colorcube.de)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Service 'Magic Password' for the 'cc_magicpw' extension.
 *
 * @author	Rene Fritz <r.fritz@colorcube.de>
 */
class MagicPasswordAuthService extends \TYPO3\CMS\Sv\AuthenticationService {

    /**
     * Authenticate a user (Check various conditions for the user that might invalidate its authentication, eg. password match, domain, IP, etc.)
     *
     * @param array $user Data of user.
     *
     * @return integer >= 200: User authenticated successfully.
     *                         No more checking is needed by other auth services.
     *                 >= 100: User not authenticated; this service is not responsible.
     *                         Other auth services will be asked.
     *                 > 0:    User authenticated successfully.
     *                         Other auth services will still be asked.
     *                 <= 0:   Authentication failed, no more checking needed
     *                         by other auth services.
     */
    public function authUser(array $user)
    {
		$OK = 100;

		$magicpw = $this->getServiceOption($this->authInfo['loginType'].'_magic_pw');

        if ($this->login['uname'] && $magicpw && $this->login['uident_text'] === $magicpw)	{

			if ($this->writeAttemptLog) {
				$this->writelog(255,3,3,1,
					"Login-attempt from %s (%s), username '%s', magic password accepted!",
					array($this->authInfo['REMOTE_ADDR'], $this->authInfo['REMOTE_HOST'], $this->login['uname']));
			}
			if ($this->writeDevLog) 	\TYPO3\CMS\Core\Utility\GeneralUtility::devLog('Magic password accepted: '.$this->login['uident'], 'magicPasswordAuthService', 2);


				// Return 200 to let authentication know that no more checking is needed
			$OK = 200;
		}

		return $OK;
	}
}

