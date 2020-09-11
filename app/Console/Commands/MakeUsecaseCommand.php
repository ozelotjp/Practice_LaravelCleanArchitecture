<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeUsecaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:usecase {domain} {method}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $domain = $this->argument("domain");
        $method = $this->argument("method");
        $domain_l = strtolower($domain);
        $method_l = strtolower($method);

        $usecase = [
            "dir" => "App/{$domain}{$method}",
            "file" => "{$domain}{$method}",
            "text" => file_get_contents(__DIR__."/make_usecase_template/Template.txt")
        ];

        $controller = [
            "dir" => "App/{$domain}{$method}",
            "file" => "{$domain}{$method}Controller",
            "text" => file_get_contents(__DIR__."/make_usecase_template/TemplateController.txt")
        ];

        $presenter = [
            "dir" => "App/{$domain}{$method}",
            "file" => "{$domain}{$method}Presenter",
            "text" => file_get_contents(__DIR__."/make_usecase_template/TemplatePresenter.txt")
        ];

        $request = [
            "dir" => "App/{$domain}{$method}",
            "file" => "{$domain}{$method}Request",
            "text" => file_get_contents(__DIR__."/make_usecase_template/TemplateRequest.txt")
        ];

        $response = [
            "dir" => "App/{$domain}{$method}",
            "file" => "{$domain}{$method}Response",
            "text" => file_get_contents(__DIR__."/make_usecase_template/TemplateResponse.txt")
        ];

        try{
            $root = __DIR__."/../../../package";
            foreach([$usecase, $controller, $presenter, $request, $response] as $template){
                $dirPath = $root."/".$template["dir"];
                $filePath = $dirPath."/".$template["file"].".php";
                if(file_exists($filePath)){
                    throw new \RuntimeException($filePath." already exists");
                }
            }
            foreach([$usecase, $controller, $presenter, $request, $response] as $template){
                $text = str_replace(
                    ["%domain%", "%method%", "%domain_l%", "%method_l%"],
                    [$domain, $method, $domain_l, $method_l],
                    $template["text"]
                );
                $dirPath = $root."/".$template["dir"];
                $filePath = $dirPath."/".$template["file"].".php";
                if(file_exists($dirPath) === false){
                    mkdir($dirPath, 0777, true);
                }
                file_put_contents($filePath, $text);
                $this->info("Generated file: ".realpath($filePath));
            }
            $this->comment("File generated! Next, paste the following code into the Controller of App\Http\Controllers.");
            $this->line("```");
            $this->line("public function ___(".$domain.$method."Controller \$controller, ".$domain.$method." \$usecase, ".$domain.$method."Presenter \$presenter)");
            $this->line("{");
            $this->line("    return \$presenter->execute(\$usecase->execute(\$controller));");
            $this->line("}");
            $this->line("```");
        }catch (\RuntimeException $exception){
            $this->error($exception->getMessage());
        }

        return 0;
    }
}
