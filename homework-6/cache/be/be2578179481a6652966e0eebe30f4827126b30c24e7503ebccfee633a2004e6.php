<?php

/* index.twig */
class __TwigTemplate_8c778f1c3c689b2164f22e79104c592cb7a216bc412fb8a3aefb16a15baba475 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 4
        $this->parent = $this->loadTemplate("layout.twig", "index.twig", 4);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    <h1>Домашнее задание по PHP № 5.2</h1>
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 7,  28 => 6,  11 => 4,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "index.twig", "C:\\OpenServer\\domains\\dz06.loftschool\\views\\index.twig");
    }
}
