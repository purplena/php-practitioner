<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Leave here for now. No use.
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
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
            exit('Whoops, something went wrong with INSERT method');
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

            return $statement;
        } catch (Exception $e) {
            exit('Whoops, problems with "Select One" method');
        }
    }

    public function changeStatus($table, $params = [])
    {
        try {
            $statement = $this->pdo->prepare("update {$table} set completed =:status where id = :id and user_id = :user_id");
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
