<?php

/**
 * Elements
 *
 * Helps to build UI elements for the application
 */
class Elements extends Phalcon\Mvc\User\Component
{

    private $_headerMenu = array(
        'pull-left' => array(
            'index' => array(
                'caption' => '首頁',
                'action' => 'index'
            ),
            'collections' => array(
                'caption' => '我的收藏',
                'action' => 'index'
            ),
            'about' => array(
                'caption' => 'About',
                'action' => 'index'
            ),
            'contact' => array(
                'caption' => 'Contact',
                'action' => 'index'
            ),
        ),
        'pull-right' => array(
            'session' => array(
                'caption' => '登入/註冊',
                'action' => 'index'
            ),
        )
    );

    private $_tabs = array(
	'收藏櫃' => array(
            'controller' => 'collections',
            'action' => 'index',
            'any' => false
        ),
        '製作公司' => array(
            'controller' => 'companies',
            'action' => 'index',
            'any' => true
        ),
        '查詢' => array(
            'controller' => 'products',
            'action' => 'index',
            'any' => true
        ),
        '查詢種類' => array(
            'controller' => 'producttypes',
            'action' => 'index',
            'any' => true
        ),
        'Invoices' => array(
            'controller' => 'invoices',
            'action' => 'index',
            'any' => false
        ),
        'Your Profile' => array(
            'controller' => 'invoices',
            'action' => 'profile',
            'any' => false
        )
    );

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {

        $auth = $this->session->get('auth');
        if ($auth) {
            $this->_headerMenu['pull-right']['session'] = array(
                'caption' => '登出',
                'action' => 'end'
            );
        } else {
            unset($this->_headerMenu['pull-left']['invoices']);
        }

        echo '<div class="nav-collapse">';
        $controllerName = $this->view->getControllerName();
        foreach ($this->_headerMenu as $position => $menu) {
            echo '<ul class="nav ', $position, '">';
            foreach ($menu as $controller => $option) {
                if ($controllerName == $controller) {
                    echo '<li class="active">';
                } else {
                    echo '<li>';
                }
                echo Phalcon\Tag::linkTo($controller . '/' . $option['action'], $option['caption']);
                echo '</li>';
            }
            echo '</ul>';
        }
        echo '</div>';
    }

    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
            } else {
                echo '<li>';
            }
            echo Phalcon\Tag::linkTo($option['controller'] . '/' . $option['action'], $caption), '<li>';
        }
        echo '</ul>';
    }
}
