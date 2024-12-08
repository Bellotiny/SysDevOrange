<?php
require_once 'square-php-sdk/vendor/autoload.php';
// require_once 'Square\SquareClient';
// require_once 'Square\Models\CreatePaymentRequest';
// require_once 'Square\Models\Money';
include_once("Booking.php");
include_once("User.php");

class Payment {
    private static $accessToken = 'EAAAl0mS-gZrA7NvAmQSdr8BHagbNsqZZmN8SCzRCbwmc53kz-7dgm61UVYcxgBk';
    private static $environment = 'sandbox';
    private static $squareClient = null;

    private static function getSquareClient() {
        if (self::$squareClient === null) {
            self::$squareClient = new \Square\SquareClient([
                'accessToken' => self::$accessToken,
                'environment' => self::$environment,
            ]);
        }

        return self::$squareClient;
    }

    public static function createPayment($cardNonce, $amount) {
        $paymentsApi = self::getSquareClient()->getPaymentsApi();

        $money = new \Square\Models\Money();
        $money->setAmount($amount * 100);
        $money->setCurrency('USD');

        $request = new \Square\Models\CreatePaymentRequest($cardNonce, uniqid(), $money);

        return $paymentsApi->createPayment($request);
    }

    public static function createCustomer($name, $email) {
        $customersApi = self::getSquareClient()->getCustomersApi();

        $body = new \Square\Models\CreateCustomerRequest();
        $body->setGivenName($name);
        $body->setEmailAddress($email);

        return $customersApi->createCustomer($body);
    }
}
