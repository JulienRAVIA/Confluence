<?php 

namespace App;

use App\Util\SessionManager;
use Symfony\Component\Yaml\Yaml;

/**
 * Twig Renderer for view function
 */
class Twig
{
    private $_twig;
    private $_loader;

    /**
     * Instanciation de l'objet Twig
     */
    public function __construct()
    {
        $this->session = new SessionManager;
        $this->_loader = new \Twig_Loader_Filesystem('../src/templates');
		$this->_twig = new \Twig_Environment($this->_loader, array(
    		'cache' => false,
            'debug' => true
        ));
        $this->_twig->addExtension(new \Twig_Extension_Debug());
        $this->_twig->addGlobal('session', $this->session->get());
        $this->_twig->addGlobal('trad', $this->getTrad());
        $this->_twig->addGlobal('domain', $_SERVER['HTTP_HOST']);
		return $this->_twig;
    }

    /**
     * Fonction de render
     * 
     * @param  string $view  Chemin de la vue
     * @param  array  $array Paramètres à passer à la vue
     * @return twigView      Twig view
     */
    public function render(string $view, $array = array())
    {
    	if(empty($array)) {
    		echo $this->_twig->render($view);
    	} else {
    		echo $this->_twig->render($view, $array);
    	}
    }

    private function getTrad()
    {
        return Yaml::parseFile('../src/trads/'.$this->session->get('lang').'.yaml');
    }
}

?>