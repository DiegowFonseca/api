<?php
require_once 'controllers/UsuarioController.php';

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get'){
    $id = filter_input(INPUT_GET, 'id');

    $array = UsuarioController::get($id);

} elseif($method === 'post') {
    $name = filter_input(INPUT_POST, 'name');
    $post = filter_input(INPUT_POST, 'post');

    $array = UsuarioController::insert($name, $post);

} elseif($method === 'put') {
    parse_str(file_get_contents('php://input'), $input);

    $id = $input['id'] ?? null;
    $name = $input['name'] ?? null;
    $post = $input['post'] ?? null;

    $id = filter_var($id);
    $name = filter_var($name);
    $post = filter_var($post);

    $array = UsuarioController::update($id, $name, $post);

} elseif($method === 'delete') {
    parse_str(file_get_contents('php://input'), $input);

    $id = $input['id'] ?? null;
    $id = filter_var($id);

    $array = UsuarioController::delete($id); 

} else {
    $array['error'] = 'URL inexistente';
}

require 'return.php';