<?php

class ContaoModuleRaiseNowTamaro extends ContaoModule
{

    public function generate()
    {
        $this->loadLanguageFile('tl_raisenow_tamaro');

        $this->Template->widget = $this->getWidget();

        return $this->Template->render();
    }

    private function getWidget()
    {
        $widget = new \RaiseNow\Tamaro\Widget();

        $widget->setApiKey($this->getApiKeyFromContentElement());

        $config = $this->getConfigurationFromContentElement();

        foreach ($config as $key => $value) {
            $widget->extendConfig($key, $value);
        }

        return $widget;
    }

    private function getApiKeyFromContentElement()
    {
        $contentElement = $this->getContentElement();

        return $contentElement->raisenow_tamaro_api_key;
    }

    private function getConfigurationFromContentElement()
    {
        $configuration = [];

        $contentElement = $this->getContentElement();

        foreach ($this->config->get('settings') as $key => $value) {
            if ($contentElement->{$key}) {
                $configuration[$key] = $contentElement->{$key};
            } else {
                $configuration[$key] = $value['default'];
            }
        }

        return $configuration;
    }

    private function getContentElement()
    {
        $id = $this->Input->get('id');

        if ($id) {
            $contentElement = ContentModel::findById($id);

            if ($contentElement) {
                return $contentElement;
            }
        }

        return null;
    }
}
