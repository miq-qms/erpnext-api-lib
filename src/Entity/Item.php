<?php

namespace Miq\ErpnextApi\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Miq\ErpnextApi\Traits\DefaultTrait;

/**
 * Tabitem
 *
 * @ORM\Table(name="tabItem", uniqueConstraints={@ORM\UniqueConstraint(name="item_code", columns={"item_code"}), @ORM\UniqueConstraint(name="hub_sync_id", columns={"hub_sync_id"})}, indexes={@ORM\Index(name="item_group", columns={"item_group"}), @ORM\Index(name="show_variant_in_website", columns={"show_variant_in_website"}), @ORM\Index(name="modified", columns={"modified"}), @ORM\Index(name="variant_of", columns={"variant_of"}), @ORM\Index(name="show_in_website", columns={"show_in_website"}), @ORM\Index(name="parent", columns={"parent"}), @ORM\Index(name="route_index", columns={"route"}), @ORM\Index(name="item_name", columns={"item_name"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Item
{
    use DefaultTrait;

    //region properties
    /**
     * @var string|null
     *
     * @ORM\Column(name="naming_series", type="string", length=140, nullable=true)
     */
    private ?string $namingSeries;

    /**
     * @var string|null
     *
     * @ORM\Column(name="item_code", type="string", length=140, nullable=true)
     */
    private ?string $itemCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="variant_of", type="string", length=140, nullable=true)
     */
    private ?string $variantOf;

    /**
     * @var string|null
     *
     * @ORM\Column(name="item_name", type="string", length=140, nullable=true)
     */
    private ?string $itemName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="item_group", type="string", length=140, nullable=true)
     */
    private ?string $itemGroup;

    /**
     * @var string|null
     *
     * @ORM\Column(name="stock_uom", type="string", length=140, nullable=true)
     */
    private ?string $stockUom;

    /**
     * @var int
     *
     * @ORM\Column(name="disabled", type="integer", nullable=false)
     */
    private int $disabled = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="allow_alternative_item", type="integer", nullable=false)
     */
    private int $allowAlternativeItem = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="is_stock_item", type="integer", nullable=false, options={"default"="1"})
     */
    private int $isStockItem = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="include_item_in_manufacturing", type="integer", nullable=false, options={"default"="1"})
     */
    private int $includeItemInManufacturing = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="opening_stock", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $openingStock = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="valuation_rate", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $valuationRate = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="standard_rate", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $standardRate = '0.000000';

    /**
     * @var int
     *
     * @ORM\Column(name="is_fixed_asset", type="integer", nullable=false)
     */
    private int $isFixedAsset = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="auto_create_assets", type="integer", nullable=false)
     */
    private int $autoCreateAssets = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="asset_category", type="string", length=140, nullable=true)
     */
    private ?string $assetCategory;

    /**
     * @var string|null
     *
     * @ORM\Column(name="asset_naming_series", type="string", length=140, nullable=true)
     */
    private ?string $assetNamingSeries;

    /**
     * @var string
     *
     * @ORM\Column(name="over_delivery_receipt_allowance", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $overDeliveryReceiptAllowance = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="over_billing_allowance", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $overBillingAllowance = '0.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="text", length=65535, nullable=true)
     */
    private ?string $image = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="brand", type="string", length=140, nullable=true)
     */
    private ?string $brand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=true)
     */
    private ?string $description;

    /**
     * @var int
     *
     * @ORM\Column(name="shelf_life_in_days", type="integer", nullable=false)
     */
    private int $shelfLifeInDays = 0;

    /**
     * @var DateTimeInterface|null
     *
     * @ORM\Column(name="end_of_life", type="date", nullable=true, options={"default"="2099-12-31"})
     */
    private ?DateTimeInterface $endOfLife = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="default_material_request_type", type="string", length=140, nullable=true, options={"default"="Purchase"})
     */
    private ?string $defaultMaterialRequestType = 'Purchase';

    /**
     * @var string|null
     *
     * @ORM\Column(name="valuation_method", type="string", length=140, nullable=true)
     */
    private ?string $valuationMethod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="warranty_period", type="string", length=140, nullable=true)
     */
    private ?string $warrantyPeriod;

    /**
     * @var string
     *
     * @ORM\Column(name="weight_per_unit", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $weightPerUnit = '0.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="weight_uom", type="string", length=140, nullable=true)
     */
    private ?string $weightUom;

    /**
     * @var int
     *
     * @ORM\Column(name="has_batch_no", type="integer", nullable=false)
     */
    private int $hasBatchNo = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="create_new_batch", type="integer", nullable=false)
     */
    private int $createNewBatch = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="batch_number_series", type="string", length=140, nullable=true)
     */
    private ?string $batchNumberSeries;

    /**
     * @var int
     *
     * @ORM\Column(name="has_expiry_date", type="integer", nullable=false)
     */
    private int $hasExpiryDate = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="retain_sample", type="integer", nullable=false)
     */
    private int $retainSample = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="sample_quantity", type="integer", nullable=false)
     */
    private int $sampleQuantity = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="has_serial_no", type="integer", nullable=false)
     */
    private int $hasSerialNo = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="serial_no_series", type="string", length=140, nullable=true)
     */
    private ?string $serialNoSeries;

    /**
     * @var int
     *
     * @ORM\Column(name="has_variants", type="integer", nullable=false)
     */
    private int $hasVariants = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="variant_based_on", type="string", length=140, nullable=true, options={"default"="Item Attribute"})
     */
    private ?string $variantBasedOn = 'Item Attribute';

    /**
     * @var int
     *
     * @ORM\Column(name="is_purchase_item", type="integer", nullable=false, options={"default"="1"})
     */
    private int $isPurchaseItem = 1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="purchase_uom", type="string", length=140, nullable=true)
     */
    private ?string $purchaseUom;

    /**
     * @var string
     *
     * @ORM\Column(name="min_order_qty", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $minOrderQty = '0.000000';

    /**
     * @var string
     *
     * @ORM\Column(name="safety_stock", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $safetyStock = '0.000000';

    /**
     * @var int
     *
     * @ORM\Column(name="lead_time_days", type="integer", nullable=false)
     */
    private int $leadTimeDays = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="last_purchase_rate", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $lastPurchaseRate = '0.000000';

    /**
     * @var int
     *
     * @ORM\Column(name="is_customer_provided_item", type="integer", nullable=false)
     */
    private int $isCustomerProvidedItem = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer", type="string", length=140, nullable=true)
     */
    private ?string $customer;

    /**
     * @var int
     *
     * @ORM\Column(name="delivered_by_supplier", type="integer", nullable=false)
     */
    private int $deliveredBySupplier = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country_of_origin", type="string", length=140, nullable=true)
     */
    private ?string $countryOfOrigin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customs_tariff_number", type="string", length=140, nullable=true)
     */
    private ?string $customsTariffNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sales_uom", type="string", length=140, nullable=true)
     */
    private ?string $salesUom;

    /**
     * @var int
     *
     * @ORM\Column(name="is_sales_item", type="integer", nullable=false, options={"default"="1"})
     */
    private int $isSalesItem = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="max_discount", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $maxDiscount = '0.000000';

    /**
     * @var string|null
     *
     * @ORM\Column(name="deferred_revenue_account", type="string", length=140, nullable=true)
     */
    private ?string $deferredRevenueAccount;

    /**
     * @var int
     *
     * @ORM\Column(name="enable_deferred_revenue", type="integer", nullable=false)
     */
    private int $enableDeferredRevenue = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="no_of_months", type="integer", nullable=false)
     */
    private int $noOfMonths = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="deferred_expense_account", type="string", length=140, nullable=true)
     */
    private ?string $deferredExpenseAccount;

    /**
     * @var int
     *
     * @ORM\Column(name="enable_deferred_expense", type="integer", nullable=false)
     */
    private int $enableDeferredExpense = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="no_of_months_exp", type="integer", nullable=false)
     */
    private int $noOfMonthsExp = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="quality_inspection_template", type="string", length=140, nullable=true)
     */
    private ?string $qualityInspectionTemplate;

    /**
     * @var int
     *
     * @ORM\Column(name="inspection_required_before_purchase", type="integer", nullable=false)
     */
    private int $inspectionRequiredBeforePurchase = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="inspection_required_before_delivery", type="integer", nullable=false)
     */
    private int $inspectionRequiredBeforeDelivery = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="default_bom", type="string", length=140, nullable=true)
     */
    private ?string $defaultBom;

    /**
     * @var int
     *
     * @ORM\Column(name="is_sub_contracted_item", type="integer", nullable=false)
     */
    private int $isSubContractedItem = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="customer_code", type="string", length=140, nullable=true)
     */
    private ?string $customerCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="default_item_manufacturer", type="string", length=140, nullable=true)
     */
    private ?string $defaultItemManufacturer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="default_manufacturer_part_no", type="string", length=140, nullable=true)
     */
    private ?string $defaultManufacturerPartNo;

    /**
     * @var string
     *
     * @ORM\Column(name="total_projected_qty", type="decimal", precision=18, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private string $totalProjectedQty = '0.000000';

    //endregion properties

    //region getter + setter
    public function getNamingSeries(): ?string
    {
        return $this->namingSeries;
    }

    public function setNamingSeries(?string $namingSeries): self
    {
        $this->namingSeries = $namingSeries;

        return $this;
    }

    public function getItemCode(): ?string
    {
        return $this->itemCode;
    }

    public function setItemCode(?string $itemCode): self
    {
        $this->itemCode = $itemCode;

        return $this;
    }

    public function getVariantOf(): ?string
    {
        return $this->variantOf;
    }

    public function setVariantOf(?string $variantOf): self
    {
        $this->variantOf = $variantOf;

        return $this;
    }

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(?string $itemName): self
    {
        $this->itemName = $itemName;

        return $this;
    }

    public function getItemGroup(): ?string
    {
        return $this->itemGroup;
    }

    public function setItemGroup(?string $itemGroup): self
    {
        $this->itemGroup = $itemGroup;

        return $this;
    }


    public function getStockUom(): ?string
    {
        return $this->stockUom;
    }

    public function setStockUom(?string $stockUom): self
    {
        $this->stockUom = $stockUom;

        return $this;
    }

    public function getDisabled(): ?int
    {
        return $this->disabled;
    }

    public function setDisabled(int $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function getAllowAlternativeItem(): ?int
    {
        return $this->allowAlternativeItem;
    }

    public function setAllowAlternativeItem(int $allowAlternativeItem): self
    {
        $this->allowAlternativeItem = $allowAlternativeItem;

        return $this;
    }

    public function getIsStockItem(): ?int
    {
        return $this->isStockItem;
    }

    public function setIsStockItem(int $isStockItem): self
    {
        $this->isStockItem = $isStockItem;

        return $this;
    }

    public function getIncludeItemInManufacturing(): ?int
    {
        return $this->includeItemInManufacturing;
    }

    public function setIncludeItemInManufacturing(int $includeItemInManufacturing): self
    {
        $this->includeItemInManufacturing = $includeItemInManufacturing;

        return $this;
    }

    public function getOpeningStock(): ?string
    {
        return $this->openingStock;
    }

    public function setOpeningStock(string $openingStock): self
    {
        $this->openingStock = $openingStock;

        return $this;
    }

    public function getValuationRate(): ?string
    {
        return $this->valuationRate;
    }

    public function setValuationRate(string $valuationRate): self
    {
        $this->valuationRate = $valuationRate;

        return $this;
    }

    public function getStandardRate(): ?string
    {
        return $this->standardRate;
    }

    public function setStandardRate(string $standardRate): self
    {
        $this->standardRate = $standardRate;

        return $this;
    }

    public function getIsFixedAsset(): ?int
    {
        return $this->isFixedAsset;
    }

    public function setIsFixedAsset(int $isFixedAsset): self
    {
        $this->isFixedAsset = $isFixedAsset;

        return $this;
    }

    public function getAutoCreateAssets(): ?int
    {
        return $this->autoCreateAssets;
    }

    public function setAutoCreateAssets(int $autoCreateAssets): self
    {
        $this->autoCreateAssets = $autoCreateAssets;

        return $this;
    }

    public function getAssetCategory(): ?string
    {
        return $this->assetCategory;
    }

    public function setAssetCategory(?string $assetCategory): self
    {
        $this->assetCategory = $assetCategory;

        return $this;
    }

    public function getAssetNamingSeries(): ?string
    {
        return $this->assetNamingSeries;
    }

    public function setAssetNamingSeries(?string $assetNamingSeries): self
    {
        $this->assetNamingSeries = $assetNamingSeries;

        return $this;
    }

    public function getOverDeliveryReceiptAllowance(): ?string
    {
        return $this->overDeliveryReceiptAllowance;
    }

    public function setOverDeliveryReceiptAllowance(string $overDeliveryReceiptAllowance): self
    {
        $this->overDeliveryReceiptAllowance = $overDeliveryReceiptAllowance;

        return $this;
    }

    public function getOverBillingAllowance(): ?string
    {
        return $this->overBillingAllowance;
    }

    public function setOverBillingAllowance(string $overBillingAllowance): self
    {
        $this->overBillingAllowance = $overBillingAllowance;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getShelfLifeInDays(): ?int
    {
        return $this->shelfLifeInDays;
    }

    public function setShelfLifeInDays(int $shelfLifeInDays): self
    {
        $this->shelfLifeInDays = $shelfLifeInDays;

        return $this;
    }

    public function getEndOfLife(): ?DateTimeInterface
    {
        return $this->endOfLife;
    }

    public function setEndOfLife(?DateTimeInterface $endOfLife): self
    {
        $this->endOfLife = $endOfLife;

        return $this;
    }

    public function getDefaultMaterialRequestType(): ?string
    {
        return $this->defaultMaterialRequestType;
    }

    public function setDefaultMaterialRequestType(?string $defaultMaterialRequestType): self
    {
        $this->defaultMaterialRequestType = $defaultMaterialRequestType;

        return $this;
    }

    public function getValuationMethod(): ?string
    {
        return $this->valuationMethod;
    }

    public function setValuationMethod(?string $valuationMethod): self
    {
        $this->valuationMethod = $valuationMethod;

        return $this;
    }

    public function getWarrantyPeriod(): ?string
    {
        return $this->warrantyPeriod;
    }

    public function setWarrantyPeriod(?string $warrantyPeriod): self
    {
        $this->warrantyPeriod = $warrantyPeriod;

        return $this;
    }

    public function getWeightPerUnit(): ?string
    {
        return $this->weightPerUnit;
    }

    public function setWeightPerUnit(string $weightPerUnit): self
    {
        $this->weightPerUnit = $weightPerUnit;

        return $this;
    }

    public function getWeightUom(): ?string
    {
        return $this->weightUom;
    }

    public function setWeightUom(?string $weightUom): self
    {
        $this->weightUom = $weightUom;

        return $this;
    }

    public function getHasBatchNo(): ?int
    {
        return $this->hasBatchNo;
    }

    public function setHasBatchNo(int $hasBatchNo): self
    {
        $this->hasBatchNo = $hasBatchNo;

        return $this;
    }

    public function getCreateNewBatch(): ?int
    {
        return $this->createNewBatch;
    }

    public function setCreateNewBatch(int $createNewBatch): self
    {
        $this->createNewBatch = $createNewBatch;

        return $this;
    }

    public function getBatchNumberSeries(): ?string
    {
        return $this->batchNumberSeries;
    }

    public function setBatchNumberSeries(?string $batchNumberSeries): self
    {
        $this->batchNumberSeries = $batchNumberSeries;

        return $this;
    }

    public function getHasExpiryDate(): ?int
    {
        return $this->hasExpiryDate;
    }

    public function setHasExpiryDate(int $hasExpiryDate): self
    {
        $this->hasExpiryDate = $hasExpiryDate;

        return $this;
    }

    public function getRetainSample(): ?int
    {
        return $this->retainSample;
    }

    public function setRetainSample(int $retainSample): self
    {
        $this->retainSample = $retainSample;

        return $this;
    }

    public function getSampleQuantity(): ?int
    {
        return $this->sampleQuantity;
    }

    public function setSampleQuantity(int $sampleQuantity): self
    {
        $this->sampleQuantity = $sampleQuantity;

        return $this;
    }

    public function getHasSerialNo(): ?int
    {
        return $this->hasSerialNo;
    }

    public function setHasSerialNo(int $hasSerialNo): self
    {
        $this->hasSerialNo = $hasSerialNo;

        return $this;
    }

    public function getSerialNoSeries(): ?string
    {
        return $this->serialNoSeries;
    }

    public function setSerialNoSeries(?string $serialNoSeries): self
    {
        $this->serialNoSeries = $serialNoSeries;

        return $this;
    }

    public function getHasVariants(): ?int
    {
        return $this->hasVariants;
    }

    public function setHasVariants(int $hasVariants): self
    {
        $this->hasVariants = $hasVariants;

        return $this;
    }

    public function getVariantBasedOn(): ?string
    {
        return $this->variantBasedOn;
    }

    public function setVariantBasedOn(?string $variantBasedOn): self
    {
        $this->variantBasedOn = $variantBasedOn;

        return $this;
    }

    public function getIsPurchaseItem(): ?int
    {
        return $this->isPurchaseItem;
    }

    public function setIsPurchaseItem(int $isPurchaseItem): self
    {
        $this->isPurchaseItem = $isPurchaseItem;

        return $this;
    }

    public function getPurchaseUom(): ?string
    {
        return $this->purchaseUom;
    }

    public function setPurchaseUom(?string $purchaseUom): self
    {
        $this->purchaseUom = $purchaseUom;

        return $this;
    }

    public function getMinOrderQty(): ?string
    {
        return $this->minOrderQty;
    }

    public function setMinOrderQty(string $minOrderQty): self
    {
        $this->minOrderQty = $minOrderQty;

        return $this;
    }

    public function getSafetyStock(): ?string
    {
        return $this->safetyStock;
    }

    public function setSafetyStock(string $safetyStock): self
    {
        $this->safetyStock = $safetyStock;

        return $this;
    }

    public function getLeadTimeDays(): ?int
    {
        return $this->leadTimeDays;
    }

    public function setLeadTimeDays(int $leadTimeDays): self
    {
        $this->leadTimeDays = $leadTimeDays;

        return $this;
    }

    public function getLastPurchaseRate(): ?string
    {
        return $this->lastPurchaseRate;
    }

    public function setLastPurchaseRate(string $lastPurchaseRate): self
    {
        $this->lastPurchaseRate = $lastPurchaseRate;

        return $this;
    }

    public function getIsCustomerProvidedItem(): ?int
    {
        return $this->isCustomerProvidedItem;
    }

    public function setIsCustomerProvidedItem(int $isCustomerProvidedItem): self
    {
        $this->isCustomerProvidedItem = $isCustomerProvidedItem;

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(?string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getDeliveredBySupplier(): ?int
    {
        return $this->deliveredBySupplier;
    }

    public function setDeliveredBySupplier(int $deliveredBySupplier): self
    {
        $this->deliveredBySupplier = $deliveredBySupplier;

        return $this;
    }

    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin(?string $countryOfOrigin): self
    {
        $this->countryOfOrigin = $countryOfOrigin;

        return $this;
    }

    public function getCustomsTariffNumber(): ?string
    {
        return $this->customsTariffNumber;
    }

    public function setCustomsTariffNumber(?string $customsTariffNumber): self
    {
        $this->customsTariffNumber = $customsTariffNumber;

        return $this;
    }

    public function getSalesUom(): ?string
    {
        return $this->salesUom;
    }

    public function setSalesUom(?string $salesUom): self
    {
        $this->salesUom = $salesUom;

        return $this;
    }

    public function getIsSalesItem(): ?int
    {
        return $this->isSalesItem;
    }

    public function setIsSalesItem(int $isSalesItem): self
    {
        $this->isSalesItem = $isSalesItem;

        return $this;
    }

    public function getMaxDiscount(): ?string
    {
        return $this->maxDiscount;
    }

    public function setMaxDiscount(string $maxDiscount): self
    {
        $this->maxDiscount = $maxDiscount;

        return $this;
    }

    public function getDeferredRevenueAccount(): ?string
    {
        return $this->deferredRevenueAccount;
    }

    public function setDeferredRevenueAccount(?string $deferredRevenueAccount): self
    {
        $this->deferredRevenueAccount = $deferredRevenueAccount;

        return $this;
    }

    public function getEnableDeferredRevenue(): ?int
    {
        return $this->enableDeferredRevenue;
    }

    public function setEnableDeferredRevenue(int $enableDeferredRevenue): self
    {
        $this->enableDeferredRevenue = $enableDeferredRevenue;

        return $this;
    }

    public function getNoOfMonths(): ?int
    {
        return $this->noOfMonths;
    }

    public function setNoOfMonths(int $noOfMonths): self
    {
        $this->noOfMonths = $noOfMonths;

        return $this;
    }

    public function getDeferredExpenseAccount(): ?string
    {
        return $this->deferredExpenseAccount;
    }

    public function setDeferredExpenseAccount(?string $deferredExpenseAccount): self
    {
        $this->deferredExpenseAccount = $deferredExpenseAccount;

        return $this;
    }

    public function getEnableDeferredExpense(): ?int
    {
        return $this->enableDeferredExpense;
    }

    public function setEnableDeferredExpense(int $enableDeferredExpense): self
    {
        $this->enableDeferredExpense = $enableDeferredExpense;

        return $this;
    }

    public function getNoOfMonthsExp(): ?int
    {
        return $this->noOfMonthsExp;
    }

    public function setNoOfMonthsExp(int $noOfMonthsExp): self
    {
        $this->noOfMonthsExp = $noOfMonthsExp;

        return $this;
    }

    public function getQualityInspectionTemplate(): ?string
    {
        return $this->qualityInspectionTemplate;
    }

    public function setQualityInspectionTemplate(?string $qualityInspectionTemplate): self
    {
        $this->qualityInspectionTemplate = $qualityInspectionTemplate;

        return $this;
    }

    public function getInspectionRequiredBeforePurchase(): ?int
    {
        return $this->inspectionRequiredBeforePurchase;
    }

    public function setInspectionRequiredBeforePurchase(int $inspectionRequiredBeforePurchase): self
    {
        $this->inspectionRequiredBeforePurchase = $inspectionRequiredBeforePurchase;

        return $this;
    }

    public function getInspectionRequiredBeforeDelivery(): ?int
    {
        return $this->inspectionRequiredBeforeDelivery;
    }

    public function setInspectionRequiredBeforeDelivery(int $inspectionRequiredBeforeDelivery): self
    {
        $this->inspectionRequiredBeforeDelivery = $inspectionRequiredBeforeDelivery;

        return $this;
    }

    public function getDefaultBom(): ?string
    {
        return $this->defaultBom;
    }

    public function setDefaultBom(?string $defaultBom): self
    {
        $this->defaultBom = $defaultBom;

        return $this;
    }

    public function getIsSubContractedItem(): ?int
    {
        return $this->isSubContractedItem;
    }

    public function setIsSubContractedItem(int $isSubContractedItem): self
    {
        $this->isSubContractedItem = $isSubContractedItem;

        return $this;
    }

    public function getCustomerCode(): ?string
    {
        return $this->customerCode;
    }

    public function setCustomerCode(?string $customerCode): self
    {
        $this->customerCode = $customerCode;

        return $this;
    }

    public function getDefaultItemManufacturer(): ?string
    {
        return $this->defaultItemManufacturer;
    }

    public function setDefaultItemManufacturer(?string $defaultItemManufacturer): self
    {
        $this->defaultItemManufacturer = $defaultItemManufacturer;

        return $this;
    }

    public function getDefaultManufacturerPartNo(): ?string
    {
        return $this->defaultManufacturerPartNo;
    }

    public function setDefaultManufacturerPartNo(?string $defaultManufacturerPartNo): self
    {
        $this->defaultManufacturerPartNo = $defaultManufacturerPartNo;

        return $this;
    }

    public function getTotalProjectedQty(): ?string
    {
        return $this->totalProjectedQty;
    }

    public function setTotalProjectedQty(string $totalProjectedQty): self
    {
        $this->totalProjectedQty = $totalProjectedQty;

        return $this;
    }

    public function getPublishInHub(): ?int
    {
        return $this->publishInHub;
    }

    public function setPublishInHub(int $publishInHub): self
    {
        $this->publishInHub = $publishInHub;

        return $this;
    }

    public function getHubCategoryToPublish(): ?string
    {
        return $this->hubCategoryToPublish;
    }

    public function setHubCategoryToPublish(?string $hubCategoryToPublish): self
    {
        $this->hubCategoryToPublish = $hubCategoryToPublish;

        return $this;
    }

    public function getHubWarehouse(): ?string
    {
        return $this->hubWarehouse;
    }

    public function setHubWarehouse(?string $hubWarehouse): self
    {
        $this->hubWarehouse = $hubWarehouse;

        return $this;
    }

    public function getSyncedWithHub(): ?int
    {
        return $this->syncedWithHub;
    }

    public function setSyncedWithHub(int $syncedWithHub): self
    {
        $this->syncedWithHub = $syncedWithHub;

        return $this;
    }

    public function getHubSyncId(): ?string
    {
        return $this->hubSyncId;
    }

    public function setHubSyncId(?string $hubSyncId): self
    {
        $this->hubSyncId = $hubSyncId;

        return $this;
    }
    //endregion
}
