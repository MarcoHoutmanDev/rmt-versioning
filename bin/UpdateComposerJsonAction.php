<?php 

declare(strict_types=1);

use Liip\RMT\Context;

/**
 * Internal use for this package. Update the composer.json file with the new version number.
 */
class UpdateComposerJsonAction extends \Liip\RMT\Action\BaseAction
{
    public function execute()
    {
        // get a file manager for the composer.json file
        $fileManager = new \MHD\RmtVersioning\FileManager\ComposerJsonFileManager(Context::getParam('project-root'));
        // get the next version from the context
        $nextVersion = Context::getParam('new-version');
        // finally, update the file
        $fileManager->updateComposerJson($nextVersion);
        // confirm success
        $this->confirmSuccess();
    }
}