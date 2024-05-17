<?php

class Album
{
    /** @var int|null Het ID van de persoon */
    private ?int $ID;

    /** @var string De voornaam van de persoon */
    private string $Naam;

    /** @var string|null Het telefoonnummer van de persoon */
    private ?string $Artiesten;

    /** @var string|null Het e-mailadres van de persoon */
    private ?string $Release_Datum;

    /** @var string|null Eventuele opmerkingen over de persoon */
    private ?string $URL;

    /** @var string|null Eventuele opmerkingen over de persoon */
    private ?string $Afbeelding;

    /** @var string|null Eventuele opmerkingen over de persoon */
    private ?string $Prijs;

    /**
     * @return int|null
     */
    public function getID(): ?int
    {
        return $this->ID;
    }

    /**
     * @param int|null $ID
     */
    public function setID(?int $ID): void
    {
        $this->ID = $ID;
    }
}