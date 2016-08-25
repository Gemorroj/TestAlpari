<?php

namespace TestAlpari\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use TestAlpari\Entity\Circle;
use TestAlpari\Entity\Square;
use TestAlpari\Model\DrawResponse\SuccessResponse;

class DefaultController
{
    /**
     * @param Request $request
     * @param Application $app
     * @return string
     */
    public function indexAction(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig');
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return JsonResponse
     */
    public function drawAction(Request $request, Application $app)
    {
        $drawingElement = $this->makeDrawingElement($request->get('type'));
        $drawingElement->setParams($request->get('params', array()));

        $drawingElement->makeData();

        return new SuccessResponse($drawingElement);
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
