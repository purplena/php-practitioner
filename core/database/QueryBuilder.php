<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectAllByAscendingOrder($table)
    {
        $statement = $this->pdo->prepare("select * from {$table} ORDER BY completed ASC");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectAllByDescendingOrderById($table)
    {
        $statement = $this->pdo->prepare("select * from {$table} ORDER BY id DESC");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(',', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            exit('Whoops, something went wrong');
        }
    }

    public function delete($table, $params = [])
    {
        try {
            $statement = $this->pdo->prepare("delete from {$table} where id = :id");
            $statement->execute($params);
        } catch (Exception $e) {
            exit('Whoops, problems with "delete" method');
        }
    }

    public function selectOne($table, $params = [])
    {
        try {
            $statement = $this->pdo->prepare("select * from {$table} where id = :id");
            $statement->execute($params);
            // In Controller use
            // $statement->fetch(PDO::FETCH_ASSOC); -> to return an array
            // $statement->fetchAll(PDO::FETCH_CLASS); -> to return object (array of arryas)
            return $statement;
        } catch (Exception $e) {
            exit('Whoops, problems with "Select One" method');
        }
    }

    public function changeStatus($table, $params = [])
    {
        try {
            $statement = $this->pdo->prepare("update {$table} set completed =:status where id = :id");
            $statement->execute($params);
        } catch (Exception $e) {
            exit('Whoops, problems with "changeStatus" method');
        }
    }

    public function query($query, $params = [])
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);

            return $statement;
            // In Controller use
            // $statement->fetch(PDO::FETCH_ASSOC); -> to return an array
            // $statement->fetchAll(PDO::FETCH_CLASS); -> to return object (array of arryas)
        } catch (Exception $e) {
            exit('Whoops, problems with "Query" method');
        }
    }

    public function edit($table, $params = [])
    {
        try {
            $statement = $this->pdo->prepare("update {$table} set description =:description where id = :id");
            $statement->execute($params);
        } catch (Exception $e) {
            exit('Whoops, problems with "edit" method');
        }
    }
}
