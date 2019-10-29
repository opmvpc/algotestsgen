<?php

namespace App\GenerateurCode;

use App\Models\Test;
use Illuminate\Support\Facades\Storage;

final class Generateur
{
    private static $directory = 'test/resources/';
    private static $javaDir = 'test/java/be/unamur/info/algo2/';

    public static function makeZip(): bool
    {
        $tests = Test::with(['user', 'probleme'])
            ->get()
            ->mapToGroups(function ($item, $key) {
                return [$item['probleme_id'] => $item];
            });

        Storage::makeDirectory(self::$javaDir);

        $tests->each(function ($probleme, $key) {
            $problemDirectory = self::$directory .'problem'. $key .'/';
            Storage::makeDirectory($problemDirectory);

            $probleme->each(function ($test) use ($problemDirectory) {
                // dump($test);
                // 1. créer fichiers
                $fileName = $problemDirectory . $test->nom . '.txt';
                Storage::put($fileName, $test->body);
            });

            // 2. créer code java
            $code = view('java.test_template', compact('key', 'probleme'))->render();
            Storage::put(self::$javaDir. 'Algo2Problem'.$key.'Test.java', $code);
            // dd($code);
        });

        // 3. créer archive

        return true;
    }
}
