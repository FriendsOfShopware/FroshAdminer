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

        if (mb_substr($baseUrl, -1) !== '/') {
            $baseUrl .= '/';
        }

        $shopwarePath = Shopware()->Container()->getParameter('shopware.app.rootDir');
        $filePath = dirname(dirname(__DIR__));
        $pathToPluginFolder = str_ireplace($shopwarePath, '', $filePath);

        $this->Front()->Plugins()->ViewRenderer()->setNoRender();
        $this->View()->dbData = Shopware()->Container()->getParameter('shopware.db');
        $this->View()->esData = Shopware()->Container()->getParameter('shopware.es');
        $this->View()->postUri = $baseUrl . $pathToPluginFolder . '/Adminer/index.php';
        $this->View()->driver = $this->Request()->getParam('adminerAction') === 'index' ? 'server' : 'elastic';

        echo $this->View()->fetch('backend/adminer/form.tpl');
        die();
    }
}
