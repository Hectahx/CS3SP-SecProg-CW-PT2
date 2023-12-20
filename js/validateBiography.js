function validateBiography() {
    
    var biography = document.getElementById("biography").value;
    // This regex considers sentences ending with a period, exclamation mark, or question mark.
    const sentences = biography.match(/[^.!?]+[.!?]+/g) || [];

    // Check if there are exactly 3 sentences
    if (sentences.length < 3) {
        return [false, "The biography should contain at least 3 sentences." ];
    }

    // Check if each sentence is at least 10 characters long
    for (let sentence of sentences) {
        if (sentence.trim().length < 10) {
            return [false,"Each sentence should be at least 10 characters long." ];
        }
    }

    return  [true,"The biography is valid." ];
}