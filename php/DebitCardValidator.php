<?php
namespace forms;

class DebitCardValidator {
    private $cardNumber;

    public function __construct($cardNumber) {
        if(empty($cardNumber)){
            $cardNumber = "";
        }
        $this->setCardNumber($cardNumber);
    }

    public function getCardNumber() {
        return $this->cardNumber;
    }

    public function setCardNumber($cardNumber) {
        // Remove spaces or dashes
        $cleanedCardNumber = preg_replace('/[\s-]/', '', $cardNumber);
        $this->cardNumber = $cleanedCardNumber;
    }

    public function validateDebitCard() {
        try {
            // Check if all characters are digits
            if (!ctype_digit($this->cardNumber)) {
                throw new \Exception("Card number must contain only numbers - Back End");
            }

            // Check the length of the card number
            $cardLength = strlen($this->cardNumber);
            if ($cardLength < 13 || $cardLength > 19) {
                throw new \Exception("Card number must be between 13 and 19 digits - Back End");
            }

            // Luhn Algorithm
            if (!$this->isLuhnValid()) {
                throw new \Exception("Invalid card number - Back End");
            }

            // If all checks pass
            return [true, "Valid card number - Back End"];
        } catch (\Exception $e) {
            return [false, $e->getMessage()];
        }
    }

    private function isLuhnValid() {
        $sum = 0;
        $shouldDouble = false;

        for ($i = strlen($this->cardNumber) - 1; $i >= 0; $i--) {
            $digit = (int)$this->cardNumber[$i];

            if ($shouldDouble) {
                if (($digit *= 2) > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
            $shouldDouble = !$shouldDouble;
        }

        return $sum % 10 == 0;
    }
}
?>
