<?php
namespace Sga\AddToCartPopin\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Sga\AddToCartPopin\Helper\Config as ConfigHelper;

class Popin extends Template
{
    protected $_configHelper;

    public function __construct(
        Context $context,
        ConfigHelper $configHelper,
        array $data = []
    ) {
        $this->_configHelper = $configHelper;

        parent::__construct($context, $data);
    }

    public function isEnable()
    {
        return $this->_configHelper->isEnabled();
    }

    public function getUrlContinue()
    {
        return $this->_configHelper->getUrlContinue();
    }
}
