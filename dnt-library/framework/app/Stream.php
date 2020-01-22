<?php

class Stream
{

    protected $dnt;
    protected $tempPath = '../dnt-cache/temp/';
    protected $externalService = 'http://app.query.sk/temporary-online/';
    protected $internalService = WWW_PATH_ADMIN_2 . 'index.php?src=temporary-online';
    protected $maxCharsPerStream = 1000;
    protected $status = 0;
    protected $uniqId;

    public function __construct()
    {

        $this->dnt = new Dnt();
    }

    public function streamIn($content, $fileName, $fileType)
    {
        $this->uniqId = uniqid();
        $file = $this->tempPath . $this->uniqId . '.tmp';
        $serviceStreamUrl = IS_DEVEL ? $this->externalService : $this->internalService;


        if ($fileType == 'pdf') {
            $minify = $this->dnt->minify($content);
        } else {
            $minify = $content;
        }

        $base64 = base64_encode($minify);
        file_put_contents($file, $base64);

        $compressed = base64_encode($base64);
        $lenght = (strlen($compressed));
        $countFloor = floor($lenght / $this->maxCharsPerStream);
        $finalPart = $lenght - $countFloor;

        $stringParts = [];
        for ($i = 0; $i < $countFloor; $i++) {
            $stringParts[] = substr($compressed, $i * $this->maxCharsPerStream, $this->maxCharsPerStream);
        }
        $stringParts[] = substr($compressed, $countFloor * $this->maxCharsPerStream, $finalPart);

        foreach ($stringParts as $key => $part) {
            file_get_contents($serviceStreamUrl . '?key=' . $key . '&id=' . $this->uniqId . '&part=' . $part);
        }
        $mergedStreamContent = file_get_contents($serviceStreamUrl . '?merge=1&fileName=' . $fileName . '&fileType=' . $fileType . '&id=' . $this->uniqId);

        if ($mergedStreamContent) {
            $this->status = 1;
        }

        return [
            'url' => $mergedStreamContent,
            'tmpFile' => $file,
            'uniqId' => $this->uniqId,
            'status' => $this->status,
        ];
    }

    public function streamControll($contentToStream, $pathToSave)
    {
        $fileType = $this->dnt->getPripona($contentToStream);
        $fileName = $this->dnt->getFileName($contentToStream);
        $content = file_get_contents($contentToStream, $fileType);
        $contentName = $fileName . '.' . $fileType;
        $streamResponse = $this->streamIn($content, $fileName, $fileType);
        $mergePageUrl = $streamResponse['url'];
        $output = file_get_contents($mergePageUrl);
        unlink($streamResponse['tmpFile']);
        file_put_contents('../' . $pathToSave . $contentName, $output);
        return [
            'contentName' => $contentName,
            'serverUrl' => $mergePageUrl,
        ];
    }

}
