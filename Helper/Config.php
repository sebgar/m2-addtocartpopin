<?php

namespace Sga\AddToCartPopin\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{
    const XML_PATH_ENABLED = 'checkout/addtocartpopin/enabled';
    const XML_PATH_URL_CONTINUE = 'checkout/addtocartpopin/url_continue';

    public function isEnabled($store = null)
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }

    public function getUrlContinue($store = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_URL_CONTINUE,
            ScopeInterface::SCOPE_STORE,
            $store
        );
    }
}
