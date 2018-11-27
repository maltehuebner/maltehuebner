<?php declare(strict_types=1);

namespace App\Skills;

abstract class AbstractSkillList implements SkillListInterface
{
    protected $list = [];

    public function __construct()
    {
        $this
            ->sort()
            ->unique()
        ;
    }

    public function sort(): SkillListInterface
    {
        natcasesort($this->list);

        return $this;
    }

    public function unique(): SkillListInterface
    {
        $this->list = array_unique($this->list);

        return $this;
    }

    public function getList(): array
    {
        return $this->list;
    }

    public function merge(SkillListInterface $skillList): SkillListInterface
    {
        $this->list = array_merge($this->list, $skillList->getList());

        return $this;
    }

    public function __toString(): string
    {
        return join(', ', $this->list);
    }
}
