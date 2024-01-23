<?php
require_once 'config.php';
require_once 'models/Usuarios.php';

class UsuarioController {

    public static function get($id){
        if($id){
            $sql = Usuarios::get($id);

            if($sql->rowCount()>0){
                $data = $sql->fetch( PDO::FETCH_ASSOC );

                return $array['result'] = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'post' => $data['post']
                ];
            }
        } else {
            return $array['error'] = 'ID não enviado';
        }
    }

    public static function insert($name, $post){
        if($id && $name && $post){
            
            $sql = Usuarios::insert($name, $post);
            if($sql->rowCount()>0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);

                return $array['result'] = [
                    'id' => $data['id'],
                    'name' => $name,
                    'post' => $post
                ];
            }
        } else {
            return $array['error'] = 'Campos não enviado';
        }
    }

    public static function update($id, $name, $post){
        if($id && $name && $post){
            $data = Usuarios::get($id);

            if($data){ 
            $sql = Usuarios::update($id, $name, $post);
            }

            if($sql->rowCount()>0){
                $data = $sql->fetch(PDO::FETCH_ASSOC);

                return $array['result'] = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'post' => $data['post']
                ];
            }
        } else {
            return $array['error'] = 'Campos não enviado';
        }
    }

    public static function delete($id){
        if($id){
            $sql = Usuarios::get($id);

            if($sql->rowCount()>0){
                $array = Usuarios::delete($id);
            }
        } else {
            return $array['error'] = 'ID não enviado';
        }
    }
}