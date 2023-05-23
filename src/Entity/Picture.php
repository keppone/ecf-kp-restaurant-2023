<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(nullable: true)]
    private ?DateTime $isPublished = null;

    #[ORM\Column]
    private ?bool $publishedAt = null;

    #[ORM\Column]
    private ?object $content = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getIsPublished(): ?DateTime
    {
        return $this->isPublished;
    }

    public function setIsPublished(?int $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function publishedAt(): ?bool
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(bool $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }
        public function Content(): ?object
    {
        return $this->content;
    }

    public function setContent(object $content): self
    {
        $this->content = $content;

        return $this;
    }
}
