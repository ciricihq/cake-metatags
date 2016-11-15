<?php
namespace App\Controller;
/**
 * Application Controller
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Cirici/Metatags.Metatag');
    }

    public function view()
    {
      //  $post = $this->Pages->find()->first();
       // debug($this->Pages->find());
    }
}
