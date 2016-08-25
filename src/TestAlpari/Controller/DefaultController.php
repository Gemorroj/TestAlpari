<?php

namespace TestAlpari\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use TestAlpari\Entity\Circle;
use TestAlpari\Entity\Square;

class DefaultController
{
    public function indexAction(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig');
    }

    public function drawAction(Request $request, Application $app)
    {
        $drawingElement = $this->makeDrawingElement($request->get('type'));

        return new JsonResponse(array(''));
    }


    /**
     * @param string $elementName
     * @return Circle|Square
     */
    private function makeDrawingElement($elementName)
    {
        switch ($elementName) {
            case 'circle':
                return new Circle();
                break;

            case 'square':
                return new Square();
                break;
        }

        throw new \InvalidArgumentException(
            sprintf('Неподдерживаемый элемент "%s"', $elementName)
        );
    }
}
