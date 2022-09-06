<?php

namespace App\Console\Commands;

use PDOException;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use App\Console\Commands\ImportExecute as CommandsImportExecute;

class ImportExecute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:execute {importer} {file?} {--xlsx} {--n}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute all files in the import folder';

    /**
     * Construct a name valid a Import file
     * @param string  $importerName
     * @return boolean
     * return true if the impoter file exists else false
     */
    function validateNameImporter($importerName)
    {
        return !Str::endsWith($importerName, 'import') ?
            Str::finish($importerName, 'Import') :
            $importerName;
    }

    /**
     * Verificate if a impoter file exists
     * @param string  $importerName
     * @return boolean
     * return true if the impoter file exists else false
     */
    function importExists($importerName)
    {
        return file_exists(import_path() . $importerName . '.php');
    }

    /**
     * Construct a new instance of the importer file
     * @param string  $importer
     * name of the file importer
     * @return string
     * retruns the namespace of file $importer
     */
    function getClass($importer)
    {
        $class = "App\\Imports\\" . $importer;
        return new $class();
    }

    /**
     *
     * Contruct the path of a xls|xlsx file in the folder <storage/app/Import>.
     * The parameter $importName name is used to determine the name of the xls|xlsx file when parameter $fileName is null.
     * @param string $fileName
     * @param string $importerName
     * @return string
     */
    function getFilePath(string $fileName, ?string $importerName)
    {
        $ext = ImportExecute::option('xlsx') ? '.xlsx' : '.xls';
        if (ImportExecute::option('n')) {
            $this->alert("To use the optional parameter --n you must correctly write the path of the file xls|xlsx");
            return $fileName . $ext;
        }
        if (!$fileName) {
            $fileName = Str::plural(substr($importerName, 0, -6));
        }
        return storage_path('app') . '\\Imports\\' . str_replace('/', '\\', $fileName) . $ext;
    }

    /**
     *
     * Import the content of an XLS|XLSX file into a MySQL database.
     * @param string $nameClass
     * @param string $filePath
     * @return void
     */
    function importExcel($nameClass, $filePath)
    {
        try {
            Excel::import($nameClass, $filePath);
            $this->line("\n  Import sucessfull!\n");
        } catch (QueryException $e) {
            $this->error("\n {$e->getMessage()} \n");
        } catch (PDOException $e) {
            $this->error("\n {$e->getMessage()} \n");
        }
    }

    /**
     *
     *  Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $importerName = ImportExecute::validateNameImporter(ImportExecute::argument('importer'));
        if (ImportExecute::importExists($importerName)) {
            $fileName = ImportExecute::argument('file');
            $filePath = ImportExecute::getFilePath($fileName, $importerName);
            if (file_exists($filePath)) {
                $class = ImportExecute::getClass($importerName);
                ImportExecute::importExcel($class, $filePath);
            } else {
                $this->error("File $filePath not found\n");
            }
        } else {
            $this->error("\n Importer [$importerName] doesn't exist");
        }
        return 0;
    }
}
