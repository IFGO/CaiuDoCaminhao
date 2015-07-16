<?php
    class sql {
        private static $produto = "SELECT * FROM produtos WHERE id = ";
        private static $categoria = "SELECT * FROM categorias WHERE id = ";
        private static $categoriaProduto = "SELECT * FROM produtos WHERE idCategoria = ";
        private static $menu = "SELECT * FROM menu WHERE tipo = 2 ORDER BY nome ASC LIMIT 5";
        private static $menuAdmin = "SELECT * FROM menu WHERE tipo = 1 ORDER BY ordem ASC LIMIT 3";
        private static $produtosDestaque = "SELECT * FROM produtos WHERE destaque=1;";
        private static $categorias = "SELECT * FROM categorias ORDER BY nome;";
        private static $produtosSemDestaque = "SELECT * FROM produtos WHERE idCategoria= ";

        public static function getSqlProduto($id) {
            return self::$produto.$id;
        }
        
        public static function getSqlCategoria($id) {
            return self::$categoria.$id;
        }
        
        public static function getSqlCategoriaProduto($id) {
            return self::$categoriaProduto.$id;
        }
        
        public static function getSqlMenu() {
            return self::$menu;
        }
        
        public static function getSqlMenuAdmin() {
            return self::$menuAdmin;
        }
        
        public static function getSqlProdutosDestaque() {
            return self::$produtosDestaque;
        }
        
        public static function getSqlCategorias() {
            return self::$categorias;
        }
        
        public static function getSqlProdutosSemDestaque($id) {
            return self::$produtosSemDestaque.$id." AND destaque=0;";
        }
    }
?>