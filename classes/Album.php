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

    /**
     * Haalt alle personen op uit de database.
     *
     * @param PDO $db De PDO-databaseverbinding.
     * @return Persoon[] Een array van Persoon-objecten.
     */
    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM album");

        // Array om personen op te slaan
        $albums = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $album = new Album(
                $row['ID'],
                $row['Naam'],
                $row['Artiesten'],
                $row['Release_datum'],
                $row['URL'],
                $row['Afbeelding'],
                $row['Prijs']
            );
            $albums[] = $album;
        }

        // Retourneer array met personen
        return $albums;
    }

}