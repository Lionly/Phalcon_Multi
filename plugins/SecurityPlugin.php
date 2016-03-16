<?php

use Phalcon\Acl;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Database as AclList;

/**
 * SecurityPlugin
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class SecurityPlugin extends Plugin
{
	/**
	 * This action is executed before execute any action in the application
	 *
	 * @param Event $event
	 * @param Dispatcher $dispatcher
	 * @return bool
	 */
	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
	{
        
		$module = $dispatcher->getModuleName();
		$controller = $dispatcher->getControllerName();
		$action = $dispatcher->getActionName();

		$acl = new AclList([
            'db'                => $this -> db,
            'roles'             => 'roles', // 角色
            'rolesInherits'     => 'roles_inherits', // 角色继承
            'resources'         => 'resources', // 可访问的资源 存控制器名称，描述
            'resourcesAccesses' => 'resources_accesses', // resources_name，access_name 对应 控制器名，方法名
            'accessList'        => 'access_list' // 角色 对应资源 访问权限
          ]);
        
        // $acl->setDefaultAction(Acl::DENY);
        // 默认允许所有
        $acl->setDefaultAction(Acl::ALLOW);
        
		$allowed = $acl->isAllowed($module, $controller, $action);
        
		if ($allowed == Acl::DENY) {
			$dispatcher->forward(array(
				'controller' => 'errors',
				'action'     => 'show401'
			));
            $this->session->destroy();
			return false;
		}
	}
}
