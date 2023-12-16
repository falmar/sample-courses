<?php

namespace App\Domains\Courses\Entities;

class Category
{
    public int $id;
    public string $name;

    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;

    /**
     * @param array<string, mixed> $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $self = new self();

        $self->id = $data['id'];
        $self->name = $data['name'];
        $self->createdAt = new \DateTimeImmutable($data['created_at']);
        $self->updatedAt = new \DateTimeImmutable($data['updated_at']);

        return $self;
    }
}
