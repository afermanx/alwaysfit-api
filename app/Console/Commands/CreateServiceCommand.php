<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateServiceCommand extends Command
{
    // Permite o uso de subdiretórios no comando
    protected $signature = 'make:service {name}';

    protected $description = 'Cria um novo service dentro de app/Services, com suporte a subdiretórios';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $name = $this->argument('name');

        $pathParts = explode('/', $name);
        $className = array_pop($pathParts);

        $baseDirectory = app_path('Services');

        $subDirectory = implode('/', $pathParts);
        $directory = $baseDirectory . '/' . $subDirectory;
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true, true);
        }
        $filePath = $directory . '/' . $className . 'Service.php';

        $namespace = 'App\\Services' . (!empty($subDirectory) ? '\\' . str_replace('/', '\\', $subDirectory) : '');
        $fileContent = "<?php\n\nnamespace {$namespace};\n\nclass {$className}Service\n{\n    // Implement your service methods here\n}\n";

        if (!File::exists($filePath)) {
            File::put($filePath, $fileContent);
            $this->info("Service {$className}Service criado com sucesso em {$directory}!");
        } else {
            $this->error("Service {$className}Service já existe!");
        }

        return 0;
    }
}
