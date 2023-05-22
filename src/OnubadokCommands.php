<?php

namespace Robinncode\CiOnubadok;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Files\Exceptions\FileNotFoundException;

class OnubadokCommands extends BaseCommand
{
    protected $group = 'onubadok';
    protected $name = 'onubadok:generate';
    protected $description = 'Generate Bengali and English files using onubadok command';

    /**
     */
    public function run(array $params)
    {
        $baseFolder = FCPATH . 'lang';

        // Check if the directory already exists
        if (is_dir($baseFolder)) {
            CLI::error('The directory already exists');
        } else {
            if (!$this->generateController()) {
                CLI::error('Unable to generate the OnubadokController');
            } else {
                // Creating app/lang/en directory and generating files
                CLI::write('Generating files in the app/lang/en directory ...');
                if ($this->generateFilesWithContents($baseFolder, 'en')) {
                    CLI::write('The files were generated successfully in the app/lang/en directory');
                } else {
                    CLI::error('The files were not generated');
                }

                // Creating app/lang/bn directory and generating files
                CLI::write('Generating files in the app/lang/bn directory ...');
                if ($this->generateFilesWithContents($baseFolder, 'bn')) {
                    CLI::write('The files were generated successfully in the app/lang/bn directory');
                } else {
                    CLI::error('The files were not generated');
                }
            }
        }
    }

    /**
     * @throws FileNotFoundException
     */
    public function generateFilesWithContents($baseFolder, $language): bool
    {
        $packageFolder = __DIR__ . '/lang/' . $language . '/';
        $success = 0;
        $files = [];

        // Generate the directory
        helper('filesystem');
        if (is_dir($baseFolder . '/' . $language) || mkdir($baseFolder . '/' . $language, 0755, true)) {

            // Get all the files from the package
            $files = get_filenames($packageFolder);

            // Generate the files in the app folder with the contents of the package files
            foreach ($files as $file) {
                $fileName = basename($file);
                $fileContents = file_get_contents($file);

                // Generate the file in the app folder
                $contentFolder = $baseFolder . '/' . $language;
                $contentFileName = $contentFolder . '/' . $fileName;

                if (write_file($contentFileName, $fileContents)) {
                    CLI::write('* lang/' . $language . '/' . $fileName . ' generated successfully!');
                    $success++;
                }
            }
        }

        return ($success == count($files));
    }

    /**
     * @throws FileNotFoundException
     */
    public function generateController(): bool
    {
        $appFolder = APPPATH . 'Controllers/';
        $packageFolder = __DIR__ . '/Controllers/';

        // Read the contents of the package controller file
        $contents = file_get_contents($packageFolder . 'OnubadokController.php');

        // Generate the file in the app folder
        if (write_file($appFolder . 'Onubadok.php', $contents)) {
            CLI::write('Onubadok.php generated successfully!');
            return true;
        } else {
            CLI::error('Unable to generate Onubadok.php');
            return false;
        }
    }
}