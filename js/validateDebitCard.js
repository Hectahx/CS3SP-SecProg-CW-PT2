function validateDebitCard() {
    var cardNumber = document.getElementById("debitCard").value;

    // Remove spaces or dashes
    cardNumber = cardNumber.replace(/[\s-]/g, '');

    // Check if all characters are digits
    if (!/^\d+$/.test(cardNumber)) {
        //alert("Card number must contain only numbers.");
        return [false, "Card number must contain only numbers - Front End"];
    }

    // Check the length of the card number
    if (cardNumber.length < 13 || cardNumber.length > 19) {
        //alert("Card number must be between 13 and 19 digits.");
        return [false, "Card number must be between 13 and 19 digits - Front End"];
    }

    // Luhn Algorithm
    var sum = 0;
    var shouldDouble = false;
    for (var i = cardNumber.length - 1; i >= 0; i--) {
        var digit = parseInt(cardNumber.charAt(i));

        if (shouldDouble) {
            if ((digit *= 2) > 9) digit -= 9;
        }

        sum += digit;
        shouldDouble = !shouldDouble;
    }

    if (sum % 10 != 0) {
        //alert("Invalid card number.");
        return [false, "Invalid card number - Front End"];
    }

    // If all checks pass
    return [true, "Valid card number - Front End"];
}