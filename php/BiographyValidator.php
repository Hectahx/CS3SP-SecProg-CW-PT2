<?php
namespace forms;

class BiographyValidator {
    private $biography;

    public function __construct($biography) {
        if(empty($biography)){
            $biography = "";
        }
        $this->setBiography($biography);
    }

    public function getBiography() {
        return $this->biography;
    }

    public function setBiography($biography) {
        // Here you can also add some basic validation for the input
        $this->biography = strtolower($biography); // Assuming case-insensitive comparison
    }

    function validateBiography() {
        // Split the biography into sentences. A simplistic approach is used here,
        // considering a sentence ending in a period, exclamation mark, or question mark.
        $sentences = preg_split('/[.!?]\s+/', $this->biography, -1, PREG_SPLIT_NO_EMPTY);
    
        // Check if there are exactly 3 sentences
        if (count($sentences) !== 3) {
            return [false, "The biography should contain exactly 3 sentences."];
        }
    
        // Check if each sentence is at least 10 characters long
        foreach ($sentences as $sentence) {
            if (strlen(trim($sentence)) < 10) {
                return [false, "Each sentence should be at least 10 characters long."];
            }
        }
    
        return [true, "The biography is valid."];
    }
}
?>