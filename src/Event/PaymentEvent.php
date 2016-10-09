<?php

namespace Drupal\commerce_braintree\Event;

use Drupal\commerce_payment\Entity\PaymentInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Defines a payment event for manipulation of the transaction data.
 *
 * @package Drupal\commerce_braintree\Event
 */
class PaymentEvent extends Event {

  /**
   * The payment.
   *
   * @var \Drupal\commerce_payment\Entity\PaymentInterface
   */
  private $payment;

  /**
   * @return \Drupal\commerce_payment\Entity\PaymentInterface
   */
  public function getPayment() {
    return $this->payment;
  }

  /**
   * Get the order from the payment.
   *
   * @return \Drupal\commerce_order\Entity\OrderInterface|null
   */
  public function getOrder() {
    return $this->payment->getOrder();
  }

  /**
   * The transaction data to be sent to Braintree.
   *
   * @var array
   */
  private $transaction_data = [];

  /**
   * @inheritDoc
   */
  public function __construct($transaction_data, PaymentInterface $payment) {
    $this->setTransactionData($transaction_data);
    $this->payment = $payment;
  }

  /**
   * @return array
   */
  public function getTransactionData() {
    return $this->transaction_data;
  }

  /**
   * @param array $transaction_data
   */
  public function setTransactionData($transaction_data) {
    $this->transaction_data = $transaction_data;
  }

}
