<?php

/* layout.twig */
class __TwigTemplate_aff3a5ba7e132f1489bb51d9edc6b4f8c2bed2629dc5c8619ca87801cacd1a7f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel='stylesheet' href='../template/style.css'>
    <title>";
        // line 9
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
</head>
<body>

<div class=\"wrapper\">
    <header>
        <div class='container '>

            ";
        // line 17
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["SESSION"] ?? null), "login", array(), "array")) {
            // line 18
            echo "                ";
            $context["userName"] = twig_get_attribute($this->env, $this->getSourceContext(), ($context["SESSION"] ?? null), "name", array(), "array");
            // line 19
            echo "                ";
            $context["menu"] = array(0 => array("name" => "Главная", "url" => "/", "class" => "left"), 1 => array("name" => "Список пользователей", "url" => "users", "class" => "left"), 2 => array("name" => "userName", "url" => "", "class" => "right"), 3 => array("name" => "Личный кабинет", "url" => "profile", "class" => "right"), 4 => array("name" => "Выход", "url" => "logout", "class" => "right"));
            // line 26
            echo "                <ul class='clearfix'>
                    ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["menu"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["menu_item"]) {
                // line 28
                echo "                        <li class=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "class", array()), "html", null, true);
                echo "><a href='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "url", array()), "html", null, true);
                echo "'>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "name", array()), "html", null, true);
                echo "</a></li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "                </ul>
            ";
        } else {
            // line 32
            echo "                ";
            $context["menu"] = array(0 => array("name" => "Главная", "url" => "/", "class" => "left"), 1 => array("name" => "Вход", "url" => "login", "class" => "right"), 2 => array("name" => "Регистрация", "url" => "register", "class" => "right"));
            // line 38
            echo "                <ul class='clearfix'>
                    ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["menu"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["menu_item"]) {
                // line 40
                echo "                        <li class=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "class", array()), "html", null, true);
                echo "><a href='";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "url", array()), "html", null, true);
                echo "'>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "name", array()), "html", null, true);
                echo "</a></li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "                </ul>
            ";
        }
        // line 44
        echo "

        </div>
    </header>



    <main>
        ";
        // line 52
        $this->displayBlock('content', $context, $blocks);
        // line 55
        echo "    </main>
    <footer></footer>
</body>
</html>";
    }

    // line 52
    public function block_content($context, array $blocks = array())
    {
        // line 53
        echo "
        ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 53,  119 => 52,  112 => 55,  110 => 52,  100 => 44,  96 => 42,  83 => 40,  79 => 39,  76 => 38,  73 => 32,  69 => 30,  56 => 28,  52 => 27,  49 => 26,  46 => 19,  43 => 18,  41 => 17,  30 => 9,  20 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.twig", "C:\\OpenServer\\domains\\dz06.loftschool\\views\\layout.twig");
    }
}
