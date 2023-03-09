<?php
namespace Pyncer\Snyppet\Install\Table\Install;

use Pyncer\Data\Mapper\AbstractMapper;
use Pyncer\Data\Model\ModelInterface;
use Pyncer\Snyppet\Install\Table\Install\InstallModel;

class InstallMapper extends AbstractMapper
{
    public function getTable(): string
    {
        return 'install';
    }

    public function forgeModel(iterable $data = []): ModelInterface
    {
        return new InstallModel($data);
    }

    public function isValidModel(ModelInterface $model): bool
    {
        return ($model instanceof InstallModel);
    }
}
