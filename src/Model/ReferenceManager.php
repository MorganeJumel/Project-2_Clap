<?php

/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;

/**
 *
 */
class ReferenceManager extends AbstractManager
{
    /**
     *
     */
    public const TABLE = 'reference';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    /**
     * @param array $reference
     * @return int
     */
    public function insert(array $reference): int
    {
        // prepared request
        $statement = $this->pdo->prepare(
            "INSERT INTO " . self::TABLE .
            " (`movie_name`, `category_id`, `image_upload`) VALUES (:movie_name, :category_id, :image_upload)"
        );
        $statement->bindValue('movie_name', $reference['movie_name'], \PDO::PARAM_STR);
        $statement->bindValue('category_id', $reference['category_id'], \PDO::PARAM_INT);
        $statement->bindValue('image_upload', $reference['imageUpload'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM " . self::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }


    /**
     * @param array $reference
     * @return bool
     */
    public function update(array $reference): bool
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $reference['id'], \PDO::PARAM_INT);
        $statement->bindValue('title', $reference['title'], \PDO::PARAM_STR);

        return $statement->execute();
    }
    public function selectByCategory(int $categoryId)
    {
        // SELECT * FROM reference WHERE category_id=1;
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE category_id=:category_id");

        $statement->bindValue('category_id', $categoryId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
