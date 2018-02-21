<?php
namespace Example;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use MySQLReplication\Config\ConfigBuilder;
use MySQLReplication\MySQLReplicationFactory;

class PhpMySQLReplication extends Command
{
    protected function configure()
    {
        $this->setName('test:mysql-replication');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $binLogStream = new MySQLReplicationFactory(
            (new ConfigBuilder())
                ->withUser(getenv('MYSQL_USER'))
                ->withHost(getenv('MYSQL_HOST'))
                ->withPassword(getenv('MYSQL_PASS'))
                ->build()
        );

        $binLogStream->registerSubscriber(new MySQLEventSubscribers());
        while (true) {
            $binLogStream->consume();
        }
    }
}
