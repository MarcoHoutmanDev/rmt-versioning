<?php

declare(strict_types=1);

use Liip\RMT\Context;

/**
 * Internal use for this package. Update the CHANGELOG.txt file with the new version number.
 */
class UpdateChangelogTxtAction extends \Liip\RMT\Action\BaseAction
{
    public function execute()
    {
        // get a file manager for the CHANGELOG.txt file
        $fileManager = new \MHD\RmtVersioning\FileManager\ChangelogTxtFileManager(Context::getParam('project-root'));
        // get the next version from the context
        $nextVersion = Context::getParam('new-version');
        // finally, update the file
        $fileManager->updateChangelog($nextVersion);
        // confirm success
        $this->confirmSuccess();
    }
}