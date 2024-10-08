<?php
namespace app\core;
require_once 'routes.php';

class Router
{
    private $uri;
    private $route;
    private $requestMethod;
    private $controller;
    private $method;
    private $parameters = [];
    private $flag;

    public function getUri()
    {
        return $this->uri;
    }
    
    public function getRoute()
    {
        return $this->route;
    }
    
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }
    
    public function getController()
    {
        return $this->controller;
    }

    public function getMethod()
    {
        return $this->method;
    }
    
    public function getParameters()
    {
        return $this->parameters;
    }

    public function __construct()
    {
        $this->uri = urldecode($_SERVER['REQUEST_URI']);
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->startRoute();
    }

    /** Inicia a rota.
     * Verifica se a uri está em um padrão válido.
     * Verifica se a uri contém parâmetros em um padrão válido.
     * @var string $uri Endereço da página.
     * @var bool $flag Utilizada para sinalizar se uma rota foi encontrada. True = Rota encontrada. False = Rota não encontrada.
     * @var string REGEX_ROUTE Constante que corresponde ao padrão utilizado nas rotas: /minha/rota 
     * @var array $match Armazena temporariamente a rota caso o preg_match encontre o padrão da regex. */
    public function startRoute()
    {
        switch($this->uri)
        {
            case '/':
                $this->route = $this->uri;
                $this->flag = $this->checkRoute();
            break;

            default:
                if(preg_match(REGEX_ROUTE,$this->uri,$match))
                {
                    $this->route = $match[0];
                    $this->flag = $this->checkRoute();
                }
                else
                {
                    $this->flag = false;
                }
            break;
        }

        // Se a rota é válida (true), verifica se existem parâmetros.
        if($this->flag === true)
        {
            unset($this->flag);
            $this->checkParams();
        }
        else
        {
            echo 'Página não encontrada.';
            echo '<br><a href="/">Voltar ao início.</a>';
            die;
        }
    }

    /** Verifica se a rota existe no array de rotas.
     * @var string $controller Controller que será executado.
     * @var string $method Método que será executando quando o controller for instanciado.
     * @var string $pageName Nome da página que será carregada.
     * @return bool Retorna true se a rota for encontrada no array de rotas, caso contrário retorna false. */
    public function checkRoute()
    {
        if(array_key_exists($this->route,ROUTES[$this->requestMethod]))
        {
            $array = explode('@',ROUTES[$this->requestMethod][$this->route]);
            $this->controller = $array[0] . 'Controller';
            $this->method = $array[1];
            $this->parameters['pageName'] = $array[2];
            return true;
        }
        else
        {
            return false;
        }
    }

    /** Verifica se existem parâmetros na uri e os separa em um array. 
     * @param string REGEX_ROUTE Regex para capturar rotas no padrão /minha/rota
     * @param string REGEX_PARAMETERS Regex para capturar parâmetros na URI no padrão /nomeDoParametro/valorDoParametro
     * @param array $params Array para armazenamento temporário dos parâmetros vindos via URI.
     * @param array $parameters Array para armazenamento dos parâmetros vindos da URI.
     * @return void Não retorna nenhum valor.
    */
    public function checkParams()
    {
        // remove a rota da uri.
        $this->uri = preg_replace(REGEX_ROUTE,'',$this->uri);
        // verifica se existem parâmetros.
        while(preg_match(REGEX_PARAMETERS,$this->uri,$match))
        {
            $params = explode('/',$match[0]);
            array_shift($params);
            $this->parameters[$params[0]] = $params[1];
            $this->uri = preg_replace(REGEX_PARAMETERS,'',$this->uri,1);
        }
    }
}