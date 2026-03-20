<?php

declare(strict_types=1);

use Liip\RMT\Context;

/**
 * Internal use for this package. Update the VERSION.txt file with the new version number.
 */
class UpdateVersionTxtAction extends \Liip\RMT\Action\BaseAction
{
    public function execute()
    {
        // get a file manager for the VERSION.txt file
        $fileManager = new \MHD\RmtVersioning\FileManager\VersionTxtFileManager(
            Context::getParam('project-root')
        );
        // get the next version from the context
        $nextVersion = Context::getParam('new-version');

        // finally, update the file
        $fileManager->writeVersion($nextVersion);

        $this->confirmSuccess();
    }
}