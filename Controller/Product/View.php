<?php
namespace Sga\AddToCartPopin\Controller\Product;

class View extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $layout = $this->_view->getLayout();
        $this->getResponse()->setBody($layout->renderElement('add-to-cart.container'));
    }
}
