<?php
/**
 * Resources behavior is used to upload files to specific directory
 */

class ResourcesBehavior extends CActiveRecordBehavior
{

    /**
     * Path to upload to
     * @var stirng
     */
    public $resourcePath;

    /**
     * File system depth for image structure
     * @var int
     */

    public $hashLength = 6;

    /**
     * Relative to $resourcePath path
     * @return string
     */
    public function getRelativeResourcePath()
    {
        $owner = $this->getOwner();
        return $this->resourcePath . DIRECTORY_SEPARATOR
            . get_class($owner);
    }

    /**
     * Absolute path
     * @return string
     */
    public function getAbsoluteResourcePath()
    {
        return Yii::getPathOfAlias('webroot') . $this->getRelativeResourcePath();
    }

    /**
     * Generating path hash
     * @param int $length length must be < 32 chars length and divided by two without a remainder
     * @return string
     */
    public function generatePathHash()
    {
        assert($this->hashLength < 32);
        assert($this->hashLength % 2 == 0);
        $hashString = substr(md5(uniqid()), 0, $this->hashLength);
        return $hashString;
    }

    /**
     * Generates path based on hash
     * @param $hash
     * @return string
     */
    public function generatePath($hash)
    {
        $hash = str_replace('/', '', $hash);
        $hash = join(DIRECTORY_SEPARATOR, str_split($hash, 2));

        $uploadPath = $this->getAbsoluteResourcePath() . DIRECTORY_SEPARATOR . $hash;

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        return $uploadPath;
    }

    /**
     * @param $file
     * @param bool $asString
     * @return string
     */
    public function getPathHash($file, $asString = false)
    {
        $hashString = substr($file, 0, $this->hashLength);
        return ($asString === false)
            ? join(DIRECTORY_SEPARATOR, str_split($hashString, 2))
            : $hashString;
    }

    /**
     * @param $name
     * @param int $size
     * @param array $options
     * @return mixed|string
     */
    public function getResourcePath($name, $size = 0, $options = array())
    {
        $basePath = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.resourcesBehavior.assets'), false, -1, YII_DEBUG);
        $noResourceImage = $basePath . DIRECTORY_SEPARATOR . 'no_resource.png';

        $resourceName = $name;
        if ($size !== 0) {
            $resourceName = str_replace('.', '_' . $size . '.', $name);
        }

        $pathHash = $this->getPathHash($resourceName);

        $resourcePath = $this->getRelativeResourcePath() . DIRECTORY_SEPARATOR .
            $pathHash . DIRECTORY_SEPARATOR .
            $resourceName;

        $absoluteResourcePath = $this->getAbsoluteResourcePath() . DIRECTORY_SEPARATOR .
            $pathHash . DIRECTORY_SEPARATOR .
            $resourceName;

        if (!file_exists($absoluteResourcePath)) {
            return $noResourceImage;
        }

        // Options
        $result = $resourcePath;
        if (isset($options['onlyFileName']) && $options['onlyFileName'] === true) {
            $result = $resourceName;
        }

        return $result;
    }

    public function processFile(CModel $model, CUploadedFile $file, $hashString, $saveFileName = false)
    {
        assert($model->asa('ResourcesBehavior') !== null);

        $uploadPath = $model->generatePath($hashString);
        if ($saveFileName) {
            $fileName = $file->getName();
        } else {
            $fileName = md5(uniqid() . $file->getTempName()) . '.' . $file->getExtensionName();
        }
        $fileName = $hashString . $fileName;

        $filePath = $uploadPath . DIRECTORY_SEPARATOR . $fileName;

        $file->saveAs($filePath);

        return $fileName;
    }

    public function processImage(CModel $model, CUploadedFile $photo, $wh = false, $hashString)
    {
        /**
         * Файлы сохраняются в директорию, имя которой совпадает с именем класса модели.
         * Формат файла - [хеш директории][имя файла[_разрешение]].[расширение]
         */
        assert($model->asa('ResourcesBehavior') !== null);

        $image = Yii::app()->image->load($photo->getTempName());

        $uploadPath = $model->generatePath($hashString);

        if ($wh) {
            $image->resize($wh, $wh);
            $fileName = md5($hashString . $photo->getName()) . '_' . $wh . '.' . $image->ext;
        } else {
            $fileName = md5($hashString . $photo->getName()) . '.' . $image->ext;
        }
        $fileName = $hashString . $fileName;

        $file = $uploadPath . DIRECTORY_SEPARATOR . $fileName;

        $image->save($file);

        return array(
            'filePath' => $file,
            'fileName' => $fileName,
        );
    }

}
