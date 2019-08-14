<?php
/**
 * DeutschePost ProdWs
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
 * @category  DeutschePost
 * @package   DeutschePost_ProdWs
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
use DeutschePost\ProdWs\Soap as ProdWs;
/**
 * DeutschePost_ProdWs_Model_Webservice_Parser_Soap
 *
 * Prepare webservice request data and parse webservice responses.
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Model_Webservice_Parser_Soap
{
    /**
     * Convert a remote basic product to a local basic product entity.
     *
     * @param ProdWs\basicProductType $wsBasicProduct
     * @return DeutschePost_ProdWs_Model_Product_Basic
     */
    protected function parseBasicProduct(ProdWs\basicProductType $wsBasicProduct)
    {
        $basicProduct = Mage::getModel('deutschepost_prodws/product_basic');
        $basicProduct->setProdwsId($wsBasicProduct->extendedIdentifier->{"ProdWS-ID"});
        $basicProduct->setName($wsBasicProduct->extendedIdentifier->name);
        $basicProduct->setVersion($wsBasicProduct->extendedIdentifier->version);
        $basicProduct->setDestination($wsBasicProduct->extendedIdentifier->destination);
        $basicProduct->setValidFrom($wsBasicProduct->extendedIdentifier->validFrom);
        $basicProduct->setValidTo($wsBasicProduct->extendedIdentifier->validTo);
        // beware: string to float to int conversion gives wrong results, round() seems to help:
        $basicProduct->setPrice(round(100 * $wsBasicProduct->priceDefinition->grossPrice->value));

        return $basicProduct;
    }

    /**
     * Convert a list of remote basic products to a list of
     * local basic product entities.
     *
     * @param ProdWs\basicProductList $basicProductList
     * @return DeutschePost_ProdWs_Model_Product_Basic[]
     */
    protected function parseBasicProductList(ProdWs\basicProductList $basicProductList)
    {
        $associatedProducts = array();

        $wsBasicProducts = $basicProductList->BasicProduct;
        if ($wsBasicProducts instanceof ProdWs\basicProductType) {
            $wsBasicProducts = array($wsBasicProducts);
        }
        /** @var ProdWs\basicProductType $wsBasicProduct */
        foreach ($wsBasicProducts as $wsBasicProduct) {
            $basicProduct = $this->parseBasicProduct($wsBasicProduct);

            $key = sprintf("%s-%d", $basicProduct->getProdwsId(), $basicProduct->getVersion());
            $associatedProducts[$key] = $basicProduct;
        }

        return $associatedProducts;
    }

    /**
     * Convert a remote additional product to a local additional product entity.
     *
     * @param ProdWs\additionalProductType $wsAdditionalProduct
     *
     * @return DeutschePost_ProdWs_Model_Product_Additional
     */
    protected function parseAdditionalProduct(ProdWs\additionalProductType $wsAdditionalProduct)
    {
        $additionalProduct = Mage::getModel('deutschepost_prodws/product_additional');
        $additionalProduct->setProdwsId($wsAdditionalProduct->extendedIdentifier->{"ProdWS-ID"});
        $additionalProduct->setName($wsAdditionalProduct->extendedIdentifier->name);
        $additionalProduct->setVersion($wsAdditionalProduct->extendedIdentifier->version);
        $additionalProduct->setDestination($wsAdditionalProduct->extendedIdentifier->destination);
        $additionalProduct->setValidFrom($wsAdditionalProduct->extendedIdentifier->validFrom);
        $additionalProduct->setValidTo($wsAdditionalProduct->extendedIdentifier->validTo);
        // beware: string to float to int conversion gives wrong results, round() seems to help:
        $additionalProduct->setPrice(round(100 * $wsAdditionalProduct->priceDefinition->grossPrice->value));

        return $additionalProduct;
    }

    /**
     * Convert a list of remote additional products to a list of
     * local additional product entities.
     *
     * @param ProdWs\additionalProductList $additionalProductList
     * @return DeutschePost_ProdWs_Model_Product_Additional[]
     */
    protected function parseAdditionalProductList(ProdWs\additionalProductList $additionalProductList)
    {
        $associatedProducts = array();

        $wsAdditionalProducts = $additionalProductList->AdditionalProduct;
        if ($wsAdditionalProducts instanceof ProdWs\additionalProductType) {
            $wsAdditionalProducts = array($wsAdditionalProducts);
        }

        /** @var ProdWs\additionalProductType $wsAdditionalProduct */
        foreach ($wsAdditionalProducts as $wsAdditionalProduct) {
            $additionalProduct = $this->parseAdditionalProduct($wsAdditionalProduct);

            $key = sprintf("%s-%d", $additionalProduct->getProdwsId(), $additionalProduct->getVersion());
            $associatedProducts[$key] = $additionalProduct;
        }

        return $associatedProducts;
    }

    /**
     * Convert a remote sales product to a local sales product entity.
     *
     * @param ProdWs\salesProductType $wsSalesProduct
     *
     * @return DeutschePost_ProdWs_Model_Product_Sales
     */
    protected function parseSalesProduct(ProdWs\salesProductType $wsSalesProduct)
    {
        $salesProduct = Mage::getModel('deutschepost_prodws/product_sales');
        $salesProduct->setSourceId($wsSalesProduct->extendedIdentifier->externIdentifier->id);
        $salesProduct->setProdwsId($wsSalesProduct->extendedIdentifier->{"ProdWS-ID"});
        $salesProduct->setName($wsSalesProduct->extendedIdentifier->name);
        $salesProduct->setDestination($wsSalesProduct->extendedIdentifier->destination);
        $salesProduct->setValidFrom($wsSalesProduct->extendedIdentifier->validFrom);
        $salesProduct->setValidTo($wsSalesProduct->extendedIdentifier->validTo);
        $salesProduct->setPplId($wsSalesProduct->extendedIdentifier->externIdentifier->lastPPLVersion);
        // beware: string to float to int conversion gives wrong results, round() seems to help:
        $salesProduct->setPrice(round(100 * $wsSalesProduct->priceDefinition->price->commercialGrossPrice->value));

        return $salesProduct;
    }

    /**
     * Convert a list of remote sales products to a list of
     * local sales product entities. Additionally, attach the corresponding
     * associated (basic, additional) local product entities.
     *
     * @param ProdWs\salesProductList $salesProductList
     * @param DeutschePost_ProdWs_Model_Product_Associated[] $associatedProducts
     * @return DeutschePost_ProdWs_Model_Product_Sales[]
     */
    protected function parseSalesProductList(
        ProdWs\salesProductList $salesProductList, array $associatedProducts
    ) {
        $salesProducts = array();

        $wsSalesProducts = $salesProductList->SalesProduct;
        if ($wsSalesProducts instanceof ProdWs\salesProductType) {
            $wsSalesProducts = array($wsSalesProducts);
        }

        /** @var ProdWs\salesProductType $wsSalesProduct */
        foreach ($wsSalesProducts as $wsSalesProduct) {
            $salesProduct = $this->parseSalesProduct($wsSalesProduct);

            // attach basic and additional products to sales product
            $references = $wsSalesProduct->accountProductReferenceList->accountProductReference;
            if ($references instanceof ProdWs\accountProdReferenceType) {
                $references = array($references);
            }
            /** @var ProdWs\accountProdReferenceType $reference */
            foreach ($references as $reference) {
                $key = sprintf("%s-%d", $reference->{"ProdWS-ID"}, $reference->version);
                $salesProduct->addAssociatedProduct($associatedProducts[$key]);
            }

            $salesProducts[]= $salesProduct;
        }

        return $salesProducts;
    }

    /**
     * Convert the ProdWS getProductVersionsList response to a local sales product collection.
     * All relevant data from the webservice response gets shifted to the
     * respective models but will not yet be persisted.
     *
     * @param ProdWs\getProductVersionsListResponse $input
     * @return DeutschePost_ProdWs_Model_Resource_Product_Sales_Collection
     */
    public function parseProductVersionsListResponse(ProdWs\getProductVersionsListResponse $input)
    {
        $salesProductCollection = Mage::getModel('deutschepost_prodws/product_sales')
            ->getCollection();

        $associatedProducts = array();
        $associatedProducts += $this->parseBasicProductList($input->Response->basicProductList);
        $associatedProducts += $this->parseAdditionalProductList($input->Response->additionalProductList);

        $salesProducts = $this->parseSalesProductList($input->Response->salesProductList, $associatedProducts);
        foreach ($salesProducts as $salesProduct) {
            $salesProductCollection->addItem($salesProduct);
        }

        return $salesProductCollection;
    }
}
