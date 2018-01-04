<?php
namespace Magento\Sales\Model\Order\Email\Container\OrderIdentity;

/**
 * Interceptor class for @see \Magento\Sales\Model\Order\Email\Container\OrderIdentity
 */
class Interceptor extends \Magento\Sales\Model\Order\Email\Container\OrderIdentity implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($scopeConfig, $storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isEnabled');
        if (!$pluginInfo) {
            return parent::isEnabled();
        } else {
            return $this->___callPlugins('isEnabled', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getEmailCopyTo()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEmailCopyTo');
        if (!$pluginInfo) {
            return parent::getEmailCopyTo();
        } else {
            return $this->___callPlugins('getEmailCopyTo', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getCopyMethod()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCopyMethod');
        if (!$pluginInfo) {
            return parent::getCopyMethod();
        } else {
            return $this->___callPlugins('getCopyMethod', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getGuestTemplateId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getGuestTemplateId');
        if (!$pluginInfo) {
            return parent::getGuestTemplateId();
        } else {
            return $this->___callPlugins('getGuestTemplateId', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getTemplateId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTemplateId');
        if (!$pluginInfo) {
            return parent::getTemplateId();
        } else {
            return $this->___callPlugins('getTemplateId', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getEmailIdentity()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEmailIdentity');
        if (!$pluginInfo) {
            return parent::getEmailIdentity();
        } else {
            return $this->___callPlugins('getEmailIdentity', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setStore(\Magento\Store\Model\Store $store)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStore');
        if (!$pluginInfo) {
            return parent::setStore($store);
        } else {
            return $this->___callPlugins('setStore', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getStore()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStore');
        if (!$pluginInfo) {
            return parent::getStore();
        } else {
            return $this->___callPlugins('getStore', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerName($name)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerName');
        if (!$pluginInfo) {
            return parent::setCustomerName($name);
        } else {
            return $this->___callPlugins('setCustomerName', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerEmail($email)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerEmail');
        if (!$pluginInfo) {
            return parent::setCustomerEmail($email);
        } else {
            return $this->___callPlugins('setCustomerEmail', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerName');
        if (!$pluginInfo) {
            return parent::getCustomerName();
        } else {
            return $this->___callPlugins('getCustomerName', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerEmail()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerEmail');
        if (!$pluginInfo) {
            return parent::getCustomerEmail();
        } else {
            return $this->___callPlugins('getCustomerEmail', func_get_args(), $pluginInfo);
        }
    }
}
