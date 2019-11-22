<?php

namespace App;

use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class Solver
{
    private $probleme;
    private $input;
    private $resultat;

    public function __construct(String $probleme, ?String $input) {
        $this->probleme = $probleme;
        $this->input = $input;
        $this->resultat = "";
    }

    public function solve(): ?string
    {
        $fileName = "solver/probleme.txt";
        Storage::put($fileName, $this->input);

        $commande = 'java -jar algo2-0.0.1-SNAPSHOT-jar-with-dependencies.jar "'. $this->probleme .'" "probleme.txt"';
        $appPath = storage_path('app/solver');

        $process = Process::fromShellCommandline($commande, $appPath);
        $process->start();
        $process->wait(function ($type, $buffer) {
            if (Process::ERR === $type) {
            } else {
                $this->resultat = $buffer;
            }
        });

        if (! Str::contains($this->resultat, 'Error')) {
            $this->resultat = str_replace('[', '{', $this->resultat);
            $this->resultat = str_replace(']', '}', $this->resultat);
            $this->resultat = preg_replace('/(\-?\d+)/i', '"$1"', $this->resultat);
        }

        return $this->resultat;
    }
}