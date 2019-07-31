<?php

declare(strict_types=1);

namespace NunoMaduro\Pest\Console;

use NunoMaduro\Pest\Execution;
use NunoMaduro\Pest\Extensions\AfterLastTest;
use NunoMaduro\Pest\TestSuite;
use PHPUnit\TextUI\Command as BaseCommand;
use PHPUnit\TextUI\ResultPrinter;
use PHPUnit\TextUI\TestRunner;

/**
 * @internal
 */
final class Command extends BaseCommand
{
    /**
     * {@inheritdoc}
     */
    protected function handleArguments(array $argv): void
    {
        $this->arguments['printer'] = Printer::class;
        $this->arguments['colors'] = $this->arguments['colors'] ?? ResultPrinter::COLOR_ALWAYS;

        parent::handleArguments($argv);

        foreach (Execution::getClosureTests() as $test) {
            $this->arguments['test']->addTest($test);
        }
    }

    protected function createRunner(): TestRunner
    {
        $testRunner = new TestRunner($this->arguments['loader']);

        foreach ([AfterLastTest::class] as $extension) {
            $testRunner->addExtension(new $extension());
        }

        return $testRunner;
    }
}
