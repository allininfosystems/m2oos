<?php
namespace Allin\Customslider\Controller\Adminhtml\customslider;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;


class Save extends \Magento\Backend\App\Action
{

    /**
     * @param Action\Context $context
     */
    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
		//print_r($_FILES['file']['name']);
      // die;
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $model = $this->_objectManager->create('Allin\Customslider\Model\Customslider');

            $id = $this->getRequest()->getParam('customslider_id');
            if ($id) {
                $model->load($id);
                $model->setCreatedAt(date('Y-m-d H:i:s'));
            }
			
			 if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '') {
		try	{
			$data['filename']='';
			 $uploader = $this->_objectManager->create('Magento\Framework\File\Uploader', array('fileId' => 'filename'));	
			$uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
			$mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
			->getDirectoryRead(DirectoryList::MEDIA);  
			  $result = $uploader->save($mediaDirectory->getAbsolutePath('customslider_customslider'));
			//print_r($result['file']);
			//die;
			echo $data['filename'] = '/customslider_customslider/'.($result['file']); 
		} 
			catch (Exception $e) {
				$fileType = "Invalid file format";
			$data['filename'] = $_FILES['filename']['name'];
			}
			}else{
		//$data['image'] = $data['image']['value'];
				
				if (isset($data['filename']) && isset($data['filename']['value']))
				{
				if (isset($data['filename']['delete']))
				{
				//echo "del";
				$data['filename'] = '';
				$data['delete_image'] = true;
				}
				elseif (isset($data['filename']['value']))
				{
					$data['filename'] = $data['filename']['value'];
				}
				else{
					$data['filename'] = null;
					}
				}
			}
			
            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('The Customslider has been saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['customslider_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the Customslider.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['customslider_id' => $this->getRequest()->getParam('customslider_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}