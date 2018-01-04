<?php


namespace PHPCuong\RedirectCustomer\Plugin\Redirect;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;

class Redirect
{
    protected $coreRegistry;

    protected $url;

    protected $resultFactory;

    public function __construct(Registry $registry, UrlInterface $url, ResultFactory $resultFactory)
    {
        $this->coreRegistry = $registry;
        $this->url = $url;
        $this->resultFactory = $resultFactory;
    }

    public function aroundGetRedirect ($subject, callable $proceed)
    {
        //if ($this->coreRegistry->registry('is_new_account')) {
            /** @var \Magento\Framework\Controller\Result\Redirect $result */
            $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $result->setUrl($this->url->getUrl('/'));
            return $result;
        //}

        return $proceed();
    }
	
	/* public function afterGetRedirect(\Magento\Framework\Controller\Result\Redirect $subject, $result)
    {
        return '|' . $result . '|';
    } */
}