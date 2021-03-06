<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\Capture;
use PayPal\Api\Authorization;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;

/**
 * Class Order
 *
 * An order transaction.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string purchase_unit_reference_id
 * @property \PayPal\Api\Amount amount
 * @property string payment_mode
 * @property string state
 * @property string reason_code
 * @property string pending_reason
 * @property string protection_eligibility
 * @property string protection_eligibility_type
 * @property string parent_payment
 * @property \PayPal\Api\FmfDetails fmf_details
 * @property string create_time
 * @property string update_time
 */
class Order extends PayPalResourceModel
{
    /**
     * Identifier of the order transaction.
     *
     * @param string $id
     * 
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Identifier of the order transaction.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Identifier to the purchase unit associated with this object. Obsolete. Use one in cart_base.
     *
     * @param string $purchase_unit_reference_id
     * 
     * @return $this
     */
    public function setPurchaseUnitReferenceId($purchase_unit_reference_id)
    {
        $this->purchase_unit_reference_id = $purchase_unit_reference_id;
        return $this;
    }

    /**
     * Identifier to the purchase unit associated with this object. Obsolete. Use one in cart_base.
     *
     * @return string
     */
    public function getPurchaseUnitReferenceId()
    {
        return $this->purchase_unit_reference_id;
    }

    /**
     * Amount being collected.
     *
     * @param \PayPal\Api\Amount $amount
     * 
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Amount being collected.
     *
     * @return \PayPal\Api\Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * specifies payment mode of the transaction
     * Valid Values: ["INSTANT_TRANSFER", "MANUAL_BANK_TRANSFER", "DELAYED_TRANSFER", "ECHECK"]
     *
     * @param string $payment_mode
     * 
     * @return $this
     */
    public function setPaymentMode($payment_mode)
    {
        $this->payment_mode = $payment_mode;
        return $this;
    }

    /**
     * specifies payment mode of the transaction
     *
     * @return string
     */
    public function getPaymentMode()
    {
        return $this->payment_mode;
    }

    /**
     * State of the order transaction.
     * Valid Values: ["pending", "completed", "refunded", "partially_refunded", "voided"]
     *
     * @param string $state
     * 
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * State of the order transaction.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Reason code for the transaction state being Pending or Reversed. This field will replace pending_reason field eventually
     * Valid Values: ["PAYER_SHIPPING_UNCONFIRMED", "MULTI_CURRENCY", "RISK_REVIEW", "REGULATORY_REVIEW", "VERIFICATION_REQUIRED", "ORDER", "OTHER"]
     *
     * @param string $reason_code
     * 
     * @return $this
     */
    public function setReasonCode($reason_code)
    {
        $this->reason_code = $reason_code;
        return $this;
    }

    /**
     * Reason code for the transaction state being Pending or Reversed. This field will replace pending_reason field eventually
     *
     * @return string
     */
    public function getReasonCode()
    {
        return $this->reason_code;
    }

    /**
     * Reason code for the transaction state being Pending. Obsolete. Retained for backward compatability. Use reason_code field above instead. 
     * Valid Values: ["payer_shipping_unconfirmed", "multi_currency", "risk_review", "regulatory_review", "verification_required", "order", "other"]
     *
     * @param string $pending_reason
     * 
     * @return $this
     */
    public function setPendingReason($pending_reason)
    {
        $this->pending_reason = $pending_reason;
        return $this;
    }

    /**
     * Reason code for the transaction state being Pending. Obsolete. Retained for backward compatability. Use reason_code field above instead. 
     *
     * @return string
     */
    public function getPendingReason()
    {
        return $this->pending_reason;
    }

    /**
     * Protection Eligibility of the Payer 
     * Valid Values: ["ELIGIBLE", "PARTIALLY_ELIGIBLE", "INELIGIBLE"]
     *
     * @param string $protection_eligibility
     * 
     * @return $this
     */
    public function setProtectionEligibility($protection_eligibility)
    {
        $this->{"protection-eligibility"} = $protection_eligibility;
        return $this;
    }

    /**
     * Protection Eligibility of the Payer 
     *
     * @return string
     */
    public function getProtectionEligibility()
    {
        return $this->{"protection-eligibility"};
    }

    /**
     * Protection Eligibility Type of the Payer 
     * Valid Values: ["ELIGIBLE", "ITEM_NOT_RECEIVED_ELIGIBLE", "INELIGIBLE", "UNAUTHORIZED_PAYMENT_ELIGIBLE"]
     *
     * @param string $protection_eligibility_type
     * 
     * @return $this
     */
    public function setProtectionEligibilityType($protection_eligibility_type)
    {
        $this->{"protection-eligibility_type"} = $protection_eligibility_type;
        return $this;
    }

    /**
     * Protection Eligibility Type of the Payer 
     *
     * @return string
     */
    public function getProtectionEligibilityType()
    {
        return $this->{"protection-eligibility_type"};
    }

    /**
     * ID of the Payment resource that this transaction is based on.
     *
     * @param string $parent_payment
     * 
     * @return $this
     */
    public function setParentPayment($parent_payment)
    {
        $this->parent_payment = $parent_payment;
        return $this;
    }

    /**
     * ID of the Payment resource that this transaction is based on.
     *
     * @return string
     */
    public function getParentPayment()
    {
        return $this->parent_payment;
    }

    /**
     * Fraud Management Filter (FMF) details applied for the payment that could result in accept/deny/pending action.
     *
     * @param \PayPal\Api\FmfDetails $fmf_details
     * 
     * @return $this
     */
    public function setFmfDetails($fmf_details)
    {
        $this->fmf_details = $fmf_details;
        return $this;
    }

    /**
     * Fraud Management Filter (FMF) details applied for the payment that could result in accept/deny/pending action.
     *
     * @return \PayPal\Api\FmfDetails
     */
    public function getFmfDetails()
    {
        return $this->fmf_details;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
     * @param string $create_time
     * 
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Time the resource was created in UTC ISO8601 format.
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @param string $update_time
     * 
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->update_time = $update_time;
        return $this;
    }

    /**
     * Time the resource was last updated in UTC ISO8601 format.
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Retrieve details about an order by passing the order_id in the request URI.
     *
     * @param string $orderId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Order
     */
    public static function get($orderId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($orderId, 'orderId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/payments/orders/$orderId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Order();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Capture a payment on an order by passing the order_id in the request URI. In addition, include the amount of the payment and indicate whether this is a final capture for the given authorization in the body of the request JSON. To issue this request, an original payment call must specify an intent of order.
     *
     * @param Capture $capture
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Capture
     */
    public function capture($capture, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($capture, 'capture');
        $payLoad = $capture->toJSON();
        $json = self::executeCall(
            "/v1/payments/orders/{$this->getId()}/capture",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Capture();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Void (cancel) an order by passing the order_id in the request URI. Note that an order cannot be voided if payment has already been partially or fully captured.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Order
     */
    public function void($apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        $payLoad = "";
        $json = self::executeCall(
            "/v1/payments/orders/{$this->getId()}/do-void",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Authorize an order by passing the order_id in the request URI. In addition, include an amount object in the body of the request JSON.
     *
     * @param Authorization $authorization Authorization Object with Amount value to be authorized
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Authorization
     */
    public function authorize($authorization, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($authorization, 'Authorization');
        $payLoad = $authorization->toJSON();
        $json = self::executeCall(
            "/v1/payments/orders/{$this->getId()}/authorize",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Authorization();
        $ret->fromJson($json);
        return $ret;
    }

}
