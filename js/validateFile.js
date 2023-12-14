function validateFile() {
    var fileInput = document.getElementById('fileUpload');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.png)$/i;

    if (!allowedExtensions.exec(filePath)) {
        //alert('Please upload file having extensions .png only.');
        fileInput.value = '';
        return [false, 'Please upload file having extensions .png only. - Front End'];
    }

    // If file is valid, you can also add code here to preview the uploaded file or do other actions.
    //alert('This is a .png file');
    return [true, 'This is a .png file - Front End'];
}