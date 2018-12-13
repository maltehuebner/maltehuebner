<?php declare(strict_types=1);

namespace App\Skills;

class IterableSkillList extends AbstractSkillList implements \Iterator
{
    public function rewind(): void
    {
        reset($this->list);
    }

    public function current()
    {
        return current($this->list);
    }

    public function key(): int
    {
        return key($this->list);
    }

    public function next()
    {
        return next($this->list);
    }

    public function valid(): bool
    {
        return $this->current() !== false;
    }
}
