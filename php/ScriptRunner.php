<?php

namespace ScriptRunner;

class ScriptRunner
{
    public static function check(string $path, int $repeatCount): void
    {
        self::changeJIT();
        self::runAllScripts($path, $repeatCount);
        self::changeJIT(true);
        self::runAllScripts($path, $repeatCount);
        self::changeJIT();
    }

    private static function runAllScripts(string $path, int $repeatCount): void
    {
        foreach (new \DirectoryIterator(__DIR__ . '/' . $path) as $fileInfo) {
            if (!$fileInfo->isDot() && !$fileInfo->isDir()) {
                $name = $fileInfo->getBasename('.' . $fileInfo->getExtension());

                for ($x = 0; $x < $repeatCount; $x++) {
                    self::runScript($path, $name);
                }
            }
        }
    }

    private static function runScript(string $path, string $script): void
    {
        shell_exec("php " . __DIR__ . '/' . $path . '/' . $script . '.php');
    }

    private static function changeJIT(bool $enable = false): void
    {
        $iniFile = php_ini_loaded_file();

        if (!$iniFile || !is_file($iniFile) || !is_writable($iniFile)) {
            throw new \Exception('No writable ini file!');
        }

        $configLines = file($iniFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($enable) {
            self::enableJIT($configLines);
        } else {
            self::disableJIT($configLines);
        }

        file_put_contents($iniFile, implode("\n", $configLines) . "\n");

    }

    private static function enableJIT(array &$configLines): void
    {
        self::setOrAddConfig($configLines, 'zend_extension', 'opcache');
        self::setOrAddConfig($configLines, 'opcache.enable', '1');
        self::setOrAddConfig($configLines, 'opcache.jit_buffer_size', '128M');
        self::setOrAddConfig($configLines, 'opcache.jit', '1205');
        self::setOrAddConfig($configLines, 'opcache.jit_debug', '0');
        self::setOrAddConfig($configLines, 'opcache.enable_cli', '1');
        self::setOrAddConfig($configLines, 'opcache.jit', 'tracing');
    }

    private static function disableJIT(array &$configLines): void
    {
        self::setOrAddConfig($configLines, 'opcache.enable', '0');
        self::setOrAddConfig($configLines, 'opcache.jit_buffer_size', '0');
        self::setOrAddConfig($configLines, 'opcache.jit', '0');
        self::setOrAddConfig($configLines, 'opcache.jit_debug', '0');
        self::setOrAddConfig($configLines, 'opcache.enable_cli', '0');
    }

    private static function setOrAddConfig(&$lines, $key, $value): void
    {
        $found = false;
        $pattern = '/^\s*' . preg_quote($key, '/') . '\s*=/i';

        foreach ($lines as &$line) {
            if (preg_match($pattern, $line)) {
                $line = "$key=$value";
                $found = true;

                break;
            }
        }

        if (!$found) {
            $lines[] = "$key=$value";
        }
    }
}


$operation = $argv[1] ?? null;
$repeatCount = $argv[2] ?? 1;

if (is_null($operation)) {
    throw new \Exception('No operation chosen!');
}

ScriptRunner::check($operation, $repeatCount);
