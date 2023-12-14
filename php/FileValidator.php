<?php
namespace forms;

class FileValidator {
    private $file;

    public function __construct($file) {
        if (!is_array($file) || $file === null) {
            $file = array();
        }

        $this->setFile($file);
    }

    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function validateFile() {
        if(empty($this->file)) {
            return [false, "Empty File. We can only accept PNG images - Back End"];
        }
        try {
            $uploaded_name = $this->file['name'];
            $uploaded_ext = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
            $uploaded_type = $this->file['type'];

            // Check if the uploaded file is a PNG image
            if (
                strtolower($uploaded_ext) == 'png' &&
                $uploaded_type == 'image/png' &&
                getimagesize($this->file['tmp_name'])
            ) {
                return [true, 'The file is a valid PNG image - Back End'];
            } else {
                throw new \Exception('Invalid file. We can only accept PNG images - Back End');
            }
        } catch (\Exception $e) {
            return [false, $e->getMessage()];
        }
    }
}
?>