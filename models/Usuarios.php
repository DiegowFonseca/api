<?php

namespace models;

class Usuarios {

    public static function get($id){
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $sql;
    }

    public static function insert($name, $post){
        $sql = $pdo->prepare("INSERT INTO usuarios (name, post) VALUES (:name, :post)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':post', $post);
        $sql->execute();

        $pdo->lastInsertId();
        return $sql;
    }

    public static function update($id, $name, $post){
        $sql = $pdo->prepare("UPDATE usuarios SET name = :name, post = :post WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':post', $post);
        $sql->execute();

        return $sql;
    }

    public static function delete($id){
        $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $sql;
    }
}