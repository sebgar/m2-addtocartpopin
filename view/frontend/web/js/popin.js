define([
    'jquery',
    'underscore',
    'Magento_Ui/js/modal/modal',
], function ($, _, modal) {
    'use strict';

    $.widget('mage.add_to_cart_popin', {
        options: {},
        modalWindow: null,

        _create: function () {
            this.createPopin(this.options.elements.modal);
            var self = this;

            $(document).on('ajax:addToCart', function (e, data) {
                if (!_.isEmpty(String(data.sku)) && _.isEmpty(data.response)) {
                    self.addToCartAfter(data.sku);
                }
            });
        },

        addToCartAfter: function (sku) {
            var self = this;

            $('body').loader('show');

            $.ajax({
                type: 'POST',
                url: this.options.url,
                data: {'sku': sku},
                cache: false,
                success: function (html) {
                    if (html) {
                        $(self.options.elements.modal).html(html).trigger('contentUpdated');
                        self.showModal();
                    }

                    $('body').loader('hide');
                }
            });
        },

        createPopin: function (element) {
            this.modalWindow = element;
            modal(this.options.popin_options, $(this.modalWindow));
        },

        showModal: function () {
            $(this.modalWindow).modal('openModal').trigger('contentUpdated');
        }
    });

    return $.mage.add_to_cart_popin;
});
