<?php

class Horloge
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = "SELECT  HRL.Id
                        ,HRL.Merk
                        ,HRL.Model
                        ,HRL.Prijs
                        ,HRL.Materiaal
                        ,CONCAT(HRL.Gewicht, ' g') AS Gewicht
                        ,DATE_FORMAT(HRL.Releasedatum, '%d/%m/%Y') AS Releasedatum
                FROM Horloges AS HRL
                ORDER BY HRL.Prijs DESC";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function delete($Id)
    {
        $sql = "DELETE FROM Horloges
                WHERE Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Horloges
                (
                    Merk,
                    Model,
                    Prijs,
                    Materiaal,
                    Gewicht,
                    Releasedatum
                )
                VALUES
                (
                    :merk,
                    :model,
                    :prijs,
                    :materiaal,
                    :gewicht,
                    :releasedatum
                )";

        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getHorlogeById($id)
    {
        $sql = "SELECT  HRL.Id
                        ,HRL.Merk
                        ,HRL.Model
                        ,HRL.Prijs
                        ,HRL.Materiaal
                        ,HRL.Gewicht
                        ,HRL.Releasedatum
                FROM Horloges AS HRL
                WHERE HRL.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateHorloge($request)
    {
        $sql = "UPDATE Horloges AS HRL
                SET     HRL.Merk = :merk,
                        HRL.Model = :model,
                        HRL.Prijs = :prijs,
                        HRL.Materiaal = :materiaal,
                        HRL.Gewicht = :gewicht,
                        HRL.Releasedatum = :releasedatum
                WHERE   HRL.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $request['id'], PDO::PARAM_INT);
        $this->db->bind(':merk', $request['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $request['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $request['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $request['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $request['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $request['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}