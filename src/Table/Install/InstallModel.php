<?php
namespace Pyncer\Snyppet\Install\Table\Install;

use DateTime;
use DateTimeInterface;
use Pyncer\Data\Model\AbstractModel;

use function Pyncer\date_time as pyncer_date_time;

use const Pyncer\DATE_TIME_FORMAT as PYNCER_DATE_TIME_FORMAT;

class InstallModel extends AbstractModel
{
    public function getAlias(): string
    {
        return $this->get('alias');
    }
    public function setAlias(string $value): static
    {
        $this->set('alias', $value);
        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->get('version');
    }
    public function setVersion(?string $value): static
    {
        $this->set('version', $this->nullify($value));
        return $this;
    }

    public function getInsertDateTime(): DateTime
    {
        $value = $this->get('insert_date_time');
        return pyncer_date_time($value);
    }
    public function setInsertDateTime(string|DateTimeInterface $value): static
    {
        if ($value instanceof DateTimeInterface) {
            $value = $value->format(PYNCER_DATE_TIME_FORMAT);
        }
        $this->set('insert_date_time', $value);
        return $this;
    }

    public static function getDefaultData(): array
    {
        $dateTime = pyncer_date_time()->format(PYNCER_DATE_TIME_FORMAT);

        return [
            'id' => 0,
            'alias' => '',
            'version' => null,
            'insert_date_time' => $dateTime,
        ];
    }
}
