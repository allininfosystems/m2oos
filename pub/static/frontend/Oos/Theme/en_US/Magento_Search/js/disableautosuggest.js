define([
    'jquery',
    'jquery/ui',
    'Magento_Search/form-mini' 
], function($){
    $.widget('test.quickSearch', $.mage.quickSearch, {
        options: {
            minSearchLength: 200,
        },
    });
    return $.test.quickSearch;
});
