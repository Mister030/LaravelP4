<?php

class Zangeres
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        $sql = "SELECT  ZNG.Id
                        ,ZNG.Naam
                        ,ZNG.Nationaliteit
                        ,ZNG.Vermogen
                        ,ZNG.Geboortedatum
                        ,ZNG.AantalAlbums
                FROM Zangeressen AS ZNG
                ORDER BY ZNG.Vermogen DESC";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE FROM Zangeressen
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Zangeressen
                (
                    Naam,
                    Nationaliteit,
                    Vermogen,
                    Geboortedatum,
                    AantalAlbums
                )
                VALUES
                (
                    :naam,
                    :nationaliteit,
                    :vermogen,
                    :geboortedatum,
                    :aantalalbums
                )";

        $this->db->query($sql);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':nationaliteit', $data['nationaliteit'], PDO::PARAM_STR);
        $this->db->bind(':vermogen', $data['vermogen'], PDO::PARAM_STR);
        $this->db->bind(':geboortedatum', $data['geboortedatum'], PDO::PARAM_STR);
        $this->db->bind(':aantalalbums', $data['aantalalbums'], PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function getZangeresById($id)
    {
        $sql = "SELECT  ZNG.Id
                        ,ZNG.Naam
                        ,ZNG.Nationaliteit
                        ,ZNG.Vermogen
                        ,ZNG.Geboortedatum
                        ,ZNG.AantalAlbums
                FROM Zangeressen AS ZNG
                WHERE ZNG.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateZangeres($request)
    {
        $sql = "UPDATE Zangeressen AS ZNG
                SET     ZNG.Naam = :naam,
                        ZNG.Nationaliteit = :nationaliteit,
                        ZNG.Vermogen = :vermogen,
                        ZNG.Geboortedatum = :geboortedatum,
                        ZNG.AantalAlbums = :aantalalbums
                WHERE   ZNG.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':naam', $request['naam'], PDO::PARAM_STR);
        $this->db->bind(':nationaliteit', $request['nationaliteit'], PDO::PARAM_STR);
        $this->db->bind(':vermogen', $request['vermogen'], PDO::PARAM_STR);
        $this->db->bind(':geboortedatum', $request['geboortedatum'], PDO::PARAM_STR);
        $this->db->bind(':aantalalbums', $request['aantalalbums'], PDO::PARAM_INT);

        return $this->db->execute();
    }
}
