<?php

declare(strict_types=1);

// namespace MHD\RmtVersioning\Action;

use Liip\RMT\Action\BaseAction;
use Liip\RMT\Context;
use MHD\RmtVersioning\FileManager\VersionTxtFileManager;

class VersionTxtAction extends BaseAction
{
    public function execute()
    {
        // set up / get some needed instances to determin version number for the currect release
        // $versionGenerator = Context::get('version-generator');
        // $versionPersister = Context::get('version-persister');

        // also, get a file manager for the VERSION.txt file
        $versionTxtFileManager = new VersionTxtFileManager(
            Context::getParam('project-root')
        );

        // // fetch current version 
        // $currentVersion = $versionPersister->getCurrentVersion();
        // // set it as parameter 
        // Context::getInstance()->setParameter('current-version', $currentVersion);

        // // get the next version (based on the selection of the user)
        // $nextVersion = $versionGenerator->generateNextVersion($currentVersion);
        // // set this also as parameter
        // Context::getInstance()->setParameter('next-version', $nextVersion);

        $nextVersion = Context::getParam('new-version');

        // finally, update the file
        $versionTxtFileManager->writeVersion($nextVersion);

        $this->confirmSuccess();
    }
}