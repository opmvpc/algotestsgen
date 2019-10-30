<?php

namespace App\GenerateurCode;

use App\Models\Test;
use ZanySoft\Zip\Zip;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

final class Generateur
{
    private static $directory = 'test/resources/';
    private static $javaDir = 'test/java/be/unamur/info/algo2/';

    public static function makeZip(): bool
    {
        Storage::deleteDirectory('test');

        $tests = Test::with(['user', 'probleme'])
            ->where('est_approuve', true)
            ->get()
            ->mapToGroups(function ($item, $key) {
                return [$item['probleme_id'] => $item];
            });

        Storage::makeDirectory(self::$javaDir);

        $tests->each(function ($probleme, $key) {
            $problemDirectory = self::$directory .'problem'. $key .'/';
            Storage::makeDirectory($problemDirectory);

            $probleme->each(function ($test) use ($problemDirectory) {
                // 1. créer fichiers
                $fileName = $problemDirectory . $test->nom . '.txt';
                Storage::put($fileName, $test->body);
            });

            // 2. créer code java
            $code = view('java.test_template', compact('key', 'probleme'))->render();
            Storage::put(self::$javaDir. 'Algo2Problem'.$key.'Test.java', $code);
        });

        // Ajouter fichier log4j
        Storage::copy('generateur/log4j2-test.xml', 'test/resources/log4j2-test.xml');

        // 3. créer archive
        $path = storage_path('app/public/java.zip');
        $zip = Zip::create($path, true);
        $zip->add(storage_path('app/test'));
        $zip->close();

        return true;
    }
}
