<?php
use Whoops\Handler\JsonResponseHandler;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class Shopware_Plugins_Backend_AdminerForShopware_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    public function getLabel()
    {
        return 'Adminer For Shopware';
    }

    public function getInfo()
    {
        return array(
            'version' => '1.0.0',
            'autor' => 'Shyim',
            'label' => $this->getLabel(),
            'support' => 'https://github.com/Shyim/whoops-for-shopware',
            'link' => 'https://github.com/Shyim/whoops-for-shopware'
        );
    }

    public function install()
    {
        $this->registerController('Backend', 'Adminer');
        $this->addMenuItem();

        return true;
    }

    public function uninstall()
    {
        return true;
    }

    public function onShopwareStartDispatch(Enlight_Event_EventArgs $args)
    {
        /** @var \Enlight_Controller_Front $subject */
        $subject = $args->get('subject');

        if ($subject->getParam('noErrorHandler')) {
            $requestUri = $subject->Request()->getRequestUri();

            if (file_exists($this->Path() . 'vendor/autoload.php')) {
                require_once $this->Path() . 'vendor/autoload.php';
            }

            $whoops = new Run;

            if ($subject->Request()->isXmlHttpRequest() || strstr($requestUri, '/backend') || strstr($requestUri, '/ajax')) {
                $whoops->pushHandler(new JsonResponseHandler());
            } else {
                $whoops->pushHandler(new PrettyPageHandler);
            }

            $whoops->register();
            restore_error_handler();
        }
    }

    private function addMenuItem()
    {
        $settingsItem = $this->Menu()->findOneBy(['label' => 'Einstellungen']);
        $this->createMenuItem([
            'label' => 'Adminer',
            'controller' => 'Adminer',
            'action' => 'Index',
            'class' => 'sprite-gear',
            'active' => 1,
            'parent' => $settingsItem
        ]);
    }
}