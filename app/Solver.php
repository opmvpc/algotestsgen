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
    private $fileName;

    public function __construct(String $probleme, ?String $input) {
        $this->probleme = $probleme;
        $this->input = $input;
        $this->resultat = "";
        $this->fileName = $this->getFileName();
    }

    public function solve(): ?string
    {
        if (! static::solverPathExists()) {
            return 'Oups! Le solver n\'est pas configuré correctement';
        }

        Storage::put('solver/'.$this->fileName, $this->input);
        $this->execute();
        $this->formatResultat();
        Storage::delete('solver/'.$this->fileName);

        return $this->resultat;
    }

    public function formatResultat(): void
    {
        if (! Str::contains($this->resultat, 'Error')) {
            $this->resultat = str_replace('[', '{', $this->resultat);
            $this->resultat = str_replace(']', '}', $this->resultat);
            $this->resultat = preg_replace('/(\-?\d+)/i', '"$1"', $this->resultat);
        }
    }

    public function execute(): void
    {
        $commande = 'java -jar "'. config('solver.fileName') .'" "'. $this->probleme .'" "'. $this->fileName .'"';
        $appPath = storage_path('app/solver');

        $process = Process::fromShellCommandline($commande, $appPath);
        $process->start();
        $process->wait(function ($type, $buffer) {
            if (Process::ERR === $type) {
            } else {
                $this->resultat = $buffer;
            }
        });
    }

    public function getFileName(): string
    {
        return 'probleme'. Str::random() .'.txt';
    }

    public static function solverPathExists(): bool
    {
        return Storage::exists('solver/'. config('solver.fileName'));
    }
}
