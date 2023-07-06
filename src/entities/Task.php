<?php

namespace entities;

use DateTimeImmutable;
use utils\utilities;

class Task
{
    private ?int $id;
    private ?DateTimeImmutable $dataStart;
    private ?DateTimeImmutable $dateFinished;
    private string $description;
    private ?string $locale;
    private ?string $notes;
    private bool $flagFinish;

    public const FLAG_NOT_FINISH = false;
    public const FLAG_FINISH = true;

    public function __construct(string $dataStart,
                                string $description,
                                ?string $locale,
                                ?string $notes,
                                ?int $id = null,
                                bool $flagConcluido = self::FLAG_NOT_FINISH,
                                ?string $dateFinished = null)
    {
        $this->id = ($id === null) ? null : $id;
        $this->dataStart = new DateTimeImmutable($dataStart);
        $this->description = $description;
        $this->locale = $locale;
        $this->notes = $notes;
        $this->flagFinish = $flagConcluido;
        $this->dateFinished = ($dateFinished !== null) ? new DateTimeImmutable($dateFinished) : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Task
    {
        $this->id = $id;
        return $this;
    }

    public function getDataStart(): ?string
    {
        return Utilities::dateToString($this->dataStart);
    }

    public function getDateFinished(): ?string
    {
        if($this->dateFinished === null)
            return "NULL";
        return Utilities::dateToString($this->dateFinished);
    }

    public function setDateFinished(DateTimeImmutable $dateFinished): Task
    {
        $this->dateFinished = $dateFinished;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Task
    {
        $this->description = $description;
        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): Task
    {
        $this->locale = $locale;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): Task
    {
        $this->notes = $notes;
        return $this;
    }

    public function isFlagFinish(): bool
    {
        return $this->flagFinish;
    }
    public function isFlagFinishString(): string
    {
        if ($this->isFlagFinish())
            return "1";

        return "0";
    }

    public function finishTask(): Task
    {
        $this->flagFinish = self::FLAG_FINISH;
        return $this;
    }

    public function toJson(): string
    {
        return json_encode([
            'id' => $this->getId(),
            'dataStart' => $this->getDataStart(),
            'dataFinished' => $this->getDateFinished(),
            'description' => $this->getDescription(),
            'locale' => $this->getLocale(),
            'notes' => $this->getNotes(),
            'flagFinish' => $this->isFlagFinish()
        ]);
    }
}
