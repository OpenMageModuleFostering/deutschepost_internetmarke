/**
 * DeutschePost Internetmarke
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to
 * newer versions in the future.
 *
 * PHP version 5
 *
 * @category  skin
 * @package   default_default
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
var AdditionalServices = Class.create();

AdditionalServices.prototype = {
    initialize: function (productElmId, serviceElmId, priceElmId, template, services, associationMap, priceMap, locale) {
        this.products = $(productElmId);
        this.select = $(serviceElmId);
        this.priceEl = $(priceElmId);
        this.template = template;
        this.services = services;
        this.associationMap = associationMap;
        this.priceMap = priceMap;
        this.locale = locale;
    },
    clear: function () {
        this.select.update();
    },
    update: function (productValue) {
        var availableServices = this.associationMap[productValue];
        availableServices.each(function (serviceCombination) {
            var optionNames = [];
            serviceCombination.each(function (serviceId) {
                optionNames.push(this.services[serviceId]);
            });
            var optionHtml = this.template.evaluate({
                id: serviceCombination.join('_'),
                name: optionNames.join(' + ')
            });
            this.select.insert(optionHtml);
        }.bind(this));
    },
    calculatePrice: function (productValue, serviceValue) {

        if (productValue != '') {
            this.changePriceValue(parseInt(this.priceMap['products'][productValue]));
        } else if (serviceValue != undefined && serviceValue != '') {

            var sum = 0;
            var curClass = this;

            sum += parseInt(curClass.priceMap['products'][curClass.products.value]);

            serviceValue.split("_").each(function (value) {
                sum += parseInt(curClass.priceMap['services'][value]);
            });

            this.changePriceValue(sum);
        } else {
            this.changePriceValue(0);
        }

    },
    changePriceValue: function (value) {
        var price = (value / 100);
        price = price.toLocaleString(this.locale, { style: 'currency', currency: 'EUR' });
        this.priceEl.update(price);
    }
};
