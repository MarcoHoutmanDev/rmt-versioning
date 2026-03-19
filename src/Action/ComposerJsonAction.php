<?php

declare(strict_types=1);

namespace MHD\RmtVersioning\Action;

use Liip\RMT\Action\BaseAction;
use Liip\RMT\Context;
use MHD\RmtVersioning\FileManager\ComposerJsonFileManager;

class ComposerJsonAction extends BaseAction
{
    public function execute()
    {
        // get a file manager for the composer.json file
        $fileManager = new ComposerJsonFileManager(Context::getParam('project-root'));
        // get the next version from the context
        $nextVersion = Context::getParam('new-version');
        // finally, update the file
        $fileManager->updateComposerJson($nextVersion);
        // confirm success
        $this->confirmSuccess();
    }
}
