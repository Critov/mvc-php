<?php
namespace app\controllers;
/** Classe base para os controllers.
 * @param $viewName String Nome do arquivo de view que será carregado.
 */
class BaseController
{
    protected $parameters = [];

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /** Exibição das páginas.
     * @param string $viewName Nome da view que será carregada (apenas o nome, sem o complemento 'View.php').
     */
    protected function render($viewName)
    {
        if(!empty($this->parameters))
        {
            extract($this->parameters);
        }
        
        require_once dirname(__DIR__) . '/views/headerView.php';
        require_once dirname(__DIR__) . '/views/' . $viewName . 'View.php';
        require_once dirname(__DIR__) . '/views/footerView.php';
    }
}