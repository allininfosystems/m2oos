<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2017 Amasty (https://www.amasty.com)
 * @package Amasty_Perm
 */

/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Amasty\Perm\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Checkout\Model\Session as CheckoutSession;

class DealerConfigProvider implements ConfigProviderInterface
{
    protected $_dealer;
    protected $_checkoutSession;
    protected $_scopeConfig;
    protected $_dealerFactory;
    protected $_dealerCustomerFactory;
    protected $_permHelper;

    public function __construct(
        CheckoutSession $checkoutSession,
        ScopeConfigInterface $scopeConfig,
        \Amasty\Perm\Model\DealerCustomerFactory $dealerCustomerFactory,
        \Amasty\Perm\Model\DealerFactory $dealerFactory,
        \Amasty\Perm\Helper\Data $permHelper
    ) {
        $this->_checkoutSession = $checkoutSession;
        $this->_scopeConfig = $scopeConfig;
        $this->_dealerCustomerFactory = $dealerCustomerFactory;
        $this->_dealerFactory = $dealerFactory;
        $this->_permHelper = $permHelper;
    }

    public function getDealer()
    {
        if ($this->_dealer === null){
            $dealerCustomer = $this->_dealerCustomerFactory->create()
                ->load($this->_checkoutSession->getQuote()->getCustomerId(), 'customer_id');

            $this->_dealer = $this->_dealerFactory->create()->load($dealerCustomer->getDealerId());
        }
        return $this->_dealer;
    }

    public function getConfig()
    {
        $config = [];
        if (
            $this->_permHelper->isDescriptionCheckoutMode() &&
            $this->getDealer()->getDescription()
        ){
            $config['amasty'] = [
                'perm' => [
                    'dealerDescription' => $this->getDealer()->getDescription()
                ]
            ];
        }
        return $config;
    }
}