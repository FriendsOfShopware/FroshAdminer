<?php

/**
 * Class Shopware_Controllers_Backend_Adminer
 */
class Shopware_Controllers_Backend_Adminer extends Shopware_Controllers_Backend_ExtJs {

    public function preDispatch()
    {
        parent::preDispatch();
        $this->View()->addTemplateDir($this->container->getParameter('adminer.views_dir'));
    }

    /**
     * @throws Exception
     */
    public function formAction()
    {
        /**
         * Get Url Prefix
         */
        $baseUrl = Shopware()->Front()->Router()->assemble(['controller' => 'index']);
        $baseUrl = str_replace('/backend', '', $baseUrl);

        $shopwarePath = Shopware()->Container()->getParameter('kernel.root_dir');
        $filePath = dirname(dirname(__DIR__));
        $pathToPluginFolder = str_ireplace($shopwarePath, '', $filePath);

        $this->Front()->Plugins()->ViewRenderer()->setNoRender();
        $this->View()->dbData = Shopware()->Container()->getParameter('shopware.db');
        $this->View()->postUri = $baseUrl . $pathToPluginFolder . '/Adminer/index.php';

        echo $this->View()->fetch('backend/adminer/form.tpl');
        die();
    }
}