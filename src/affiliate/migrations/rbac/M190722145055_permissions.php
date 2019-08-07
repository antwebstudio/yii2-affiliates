<?php

namespace ant\affiliate\migrations\rbac;

use yii\db\Schema;
use common\rbac\Migration;
use common\rbac\Role;

class M190722145055_permissions extends Migration
{
	protected $permissions;
	
	public function init() {
		$this->permissions = [
			\ant\affiliate\controllers\DefaultController::className() => [
				'index' => ['View affiliate index page', [Role::ROLE_USER]],
			],
			\ant\affiliate\controllers\ReferralController::className() => [
				'index' => ['View affiliate referral index page', [Role::ROLE_USER]],
				'delete' => ['Delete affiliate referral', [Role::ROLE_USER]],
			],
			\ant\affiliate\controllers\CampaignController::className() => [
				'index' => ['Manage campaign', [Role::ROLE_USER]],
				'delete' => ['Delete campaign', [Role::ROLE_USER]],
				'deactivate' => ['Deactivate campaign', [Role::ROLE_USER]],
				'activate' => ['Activate campaign', [Role::ROLE_USER]],
			],
		];
		
		parent::init();
	}
	
	public function up()
    {
		$this->addAllPermissions($this->permissions);
    }

    public function down()
    {
		$this->removeAllPermissions($this->permissions);
    }
}
