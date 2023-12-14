<?php
namespace forms;

class FileValidator
{
    private $file;
    private $cleanedFile;

    public function __construct($file)
    {
        if (!is_array($file) || $file === null) {
            $file = array();
        }

        $this->setFile($file);
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }
    public function getCleanedFile()
    {
        /**
         * The code belows gets the image and reconstructs it, thus removing any malicious data embedded in the script
         */
        $fileData = file_get_contents($this->file['tmp_name']);
        // Gets image file content
        $img = imagecreatefromstring($fileData);
        // Start output buffering
        ob_start();
        // Output the image to the buffer
        imagejpeg($img);
        // Capture the buffer into a variable
        $imageData = ob_get_contents();
        // End and clean the buffer
        ob_end_clean();
        // Destroy the image resource
        imagedestroy($img);

        return $imageData;
    }



    public function validateFile()
    {
        if (empty($this->file)) {
            return [false, "Empty File. We can only accept PNG images - Back End"];
        }

        try {
            $uploaded_name = $this->file['name'];
            $uploaded_ext = strtolower(pathinfo($uploaded_name, PATHINFO_EXTENSION));
            $uploaded_type = $this->file['type'];
            $uploaded_tmp_name = $this->file['tmp_name'];

            // Verify if the uploaded file is a PNG image
            if ($uploaded_ext !== 'png' || $uploaded_type !== 'image/png') {
                throw new \Exception('Invalid file extension or MIME type. Only PNG images are accepted - Back End');
            }

            // Verify image using getimagesize
            if (!getimagesize($uploaded_tmp_name)) {
                throw new \Exception('Invalid image file. Could not verify the image - Back End');
            }

            // Additional security: MIME type verification using finfo
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            if ($finfo->file($uploaded_tmp_name) !== 'image/png') {
                throw new \Exception('MIME type verification failed. Only PNG images are accepted - Back End');
            }

            // Implement size check 
            if ($this->file['size'] > 2000000) { // 2MB in bytes
                throw new \Exception('File size is too large. Maximum size allowed is 2MB - Back End');
            }
            return [true, 'The file has been uploaded successfully - Back End'];
        } catch (\Exception $e) {
            return [false, $e->getMessage()];
        }
    }
}
?>