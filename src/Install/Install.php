<?php
namespace Pyncer\Snyppet\Install\Install;

use Pyncer\Database\Value;
use Pyncer\Snyppet\AbstractInstall;

class Install extends AbstractInstall
{
    protected function safeInstall(): bool
    {
        $this->connection->createTable('install')
            ->serial('id')
            ->string('alias', 50)->index()
            ->string('version', 25)->null()->index()
            ->dateTime('insert_date_time')->default(Value::NOW)->index()
            ->execute();

        return true;
    }

    protected function safeUninstall(): bool
    {
        if ($this->connection->hasTable('install')) {
            $this->connection->dropTable('install');
        }

        return true;
    }
}
