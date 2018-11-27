<?php declare(strict_types=1);

namespace App\Skills;

interface SkillListInterface
{
    public function sort(): SkillListInterface;

    public function unique(): SkillListInterface;

    public function merge(SkillListInterface $list): SkillListInterface;

    public function getList(): array;

    public function __toString(): string;
}
