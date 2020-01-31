<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgendaRepository")
 */
class Agenda
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateTime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Event", inversedBy="agendas")
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="agendas")
     */
    private $place;

    public function __construct()
    {
        $this->dateTime = new ArrayCollection();
        $this->event = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Place[]
     */
    public function getDateTime(): Collection
    {
        return $this->dateTime;
    }

    public function addDateTime(Place $dateTime): self
    {
        if (!$this->dateTime->contains($dateTime)) {
            $this->dateTime[] = $dateTime;
            $dateTime->setAgenda($this);
        }

        return $this;
    }

    public function removeDateTime(Place $dateTime): self
    {
        if ($this->dateTime->contains($dateTime)) {
            $this->dateTime->removeElement($dateTime);
            // set the owning side to null (unless already changed)
            if ($dateTime->getAgenda() === $this) {
                $dateTime->setAgenda(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->event->contains($event)) {
            $this->event[] = $event;
            $event->setAgenda($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->event->contains($event)) {
            $this->event->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getAgenda() === $this) {
                $event->setAgenda(null);
            }
        }

        return $this;
    }

    public function setDateTime(\DateTimeInterface $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * @return Collection|Place[]
     */
    public function getPlace(): Collection
    {
        return $this->place;
    }

    public function addPlace(Place $place): self
    {
        if (!$this->place->contains($place)) {
            $this->place[] = $place;
            $place->setAgenda($this);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        if ($this->place->contains($place)) {
            $this->place->removeElement($place);
            // set the owning side to null (unless already changed)
            if ($place->getAgenda() === $this) {
                $place->setAgenda(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Place[]
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }
}
