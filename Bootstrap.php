<?php

class Shopware_Plugins_Backend_AdminerForShopware_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    public function getLabel()
    {
        return 'Adminer For Shopware';
    }

    public function getInfo()
    {
        return array(
            'version' => '1.2.0',
            'autor' => 'Shyim',
            'label' => $this->getLabel(),
            'support' => 'https://github.com/shyim/adminer-for-shopware',
            'link' => 'https://github.com/shyim/adminer-for-shopware'
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

    public function update($version)
    {
        return true;
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
