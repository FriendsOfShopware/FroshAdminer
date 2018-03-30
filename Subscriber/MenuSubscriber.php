<?php

namespace FroshAdminer\Subscriber;

use Enlight\Event\SubscriberInterface;

/**
 * Class MenuSubscriber
 * @package FroshAdminer\Subscriber
 */
class MenuSubscriber implements SubscriberInterface
{
    /**
     * @var bool
     */
    private $esEnabled;

    /**
     * MenuSubscriber constructor.
     * @param bool $esEnabled
     */
    public function __construct($esEnabled)
    {
        $this->esEnabled = $esEnabled;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatch_Backend_Index' => 'onPostDispatchBackendIndex'
        ];
    }

    public function onPostDispatchBackendIndex(\Enlight_Event_EventArgs $args) {
        /** @var \Shopware_Controllers_Backend_Index $subject */
        $subject = $args->getSubject();

        if ($subject->Request()->getActionName() === 'menu') {
            $menu = $subject->View()->getAssign('menu');

            foreach ($menu as &$menuItem) {
                foreach ($menuItem['children'] as $key => $children) {
                    if ($children['controller'] === 'Adminer' && $children['action'] === 'elasticSearch') {
                        if (!$this->esEnabled) {
                            unset($menuItem['children'][$key]);
                        }
                    }
                }
            }

            $subject->View()->assign('menu', $menu);
        }
    }
}