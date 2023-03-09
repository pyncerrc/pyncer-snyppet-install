<?php
namespace Pyncer\Snyppet\Install\Table\Install;

use Pyncer\Data\Validation\AbstractValidator;
use Pyncer\Database\ConnectionInterface;
use Pyncer\Validation\Rule\DateTimeRule;
use Pyncer\Validation\Rule\StringRule;

class InstallValidator extends AbstractValidator
{
    public function __construct(ConnectionInterface $connection)
    {
        parent::__construct($connection);

        $this->addRule(
            'alias',
            new StringRule(
                maxLength: 50,
            ),
        );

        $this->addRule(
            'version',
            new StringRule(
                maxLength: 25,
                allowNull: true,
            ),
        );

        $this->addRule(
            'insert_date_time',
            new DateTimeRule(),
        );
    }
}
