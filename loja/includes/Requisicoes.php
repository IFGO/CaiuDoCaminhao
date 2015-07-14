<?php

class Requisicoes {

    public function requestProjectFolder() {
        return "CaiuDoCaminhao/loja/";
    }
    public function requestPath() {
        return $_SERVER['DOCUMENT_ROOT']."CaiuDoCaminhao/loja/";
    }

    function requestURL() {
        return "http://" . $_SERVER['HTTP_HOST'] . "/" . $this->requestProjectFolder();
    }

    function requestPage($page) {
        switch ($page) {
            case "produto":
                require $this->requestPath().'includes/paginas/produto.php';
                break;
            case "categoria":
                require $this->requestPath(). 'includes/paginas/categoria.php';
                break;
            case "carrinho":
                require $this->requestPath(). 'includes/paginas/carrinho.php';
                break;
            default:
                require $this->requestPath(). 'includes/paginas/home.php';
        }
    }

    function requestAdminPage($page) {
        switch ($page) {
            case "categoria":
                require $this->requestPath(). '/admin/cadCategoria.php';
                break;
            default : 
                require $this->requestPath(). '/admin/admin.php';
        }
    }

    function requestModules($module) {
        return $_SERVER['DOCUMENT_ROOT'] . $this->requestProjectFolder() . "includes/modulos/" . $module . ".php";
    }

}
