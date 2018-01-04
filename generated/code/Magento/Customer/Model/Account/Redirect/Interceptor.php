<?php
namespace Magento\Customer\Model\Account\Redirect;

/**
 * Interceptor class for @see \Magento\Customer\Model\Account\Redirect
 */
class Interceptor extends \Magento\Customer\Model\Account\Redirect implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\RequestInterface $request, \Magento\Customer\Model\Session $customerSession, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\UrlInterface $url, \Magento\Framework\Url\DecoderInterface $urlDecoder, \Magento\Customer\Model\Url $customerUrl, \Magento\Framework\Controller\ResultFactory $resultFactory, \Magento\Framework\Url\HostChecker $hostChecker = null)
    {
        $this->___init();
        parent::__construct($request, $customerSession, $scopeConfig, $storeManager, $url, $urlDecoder, $customerUrl, $resultFactory, $hostChecker);
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirect()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRedirect');
        if (!$pluginInfo) {
            return parent::getRedirect();
        } else {
            return $this->___callPlugins('getRedirect', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setCookieManager($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCookieManager');
        if (!$pluginInfo) {
            return parent::setCookieManager($value);
        } else {
            return $this->___callPlugins('setCookieManager', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectCookie()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRedirectCookie');
        if (!$pluginInfo) {
            return parent::getRedirectCookie();
        } else {
            return $this->___callPlugins('getRedirectCookie', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setRedirectCookie($route)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setRedirectCookie');
        if (!$pluginInfo) {
            return parent::setRedirectCookie($route);
        } else {
            return $this->___callPlugins('setRedirectCookie', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function clearRedirectCookie()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'clearRedirectCookie');
        if (!$pluginInfo) {
            return parent::clearRedirectCookie();
        } else {
            return $this->___callPlugins('clearRedirectCookie', func_get_args(), $pluginInfo);
        }
    }
}
