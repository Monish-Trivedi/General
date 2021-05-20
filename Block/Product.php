<?php
namespace Monish\General\Block;
class Product extends \Magento\Framework\View\Element\Template
{    
  protected $_productCollectionFactory;
  protected $_productRepository;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\ProductRepository $productRepository,      
        array $data = []
    )
    {    
        $this->_productCollectionFactory = $productCollectionFactory;   
        $this->_productRepository = $productRepository; 
        parent::__construct($context, $data);
        
    }

    public function getProductById($id)
    {
      return $this->_productRepository->getById($id);
    }
    
    public function getProductBySku($sku)
    {
      return $this->_productRepository->getBySku($sku);
    }
    
    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect(['name','sku']);
        return $collection;
    }
}
?>