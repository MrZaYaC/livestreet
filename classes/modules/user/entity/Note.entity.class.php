<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/

class ModuleUser_EntityNote extends Entity {

	/**
	 * Определяем правила валидации
	 */
	protected $aValidateRules=array(
		array('target_user_id','target'),
	);

	public function Init() {
		parent::Init();
		$this->aValidateRules[]=array('text','string','max'=>Config::Get('module.user.usernote_text_max'),'min'=>1,'allowEmpty'=>false);
	}

	/**
	 * Валидация пользователя
	 *
	 * @param $sValue
	 * @param $aParams
	 * @return bool
	 */
	public function ValidateTarget($sValue,$aParams) {
		if ($oUserTarget=$this->User_GetUserById($sValue) and $this->getUserId()!=$oUserTarget->getId()) {
			return true;
		}
		return $this->Lang_Get('user_note_target_error');
	}
}
?>