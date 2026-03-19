<?php

declare(strict_types=1);

namespace MHD\RmtVersioning\FileManager;

use DateTime;
use Liip\RMT\Context;

class ComposerJsonFileManager
{
    /**
     * The path to the composer.json file
     * @var string
     */
    private string $composerFile;

    public function __construct(string $folder = '/')
    {
        $this->composerFile = $folder . DIRECTORY_SEPARATOR . 'composer.json';

        // @todo Safety checks; make sure the file is not outside of the project
        $this->composerFile = str_replace('/../', '/', $this->composerFile);
    }

    /**
     * Write the given version (1.0.0) to the composer.json file
     * @param string $version
     * @return void
     */
    public function updateComposerJson(string $version)
    {
        // first, read the contents of the composer.json file
        $composerJson = file_get_contents($this->composerFile);
        $composerData = json_decode($composerJson, true);

        if (is_array($composerData)) {
            // there is content, update the version
            $composerData['version'] = $version;
            // save it
            file_put_contents(
                $this->composerFile,
                json_encode($composerData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
            );
        }
    }
}
