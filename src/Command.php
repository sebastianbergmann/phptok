<?php
/*
 * This file is part of phptok.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\phptok;

use Symfony\Component\Console\Command\Command as AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @since     Class available since Release 1.0.0
 */
class Command extends AbstractCommand
{
    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this->setName('phptok')
             ->setDefinition(
                 [
                   new InputArgument(
                       'file',
                       InputArgument::REQUIRED
                   )
                 ]
             );
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface  $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return null|int null or 0 if everything went fine, or an error code
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(
            "Line   Token                          Text\n" . str_repeat('-', 79)
        );

        $stream = new \PHP_Token_Stream($input->getArgument('file'));

        foreach ($stream as $token) {
            if ($token instanceof \PHP_Token_WHITESPACE) {
                $text = '';
            } else {
                $text = str_replace(array("\r", "\n"), '', (string) $token);

                if (strlen($text) > 40) {
                    $text = explode("\n", wordwrap($text, 40));
                    $text = $text[0];
                }
            }

            $output->writeln(
                sprintf(
                    '%5d  %-30s %s',
                    $token->getLine(),
                    str_replace('PHP_Token_', '', get_class($token)),
                    $text
                )
            );
        }
    }
}
